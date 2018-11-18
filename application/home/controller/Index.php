<?php
namespace app\home\controller;
//导入Controller
use think\Controller;
use think\Db;
use think\Session;
use app\home\model\Customer;
class Index extends Allow{
	public function getIndex(){
        //加载模板
        $se=Session::get('islogin');
        $id=$se['id'];
        //dump($id);exit;                 
        //dump($se);exit;
        $user=new Customer();
        $data=$user->where('uid',$id)->select();
        //dump($_SESSION);exit;
        //dump($data);exit;
        return $this->fetch("index/index",['data'=>$data]);

    }
    public function postSta(){
        $request=request();                   
        $id=$request->param('id');
        //dump($id);exit;
         //数据插入
        $data=$request->only(['time','name','rating']);
        $data['uid']=$id;
         $s=Db::table('sta')->insert($data);
        if($s){
            $this->redirect('/home/index');
        }else{
            $this->error("Add failure",'/home/index');
        }
    }
    public function getAdd(){
    	$request=request();
        //加载模板
        $info=Db::table('stype')->select();
    	return $this->fetch("index/add",['info'=>$info]);

    }
     //执行添加
    public function postInsert(){
        //请求对象
        $request=request();

        //获取文件上传信息
        $file1=$request->file('pic1');
 		$file2=$request->file('pic2');
        $file3=$request->file('files');
        // 保存文件
        $info=$file1->move(ROOT_PATH.'public'.DS.'uploads/wenzhang');
        // 获取当前时间
        $date = date("Ymd",time());
        // 获取文件名 含后缀
        $filename = $info->getFileName();
        // 路 径
        $filepath1 = $date.'/'.$filename;
       
       
        //数据插入
        $data=$request->only(['names','type','namex','street','code','city','country','rating','status','state','phonea','typea','phoneb','typeb','email','number','stype','birth','end','place','typeq','typew','typee','money','typem','typeu','typer','aname','nam','namep','namel','typep']);
        $data['times']=date("Y-m-d H:i:s",time());
        $data['pic1']=$filepath1;
       
        
        ///dump($data);exit;
        //  //验证操作
        // $result=$this->validate($request->param(),'index');
        // if(true!==$result){
        //         // echo $result;
        //         $this->error($result,'/home/add'); 
        // }
        $session=Session::get('islogin');
        $data['uid']=$session['id'];
        //dump($data);exit;
        $s=Db::table('user')->insert($data);
        if($s){
            $this->redirect('/home/index');
        }else{
            $this->error("Add failure",'/home/add');
        }
    }
   
    //执行添加
    public function postInse(){
         //请求对象
        $request=request();
        //数据插入
        $data=$request->only(['name']);
        //dump($a);exit;
        $s=Db::table('stype')->insert($data);
        if($s){
            $this->redirect('/home/add');
        }
    }
    //详情
    public function getIn(){
        //请求对象
        $request=request();                   
        $id=$request->param('id');
        //dump($id);exit;
        $data=Db::table('user')->where('id',$id)->find();
        $dat=Db::table('saction')->where('sid',$id)->select();
        $da=Db::table('fintrac')->select();
        $daz=Db::table('stac')->where('uid',$id)->select();
        //dump($daz);exit;
        $dax=Db::table('sta')->where('uid',$id)->select();
        $info=Db::table('stype')->select();
        //dump($data);exit;
        return $this->fetch("index/in",['data'=>$data,'dat'=>$dat,'da'=>$da,'info'=>$info,'daz'=>$daz,'dax'=>$dax,'id'=>$id]);
    }
    public function getAa(){
        //请求对象
        $request=request();                   
        $id=$request->param('id');
        //dump($id);exit;
        return $this->fetch("index/aa",['id'=>$id]); 
    }
    public function postIns(){
        //请求对象
        $request=request();                   
        $id=$request->param('id');
        //dump($id);exit;
        $data=$request->only(['namea','nameb','namec','named','namef','nameg','nameh','namei','namee','namel','namek']);
        $data['uid']=$_POST['id'];
        //dump($data);exit;
        if(Db::table("stac")->where('uid',$id)->insert($data)){
            $this->redirect("/home/index");
        }else{
            $this->error("Failure to modify","/home/index");
        }

    }
    public function getCc(){
        //请求对象
        $request=request();                   
        $id=$request->param('id');
        $data=Db::table('stac')->where('id',$id)->find();
        return $this->fetch('index/cc',['data'=>$data]);
    }

    //详情修改
    public function getEdit(){
         //请求对象
        $request=request();
        $id=$request->param('id');
        $data=Db::table('user')->where('id',$id)->find();
        $info=Db::table('stype')->select();
        //dump($data);exit;
        return $this->fetch("index/edit",['data'=>$data,'info'=>$info]);
    }
    public function postUpdate(){
          //请求对象
        $request=request();
        $id=$request->param('id');
         //数据插入
        $data=$request->only(['names','type','namex','street','code','city','country','rating','status','state','phonea','typea','phoneb','typeb','email','number','stype','birth','end','place','typeq','typew','typee','money','typem','typeu','typer','aname','nam','namep','namel','typep']);
        //dump($data);exit;
         if(Db::table("user")->where('id',$id)->update($data)){
            $this->redirect("/home/index");
        }else{
            $this->error("Failure to modify","/home/edit/id/$id");
        }
    }
    //执行删除
    public function getDelete(){
        //获取id
        $request=request();
        // $data=$request->only(['id']);
        // var_dump($data);
        $id=$request->param('id');
        // echo $id;exit;
        if(Db::table("user")->where('id',$id)->delete()){
            $this->redirect("/home/index");
        }else{
            $this->error("/home/index");
        }
    }
}