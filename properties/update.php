<?php

include __DIR__ . '/../bootstrap.php';
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    include __DIR__.'/../views/properties/edit.php';
    die();
}


$queryBuilder->update('properties')
->set('property_type', '?')
->set('transaction_type', '?')
->set('file_id', '?')
->set('owner', '?')
->set('phone_number', '?')
->set('landline_phone', '?')
->set('land_size', '?')
->set('building_size', '?')
->set('share_amount', '?')
->set('room_number', '?')
->set('floor', '?')
->set('balcony', '?')
->set('store', '?')
->set('lifetime', '?')
->set('meter_price', '?')
->set('total_price', '?')
->set('neighborhood', '?')
->set('address', '?')
->set('position', '?')
->set('direction', '?')
->set('characteristic', '?')
->set('building_facade', '?')
->set('joints', '?')
->set('facilities', '?')
->set('floor_covering', '?')
->set('kitchen', '?')
->set('bathroom', '?')
->set('wall', '?')
->where('id = ?');
$queryBuilder->setParameter(0, $_POST['property_type'])
->setParameter(1, $_POST['transaction_type'])
->setParameter(2, $_POST['file_id'])
->setParameter(3, $_POST['owner'])
->setParameter(4, $_POST['phone_number'])
->setParameter(5, $_POST['landline_phone'])
->setParameter(6, $_POST['land_size'])
->setParameter(7, $_POST['building_size'])
->setParameter(8, $_POST['share_amount'])
->setParameter(9, $_POST['room_number'])
->setParameter(10, $_POST['floor'])
->setParameter(11, $_POST['balcony'])
->setParameter(12, $_POST['store'])
->setParameter(13, $_POST['lifetime'])
->setParameter(14, $_POST['meter_price'])
->setParameter(15, $_POST['total_price'])
->setParameter(16, $_POST['neighborhood'])
->setParameter(17, $_POST['address'])
->setParameter(18, $_POST['position'])
->setParameter(19, $_POST['direction'])
->setParameter(20, json_encode($_POST['characteristic']))
->setParameter(21, $_POST['building_facade'])
->setParameter(22, json_encode($_POST['joints']))
->setParameter(23, $_POST['facilities'])
->setParameter(24, $_POST['floor_covering'])
->setParameter(25, $_POST['kitchen'])
->setParameter(26, $_POST['bathroom'])
->setParameter(27, $_POST['wall'])
->setParameter(28, $_GET['id']);
$queryBuilder->execute();
header('Location: /properties');
die();
