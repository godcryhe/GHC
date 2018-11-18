<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\Banks;
class Bank extends Allow{
	public function getIndex(){
        //加载模板
        $data=Db::table('financial_institution')->select();
        return $this->fetch("bank/index",['data'=>$data]);

    }
    public function getAdd(){
        //加载模板
        return $this->fetch("bank/add");
    }
     //执行添加
    public function postInsert(){
        //请求对象
        $request=request();
        //dump($_SESSION['session_id()']);exit;
        //获取参数
        $data=$request->only(['name','street','city','province','country','postal_code']);
       
        $s=Db::table("financial_institution")->insert($data);

        if($s){
            $this->redirect('/bank/index');
        }else{
            $this->error("Add failure",'/bank/index');
        }
    }
     //获取需要修改的数据
    public function getEdit(){
    	$request=request();
    	$id=$request->param('id');
    	$data=Db::table('financial_institution')->where('id',$id)->find();
        //var_dump($info);exit;
    	return $this->fetch("bank/edit",['data'=>$data]);
    }

    //执行修改
    public function postUpdate(){
    	$request=request();
        $id=$request->param('id');
    	$data=$request->only(['name','street','city','province','country','postal_code']);
    	$s=Db::table('financial_institution')->where('id',$id)->update($data);
        //dump($s);exit;
    	if($s){
    		$this->redirect("/bank/index");
    	}else{
    		$this->error("Failure to modify","/bank/index");
    	}
    }
    //执行删除
    public function getDelete($id){
    	//获取id
//    	$request=request();
//    	$id=$request->param('id');
    	if(Db::table('financial_institution')->where('id',$id)->delete()){
    		$this->redirect("/bank/index");
    	}else{
    		$this->error("Delete failed.");
    	}
    }
    
}