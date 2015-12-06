<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 05/12/15
 * Time: 12:45 PM
 */

printf("Running\n");
if ($input = fopen('3.input','r')) {
	printf("Opened\n");
} else {
	printf("Couldn't open.");
}
$tracker = ['Santa' => [
				'x' => 0,
				'y' => 0],
			'Robo' => [
				'x' => 0,
				'y' => 0
			]];
$up = 0 ;
$down = 0;
$left = 0;
$right = 0 ;
$houses = array('0:0' => 2);
$uniques = 1;
$drops = 1 ;
$whos_moving = 'Santa';
while($c = fgetc($input)){
	if($c == '^') {
		$tracker[$whos_moving]['y']++;
	}
	if($c == 'v') {
		$tracker[$whos_moving]['y']--;
	}
	if($c == '<') {
		$tracker[$whos_moving]['x']--;
	}
	if($c == '>') {
		$tracker[$whos_moving]['x']++;
	}
	$address = $tracker[$whos_moving]['x'] . ':' . $tracker[$whos_moving]['y'] ;
	if(!isset($houses[$address])){
		$houses[$address] = 0;
		$uniques++;
	}
	$drops++;
	$houses[$address]++;
	if($whos_moving == 'Santa')
		$whos_moving = 'Robo';
	else
		$whos_moving = 'Santa';
}

printf("Drops: ".$drops . "\n");
printf("Unique: " .$uniques . "\n");