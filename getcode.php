<?php
/**
 * @author: lion
 * @link: http://lionsay.com/codetoany.html
 */

require 'library/Authorize.php';

$appId = 'wx9d1b2a31f4ad0da4';
$authorize = new lion\weixin\library\Authorize($appId);
$partUrl = base64_decode(empty($_GET['partUrl']) ? '' : $_GET['partUrl']);
$redirectUrlConfig = [
    'w' => "http://wengine.zhedacxz.com{$partUrl}",
	'demo1' => 'http://www.baudu.com',
	'demo2' => 'https://www.baidu.com/s?wd=codetoany&ie=utf-8',
	'demo3' => 'http://www.lionsay.com',
];
$authorize->authorizeCodeToUrl($redirectUrlConfig);
