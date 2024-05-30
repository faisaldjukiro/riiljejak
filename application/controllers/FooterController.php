<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FooterController extends CI_Controller
{

	public function tentang_kami()
	{
        $data['title'] = 'Tentang Kami';
		$data['tentang'] = $this->db->get('tb_about')->row_array();
		$this->load->view('frontend/tentang_kami',$data);
	}

    public function redaksi()
    {
        $data['title'] = 'Redaksi';
        $data['redaksi'] = $this->db->get('tb_redaksi')->row_array();
        $this->load->view('frontend/redaksi',$data);
    }
    public function kontak()
    {
        $data['title'] = 'Kontak';
        $data['kontak'] = $this->db->get('tb_kontak')->row_array();
        $this->load->view('frontend/kontak',$data);
    }
    public function pedoman_pemberitaan()
    {
        $data['title'] = 'Pedoman Pemberitaan';
        $data['pedoman'] = $this->db->get('tb_pedoman')->row_array();
        $this->load->view('frontend/pedoman_pemberitaan',$data);
    }
    public function privacy()
    {
        $data['title'] = 'Privacy';
        $data['privacy'] = $this->db->get('tb_privacy')->row_array();
        $this->load->view('frontend/privacy',$data);
    }
}