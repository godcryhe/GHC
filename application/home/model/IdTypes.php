<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;

class IdTypes extends Model
{
    protected $pk = 'id';
    //设置模型对应的数据表
    protected $table = "id_types";
}

