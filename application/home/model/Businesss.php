<?php 
namespace app\home\model;
use think\Model;
class Businesss extends Model{
	//设置模型对应的数据表
	protected $table="user";
	// 获取器 对获取的字段做自动处理
	public function getRatingAttr($value)
    {
         $rating = [1=>'Low',2=>'Moderate',3=>'High'];
        return $rating[$value];
    }
    public function getTypeAttr($value)
    {
         $type = [1=>'Individual',2=>'business'];
        return $type[$value];
    }
    
}
?>
