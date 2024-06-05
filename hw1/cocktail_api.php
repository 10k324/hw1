<?php

function fetchCocktailData() {

    $curl = curl_init();

  
    curl_setopt($curl, CURLOPT_URL, "https://www.thecocktaildb.com/api/json/v1/1/list.php?c=list");

    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

 
    $response = curl_exec($curl);

    if($response === false) {
     
        return '{"error": "Errore cURL: ' . curl_error($curl) . '"}';
    }

    curl_close($curl);

 
    return $response;
}


echo fetchCocktailData();

?>
