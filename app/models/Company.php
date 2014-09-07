<?php

class Company extends Eloquent {

	public function findIfExists($cmpyName) {
		# TODO: implement
		return 0;
	}

	public function addNewCompany($cmpyName) {
		$cmpy = Company::where('name', '=', $cmpyName)->first();

		if ($cmpy != null){
			return $cmpy->id;
		}

		$newCmpy = new Company; 
		$newCmpy->name = $cmpyName;
		$newCmpy->save(); 

		return $newCmpy->id;
	}

}
