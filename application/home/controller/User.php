<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
class User extends Allow{
	public function getIndex(){
        //加载模板
        $data=Db::table('users')->select();
        return $this->fetch('user/index',['data'=>$data]);
    }
    public function getEdit(){
          //请求对象
        $request=request();
        $id=$request->param('id');
        $data=Db::table('users')->where('id',$id)->find();
        //dump($data);exit;
        return $this->fetch("user/edit",['data'=>$data]);
    }
    public function  postUpdate(){
        $request=request();
        $id=$request->param('id');
        $data=$request->only(['status']);
        if(Db::table("users")->where('id',$id)->update($data)){
            $this->redirect("/user/index");
        }else{
            $this->error("Failure to modify","/user/index");
        }
   }
}