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
	public function home($msgErr = null) {
		$adsModel = new Ad;
		$adsList = $adsModel->getAllAds()->toArray();

		$allAds = array();
		foreach ($adsList as $ad){
			$packAd = array();

			$packAd['ad'] = $ad;
			$tags = $adsModel->getTagsByAdId($ad['id']);
			$packAd['tags'] = $tags;

			$allAds[] = $packAd;
		}

		$data = array(
			'ads' => $allAds,
		);
	
		if ($msgErr != null) {
			if (isset($msgErr['err'])) {
				$data['err'] = $msgErr['err'];
			}
			if (isset($msgErr['msg'])) {
				$data['msg'] = $msgErr['msg'];
			}
		}

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
			// if userId == 0 then==> $userId = $USER_ID_DEFAULT;
		$userId = 0; 

		// TODO: get companies, and their IDs
		$companies = array(1 => 'Company 1', 2 => 'Company 2', 3 => 'Company 3');

		// TODO: Fetch tags from database
		$tags = array(1 => 'HTML', 2 => 'CSS', 3 => 'PHP', 4 => 'Laravel');
		
		$data = array(
			'userId' => $userId, 
			'companies' => $companies, 
			'tags' => $tags, 
		); 

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

		$msgErr = $adsModel->savead();

		return $this->home($msgErr); 
	}

	/*
	|--------------------------------------------------------------------------
	| Home controller
	| 
	|--------------------------------------------------------------------------
	|
	*/
	public function signinup() {
		
		$userCtrl = new UsersController; 

		if (isset($_POST['signup']) && $_POST['signup'] == 'signup'){
			$msgErr = $userCtrl->store();

			return $this->home($msgErr);
		}

		if (isset($_POST['signin']) && $_POST['signin'] == 'signin') {
			$msgErr = $userCtrl->doLogin();
			
			return $this->home($msgErr);
		}

		if (isset($_POST['signout']) && $_POST['signout'] == 'signout') {
			$msgErr = $userCtrl->logout();

			return $this->home($msgErr);
		}

		$message = 'Unknown action';
		return $this->home($message);
	}

	/*
	|--------------------------------------------------------------------------
	| Home controller
	| 
	|--------------------------------------------------------------------------
	|
	*/

	public function recover() {
		$message = 'Recover user account'; 

		return $this->home($message); 
	}

	/*
	|--------------------------------------------------------------------------
	| Home controller
	| 
	|--------------------------------------------------------------------------
	|
	*/
	public function settings() {
		return View::make('settings');
	}

}
