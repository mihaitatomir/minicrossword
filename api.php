<?php
include 'mokup.php';

// just to make visible the loading state from index.php
sleep(2);

$post = $_POST;

if (isset($post['date']) && $post['date'] >= '2023-01-01' && $post['date'] <= date('Y-m-d'))
{
    $json = MiniCrossword::getJsonData($post['date']);
    print json_encode($json, JSON_PRETTY_PRINT);
}
else
{
    print 'Ups! The selected date must be between 2023-01-01 and ' . date('Y-m-d');
}