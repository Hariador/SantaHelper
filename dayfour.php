<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 05/12/15
 * Time: 1:13 PM
 */
$answer = 0 ;
$secertkey = 'ckczppom';
$not_found = true ;
while($not_found) {
	$answer++;
	$hash = md5($secertkey . $answer);
	printf("Checking: " . $hash . "\n");
	if($hash[0] == '0') {
		if($hash[1] == '0') {
			if($hash[2] == '0') {
				if($hash[3] == '0') {
					if($hash[4] == '0') {
						if($hash[5] == '0')
							$not_found = false;
					}

				}
			}
		}
	}
}
printf("AdventCoint: " . $hash . "located at : " . $answer . "\n");
