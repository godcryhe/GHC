<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// return [
//     '__pattern__' => [
//         'name' => '\w+',
//     ],
//     '[hello]'     => [
//         ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
//         ':name' => ['index/hello', ['method' => 'post']],
//     ],

// ];
//导入类
use think\Route;
//首页
Route::controller("/home","home/index");
//登录
Route::controller("login","home/login");
//金融机构
Route::controller("/bank","home/bank");
//交易
Route::controller("/transactions","home/transactions");
//支持
Route::controller("/support",'home/support');
//审计
Route::controller("/audit","home/audit");
//业务关系
Route::controller("/business","home/business");
//交易报告
Route::controller("/report","home/report");
//客户报告
Route::controller("/customers",'home/customers');
//账户设置
Route::controller("/account",'home/account');
//用户列表
Route::controller("/user","home/user");

