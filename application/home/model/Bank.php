<?php
/**
 * Created by PhpStorm.
 * User: yhe
 * Date: 2018-10-04
 * Time: 10:14 PM
 */
namespace app\home\model;
use think\Model;
use traits\model\SoftDelete;

class Bank extends Model
{
    use SoftDelete;

    protected $pk = 'id';
    //设置模型对应的数据表
    protected $table = "financial_institution";
}