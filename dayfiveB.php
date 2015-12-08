<?php
/**
 * Created by PhpStorm.
 * User: jon
 * Date: 06/12/15
 * Time: 8:21 PM
 */

$input = fopen('5.input','r');
$nice = 0;
while($line = fgets($input)) {
	// Check for double pairs
	$double_not_found = true;
	$match_char_found = false;
	$cursor = 0 ;
	while($double_not_found){
		$nibble = $line[$cursor] . $line[$cursor + 1];
		for($i = $cursor + 2; $i < strlen($line) - 2; $i++){
			if($nibble == $line[$i] . $line[$i+1]){
				$double_not_found = false ;
				break;
			}
		}
		$cursor++;
		if($cursor + 1 >= strlen($line))
			break;
	}
	//Check for char mactching only in the doubles were found
	if(!$double_not_found) {
		for($cursor = 0; $cursor <= strlen($line) - 2; $cursor++) {
			if($line[$cursor] == $line[$cursor + 2]) {
				$match_char_found = true;
				break;
			}
		}
	}
	if(!$double_not_found && $match_char_found)
		$nice++;

}
printf("Nice: ". $nice);