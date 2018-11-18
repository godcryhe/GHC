<?php 
namespace app\home\model;
use think\Model;
class Audits extends Model{
	//设置模型对应的数据表
	protected $table="saction";
	// 获取器 对获取的字段做自动处理
	public function getTypeoAttr($value)
    {
         $typeo = [1=>'Not reviewed',2=>'No',3=>'Yes'];
        return $typeo[$value];
    }
    public function getTypekAttr($value)
    {
         $typek = [1=>'Cash',2=>'bank Transfer',3=>'bank Draft',4=>'bank Card',5=>'Email Transfer',6=>'Cheque',7=>'Wire',8=>'BANK CARD + CASH'];
        return $typek[$value];
    }
     public function getTypexAttr($value)
    {
         $typex = [1=>'Cash',2=>'bank Transfer',3=>'bank Draft',4=>'bank Card',5=>'Email Transfer',6=>'Cheque',7=>'Wire',8=>'CASH+DEBIT',9=>'CASH+DRAFT',10=>'WECHAT'];
        return $typex[$value];
    }
   public function getStatusAttr($value)
    {
         $status = [1=>'New',2=>'Assessed',3=>'Filed'];
        return $status[$value];
    }
   
}
?>
