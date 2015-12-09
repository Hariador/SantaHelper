<?php
/**
 * Created by PhpStorm.
 * User: jon_000
 * Date: 12/8/2015
 * Time: 8:58 PM
 */

$input = fopen('8.input','r');
$memory = 0 ;
$code = 0;
while($line = fgets($input)) {
	$line = trim($line);
	$codeT = 0;
	$memoryT = 0;
	$codeT = $codeT + strlen($line);
    $buffer = "" ;
	$memoryT = $memoryT + strlen($line) - 2;
	$char_stream = str_split($line);
	for($i = 1; $i < count($char_stream) -1; $i++) {

		if($char_stream[$i] == '\\') {
			$memoryT--;
			if($char_stream[$i+1] == '\\')
				$i++;
			if($char_stream[$i+1] =='x'){
				$memoryT = $memoryT - 2;
				$i = $i + 3;
			}
		}
	}
	printf($line. " C:" . $codeT . " M:" .$memoryT."\n");
	$code = $code + $codeT;
	$memory = $memory+ $memoryT;

}

printf("Code: " .$code . "\n" );
printf("Memory: " . $memory . "\n");
$total = $code - $memory ;
printf("total: " . $total . "\n");