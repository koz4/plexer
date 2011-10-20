<?php
require_once 'fotolia-api.php';

$api = new Fotolia_Api('XTOO1hJyKcyg5wYT3SuBpmcjqSGGpjrD');

// searching for "cars"
$search_params = array(
    'words' => 'cars',
    'language_id' => Fotolia_Api::LANGUAGE_ID_PL_PL,
);

// if  left empty, all default columns will be returned
$result_columns = array(
    'id',
    'title',
    'thumbnail_url',
);
$res = $api->getSearchResults($search_params, $result_columns);
//var_export($res);

// purchasing and downloading a file
//$content_id = 12436678;
//$license_name = 'XS';
$api->loginUser('', '');

// retrieving download data
//$media = $api->getMedia($content_id, $license_name);

// saving file into /tmp directory
//$api->downloadMedia($media['url'], '/tmp/' . $media['name']); 


// if  left empty, all default columns will be returned
$result_columns = array(
    'id',
    'title',
    'thumbnail_url',
);
$res = $api->getSearchResults($search_params, $result_columns);
//echo "<pre>";
//print_r($res);
//echo "</pre>";
$limit = 20;

for ($index = 0; $index < $limit; $index++) {
  echo "<img src='".$res[$index]['thumbnail_url']."' alt='".$res[$index]
['title']."'>";
//echo $res[0]['title']     
  
}

$kategorie = $api->getCategories1(11,1000000);

//for ($index1 = 0; $index1 < 100000; $index1++) {
//    echo $kategorie[$index1];
//}
//echo $kategorie[id];
//echo "<pre>";
//print_r($kategorie);
//echo "</pre>";
foreach ($kategorie as $key => $value) {
    echo $value['name']."<br>";
    
};


$tagi = $api->getTags();
foreach ($tagi as $key1 => $value1) {
    echo $value1['name']."<br>";
    
};

?> 