<?php 

$url = $_POST['url'];

if (strpos($url, 'youtube') > 0) {
	if (strpos($url, 'embed') > 0) {
    	$html = '<iframe src="'.$url.'" style="width: 100%; height:100%;" />';
	} else {
	    $parsed = parse_url($url);
	    $url = "http://www.youtube.com/embed/".substr(str_replace('v=','',$parsed['query']), 0, 11);
	    $html = '<iframe src="'.$url.'" style="width: 100%; height:100%;" />';
	}
    die($html);
} elseif (strpos($url, 'vimeo') > 0) {
    $url = str_replace('http://vimeo.com/','',$url);
    $url = str_replace('https://vimeo.com/','',$url);
    $url = "http://player.vimeo.com/video/".$url;
    $html = '<iframe src="'.$url.'" style="width: 100%; height:100%;"/>';
    die($html);
} else {
	$html = '<iframe src="https://www.youtube.com/embed/HuIb3XTQVJw" style="width: 100%; height:100%;"></iframe>';
	die($html);
}

 ?>