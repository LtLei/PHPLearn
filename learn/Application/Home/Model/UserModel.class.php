<?php

namespace Home\Model;

use Think\Model;

/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2017/10/18
 * Time: 14:37
 */
class UserModel extends Model
{
	// 登录
	public function login($user_name, $user_pass) {
		$SQL = "user_name='%s' and user_pass='%s'";
		return $this->where($SQL, array($user_name, $user_pass))->select();
	}

	public function exists($user_name){
		$SQL = "user_name='%s'";
		return $this->where($SQL,$user_name)->find();
	}

	public function getUsers(){
		return $this->select();
	}
}