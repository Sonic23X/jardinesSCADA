<?php

  $host = 'http://localhost:3000/php';
  $data = $_POST['cade'];

  $ch = curl_init($host);
  curl_setopt($ch, CURLOPT_HEADER, 1);
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array(    //<--- Added this code block
        'Content-Type: application/x-www-form-urlencoded',
        'Content-Length: ' . strlen($data))
  );
  $peticion = curl_exec($ch);
  print_r($peticion);
  echo "\n data -> " . $data;

?>
