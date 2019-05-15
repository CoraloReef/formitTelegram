<?php
$token = "***";
$chat_id = "***";

$values = $hook->getValues();

$formName = $modx->getOption('formName', $formit->config, 'form-'.$modx->resource->get('id'));

// Get user IP
$ip = $modx->getOption('REMOTE_ADDR', $_SERVER, '');

// Data from form
$name = $values['name'];
$phone = $values['phone'];

// Create array
$arr = array(
    "Name" => $name,
    "Phone" => $phone,
    "Form name" => $formName,
    "IP" => $ip);

// Create message
foreach($arr as $key => $value) {
    $txt .= "<b>".$key."</b>: ".$value."%0A";
}

// Send message
$fp=fopen("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&text={$txt}","r");

return true;