<?php
	require_once( __DIR__ . '/config.php' );

	header( 'Content-Type: application/json' );

	$forecast = file_get_contents( 'https://api.openweathermap.org/data/2.5/onecall?lat=' . OWM_LAT . '&lon=' . OWM_LONG . '&exclude=' . OWM_EXCLUDE . '&appid=' . OWM_API_KEY);	

	$data = new stdClass();
	
	$data->forecast = json_decode( $forecast );
	$data->tempUnit = TEMP_UNIT;
	$data->forecastItems = FORECAST_ITEMS;

	echo json_encode( $data );
