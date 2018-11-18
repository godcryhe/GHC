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

class Company extends Model
{
    protected $pk = 'comp_id';
    //设置模型对应的数据表
    protected $table = "Company";
}