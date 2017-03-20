<?php
$appid = 'wxc572b8215150b75a111'; 
$appsecret = '5d7a1109d4ef780c91076d632f5bc572'; 
$openid='o8Eu5jo-QYQiX2ic-q8fG8_n-sNU';

$access_token = Get_access_token($appid,$appsecret);

$url="https://api.weixin.qq.com/cgi-bin/user/info?access_token=$access_token&openid=$openid&lang=zh_CN";
$data = get_by_curl($url);
$data = json_decode($data);
print_r($data);

/*if($_GET['code']){
	$code = $_GET['code'];
	$data = get_by_curl('https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$appsecret.'&code='.$code.'&grant_type=authorization_code');
	$data = json_decode($data);
	
	$openid = $data->openid;
	$access_token = Get_access_token($appid,$appsecret);
	$getUser       = file_get_contents("https://api.weixin.qq.com/cgi-bin/user/info?access_token=".$access_token."&openid=".$openid."&lang=zh_CN");
	$userdata   = json_decode($getUser,true);
	print_r($userdata);
	
}else{
	header("Location:".$url);
}*/


function Get_access_token($appid='',$secret=''){
	//$data = trim(substr(file_get_contents($filename), 15));
	$access_token       = file_get_contents("https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$appid&secret=$secret");
	$access_tokendata   = json_decode($access_token,true);
	$a = $access_tokendata['access_token'];
	
	return $a;
}

 function get_by_curl($url,$post = false){
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if($post){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$post);
    }
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}
?>