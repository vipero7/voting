<?php 

namespace App\Controllers\Admin;
// use System\Library\View;
use App\Models\User;
class LoginController
{
	public function __construct()
	{
		// echo 'home';
	}

	public function index()
	{
		// include 'resources/views/admin/Login.php';
		view('admin/login');
	}

	public function logincheck()
	{
		$username = $_POST['username'];
		$password = sha1($_POST['password']);
		$user = new User();
		$userinfo = $user -> checkUser($username , $password);
		// debug($userinfo);
		// die;
		if($userinfo){
			$_SESSION['admin']['uid'] = $userinfo['id'];
			// debug($userinfo);
			// die;
			$username = $userinfo['username'];

			header('location: /admin/dashboard', $username);
			// view('admin/dashboard', compact('user'));

		}
		else{
			$_SESSION['error'] = 'Invalid username or password!!';

			header('location: /admin/login');
		}
	}
}
