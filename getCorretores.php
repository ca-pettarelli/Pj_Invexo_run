<?php

class Corretor 
{
    public static function index($id)
    {
        $url = 'https://api.moskitcrm.com/v2/users/search?order=desc';

        // Create a new cURL resource
        $ch = curl_init($url);

        // Setup request to send json via POST
        $data = array(
            'field' => 'id',
            'expression' => 'one_of',
            'values' => array($id),
        );
        // $payload = json_encode(array("user" => $data));
        $payload = json_encode($data);
        $payload = '['. $payload . ']';

        // Attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

        // Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'apikey:168ec8df-5e4f-440f-b3cd-d03b1039dff7'));

        // Return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute the POST request
        $result = curl_exec($ch);
        
        // Close cURL resource
        curl_close($ch);

        $resultado = json_decode($result);

        return $resultado; 
    }

}
?>