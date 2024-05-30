<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BerandaController extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Riiljejak Media Online Bolaang Mongondow';
        $data['headline'] = $this->_headline();
        $data['empat'] = $this->_empatBerita();
        // var_dump($data['headline']);
        // die();
        $this->load->view('frontend/beranda',$data);
    }

    public function _headline()
    {
        $this->db->select("judul, sub_judul, tgl_berita, gambar");
        $this->db->from("tb_berita");
        $this->db->where("headline", "Y");
        $this->db->order_by('id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->result_array();
        foreach ($results as &$result) {
            $result['judul'] = $this->limit_words($result['judul'], 8);
        }
        return $results;
    }

    public function _empatBerita()
    {
        $this->db->select("a.judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->order_by('a.id_berita', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        $results = $query->result_array();
        foreach ($results as &$result) {
            $result['judul'] = $this->limit_words($result['judul'], 8);
        }
        
        return $results;
    }

    private function limit_words($string, $word_limit)
    {
        $words = explode(' ', $string);
        return implode(' ', array_splice($words, 0, $word_limit));
    }
}