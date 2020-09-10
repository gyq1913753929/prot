<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;
use App\Http\Requests\StoreBrandPost;
use App\Http\Response\Json;
use Validator;
class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *展示
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand_name = request()->brand_name;
        $where=[];
        if($brand_name){
            $where[] = ['brand_name','like',"%$brand_name%"];
        }

        $brand_url = request()->brand_url;
        if($brand_url){
            $where[] = ['brand_url','like',"%$brand_url%"];
        }
        
        $data = Brand::where($where)->orderBy('id','desc')->paginate(8);   //orderBy 倒叙 排序
        if(request()->ajax()){
            return view('admin/brand/ajaxpage',['data'=>$data,'query'=>request()->all()]);

        }
    
        return view('admin/brand/index',['data'=>$data,'query'=>request()->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *添加页面
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/brand/create');
    }

    /**
     * Store a newly created resource in storage.
     *添加方法
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $post = $request->except(['_token','file']);
        

        
        //表单验证1
        $validatedData = $request->validate([
            'brand_name' => 'required|unique:brand',        
            'brand_url' =>'required',
            'brand_desc'=>'required'
        ],[
            'brand_name.required'=>'品牌名称不能为空',
            'brand_name.unique'=>'品牌名称已存在',
            'brand_url.required'=>'品牌LOGO不能为空',
            'brand_desc.required'=>'品牌网址不能为空',
        ]);
        
        $res = Brand::insert($post);
        if($res){
            return redirect('admin/brand/index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *编辑页面
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $brand = Brand::find($id);
       return view('admin/brand/edit',['brand'=>$brand]);
    }

    /**
     * Update the specified resource in storage.
     *修改方法
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = $request->except(['_token','file']);
        
        $res = Brand::where('id',$id)->update($post);
       
        if($res!==false){
            return redirect('admin/brand/index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *删除
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        


       $res =  Brand::destroy($id);
        if(request()->ajax()){
            return response()->json(['code'=>0,'msg'=>'删除成功!']);
        }

       if($res){
        return redirect('admin/brand/index');
    }
      



    }


    //文件上传
    public function upload(Request $request)
    {
        $file = $request->file;
        
        if ($request->hasFile('file') && $request->file('file')->isValid()) {
        $photo = $request->file;
       
        $store_result = $photo->store('upload');
        return json_encode(['code'=>0,'msg'=>'上传成功','data'=>env('IMG_URL').$store_result]);
        
       
         }
        return json_encode(['code'=>2,'msg'=>'上传失败']);
    }


    //极点
    public function change(Request $request)
    {
        $brand_name = $request->brand_name;
        $id = $request->id;
       if(!$brand_name || !$id){
          return $this->error('缺少参数');
           //return response()->json(['code'=>3,'msg'=>'缺少参数']);
       }
       $res = Brand::where('id',$id)->update(['brand_name'=>$brand_name]);
       if($res){
           
            return $this->success('修改成功');
           //return response()->json(['code'=>0,'msg'=>'修改成功']);
       }
    
    }


}
