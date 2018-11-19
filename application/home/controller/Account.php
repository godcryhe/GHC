<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\Banks;
class Account extends Allow{
	public function getIndex(){
        $request=request();
        $id=$request->param('id');
        //dump($id);exit;
        $data=Db::table('users')->where('id',$id)->find();
        //dump($data);exit;
        return $this->fetch("account/index",['data'=>$data]);
    }
    public function postUpdate(){
          //请求对象
        $request=request();
        $id=$request->param('id');
        //dump($id);exit;
         //数据插入
        $data=$request->only(['name','username','password']);
        //dump($data);exit;
         if(Db::table("users")->where('id',$id)->update($data)){
            $this->redirect("/login/logout");
        }else{
            $this->error("Failure to modify","/account/index/id/$id");
        }
    }
}