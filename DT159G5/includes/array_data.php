<?php

// Fetches the data from the API and decodes it

$url = "https://api.scb.se/OV0104/v1/doris/sv/ssd/START/AM/AM0110/AM0110A/LonYrkeUtbildning4A"; // API URL
$ApiRequest = file_get_contents("APIrequest.json"); // API request
$ch = curl_init($url); // cURL
curl_setopt($ch, CURLOPT_POST, true); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $ApiRequest);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response); // Decodes the data from the API


// Creats an array with the jobs from the API 
$jobs = [
    "Chefer inom arkitekt- och ingenjörsverksamhet, nivå 1",
    "Chefer inom arkitekt- och ingenjörsverksamhet, nivå 2",
    "Civilingenjörsyrken inom logistik och produktionsplanering",
    "Civilingenjörsyrken inom bygg och anläggning",
    "Civilingenjörsyrken inom elektroteknik",
    "Civilingenjörsyrken inom maskinteknik",
    "Civilingenjörsyrken inom kemi och kemiteknik",
    "Civilingenjörsyrken inom gruvteknik och metallurgi",
    "Övriga civilingenjörsyrken",
    "Arbetsmiljöingenjörer, yrkes- och miljöhygieniker",
    "Ingenjörer och tekniker inom industri, logistik och produktionsplanering",
    "Ingenjörer och tekniker inom bygg och anläggning",
    "Ingenjörer och tekniker inom elektroteknik",
    "Ingenjörer och tekniker inom maskinteknik",
    "Ingenjörer och tekniker inom kemi och kemiteknik",
    "Ingenjörer och tekniker inom gruvteknik och metallurgi",
    "GIS- och kartingenjörer",
    "Övriga ingenjörer och tekniker",
    "Tandtekniker och ortopedingenjörer m.fl.",
    "Laboratorieingenjörer",
    "Brandingenjörer och byggnadsinspektörer m.fl."
];


$AllSalaries = $data->value;
$salaries_per_job = [];

/*Loops over all the jobs and organizes the data so that every job gets a 
subkey "män" or "kvinnor" and every subkey gets nine salaries because of 
how the data was displayed in json format
essentially creating a associative array we can use when we are plotting the graph
*/
for ($i = 0; $i < count($jobs); $i++) { // Loops over all the jobs
    $job = $jobs[$i]; // Gets the job
    $salaries_per_job[$job] = [ 
        'män' => [],
        'kvinnor' => []
    ];
    for ($j = 0; $j < 9; $j++) { // Loops over the for men salaries
        $salaries_per_job[$job]['män'][] = $AllSalaries[$i * 18 + $j];
    }
    for ($j = 9; $j < 18; $j++) {
        $salaries_per_job[$job]['kvinnor'][] = $AllSalaries[$i * 18 + $j]; //Loops over all the saleries for women
    }
}


// fetches all the years in the API from the subheads in the json-format data and puts it in the array "yearArr"
foreach ($data->dimension->Tid->category->label as $year) {
    $yearArr[] = $year;
}

?>
