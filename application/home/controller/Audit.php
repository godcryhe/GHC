<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
use app\home\model\Audits;
class Audit extends Allow{
	public function getIndex(){
        //加载模板
        $user=new Audits();
        $data=$user->select();
       
        return $this->fetch("audit/index",['data'=>$data]);
	}
}