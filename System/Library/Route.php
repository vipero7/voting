<?php 

namespace System\Library;

class Route
{
	private static $controller;
	private static $action;
	private static $routes = [];
	private static $segment = [];

	public function __construct()
	{

	}
	
	public static function get($key, $val)
	{
		self::$routes[$key] = $val;
	}
	
	public function parse()
	{
		// debug(self::$routes);
		// die;
		$uri = $_SERVER['REQUEST_URI'];

		$uri = explode('?', $uri)[0];

		$uri = trim($uri, '/');

		$status = preg_match('/\d+/', $uri,$matches);
		if($status){
			self::$segment['id'] = $matches[0];
		}

		$uri = preg_replace('/\d+/', '{id}', $uri);
		// echo $uri;
		// die;

		$classaction = '';
		if(array_key_exists($uri,self::$routes)){
			$classaction = self::$routes[$uri];
		}
		if($classaction){
			$classparts = explode('@',$classaction);
			self::$controller  = $classparts[0];
			self::$action = $classparts[1];
		}
		else{
			die('Error: Route <strong>' . $uri . ' </strong>not defined');
		}

		
	}
	
	public function dispatch()
	{
		// echo self::$controller;
		// echo self::$action;

		$class  = self::$controller;
		$action = self::$action;
		$request = self::$segment;

		$request = (object) $request;
		// echo $request->cid;
		// debug($request);

		$namespace = 'App\Controllers\\' . $class;

		$object = new $namespace();
		if(method_exists($object, $action)){
			$object -> $action($request);
		}
		else{
			echo '<br>Route.php';
			die('<br>Error 404: Action <strong>' . $action . '</strong> doesnot exists');
		}

		
	}



}