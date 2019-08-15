<?php 

namespace App\Models;
use System\Library\Model;

class User extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function checkUser($username , $password)
	{
		$sql = "SELECT * FROM users WHERE username= '$username' AND password= '$password' " ;

		$userinfo = $this->db->find($sql);

		return $userinfo;

	}
}