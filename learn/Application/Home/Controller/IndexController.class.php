<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
		$this->display();
    }

    public function login(){

//    	$this->success('ok');

		header('Content-Type:application/json; charset=utf-8');
		$return['code']=0;
		$return['msg']='error';

		exit(json_encode($return));
		$user_name = $_POST["username"];
		$user_pass = $_POST["password"];

		$result = D("User")->login($user_name,$user_pass);

		if(empty($result)){

			$return['code']=0;
			$return['msg']='error';
		}else{

			$return['code']=1;
			$return['msg']='success';
		}

//		var_dump(json_encode($return)); exit;

		echo json_encode($return);//刚刚那个是不是用js decode一下才可以
	}
}