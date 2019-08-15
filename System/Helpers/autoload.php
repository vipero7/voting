<?php 


function __autoload($class)
{
	$class = str_replace('\\', '/', $class);

	$file = $class . '.php';
	if(is_file($file)){
		include $file;
	}else{
		echo '<br>Autoload.php';
		die('<br>Error: Controller File <strong>' . $file . '</strong> not found');
	}

	
}
