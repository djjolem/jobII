<?php 

Form::macro('date', function($nameAndId, $default = null, $attrs = array()) {
	$item = '<input type="date" name="' . $nameAndId . '"' ;
	$item .= ' id="' . $nameAndId . '"'; 
	 
	if ($default) {
		$item .= 'value="'. $default .'" ';
	}
	 
	if (is_array($attrs)) {
		foreach ($attrs as $a => $v)
		$item .= $a .'="'. $v .'" ';
	}
	$item .= ">";
	 
	return $item;
});
 