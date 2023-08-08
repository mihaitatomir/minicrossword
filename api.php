<?php
include 'mokup.php';

// just to make visible the loading state from index.php
sleep(2);

$post = $_POST;

if (isset($post['date']) && $post['date'] == 'all')
{
    $json = MiniCrossword::getJsonData(null, date('Y-m-d'));

    $res  = '<h2>Mini Crossword historical records between 2023-01-01 and ' . date('Y-m-d') . '</h2>';
    $res .= '<pre>' . json_encode($json, JSON_PRETTY_PRINT) . '</pre>';

    print $res;
}
else
{
    if (isset($post['date']) && $post['date'] >= '2023-01-01' && $post['date'] <= date('Y-m-d'))
    {
        $json = MiniCrossword::getJsonData($post['date']);

        $res  = '<h2>Mini Crossword records for date ' . $post['date'] . '</h2>';
        $res .= '<pre>' . json_encode($json, JSON_PRETTY_PRINT) . '</pre>';

        print $res;
    }
    else
    {
        print 'Ups! The selected date must be between 2023-01-01 and ' . date('Y-m-d');
    }
}
