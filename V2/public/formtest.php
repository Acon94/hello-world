<?php
	$first = $_REQUEST['first'];
	$last = $_REQUEST['last'];
	$sex = $_REQUEST['gender'];
	$text= $_REQUEST['text'];



	echo("FIRST" .$first);
	echo("<br/>Last" .$last);
	echo("<br/>sex" .$sex);
	echo("<br/>experience" .$text);

	$fp = fopen("testfile.txt", "a+");
	fwrite($fp, $first."\t".$last."\t".$sex."\t".$text."\r\n");
	fclose($fp);

?>

