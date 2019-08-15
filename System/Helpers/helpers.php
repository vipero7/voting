<?php 

function debug($_arr = [])
{
	echo '<pre style = "color:red">';
	print_r($_arr);
	echo '</pre>';
}

function view($view, $data = [])
{
	\System\Library\View::load($view, $data);
}

function redirect($url)
{
	header('location: ' . $url);
	die;
}