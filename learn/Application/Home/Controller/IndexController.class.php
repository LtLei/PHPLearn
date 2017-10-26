<?php

namespace Home\Controller;

use Think\Controller;

class IndexController extends Controller
{
	public function index() {
		$this->display();
	}

	public function users() {
		$User = D("User");
		$res = $User->getUsers();
		var_dump($res);

		$User = M("User");
		$res = $User->select();
		var_dump($res);
	}

	public function login() {
		//HTTP协议，传输json需要添加请求头
		header('Content-Type:application/json; charset=utf-8');

		//数据校验
		if (!$_POST) {
			$return['code'] = 0;
			$return['message'] = '不支持的操作';
			exit(json_encode($return));
		}

		$user_name = $_POST["username"];
		if (empty($user_name)) {
			$return['code'] = 0;
			$return['message'] = '用户名不能为空';
			exit(json_encode($return));
		}
		$user_pass = $_POST["password"];
		if (empty($user_pass)) {
			$return['code'] = 0;
			$return['message'] = '密码不能为空';
			exit(json_encode($return));
		}

		$result = D("User")->exists($user_name);
		if (empty($result)) {
			$return['code'] = 0;
			$return['message'] = '用户不存在';
			exit(json_encode($return));
		}

		if ($result['user_pass'] != $user_pass) {
			$return['code'] = 0;
			$return['message'] = '密码错误';
			exit(json_encode($return));
		}

		$return['code'] = 1;
		$return['message'] = '登录成功';
		echo json_encode($return);
	}
}