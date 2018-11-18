<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
use app\home\model\Reports;
class Report extends Allow{
	public function getIndex(){
        //加载模板
        $user=new Reports();
        $data=$user->select();
        //dump($data);exit;
        return $this->fetch("report/index",['data'=>$data]);
	}
   
}