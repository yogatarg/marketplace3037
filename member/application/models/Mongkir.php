<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mongkir extends CI_Model{


	function biaya($origin, $destination, $weight){

		$this->config->load('rajaongkir', FALSE, TRUE);
		
		$data["origin"] = $origin;
		$data["destination"] = $destination;
		$data["weight"] = $weight;
		$data["courier"] = "jne";
		$data["price"] = "lowest";




		$curl = curl_init();
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://rajaongkir.komerce.id/api/v1/calculate/domestic-cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_HTTPHEADER => array(
		    'accept: application/json',
		    "key: " . $this->config->item('rajaongkir_api_key')
		  ),
		  CURLOPT_POSTFIELDS => http_build_query($data)
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $response = json_decode($response, TRUE);
		  if (isset($response['data']) && !empty($response['data'])) {
		  	return $response['data'];
		  } else {
		  	return array();
		  }
			
		}

		exit();
	}
}


