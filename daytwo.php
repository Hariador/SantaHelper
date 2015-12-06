<?php

/**
 * Created by PhpStorm.
 * User: jon
 * Date: 03/12/15
 * Time: 3:35 PM
 */


	printf("Running\n");
if ($input = fopen('2.input','r')) {
	printf("Opened\n");
	} else {
	printf("Couldn't open.");
}
$sum = 0;
$sumribbon = 0;
while($line = fgets($input)) {
	$smallest = 0 ;
	$dimensions = explode('x',trim($line));
	sort($dimensions);
	printf($line."\n");
	printf(implode(':',$dimensions)."\n");
	$smallest = $dimensions[0] * $dimensions[0];



	$total = $smallest + 2* ($dimensions[0] + $dimensions[1] + $dimensions[2]);
	$sum = $sum + $total;

	$sumribbon = $sumribbon + ((2 * $dimensions[0]) + (2* $dimensions[1]) ) + ($dimensions[0] * $dimensions[1] * $dimensions[2]) ;

}
printf("Total paper: " . $sum."\n");
printf("Total Ribbon: ". $sumribbon."\n");
