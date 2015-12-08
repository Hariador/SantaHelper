<?php

$input = fopen('5.input','r');
$naughty = 0 ;
$nice = 0;
$naught = false;
$vowels = ['a','e','i','o','u'];
$bad_words = ['ab','cd','pq','xy'];

$doubleRule = false;
while($line = fgets($input)) {
	printf($line);
	$frame = [];
	$doubleRule = false;
	$naught = false;
	$length = strlen($line);
	$cursor_pos = 0;
	$vowel_count = 0;
	if(in_array($line[$cursor_pos], $vowels))
		$vowel_count++;
	array_push($frame,$line[$cursor_pos]);
	for($cursor_pos = 1; $cursor_pos < $length; $cursor_pos++){
		if(in_array($line[$cursor_pos], $vowels))
			$vowel_count++;
		array_push($frame,$line[$cursor_pos]);
		if($frame[0] == $frame[1])
			$doubleRule = true;
		if(in_array(implode('',$frame),$bad_words)) {
			$naught = true;
			break;
		}
		array_shift($frame);
	}
	printf("\nvc: " . $vowel_count . " Passed Double Rule : " . $doubleRule . " Failed Naughty pairing: " . $naught ."\n");
	if($vowel_count >= 3 && $doubleRule && !$naught) {
		printf("NICE!");
		$nice++;
	}
}
printf("Nice words: ". $nice ."\n");