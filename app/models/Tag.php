<?php 

class Tag extends Eloquent {

	public function getAllTags() {	
		return Tag::all();
	}
	
}