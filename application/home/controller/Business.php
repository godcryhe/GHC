<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
use app\home\model\Businesss;
class Business extends Allow{
	public function getIndex(){
        //加载模板
        $user=new Businesss();
        $data=$user->select();
        return $this->fetch("business/index",['data'=>$data]);
	}
    public function getIn(){
         //请求对象
        $request=request();                   
        $id=$request->param('id');
        $data=Db::table('user')->where('id',$id)->find();
        $dat=Db::table('saction')->select();
        $da=Db::table('fintrac')->select();
        //dump($data);exit;
        return $this->fetch("business/in",['data'=>$data,'dat'=>$dat,'da'=>$da]);
    }
   
}