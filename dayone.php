<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 01/12/15
 * Time: 1:59 PM
 */
printf("Running\n");
$floor = 0 ;
$c_pos = 0;
if ($input = fopen('1.input','r')) {
	printf("Opened\n");
} else {
	printf("Couldn't open.");
}

while($c = fgetc($input)) {
	$c_pos++;
	if ( $c == '(') {
		$floor++;
	}
	else if( $c == ')') {
		$floor--;
	}
	if($floor < 0){
		printf($c_pos . "\n");
		exit;
	}

}
printf($floor . "\n");