<?php

class Ad extends Eloquent {

	public function getAllAds() {	
		return Ad::all();
	}

}