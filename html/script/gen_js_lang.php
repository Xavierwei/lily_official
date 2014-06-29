<?php

// get file
define( 'API_DIR' , __DIR__ . '/../js/common/' );

$files = ['api.js','app.js','helper.js','loading.js','map.js','select.js','switchPage.js'];


$properties = [];
// collect properties
foreach ($files as $key => $file) {
	$file = API_DIR . $file;

	// get content
	$con = file_get_contents( $file );
	preg_match_all( '/_e\(([\'"])([^)]+)\1\)/' , $con , $match );

	// get properties
	$properties = array_merge($properties , $match[2] );
}

$properties = array_unique( $properties );

// get lang file
$php_lang = array( 'en_us' , 'zh_cn' );
$js_lang = array( 'en' , 'cn' );
foreach ($php_lang as $key => $lang ) {
	$arr = require __DIR__ . '/' . $lang . '.php';
	foreach ($properties as $str) {
		if( !isset( $arr[ $str ] ) ){
			$arr[ $str ] = "";
		}
	}

	// gen js lang
	file_put_contents( API_DIR . 'properties-' . $js_lang[ $key ] . '.js' , 'define(function(){
	return ' . json_encode( $arr , true ) . ';});' );
	file_put_contents( __DIR__ . '/' . $lang . '.php' , "<?php \n return " . var_export( $arr , true ) . ';' );
}


// // get lang file
// $php_lang = array( 'en_us' , 'zh_cn' );

// $file = API_DIR . 'js/lp.base.js';

// // get content
// $con = file_get_contents( $file );
// preg_match_all( '/_e\(([\'"])([^)]+)\1\)/' , $con , $match );

// // get lang file
// $php_lang = array( 'en_us' , 'zh_cn' );

// foreach ($php_lang as $lang ) {
// 	$arr = require $lang . '.php';

// 	foreach ($match[2] as $str) {
// 		if( !isset( $arr[ $str ] ) ){
// 			$arr[ $str ] = "";
// 		}
// 	}

// 	// gen js lang
// 	file_put_contents( API_DIR . 'js/lang/' . $lang . '.js' , 'var langs = ' . json_encode( $arr , true ) . ';' );
// 	file_put_contents( $lang . '.php' , "<?php \n return " . var_export( $arr , true ) . ';' );
// }



// foreach ($variable as $key => $value) {
// 	# code...
// }

// $langFile = array( 'en_us.js' , 'zh_cn.js' );
// $r = var_export( array("a"=>1) , true );

//var_dump( $match );