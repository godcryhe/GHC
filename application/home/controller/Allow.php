<?php
namespace app\home\controller;
use think\Controller;
use think\Db;
use think\Session;
class Allow extends Controller
{
    public function _initialize(){
        if(!Session::get('islogin')){
            $this->error("Please log in","/login/login");
        }
	}
}