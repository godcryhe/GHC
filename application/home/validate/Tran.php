<?php
namespace app\home\validate;
//导入验证类
use think\Validate;
//验证器类
class Tran extends Validate
{

	//规则
    protected $rule = [
    	// name 字段 require 必须规则
        'start'  =>'require',
        'end'  =>'require',
        'number'  =>'require',
        'code'  =>'require',
        'rate'  =>'require',
        'moneys'  =>'require',
        
        
    ];
    //描述信息
     protected $message  =   [
        'start.require' => " * The content can not be empty",
        'end.require' => " * The content can not be empty",
        'number.require' => " * The content can not be empty",
        'code.require' => " * The content can not be empty",
        'rate.require' => " * The content can not be empty",
        'moneys.require' => " * The content can not be empty",
        
     ];

} 

 ?>
