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
	public function home($message = null) {
		$adsModel = new Ad;
		$adsList = $adsModel->getAllAds()->toArray();

		$data = array(
			'ads' => $adsList,
			'msg' => $message,
		);

		return View::make('home', $data);
	}

	/*
	|--------------------------------------------------------------------------
	| Home controller
	| Shows form to add new ad
	|--------------------------------------------------------------------------
	|
	*/
	public function newad() {

		// TODO: find user
		// TODO: Use session - and from there get user id 
		$user = array('user', 'djm');

		// if userId == 0 =then==> $userId = $USER_ID_DEFAULT;
		$userId = 0; 

		// TODO: get companies, and their IDs
		$companies = array(1 => 'Company 1', 2 => 'Company 2', 3 => 'Company 3');
		$data = array('userId' => $userId, 'companies' => $companies); 

		return View::make('newad', $data);
	}

/*
	|--------------------------------------------------------------------------
	| Home controller
	| 
	|--------------------------------------------------------------------------
	|
	*/
	public function savead() {
		$adsModel = new Ad; 

		$message = $adsModel->savead();

		return $this->home($message); 
	}

}
