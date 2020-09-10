<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="/status/layui/css/layui.css">
  
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-left">
      <li class="layui-nav-item"><a href="">控制台</a></li>
      <li class="layui-nav-item"><a href="">商品管理</a></li>
      <li class="layui-nav-item"><a href="">用户</a></li>
      <li class="layui-nav-item">
        <a href="javascript:;">其它系统</a>
        <dl class="layui-nav-child">
          <dd><a href="">邮件管理</a></dd>
          <dd><a href="">消息管理</a></dd>
          <dd><a href="">授权管理</a></dd>
        </dl>
      </li>
    </ul>
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="http://t.cn/RCzsdCq" class="layui-nav-img">
          贤心
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="">退了</a></li>
    </ul>
  </div>
  
  <div class="layui-side layui-bg-black">
    <div class="layui-side-scroll">
      <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
      <ul class="layui-nav layui-nav-tree"  lay-filter="test">
        <li class="layui-nav-item layui-nav-itemed">
          <a class="" href="javascript:;">商品管理</a>
          <dl class="layui-nav-child">
            <dd class="layui-this"><a href="javascript:;">添加商品</a></dd>
            <dd><a href="javascript:;">商品列表</a></dd>
            
            
          </dl>
        </li>
        <li class="layui-nav-item">
          <a href="javascript:;">品牌管理</a>
          <dl class="layui-nav-child">
            <dd><a href="{{url('admin/brand/create')}}">添加品牌</a></dd>
            <dd><a href="{{url('admin/brand/index')}}">品牌列表</a></dd>
            
          </dl>
        </li>
        <li class="layui-nav-item"><a href="">云市场</a></li>
        <li class="layui-nav-item"><a href="">发布商品</a></li>
      </ul>
    </div>
  </div>
  
  <div class="layui-body">
    <!-- 内容主体区域 -->
    
    <span class="layui-breadcrumb">
            <a>首页</a>
            <a>品牌管理</a>
            <a><cite>品牌列表</cite></a>
    </span><br>


  <from action="" method="">
    <div class="layui-input-inline">
      <div class="layui-input-inline">
        <input type="tel" name="brand_name"  class="layui-input" placeholder="请输入品牌名称" value="{{$query['brand_name']??''}}" >
      </div>
    </div>

    <div class="layui-input-inline">
      <div class="layui-input-inline">
        <input type="tel" name="brand_url"  class="layui-input" placeholder="请输入品牌网址" value="{{$query['brand_url']??''}}" >
      </div>
    </div>
      
    <div class="layui-input-inline">
         <button class="layui-btn layui-btn-normal">搜索</button>
    </div> 
  </from>



    
<div class="layui-form">
  <table class="layui-table">
    <colgroup>
      <col width="150">
      <col width="150">
      <col width="200">
      <col>
    </colgroup>
    <thead>
      <tr>
        <th width="5%">
            <input type="checkbox" name="allcheckbox" lay-skin="primary">
        </th>
        <th>品牌ID</th>
        <th>品牌名称</th>
        <th>品牌LOGO</th>
        <th>品牌网址</th>
        <th>品牌介绍</th>
        <th>操作</th>
      </tr> 
    </thead>

    <tbody>
    @foreach($data as $v)
      <tr>
        <th><span><input type="checkbox" name="brandcheck[]" lay-skin="primary" value="{{$v->id}}"></span></th>
        <th>{{$v->id}}</td>
        <th id="{{$v->id}}" oldval="{{$v->brand_name}}" ><span class="brand_name">{{$v->brand_name}}</span></th>
        <th>
          @if($v->brand_logo)
            <img src="{{$v->brand_logo}}" with="120">
          @endif
        </th>
        <th>{{$v->brand_url}}</th>
        <th>{{$v->brand_desc}}</th>
        <th>
          <a href="{{url('admin/brand/edit/'.$v->id)}}" class="layui-btn layui-btn-normal">编辑</a>
  <!-- php 普通删除        <a href="javascript:void()" onclick="if(confirm('确认删除此纪录')){location.href='{{url('admin/brand/destroy/'.$v->id)}}'; }" class="layui-btn layui-btn-normal">删除</a> -->
          <a href="javascript:void(0);" onclick="deleteById({{$v->id}},this)" class="layui-btn layui-btn-normal moredel">删除</a>
        </th>
      </tr>

      
    
    @endforeach
  
    <div>
      <tr>
        <th colspan="8">
        {{$data->links('vendor.pagination.admin')}}
        <button type="button" class="layui-btn layui-btn-normal">批量删除</button>
        </th>
      </tr>
   </div>
</div>



</tbody>
</table>

</form>
</div>
  
  <div class="layui-footer">
    <!-- 底部固定区域 -->
    © layui.com - 底部固定区域
  </div>
</div>
<script src="/status/layui/layui.js"></script>
<script src="/status/layui/jquery.min.js"></script>


<script>
//JavaScript代码区域
layui.use(['element', 'form'],function(){
  var element = layui.element;
  var form = layui.form;
  
});


//ajax删除  ************************************8
function deleteById(id,obj)
{
  if(!id){
    return;
  }

  $.get('/admin/brand/destroy/'+id,function(res){
    alert(res.msg);
    $(obj).parents('tr').remove();
   // location.reload();
  },'json')

}
//删除完毕****************************************8







//ajax分页  ******************************
$(document).on('click','.layui-laypage a',function(){
//$(".layui-laypage a").click(function(){
  var url = $(this).attr('href');

  $.get(url,function(res){
    $('tbody').html(res);
    layui.use(['element', 'form'],function(){
    var element = layui.element;
    var form = layui.form;
    form.render();
  });
});

  return false;
})
//分页完毕*********************************** */






//全选********************************************
$(document).on('click','.layui-form-checkbox:first',function(){
    var checkedval = $('input[name="allcheckbox"]').prop('checked');

     $('input[name="brandcheck[]"]').prop('checked',checkedval);
    if(checkedval){
       $('.layui-from-checkbox:gt(0)').addClass('layui-form-checked');
    }else{
      $('.layui-from-checkbox:gt(0)').removeClass('layui-form-checked');
    }
});

//劈删
$('.moredel').click(function(){
  var id = new Array();
  $('input[name="brandcheck[]"]:checked').each(function(i,k){
    alert(i);
  });
})





//******************************************************* */








//及点击该 *************************************************
  //1.
  $(document).on('click','.brand_name',function(){
    var brand_name=$(this).text();
    var id = $(this).parent().attr('id');
    $(this).parent().html('<input type=text class="changename input_name_'+id+'" value='+brand_name+'>');
   
    $('.input_name_'+id).val('').focus().val(brand_name);
  });


  //2
  $(document).on('blur','.changename',function(){
    var newname = $(this).val();
    if(!newname){
      alert('内容不能为空');return;
    }
    var oldval = $(this).parent().attr('oldval');
    if(!newname==oldval){
        $(this).parent().html('<span class="brand_name>'+newname+'</span>');
        return;
    }


    var id = $(this).parent().attr('id');
    var obj = $(this);
    $.get('/admin/brand/change',{id:id,brand_name:newname},function(res){
      
      if(res.code==0){
          obj.parent().html('<span class="brand_name">'+newname+'</span>');
      }


    },'json')
  });
//及点击该完毕 *****************************************




</script>
</body>
</html>




