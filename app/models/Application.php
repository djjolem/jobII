<?php

class Application extends Eloquent {

	public function saveNewApplication($userId, $adId, $cvFilename, $message = null) {
		$appl = new Application;
		$appl->fk_user = $userId;
		$appl->fk_ad = $adId;
		$appl->cv_filename = $cvFilename;
		if ($message != null) {
			$appl->message = $message;
		}
		$appl->save();
	}

}