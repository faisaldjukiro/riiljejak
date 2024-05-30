<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeritaController extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Berita";

		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(1,2,3,4,5,6,7,8,9,10);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		
		$this->db->order_by('a.id_berita', 'desc');
		
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		$data['berita'] = $isal;
		$this->load->view('frontend/listberita', $data);
	}
	public function internasional()
	{
		$data['title'] = "Internasional";

		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(1);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');

		
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function nasional()
	{
		$data['title'] = "Nasional";

		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(2,3,4);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function hukum()
	{
		$data['title'] = "Hukum";

		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(2);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function politik()
	{
		$data['title'] = "Politik";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(3);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	
	public function pemerintahan()
	{
		$data['title'] = "Pemerintahan";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(4);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function daerah()
	{
		$data['title'] = "Daerah";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		$id_kategori_master = array(5,6,7,8,9,10);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function sulawesi_utara()
	{
		$data['title'] = "Sulawesi Utara";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(5,6,7);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function bolmut()
	{
		$data['title'] = "Bolaang Mongondow Utara";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(5);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function bolsel()
	{
		$data['title'] = "Bolaang Mongondow Selatan";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(6);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function boltim()
	{
		$data['title'] = "Bolaang Mongondow Timur";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(7);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function gorontalo()
	{
		$data['title'] = "Gorontalo";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(8,9,10);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function kota_gorontalo()
	{
		$data['title'] = "Kota Gorontalo";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(8);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function kabupaten_gorontalo()
	{
		$data['title'] = "Kabupaten Gorontalo";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(9);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function gorontalo_utara()
	{
		$data['title'] = "Gorontalo Utara";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(10);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		$data['berita'] = $isal;
		$this->load->view('frontend/listberita', $data);
	}
	
	public function ragam()
	{
		$data['title'] = "Ragam";
		$this->db->select('a.id_kategori_master,a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		$id_kategori_master = array(11,12,13,14,15,16,18,19,20,21);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		
		$this->db->order_by('a.id_berita', 'desc');
		
		
		$isal = $this->db->get()->result_array();
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		$data['berita'] = $isal;
		$this->load->view('frontend/listberita', $data);
	}
	public function budaya()
	{
		$data['title'] = "Budaya";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(11);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function seni()
	{
		$data['title'] = "Seni";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(12);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function keanekaragaman_hayati()
	{
		$data['title'] = "Keanekaragaman Hayati";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(13);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function pariwisata()
	{
		$data['title'] = "Pariwisata";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(14);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function komoditas()
	{
		$data['title'] = "Komoditas";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(15);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function kuliner()
	{
		$data['title'] = "Kuliner";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(16);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function lingkungan()
	{
		$data['title'] = "Lingkungan";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(18);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function kesehatan()
	{
		$data['title'] = "Kesehatan";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		
		$id_kategori_master = array(19);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function religi()
	{
		$data['title'] = "Religi";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', Y);
		
		$id_kategori_master = array(21);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function olahraga()
	{
		$data['title'] = "Olahraga";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', Y);
		$this->db->order_by('a.id_berita', 'desc');
		
		$id_kategori_master = array(20);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}
	public function infografis()
	{
		$data['title'] = "Infografis";
		$this->db->select('a.judul,a.tgl_berita,a.sub_judul,a.gambar,a.isi_berita,b.nama');
		$this->db->from('tb_berita a');
		$this->db->join('user b', 'a.id_user = b.id_user');
		$this->db->where('a.aktif', "Y");
		$id_kategori_master = array(17);
		$this->db->where_in('a.id_kategori_master', $id_kategori_master);
		foreach ($id_kategori_master as $id) {
			$this->db->or_where("FIND_IN_SET($id, a.id_kategori_master) >", 0);
		}
		$this->db->order_by('a.id_berita', 'desc');
		$isal = $this->db->get()->result_array();
		
		foreach ($isal as &$item) {
			$item['isi_berita'] = $this->ambil_kata($item['isi_berita'], 17, 25);
		}
		
		$data['berita'] = $isal;
		
		$this->load->view('frontend/listberita', $data);
	}

	private function ambil_kata($string, $start, $end) {
        $kata = explode(' ', $string);
        $potongan_kata = array_slice($kata, $start, $end - $start + 1);
        return implode(' ', $potongan_kata);
    }

	public function detail($tgl_buat,$sub_judul)
	{
		
		$sub_judul = urldecode($sub_judul);

        $this->db->select('a.judul, a.tgl_berita, a.sub_judul, a.gambar, a.isi_berita, b.nama, a.keterangan_gambar,a.tag,a.jam');
        $this->db->from('tb_berita a');
        $this->db->join('user b', 'a.id_user = b.id_user');
        $this->db->where('a.aktif', "Y");
        $this->db->where('a.tgl_berita', $tgl_buat);
        $this->db->where('a.sub_judul', $sub_judul);
        $data['berita_detail'] = $this->db->get()->row_array();
        if (isset($data['berita_detail']['judul'])) {
            $data['title'] = $data['berita_detail']['judul'];
        } else {
            $data['title'] = "Berita tidak ditemukan";
        }
		$this->load->view('frontend/detailberita', $data);
	}

}