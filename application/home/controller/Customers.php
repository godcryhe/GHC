<?php
namespace app\home\controller;
//导入Controller
use think\Db;
use think\Exception;
use think\Session;
use app\home\model\Customer;

class Customers extends Allow{

    private static function DOC_PATH(){
        return ROOT_PATH . 'public' . DS . 'uploads'. DS;
    }

	public function getIndex(){
        $se=Session::get('islogin');
        $comp_id = $se['comp_id'];
        //加载模板
        $cust=new Customer();
        $data=$cust
            ->where('cust_type','<>','OTH')
            ->where('comp_id',$comp_id)
            ->select();
        return $this->fetch("customers/index",['data'=>$data]);
	}

    public function getAdd(){
        $request=request();
        //加载模板
        $info=Db::table('id_types')->select();
        $pageAttr=[
            'info'=>$info,
            'action'=>'/customers/insert',
            'pageMode'=>'new',
            'pageTitle'=>'Add customer',
            'customer'=>new Customer()
            ];

        return $this->fetch("customers/edit_cust",$pageAttr);

    }

    public function getEdit(){
        $id = request()->param('id');

        $customer = Customer::where('cust_id','=',$id)->select()[0];

        //加载模板
        $info=Db::table('id_types')->select();

        $pageAttr=[
            'info'=>$info,
            'action'=>'/customers/update',
            'pageMode'=>'edit',
            'pageTitle'=>'Edit customer',
            'customer'=>$customer
        ];
        return $this->fetch("customers/edit_cust",$pageAttr);

    }

    public function getView(){
        $id = request()->param('id');

        $customer = Customer::where('cust_id','=',$id)->select()[0];

        //加载模板
        $info=Db::table('id_types')->select();

        $pageAttr=[
            'info'=>$info,
            'action'=>'/customers/update',
            'pageMode'=>'edit',
            'pageTitle'=>'Edit customer',
            'customer'=>$customer
        ];
        return $this->fetch("customers/view_cust",$pageAttr);

    }

    public function getDelete(){
        $id = request()->param('id');

        $customer = Customer::where('cust_id','=',$id)->select()[0];

        $customer->delete();
        return redirect("/customers/index");
    }

    public function getDownload(){
        $se=Session::get('islogin');
        $comp_id = $se['comp_id'];
	    $custNo = request()->param('custNo');
	    $fileName = request()->param('fileName');
	    $addr = $this->DOC_PATH() . $comp_id . DS . $custNo . DS . $fileName;
        $this->fileReader($addr);
    }



    //执行添加
    public function postInsert(){
        $se=Session::get('islogin');
        $comp_id = $se['comp_id'];
        $customer = new Customer($_POST);
        $customer['created_by']=$se['name'];
        $customer['comp_id'] = $comp_id;

        //Save uploaded file
        // 获取表单上传文件
        $files = request()->file('doc_file');
        $fileNo = 1;
        foreach($files as $file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move($this->DOC_PATH() . $comp_id . DS . $customer['cust_no'],'');
            if($info){
                // 成功上传后 获取上传信息
                $customer['doc_file_'.$fileNo++] = $info->getFilename();
            }else{
                // 上传失败获取错误信息
                throw new Exception($file->getError());
            }
        }


        $s = $customer->allowField(true)->save();

        if($s){
            $this->redirect('/customers/index');
        }else{
            $this->error("Add failure",'/customers/add');
        }
    }

    public function postUpdate(){
        $se=Session::get('islogin');
        $cust_id = request()->param('cust_id');
        $comp_id = $se['comp_id'];

        $customer = Customer::get($cust_id);

        $customer->data($_POST);
        $customer['last_modified_by']=$se['name'];

        //Save uploaded file
        // 获取表单上传文件
        $files = request()->file('doc_file');
        $fileNo = 1;
        foreach($files as $file){
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move($this->DOC_PATH() . $comp_id . DS . $customer['cust_no'],'');
            if($info){
                // 成功上传后 获取上传信息
                $customer['doc_file_'.$fileNo++] = $info->getFilename();
            }else{
                // 上传失败获取错误信息
                throw new Exception($file->getError());
            }
        }

        $s = $customer->allowField(true)->save();

        if($s){
            $this->redirect('/customers/index');
        }else{
            $this->error("Add failure",'/customers/edit');
        }
    }

    //执行添加
    public function postInsertDocType(){
        //请求对象
        $request=request();
        //数据插入
        $data=$request->only(['name']);

        $s=Db::table('stype')->insert($data);
        if($s){
            $this->redirect('/customers/add');
        }
    }

    /**
     * @param $file_url　这里的$file_url是文件的绝对路径，如果你担心自己本地的路径会泄漏的话，
     * 那就可以在传一个文件名，并在函数内部拼接一下，形成真正的地址
     */
    function fileReader($file_url){

        $file_name=basename($file_url);
        ob_clean();
        header("Cache-Control: no-store");
        header("Expires: 0");
        header("Content-Type: application/pdf");
        header("Cache-Control: public");
        header('Content-Disposition: attachment; filename="' . $file_name . '"');
        header("Content-Transfer-Encoding: binary");
        header('Accept-Ranges: bytes');
//    这里一定要使用echo 进行输出，否则下载的文家是空白的
//        echo fread($file,filesize($file_url));
        @readfile($file_url);
    }
   
}