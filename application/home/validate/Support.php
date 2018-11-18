<?php
namespace app\home\validate;
//导入验证类
use think\Validate;
//验证器类
class Support extends Validate
{

	//规则
    protected $rule = [
    	// name 字段 require 必须规则
        'descibe'  =>'require',
        
     ];
    //描述信息
     protected $message  =   [
        'descibe.require' => " * The content can not be empty",
        
    ];

} 

 ?>
