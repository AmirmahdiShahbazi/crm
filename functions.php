<?php


function partial($partial)
{
    include __DIR__ . '/partials/' . $partial . '.php';
}

function sendSms($tnum, $message, $user)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'http://ippanel.com:8080/?apikey=SBWelxIG7vt8P4CGsMAj11GyJo_oRGZNI0rIuuMx0a8=&pid=z1wan0tp8rhskz4&fnum=+985000125475&tnum=' . urlencode($tnum) . '&p1=user&p2=message&v1=' . urlencode($user) . '&v2=' . urlencode($message),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    echo $response;
}
