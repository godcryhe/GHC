<?php 
namespace app\home\model;
use think\Model;
use traits\model\SoftDelete;

class Transaction extends Model{
    use SoftDelete;

    protected $pk = 'trans_id';

	//设置模型对应的数据表
	protected $table="Transactions";

    // 定义时间字段名
    protected $createTime = 'created_timestamp';
    protected $updateTime = 'last_modified_timestamp';
    // 开启时间字段自动写入 并设置字段类型为datetime
    protected $autoWriteTimestamp = 'datetime';

    const CUST_ROLE_SENDER = "S";
    const CUST_ROLE_BENEFICIARY = "B";

    protected $type = [
        'trans_date'  =>  'date:Y-m-d',
        'settlement_date'  =>  'date:Y-m-d',
        'trans_time'  => 'time:H:m:s',
    ];

    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();

        if (!array_key_exists('trans_num', $this->data)) {
            $fields = $this->getTableFields();
            $data = [];
            foreach ($fields as $field) {
                $data[$field] = null;
            }
            $this->data($data);
        }
    }

    public function getOsfiMatchStrAttr($value){
        if ($value == 0)
            return "No";
        else
            return "Yes";
    }

    public function getNotesAttr($value)
    {
        return html_entity_decode($value);
    }

    public function setNotesAttr($value)
    {
        return htmlentities($value);
    }

    public function getCustRoleStrAttr($value,$data){
        $ret = null;
        if ($data['cust_role'] != null) {
            $type = [self::CUST_ROLE_SENDER => 'Sender', self::CUST_ROLE_BENEFICIARY => 'Beneficiary'];
            $ret = $type[$data['cust_role']];
        }
        return $ret;
    }

    public function getAmountInStrAttr($value,$data){
        $ret = null;
        $amount = $data['amount_in'];
        if (!empty($amount)){
            $ret = number_format($amount,2);
        }
        return $ret;
    }

    public function getHasSenderThirdAttr($value){
        if (is_null($this->getAttr("sender_third_id")))
            return "false";
        else
            return "true";
    }

    public function getHasBenThirdAttr($value){
        if (is_null($this->getAttr("ben_third_id")))
            return "false";
        else
            return "true";
    }

    public function getHasBankAttr($value){
        if (is_null($this->getAttr("insti_id")))
            return "false";
        else
            return "true";
    }

    public function customer(){
        $custRole = $this->getAttr("cust_role");
        if (self::CUST_ROLE_SENDER === $custRole)
            return $this->sender();
        else
            return $this->ben();
    }

    public function sender(){
        return $this->hasOne('Customer','cust_id','sender_id');
    }

    public function ben(){
        return $this->hasOne('Customer','cust_id','ben_id');
    }

    public function senderThird(){
        return $this->hasOne('Customer','cust_id','sender_third_id');
    }

    public function benThird(){
        return $this->hasOne('Customer','cust_id','ben_third_id');
    }

    public function bank(){
        return $this->hasOne('Bank','id','insti_id');
    }

    public function company(){
        return $this->hasOne('Company','comp_id','comp_id');
    }
}

