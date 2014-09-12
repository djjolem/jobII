<?php

class Company extends Eloquent {

	public function findIfExists($cmpyName) {
		# TODO: implement

		dd($_POST);
		# Use INPUT facade class
		$cmpyName = $_POST['company_name']; 
		$cmpy = Company::get();
		
		if ($cmpy != null) {
			return $cmpy->id; 
		}

		return addNewCompany($cmpName);
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
