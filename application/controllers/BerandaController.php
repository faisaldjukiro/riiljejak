<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BerandaController extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Riiljejak Media Online Bolaang Mongondow';
        $data['headline'] = $this->_headline();
        $data['empat'] = $this->_empatBerita();
        $data['terbaru'] = $this->_beritaTerbaru();
        $data['populer'] = $this->_populer();
        $data['politik'] = $this->_politik();
        $data['pemerintahan'] = $this->_pemerintahan();
        $data['olahraga'] = $this->_olahraga();
        $data['nasional'] = $this->_nasional();
<<<<<<< HEAD
        $data['religi'] = $this->_religi();
        $data['hukum'] = $this->_hukum();
=======
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        $this->load->view('frontend/beranda',$data);
    }

    public function _headline()
    {
        $this->db->select("IF(LENGTH(a.judul) > 80, CONCAT(LEFT(a.judul, 80), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar");
        $this->db->from("tb_berita a");
        $this->db->where("a.headline", "Y");
        $this->db->order_by('a.id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->result_array();
<<<<<<< HEAD
=======
        // foreach ($results as &$result) {
        //     $result['judul'] = $this->limit_words($result['judul'], 8);
        // }
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        return $results;
    }

    public function _empatBerita()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
        $this->db->order_by('a.id_berita', 'DESC');
        $this->db->limit(4);
        $query = $this->db->get();
        $results = $query->result_array();
     
        return $results;
    }

    public function _beritaTerbaru()
    {
        $this->db->select("a.judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
<<<<<<< HEAD
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
=======
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        $this->db->order_by('a.id_berita', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        $results = $query->result_array();
     
        return $results;
    }

    public function _populer()
    {
        $this->db->select("a.judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
<<<<<<< HEAD
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
=======
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        $this->db->order_by('a.dibaca', 'DESC');
        $this->db->limit(10);
        $query = $this->db->get();
        $results = $query->result_array();
        return $results;
    }

    public function _politik()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "3");
<<<<<<< HEAD
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
=======
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        $this->db->order_by('a.id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }

    public function _pemerintahan()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
<<<<<<< HEAD
        $this->db->where("a.id_kategori", "4");
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
=======
        $this->db->where("a.id_kategori", "5");
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        $this->db->order_by('a.id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }

    public function _olahraga()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "20");
<<<<<<< HEAD
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
=======
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        $this->db->order_by('a.id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }
    public function _nasional()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "22");
<<<<<<< HEAD
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
=======
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
        $this->db->order_by('a.id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }
<<<<<<< HEAD
    public function _religi()
    {
        $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
        $this->db->from("tb_berita a");
        $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
        $this->db->join('user c', 'c.id_user = a.id_user');
        $this->db->where("a.id_kategori", "21");
        $this->db->where('a.aktif',"Y");
        $this->db->where('a.status',1);
        $this->db->order_by('a.id_berita', 'DESC');
        $query = $this->db->get();
        $results = $query->row_array();
        return $results;
    }
    
    public function _hukum()
        {
            $this->db->select("IF(LENGTH(a.judul) > 50, CONCAT(LEFT(a.judul, 50), '...'), a.judul) AS judul, a.sub_judul, a.tgl_berita, a.gambar,b.nm_kategori_master,c.nama,b.url");
            $this->db->from("tb_berita a");
            $this->db->join('tb_kategori_master b', 'b.id_kat_master = a.id_kategori');
            $this->db->join('user c', 'c.id_user = a.id_user');
            $this->db->where("a.id_kategori", "2");
            $this->db->where('a.aktif',"Y");
            $this->db->where('a.status',1);
            $this->db->order_by('a.id_berita', 'DESC');
            $query = $this->db->get();
            $results = $query->row_array();
            return $results;
    }
=======

>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d

    private function limit_words($string, $word_limit)
    {
        $words = explode(' ', $string);
        return implode(' ', array_splice($words, 0, $word_limit));
    }
}