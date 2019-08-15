<?php 

namespace App\Controllers;

use App\Models\Candidate;

class HomeController
{
	public function __construct()
	{
		// echo 'home';
	}

	public function index()
	{
		view('home');
	
	}
}
