<?php
defined('BASEPATH') OR exit('No direct script access allowed');
#[AllowDynamicProperties]
class ApiController extends CI_Controller {
    /**
     * CI Curl
     *
     * @var CI_Curl
     */
    public $curl;

    /**
     * Api_model instance
     *
     * @var Api_model
     */
    protected $api_model;

    public function __construct()
    {
        parent::__construct();
        // Load library cURL, model, dan sesi
        $this->load->library('curl');
        $this->load->library('session'); // Memuat library sesi
        $this->load->model('Api_model');
        $this->load->helper('url');
        $this->api_model = new Api_model();
    }

    public function index()
    {
        // Fetch data from lokasi API
        $urlLokasi = "http://localhost:8080/lokasi";
        $dataLokasi = $this->api_model->get_data($urlLokasi);
        if ($dataLokasi === NULL) {
            show_error('Error fetching data from Lokasi API');
        }

        // Fetch data from proyek API
        $urlProyek = "http://localhost:8080/proyek";
        $dataProyek = $this->api_model->get_data($urlProyek);
        if ($dataProyek === NULL) {
            show_error('Error fetching data from Proyek API');
        }

        // Pass both data sets to the view
        $this->load->view('halaman_utama', [
            'dataLokasi' => $dataLokasi,
            'dataProyek' => $dataProyek
        ]);
    }

    public function addLokasi() {
        $namaLokasi = $this->input->post('namaLokasi');
        $negara = $this->input->post('negara');
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');

        $data = [
            'namaLokasi' => $namaLokasi,
            'negara' => $negara,
            'provinsi' => $provinsi,
            'kota' => $kota,
            
        ];

        $response = $this->Api_model->createLokasi($data);

        if ($response) {
            $this->session->set_flashdata('success', 'Lokasi added successfully!');
        } else {
            $this->session->set_flashdata('error', 'Error adding lokasi');
        }

        redirect('/');
    }

	public function updateLokasi($id) {
		$namaLokasi = $this->input->post('namaLokasi');
		$negara = $this->input->post('negara');
		$provinsi = $this->input->post('provinsi');
		$kota = $this->input->post('kota');
		$urlProyek = 'http://localhost:8080/lokasi/' . $id;
        $data = $this->api_model->get_data($urlProyek);
        if ($data === NULL) {
            show_error('Error fetching data from Proyek API');
        }

		$data = [
			'namaLokasi' => $namaLokasi,
			'negara' => $negara,
			'provinsi' => $provinsi,
			'kota' => $kota,
			'createdAt' => $data['createdAt']
			 
		];
	
		$response = $this->Api_model->updateLokasi($id, $data);
	
		if ($response) {
			$this->session->set_flashdata('success', 'Lokasi updated successfully!');
		} else {
			$this->session->set_flashdata('error', 'Error updating lokasi');
		}
	
		redirect('/');
	}

	public function deleteLokasi($id) {
		$response = $this->Api_model->deleteLokasi($id);
	
		if ($response) {
			$this->session->set_flashdata('success', 'Lokasi deleted successfully!');
		} else {
			$this->session->set_flashdata('error', 'Error deleting lokasi');
		}
	
		redirect('/');
	}
	
	

	public function addProyek() {
        $namaProyek = $this->input->post('namaProyek');
        $client = $this->input->post('client');
        $tglMulai = $this->input->post('tglMulai') . 'T00:00:00'; // Tambahkan waktu default
        $tglSelesai = $this->input->post('tglSelesai') . 'T00:00:00'; // Tambahkan waktu default
        $pimpinanProyek = $this->input->post('pimpinanProyek');
        $keterangan = $this->input->post('keterangan');

        $data = [
            'namaProyek' => $namaProyek,
            'client' => $client,
            'tglMulai' => $tglMulai,
            'tglSelesai' => $tglSelesai,
            'pimpinanProyek' => $pimpinanProyek,
            'keterangan' => $keterangan,
            
        ];

        $response = $this->Api_model->createProyek($data);

        if ($response) {
            $this->session->set_flashdata('success', 'Proyek added successfully!');
        } else {
            $this->session->set_flashdata('error', 'Error adding proyek');
        }

        redirect('/');
    }

	public function updateProyek($id) {
        $namaProyek = $this->input->post('namaProyek');
        $client = $this->input->post('client');
        $tglMulai = $this->input->post('tglMulai') . 'T00:00:00'; // Tambahkan waktu default
        $tglSelesai = $this->input->post('tglSelesai') . 'T00:00:00'; // Tambahkan waktu default
        $pimpinanProyek = $this->input->post('pimpinanProyek');
        $keterangan = $this->input->post('keterangan');
		$urlProyek = 'http://localhost:8080/lokasi/' . $id;
        $data = $this->api_model->get_data($urlProyek);
        if ($data === NULL) {
            show_error('Error fetching data from Proyek API');
        }
        $data = [
            'namaProyek' => $namaProyek,
            'client' => $client,
            'tglMulai' => $tglMulai,
            'tglSelesai' => $tglSelesai,
            'pimpinanProyek' => $pimpinanProyek,
            'keterangan' => $keterangan,
            'createdAt' => $data['createdAt'],
        ];

        $response = $this->Api_model->updateProyek($id, $data);

        if ($response) {
            $this->session->set_flashdata('success', 'Proyek updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Error updating proyek');
        }

        redirect('/');
    }

    public function deleteProyek($id) {
        $response = $this->Api_model->deleteProyek($id);

        if ($response) {
            $this->session->set_flashdata('success', 'Proyek deleted successfully!');
        } else {
            $this->session->set_flashdata('error', 'Error deleting proyek');
        }

        redirect('/');
    }

    public function add_lokasi_view() {
        $this->load->view('add_lokasi_view');
    }

	public function update_lokasi_view($id) {
		$urlProyek = 'http://localhost:8080/lokasi/' . $id;
        $data = $this->api_model->get_data($urlProyek);
        if ($data === NULL) {
            show_error('Error fetching data from Proyek API');
        }
        $this->load->view('update_lokasi_view',[
            'data' => $data
            
        ]);
    }

	public function add_proyek_view() {
        $this->load->view('add_proyek_view');
    }

	public function update_proyek_view($id) {
		$urlProyek = 'http://localhost:8080/proyek/' . $id;
        $data = $this->api_model->get_data($urlProyek);
        if ($data === NULL) {
            show_error('Error fetching data from Proyek API');
        }
        $this->load->view('update_proyek_view',[
            'data' => $data
		]);
    }
}
