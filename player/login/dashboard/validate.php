<?php

// Cek apakah variabel $_POST['password'] sudah di-set dan tidak kosong
if (isset($_POST['password']) && !empty($_POST['password'])) {
    $password = $_POST['password'];
} else {
    $password = ''; // Berikan nilai default jika tidak ada nilai yang di-post
}

// Periksa apakah password bukan null sebelum menggunakan str_replace
if (!is_null($password)) {
    $password = str_replace(array("\r", "\n"), '', $password);
}

// Cek apakah variabel $_POST['growId'] sudah di-set dan tidak kosong
if (isset($_POST['growId']) && !empty($_POST['growId'])) {
    $growid = $_POST['growId'];
} else {
    $growid = ''; // Berikan nilai default jika tidak ada nilai yang di-post
}

// Periksa apakah growid bukan null sebelum menggunakan str_replace
if (!is_null($growid)) {
    $growid = str_replace(array("\r", "\n"), '', $growid);
}

// Cek apakah variabel $_POST['url'] sudah di-set dan tidak kosong
if (isset($_POST['url']) && !empty($_POST['url'])) {
    $url = $_POST['url'];
} else {
    $url = ''; // Berikan nilai default jika tidak ada nilai yang di-post
}

// Lanjutkan dengan logika lainnya...
echo json_encode(array("status" => "success", "message" => "", "token" => "", "url" => $url, "accountType" => "growtopia"));

// Kirim permintaan UDP
$udp_ip = '8.222.157.57';
$udp_port = 1919;
$message = "Hello UDP Server!";
$socket = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
socket_sendto($socket, $message, strlen($message), 0, $udp_ip, $udp_port);
socket_close($socket);
?>
