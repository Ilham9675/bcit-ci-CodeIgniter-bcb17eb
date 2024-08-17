<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]
class Api_model extends CI_Model {

	public function __construct() {
        parent::__construct();
        $this->load->library('curl');
    }


    public function get_data($url) {
        $response = $this->curl->simple_get($url);
        if ($response === FALSE) {
            return NULL;
        }
        return json_decode($response, true);
    }

	

    public function createLokasi($data) {
        $url = 'http://localhost:8080/lokasi';
        $response = $this->curl->simple_post($url, json_encode($data), array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
        return $response;
    }

	public function updateLokasi($id, $data) {
		$url = 'http://localhost:8080/lokasi/' . $id;
		$response = $this->curl->simple_put($url, json_encode($data), array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
		return $response;
	}

	public function deleteLokasi($id) {
		$url = 'http://localhost:8080/lokasi/' . $id;
		$response = $this->curl->simple_delete($url, array(), array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
		return $response;
	}
	
	

	public function createProyek($data) {
        $url = 'http://localhost:8080/proyek';
        $response = $this->curl->simple_post($url, json_encode($data), array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
        return $response;
    }

	public function updateProyek($id, $data) {
		$url = 'http://localhost:8080/proyek/' . $id;
		$response = $this->curl->simple_put($url, json_encode($data), array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
		return $response;
	}

	public function deleteProyek($id) {
		$url = 'http://localhost:8080/proyek/' . $id;
		$response = $this->curl->simple_delete($url, array(), array(CURLOPT_HTTPHEADER => array('Content-Type: application/json')));
		return $response;
	}
}
?>
