<?php

class Negocios 
{
    public static function index()
    {
        $start = 9800;
        $end = 0;
        for ($i = 1; $i <= 3; $i++) {
            $cURLConnection = curl_init('https://api.moskitcrm.com/v1/deals/?start=' . $start . '&limit=100&order=desc');
            curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
                'apikey: a4ca266a-ef70-462f-a5bd-abc6340928b0',
            ));

            $apiResponse = curl_exec($cURLConnection);
            curl_close($cURLConnection);

            $jsonObj = json_decode($apiResponse);

            $end = $jsonObj->metadata->pagination->total;
            $start = $start + 100;
            $result = $jsonObj->results;
        }


       return $result; 
    }

}