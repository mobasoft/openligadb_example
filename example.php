<?php
$url	= 'http://www.openligadb.de/api/getmatchdata/bl1/2016/8';
$json	= file_get_contents($url);
$data	= json_decode($json, TRUE);

if(is_array($data) && count($data)>0){
	foreach($data as $match){
		echo pp($match);
	}
}

function pp($arr){
	$retStr = '<ul>';
	if(is_array($arr)){
		foreach($arr as $key=>$val){
			if(is_array($val)){
				$retStr .= '<li>' . $key . ' => ' . pp($val) . '</li>';
			}else{
				$retStr .= '<li>' . $key . ' => ' . $val . '</li>';
			}
		}
	}
	$retStr .= '</ul>';

	return $retStr;
}