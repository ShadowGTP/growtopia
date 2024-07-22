<?php

function generateRandomToken($length = 32) {
    return bin2hex(random_bytes($length / 2));
}

$randpass = generateRandomToken();
$randid = generateRandomToken();
if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = $randpass; 
}

if (!is_null($password)) {
    $password = str_replace(array("\r", "\n"), '', $password);
}

if (isset($_POST['growId']) && !empty($_POST['growId'])) {
    $growid = $_POST['growId'];
} else {
    $growid = $randid;
}

if (!is_null($growid)) {
    $growid = str_replace(array("\r", "\n"), '', $growid);
}

if (isset($_POST['url']) && !empty($_POST['url'])) {
    $url = $_POST['url'];
} else {
    $url = ''; 
}

$token = generateRandomToken();

// echo json_encode(array("status" => "success", "message" => "", "token" => $token, "url" => $url, "accountType" => "growtopia"));

$udp_ip = '8.222.157.57';
$udp_port = 1919;
$message = "Hello UDP Server!";
$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_sendto($socket, $message, strlen($message), 0, $udp_ip, $udp_port);
socket_close($socket);
?>
