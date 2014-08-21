<?php

class Ad extends Eloquent {

	public function getAllAds() {	
		return Ad::orderBy('deadline', 'DESC')->get();
	}

	public function getTagsByAdId($adId) {
		$tags = AdTags::where('ad_id', '=', $adId)->get();

		$strTags = array();
		foreach ($tags as $tag){
			$tagTag = Tag::where('id', '=', $tag['tag_id'])->get();
			$strTags[] = $tagTag[0]['name'];
		}

		return $strTags;
	}

	public function saveAd() {

		// default value for user id is 0
		$userId = 0;
		if (Auth::user() != null) {
			$userId = Auth::user()->id;
		}
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

		return array('msg' => array('New ad saved')); 
	}

}