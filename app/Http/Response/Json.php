<?php

namespace App\Http\Response;
//命名空间主要解决函数，类，常量同名的问题

trait  Json{

    public function error($msg='',$data=[]){
        return   $this->Json('-1',$msg,$data);

    }
    public function success($msg='',$data=[]){
         return  $this->Json('0',$msg,$data);

    }


    public function Json($code,$msg,$data=[]){
        $data = [
            'code'=>$code,
            'msg'=>$msg,
            'code'=>$code,
        ];
        return response()->json($data);
    }
}