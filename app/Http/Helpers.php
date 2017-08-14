<?php

function get_domain($url=null)
{
	//	dd($_SERVER['HTTP_HOST']);
	if ($url===null)
		$url = "http://".$_SERVER['HTTP_HOST'];
	$urlobj=parse_url($url);
	$domain=$urlobj['host'];

	if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
		$top_domain = $regs['domain'];
		return explode('.', $top_domain)[0];
	}

	return false;
}