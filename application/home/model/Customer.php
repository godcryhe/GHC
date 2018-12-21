<?php

namespace app\home\model;

use think\Model;
use traits\model\SoftDelete;

class Customer extends Model
{
    use SoftDelete;

    protected $pk = 'cust_id';
    //设置模型对应的数据表
    protected $table = "Customer";

    // 定义时间字段名
    protected $createTime = 'created_timestamp';
    protected $updateTime = 'last_modified_timestamp';
    // 开启时间字段自动写入 并设置字段类型为datetime
    protected $autoWriteTimestamp = 'datetime';

    const CUST_TYPE_INDIVIDUAL = "IND";
    const CUST_TYPE_BUSINESS = "BUS";
    const CUST_TYPE_OTHER = "OTH";

    protected function initialize()
    {
        //需要调用`Model`的`initialize`方法
        parent::initialize();

        if (!array_key_exists('cust_no', $this->data)) {
            $fields = $this->getTableFields();
            $data = [];
            foreach ($fields as $field) {
                $data[$field] = null;
            }
            $this->data($data);
        }
    }

    protected $type = [
        'date_of_birth' => 'date:Y-m-d',
        'expire_date' => 'date:Y-m-d',
    ];


    // 获取器 对获取的字段做自动处理
    public function getCustTypeStrAttr($value, $data)
    {
        $ret = null;
        if ($data['cust_type'] != null) {
            $type = [self::CUST_TYPE_INDIVIDUAL => 'Individual', self::CUST_TYPE_BUSINESS => 'Business', self::CUST_TYPE_OTHER => "Other"];
            $ret = $type[$data['cust_type']];
        }
        return $ret;
    }

    public function getStatusAttr($value, $data)
    {
        $expire_date = $data['expire_date'];
        $today = date("Y-m-d H:i:s");
        if ($expire_date < $today) {
            return "Expired!";
        } else {
            return "Valid";
        }

    }


    public function getFormattedCustNameAttr($value, $data)
    {
        $cust_type = $data['cust_type'];
        if ($cust_type === self::CUST_TYPE_BUSINESS) {
            return $data['bus_name'];
        } else {
            return $data['first_name'] . " " . $data['last_name'];
        }
    }

    public function getSusStrAttr($value, $data)
    {
        $ret = "No";
        if ($data['suspicious'] === 1) {
            $ret = "Yes";
        }
        return $ret;
    }

    public function getPepStrAttr($value, $data)
    {
        $ret = "No";
        if ($data['pep'] === 1) {
            $ret = "Yes";
        }
        return $ret;
    }

    public function getStatusClassAttr($value, $data)
    {
        $ret = "";
        if ($this->getAttr('status') === "Expired!") {
            $ret = "red";
        }
        return $ret;
    }

    public function getCommentsAttr($value)
    {
        return html_entity_decode($value);
    }

    public function setCommentsAttr($value)
    {
        return htmlentities($value);
    }

    public function docType()
    {
        return $this->hasOne('IdTypes','id','doc_type');
    }

    public function getDocFileOneAddrAttr($value,$data){
        return ROOT_PATH . 'public' . DS . 'uploads'. DS . $data['cust_no'] . DS . $data['doc_file_1'];
    }

    public function getDocFileTwoAddrAttr($value,$data){
        return ROOT_PATH . 'public' . DS . 'uploads'. DS . $data['cust_no'] . DS . $data['doc_file_2'];
    }

    public function getBusFileAddrAttr($value,$data){
        return ROOT_PATH . 'public' . DS . 'uploads'. DS . $data['cust_no'] . DS . $data['bus_file'];
    }

}

