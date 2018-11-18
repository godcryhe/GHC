<?php
namespace app\home\validate;
//导入验证类
use think\Validate;
//验证器类
class Index extends Validate
{

	//规则
    protected $rule = [
    	// name 字段 require 必须规则
        'names'  =>'require',
        'street'  =>'require',
        'code'  =>'require',
        'city'  =>'require',
        'country'  =>'require',
        'state'  =>'require',
        'phonea'  =>'require',
        'number'  =>'require',
        'birth'  =>'require',
        'end'  =>'require',
        'place'  =>'require',
        'typeq'  =>'require',
        'typew'  =>'require',
        'money'  =>'require',
        
    ];
    //描述信息
     protected $message  =   [
        
        'names.require' => " * The content can not be empty",
        'street.require' => " * The content can not be empty",
        'code.require' => " * The content can not be empty",
        'city.require' => " * The content can not be empty",
        'country.require' => " * The content can not be empty",
        'state.require' => " * The content can not be empty",
        'phonea.require' => " * The content can not be empty",
        'number.require' => " * The content can not be empty",
        'birth.require' => " * The content can not be empty",
        'end.require' => " * The content can not be empty",
        'place.require' => " * The content can not be empty",
        'typeq.require' => " * The content can not be empty",
        'typew.require' => " * The content can not be empty",
        'money.require' => " * The content can not be empty",
     ];

} 

 ?>
