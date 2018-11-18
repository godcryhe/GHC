<?php
namespace app\home\validate;
//导入验证类
use think\Validate;
//验证器类
class Trans extends Validate
{

	//规则
    protected $rule = [
    	// name 字段 require 必须规则
        'aname'  =>'require',
        'name'  =>'require',
     ];
    //描述信息
     protected $message  =   [
        'aname.require' => " * The content can not be empty",
        'name.require' => " * The content can not be empty",
    ];

} 

 ?>
