<?php
require_once "vendor/autoload.php";


$app_id = 'YOUR_APP_ID';
$app_key = 'YOUR_APP_KEY';
$app_secret = 'YOUR_APP_SECRET';

$pusher = new Pusher( $app_key, $app_secret, $app_id);

$data['nome'] = $_POST['nome'];
$data['mensagem'] = $_POST['mensagem'];
$pusher->trigger('canal', 'enviar-mensagem', $data);