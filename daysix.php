<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 07/12/15
 * Time: 6:48 PM
 */

$input = fopen('6.input','r');
$lights;
//init grid
for($x = 0; $x <= 999; $x++) {
	for($y = 0; $y<=999; $y++){
		$lights[$x][$y] = 0;
	}
}

while($line = fgets($input)){
	printf($line);
	$off_set = 1;
	$light_status = 0;
	$commands = explode(" ",$line);
	if($commands[0] == "toggle") {
		$off_set = 0;
	}
	else {
		if($commands[1] == 'on')
			$light_status = 1;
	}
	$start_coor = explode(',',$commands[1 + $off_set]);
	$stop_coor = explode(',',$commands[3 + $off_set]);
	$area = ($stop_coor[0] - $start_coor[0] + 1) * ($stop_coor[1] - $start_coor[1] + 1);
	for($x = $start_coor[0]; $x <= $stop_coor[0]; $x++) {
		for($y = $start_coor[1]; $y <= $stop_coor[1]; $y++) {
			if($off_set == 0) {
				$lights[$x][$y] =  $lights[$x][$y] ^ 1;
			}
			else {
				$lights[$x][$y] = $light_status;
				$sum = 0 ;
				for($x = 0; $x <= 999; $x++) {
					for($y = 0; $y<=999; $y++){
						$sum = $sum + $lights[$x][$y] ;
					}
				}

				printf("Area: " . $area. " Lights Lite: " . $sum . "\n");
			}
		}
	}
}
$sum = 0 ;
for($x = 0; $x <= 999; $x++) {
	for($y = 0; $y<=999; $y++){
		$sum = $sum + $lights[$x][$y] ;
	}
}

printf("Lights Lite: " . $sum . "\n");