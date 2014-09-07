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

		// TODO: authentication check don't doing here 
		// move this part to controller
		if (Auth::user() != null) {
			$userId = Auth::user()->id;
		}

		# Default company: Unknown company 
		$companyId = 0; 
		if (isset($_POST['company_id'])) {
			$companyId = $_POST['company_id']; 
		}

		$companyName = ''; 
		if (isset($_POST['company_name'])) {
			$companyName = $_POST['company_name'];

			$cmpModel = new Company;

			$company = $cmpModel->findIfExists($companyName);
			if ($companyId == 0) {
				$companyId = $cmpModel->addNewCompany($companyName);
			}
		}


		$adTitle = $_POST['ad_title'];
		$adDesc = $_POST['ad_description'];
		$adText = $_POST['ad_text'];
		// TODO: get checked tags 
		$deadline = $_POST['deadline'];
		$location = $_POST['location'];

		$ad = new Ad; 
		$ad->title = $adTitle; 
		$ad->short = $adDesc; 
		$ad->ad_text = $adText; 
		$ad->fk_user = $userId; 
		$ad->fk_company = $companyId; 
		$ad->deadline = $deadline;
		$ad->location = $location; 
		$ad->save(); 

		// TODO: insert Tags 

		return array('msg' => array('New ad saved')); 
	}

	public function deleteAd($adId) {
		$ad = Ad::find($adId);
		if ($ad != null) {
			$ad->delete();
		}
	}

}
