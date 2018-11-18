<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
class Login extends Controller{
    public function getLogin(){
        //加载模板
        return $this->fetch("/login/login");
    }

    //执行登录
    public function postDologin(){
        //创建请求对象
        $request=request();
        $fcode=$request->param('fcode');

        //获取数据库数据

        $info=Db::table("users")->where('name',$request->param('username'))->find();
        //dump($info);exit;
        //dump($info['id']);exit;

        if(!$info){
            $this->error("Incorrect username","/login/login");
        }else{
            //检测密码
            if($info['password']==$request->param('password')){
                //把用户的信息存储在session里
                $data['id']=$info['id'];
                //dump($data);exit;
                $data['status']=$info['status'];
                $data['name']=$info['name'];
                $data['username']=$info['username'];
                $data['comp_id']=$info['comp_id'];
                // substr($opic,1);
                //dump($data);exit; 
                Session::set('islogin',$data);
                $se=Session::get('islogin');
                //登录首页
                     $this->redirect("/customers/index");
                }else{
                    $this->error("login failure","/login/login");
            }
        }
    }

    //退出
    public function getLogout(){
        //销毁session作用域
        Session::delete('islogin');
        $this->redirect("/login/login");
    }
    //注册
    public function getadd(){
     //加载模板
        return $this->fetch("/login/add");
    }

    //执行注册
    public function postInsert(){
        //请求对象
        $request=request();
        //数据插入
        $data=$request->only(['name','username','password']);
        $data['status']=1;
       //验证操作
        $result=$this->validate($request->param(),'login');
        if(true!==$result){
                // echo $result;
                $this->error($result);
            //dump($result);

        }
        $s=Db::table("users")->insert($data);
        if($s){
            $this->redirect('/login/login');
        }else{
            $this->error("login has failed",'/login/add');
        }
    }

    public function insert(){

        $name=$_POST['name'];

        $password=$_POST['password'];

        $arr['msg']=$name.$password;

        $this->ajaxReturn($arr,json);

    }

}
