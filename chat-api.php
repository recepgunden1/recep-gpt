<?php

if(@$_POST){

    $api_key = "your-api-key";
    $prompt = $_POST['prompt'];
    
    $stop = array(" Siz:", " AI:");
    $data = array(
        "model" => "text-davinci-003",
        "prompt" => $prompt,
        "temperature" => 0.9,
        "max_tokens" => 500,
        "top_p" => 1,
        "frequency_penalty" => 0,
        "presence_penalty" => 0.6,
        "stop" => $stop
    );

    
    $payload = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json', 
        'Authorization: Bearer ' . $api_key
    ));
    $resault = curl_exec($ch);
    curl_close($ch);

    $response = json_encode($resault, true);
    print_r($response);

}

?>