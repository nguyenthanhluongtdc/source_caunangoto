<?php 
  header('content-type: text/html; charset:utf-8');
    session_start();
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	@define ( '_template' , '../../templates/');
	@define ( '_source' , '../../sources/');
	@define ( '_lib' , '../../lib/');
	include_once _lib."config.php";
	include_once _lib."class.database.php";
	// $db = new database($config['database']);
	// $data = array("search" => $_POST['address']);
	// $db->setTable("search");
    //$db->insert($data)

     $ch = curl_init();
	 $url = "https://maps.googleapis.com/maps/api/geocode/json?address=".preg_replace("/\s+/", "+", $_POST['address']);
	 $apiKey = "&key=AIzaSyCOwViUb6ewqIr4sp1x0sMo-HeJB7PerBw";
	 $url .= $apiKey;
	 curl_setopt($ch, CURLOPT_URL, $url);
	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	 $output = curl_exec($ch);
	 curl_close($ch);
	 $json_a = json_decode($output, true);
	//  $string = "";
 //     if (count($json_a['results']) > 0){
	// 		 $string.= '<ul class="list-search-text">';
	// 		 $json_a['results'] = array_slice($json_a['results'],0,4);
	// 			 foreach ($json_a['results'] as $value) { 
	// 					$string.= '<li data-query='.preg_replace("/\s+/", "+", $_POST['address']).'  data-lat='.$value["geometry"]["location"]["lat"].' data-lng='. $value["geometry"]["location"]["lng"].'>';
	// 					$string.= $value['formatted_address'];
	// 					$string.= '</li>';
	// 			  } 
	// 		$string .= '</ul>';
	// }
   die(json_encode(array("result" => "1", "address" =>$json_a['results'])));
?>