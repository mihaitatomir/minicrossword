<?php

// $obj = new MiniCrossword();

// $json = MiniCrossword::generateJsonData();
// dd($json);

// $json = MiniCrossword::getJsonData('2023-03-23');
// dd(json_encode($json, JSON_PRETTY_PRINT));






class MiniCrossword
{

    public static function getJsonData($given_date = null)
    {
        $json = file_get_contents(getcwd() . '/database.json');
        $records = json_decode($json, true);

        if (!is_null($given_date) && array_key_exists($given_date, $records))
        {
            return $records[$given_date];
        }

        return $records;
    }

    public static function generateJsonData($given_date = null)
    {
        $directions = ['accross', 'down'];
        $answers = ['SNOB', 'ATONED', 'PORTER', 'TUTORS', 'STEPS', 'STOUT', 'NORTE', 'ONTOP', 'BEERS', 'APTS', 'DRS'];
        $clues = ['Haughty person', 'Apologized for one\'s sins', 'Luggage carrier at a hotel', 'One-on-one teachers', 'Studies recommend taking 8,000+ of these each day', 'Sturdy', 'Direction from Mexico to the U.S., en español', 'Victorious', '7-Across and 1-Down, by different meanings', 'Many N.Y.C. dwellings: Abbr', 'Hosp. personnel',];

        if (is_null($given_date))
        {
            $start_date = '2023-01-01';
            $end_date = '2023-12-31';
            $days = round((strtotime($end_date) - strtotime($start_date)) / (60 * 60 * 24));
        }
        else
        {
            $start_date = $given_date;
            $days = 1;
        }

        $data = [];

        for ($i = 0; $i <= $days; $i++)
        {
            $date = date('Y-m-d', strtotime($start_date . ' +' . $i . ' days'));

            for ($z = 1; $z <= count($answers); $z++)
            {
                $rnd = mt_rand(1, count($answers));
                $data[$date][] = [
                    'answer' => $answers[$rnd-1],
                    'clue' => $clues[$rnd-1],
                    'length' => strlen($answers[$rnd-1]),
                    'date' => $date,
                    'direction' => $directions[mt_rand(0, 1)],
                ];
            }
        }

        return json_encode($data, JSON_PRETTY_PRINT);
    }

}


// helper functions

function dd($data = '~ no data provided ~')
{
    if (is_object($data))
    {
        $data = (Array) $data;
    }

    print '<pre>' . print_r($data, TRUE) . '</pre>' . "\n";
    die('END');
}