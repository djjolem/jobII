<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	public function showWelcome()
	{
		return View::make('hello');
	}

	/*
	|--------------------------------------------------------------------------
	| Home controller
	| List all ads 
	|--------------------------------------------------------------------------
	|
	*/
	public function home() {
		$adsModel = new Ad;
		$adsList = $adsModel->getAllAds()->toArray();

		$data = array(
			'ads' => $adsList,
		);

		return View::make('home', $data);
	}

	public function newad() {

		$user = array('user', 'djm');
		return View::make('newad', $user);
	}

}
