<?php
namespace app\home\validate;
//导入验证类
use think\Validate;
//验证器类
class login extends Validate
{

	//规则
    protected $rule = [
    	// name 字段 require 必须规则
        'name'  =>'require',
        'username'  =>'require',
        'password'	=>'require',
    ];
    //描述信息
     protected $message  =   [
        //'name.require' => "Name can't be empty",
        //'username.require' => "User name can't be empty",
        //'password.require' => 'The password can not be empty',
        
     ];

} 

 ?>
