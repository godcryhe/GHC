<?php
namespace app\home\validate;
//导入验证类
use think\Validate;
//验证器类
class Bank extends Validate
{

	//规则
    protected $rule = [
    	// name 字段 require 必须规则
       
        'name'  =>'require',
         'street'  =>'require',
        'code'  =>'require',
        'city'  =>'require',
        'country'  =>'require',
        'state'  =>'require',
    ];
    //描述信息
     protected $message  =   [
        'name.require' => " * The content can not be empty",
        'names.require' => " * The content can not be empty",
        'street.require' => " * The content can not be empty",
        'code.require' => " * The content can not be empty",
        'city.require' => " * The content can not be empty",
        'country.require' => " * The content can not be empty",
        'state.require' => " * The content can not be empty",
        
     ];

} 

 ?>
