<?php 
namespace app\home\model;
use think\Model;
class Reports extends Model{
	//设置模型对应的数据表
	protected $table="saction";
	// 获取器 对获取的字段做自动处理
	public function getTypeAttr($value)
    {
         $type = [1=>'EFTI',2=>'FX'];
        return $type[$value];
    }
      public function getTypexAttr($value)
    {
         $typex = [1=>'Cash',2=>'bank Transfer',3=>'bank Draft',4=>'bank Card',5=>'Email Transfer',6=>'Cheque',7=>'Wire',8=>'CASH+DEBIT',9=>'CASH+DRAFT',10=>'WECHAT'];
        return $typex[$value];
    }
      public function getTypezAttr($value)
    {
         $typez = [1=>'Cash',2=>'bank Transfer',3=>'bank Draft',4=>'bank Card',5=>'Email Transfer',6=>'Cheque',7=>'Wire',8=>'DEPOSIT',9=>'WIRE + BANK DRAFT',10=>'CASH+CHEQUE',11=>'BANK DRAFT+CASH',12=>'bank transfer + cash',13=>'TBD',14=>'WE CHAT',15=>'WeChat Transfer',16=>'BANK DRAFT+CASH',17=>'Alipay'];
        return $typez[$value];
    }
   
}
?>
