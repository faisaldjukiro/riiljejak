<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BeritaController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['berita'] = $this->db->query("SELECT a.id_berita, a.gambar, c.nama, a.judul, a.status, a.tgl_berita  FROM tb_berita as a 
                                            INNER JOIN user as c ON a.id_user = c.id_user 
                                            ORDER BY id_berita DESC")->result_array();
        $this->load->view('backend/berita', $data);
    }

    public function t_berita()
    {   
        $data['title'] = 'Tambah Berita';
        $id_kategori = $this->input->post('id_kategori');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['kategori']  = $this->Berita_model->get_kategori();
        
        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            "required" => "Judul Berita Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('id_kategori_master[]', 'Kategori', 'required', [
            "required" => "Kategori Tidak Boleh Kosong"
        ]);
        
        $this->form_validation->set_rules('keterangan_gambar', 'Keterangan Gambar', 'required', [
            "required" => "Redaksi Foto Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tag[]', 'Tag Berita', 'required', [
            "required" => "Tag Berita Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tgl_berita', 'Tanggal Berita', 'required', [
            "required" => "Tanggal Berita Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_check_upload');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('backend/berita_t', $data);
        } else {
            $tags = $this->input->post('tag');
            $tags_string = is_array($tags) ? implode(',', $tags) : $tags;

            $kategori = $this->input->post('id_kategori_master');
            $kategori_string = is_array($kategori) ? implode(',', $kategori) : $kategori;

            $judul = $this->input->post('judul');
            
            $judul1 = trim($judul);
            $judul2 = preg_replace('/[^!?a-zA-Z0-9\s]/', '', $judul1);
            $judul3 = preg_replace('/[\s!?]+/', '-', $judul2);
            $judul4 = rtrim($judul3, '-');
            $sub_judul = strtolower($judul4);
            
            
            $config['upload_path'] = './img/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;
        
            $this->load->library('upload', $config);
        
            
            $role_id = $this->input->post('role_id');

            $status = 3;

            if ($role_id == 1) {
                $status = 1;
            }

            if (!$this->upload->do_upload('gambar')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">' . $error . '</div>');
                redirect('rj/berita/tambah');
            } else {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
                $insert_data = [
                    'judul' => $judul,
                    'sub_judul' => $sub_judul,
                    'id_user' => $this->input->post('id_user'),
                    'id_kategori_master' => $kategori_string,
                    'id_kategori' => $this->input->post('id_kategori'),
                    'gambar' => $gambar,
                    'keterangan_gambar' => $this->input->post('keterangan_gambar'),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'tag' => $tags_string,
                    'tgl_berita' => $this->input->post('tgl_berita'),
                    'headline' => $this->input->post('headline'),
                    'youtube' => $this->input->post('youtube'),
                    'jam' => $this->input->post('jam'),
                    'dibaca' => 0,
                    'status' => $status,
                    'aktif' => "Y"
                ];
    
                if ($this->db->insert('tb_berita', $insert_data)) {
                    $this->sendWhatsAppNotification();
                    $this->session->set_flashdata('message_type', 'success');
                    $this->session->set_flashdata('message', 'Berita Berhasil ditambahkan!');
                   
                } else {
                    $this->session->set_flashdata('message_type', 'error');
                    $this->session->set_flashdata('message', 'Gagal Menambahkan Berita!');
                }
            }
            redirect('rj/berita/tambah');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berita Berhasil ditambahkan!</div>');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Edit Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        
        $data['kategori'] = $this->Berita_model->get_kategori();
        
        $data['berita'] = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();
        
        $data['selected_categories'] = explode(',', $data['berita']['id_kategori_master']);

        $this->form_validation->set_rules('judul', 'Judul', 'required', [
            "required" => "Judul Berita Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('id_kategori_master[]', 'Kategori', 'required', [
            "required" => "Kategori Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('keterangan_gambar', 'Keterangan Gambar', 'required', [
            "required" => "Redaksi Foto Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tag[]', 'Tag Berita', 'required', [
            "required" => "Tag Berita Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('tgl_berita', 'Tanggal Berita', 'required', [
            "required" => "Tanggal Berita Tidak Boleh Kosong"
        ]);
        $this->form_validation->set_rules('gambar', 'Gambar', 'callback_check_upload');

        
        $role_id = $this->input->post('role_id');

        $status = 3;
        if ($role_id == 1) {
            $status = 1;
        }

        if ($this->form_validation->run() == false) {
            $this->load->view('backend/berita_e', $data);
        } else {
            
            $tags = $this->input->post('tag');
            $tags_string = is_array($tags) ? implode(',', $tags) : $tags;

            $kategori = $this->input->post('id_kategori_master');
            $kategori_string = is_array($kategori) ? implode(',', $kategori) : $kategori;
            
            $judul = $this->input->post('judul');
            
            $judul1 = trim($judul);
            $judul2 = preg_replace('/[^!?a-zA-Z0-9\s]/', '', $judul1);
            $judul3 = preg_replace('/[\s!?]+/', '-', $judul2);
            $judul4 = rtrim($judul3, '-');
            $sub_judul = strtolower($judul4);

            $config['upload_path'] = './img/berita/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif|webp';
            $config['max_size'] = 2048;
            $config['encrypt_name'] = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $gambar = $upload_data['file_name'];
                if ($data['berita']['gambar'] && file_exists('./img/berita/' . $data['berita']['gambar'])) {
                    unlink('./img/berita/' . $data['berita']['gambar']);
                }
            } else {
                $gambar = $data['berita']['gambar'];
            }

            $update_data = [
                'judul' => $judul,
                'sub_judul' => $sub_judul,
                'id_kategori_master' => $kategori_string,
                'id_kategori' => $this->input->post('id_kategori'),
                'gambar' => $gambar,
                'keterangan_gambar' => $this->input->post('keterangan_gambar'),
                'isi_berita' => $this->input->post('isi_berita'),
                'tag' => $tags_string,
                'tgl_berita' => $this->input->post('tgl_berita'),
                'headline' => $this->input->post('headline'),
                'youtube' => $this->input->post('youtube'),
                'status' => $status
            ];

            $this->db->where('id_berita', $id);
            if ($this->db->update('tb_berita', $update_data)) {
                $this->session->set_flashdata('message_type', 'success');
                $this->session->set_flashdata('message', 'Berita Berhasil Diedit!');
            } else {
                $this->session->set_flashdata('message_type', 'error');
                $this->session->set_flashdata('message', 'Gagal Mengedit Berita!');
            }
            $this->load->view('backend/berita_e', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-info" role="alert">Berita Berhasil diedit!</div>');
        }
        
    }
<<<<<<< HEAD

    public function hapus($id)
{
    // Dapatkan data berita berdasarkan ID
    $berita = $this->db->get_where('tb_berita', ['id_berita' => $id])->row_array();

    if ($berita) {
  
        if ($berita['gambar'] && file_exists('./img/berita/' . $berita['gambar'])) {
            unlink('./img/berita/' . $berita['gambar']);
        }
        $this->db->where('id_berita', $id);
        if ($this->db->delete('tb_berita')) {
            $this->session->set_flashdata('message_type', 'success');
            $this->session->set_flashdata('message', 'Berita berhasil dihapus!');
        } else {
            $this->session->set_flashdata('message_type', 'error');
            $this->session->set_flashdata('message', 'Gagal menghapus berita!');
        }
    } else {
        $this->session->set_flashdata('message_type', 'error');
        $this->session->set_flashdata('message', 'Berita tidak ditemukan!');
    }

    // Redirect kembali ke halaman berita
    redirect('rj/berita');
}
    
    public function check_upload($str)
    {
        if (empty($_FILES['gambar']['name']) && empty($_FILES['gambar']['tmp_name'])) {
            $this->form_validation->set_message('check_upload', 'Gambar Tidak Boleh Kosong');
            return false;
        } else {
            return true;
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Berita';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->db->select('*');
        $this->db->from('tb_berita');
        $this->db->where('tb_berita.id_berita',$id);
        $data['berita'] = $this->db->get()->row_array();
        $this->load->view('backend/berita_detail',$data);
    }
    
  

=======
    private function sendWhatsAppNotification() {
        $this->load->library('twilio');

        $twilio_number = 'whatsapp:+6285240655479';
        $receiver_numbers = ['whatsapp:+6282296715197'];
        // $receiver_numbers = ['whatsapp:+6282296715197', 'whatsapp:+6285311326323'];
        $message = 'Berita baru telah ditambahkan!';
    
        // Kirim pesan WhatsApp ke setiap nomor penerima
        foreach ($receiver_numbers as $receiver_number) {
            $this->twilio->sendMessage($twilio_number, $receiver_number, $message);
        }
    }
>>>>>>> 1d39c107c2d1737e018be66a266c8e840c8a0a4d
}