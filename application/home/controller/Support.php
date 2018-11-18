<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
use app\index\model\Banks;
class Support extends Allow{
	public function getIndex(){
        //加载模板
        $data=Db::table('support')->select();
        //dump($data);exit;
        return $this->fetch("support/index",['data'=>$data]);
	}
	public function PostInsert(){
		 //请求对象
        $request=request();
         //获取参数
        $data=$request->only(['descibe','type','types']);
        $data['time']=date("Y-m-d H:i:s",time());
        // //验证操作
        // $result=$this->validate($request->param(),'support');
        // if(true!==$result){
        //         // echo $result;
        //         $this->error($result,'/support/index');
        // }

        $s=Db::table("support")->insert($data);
        if($s){
            $this->redirect('/support/index');
        }else{
            $this->error("Add failure",'/support/index');
        }
    
    }
     //详情修改
    public function getEdit(){
         //请求对象
        $request=request();
        $id=$request->param('id');
        $data=Db::table('support')->where('id',$id)->find();
        //dump($data);exit;
        return $this->fetch("support/edit",['data'=>$data]);
    }
    public function postUpdate(){
          //请求对象
        $request=request();
        $id=$request->param('id');
         //数据插入
         $data=$request->only(['descibe','type','types']);
         $data['time']=date("Y-m-d H:i:s",time());
        //dump($data);exit;
         if(Db::table("support")->where('id',$id)->update($data)){
            $this->redirect("/support/index");
        }else{
            $this->error("Failure to modify","/support/index");
        }
    }
     //执行删除
    public function getDelete(){
        //获取id
        $request=request();
        $id=$request->param('id');
        if(Db::table('support')->where('id',$id)->delete()){
            $this->redirect("/support/index");
        }else{
            $this->error("/support/index");
        }
    }
	
}
