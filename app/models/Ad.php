<?php

class Ad extends Eloquent {

	public function getAllAds() {	
		return Ad::all();
	}

	public function saveAd() {
		$userId = $_POST['user_id'];
		$companyId = $_POST['company']; 
		$adTitle = $_POST['ad_title'];
		$adDesc = $_POST['ad_description'];
		$adText = $_POST['ad_text'];
		// TODO: get checked tags 
		$deadline = $_POST['deadline'];

		$ad = new Ad; 
		$ad->title = $adTitle; 
		$ad->short = $adDesc; 
		$ad->ad_text = $adText; 
		$ad->fk_user = $userId; 
		$ad->fk_company = $companyId; 
		$ad->deadline = $deadline; 
		$ad->save(); 

		// TODO: insert Tags 

		return 'New ad saved'; 
	}

}