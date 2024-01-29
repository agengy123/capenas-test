<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if(!$this->session->userdata('id')){
            redirect('welcome');
        } else {
            if($this->session->userdata('level') != 'Admin'){
                redirect('user/dashboard');
            }
        }
    }

    public function index()
    {
        $data['title'] = 'Proses Pencatatan';
        $data['pegawai'] = $this->m_model->getpgw('tb_pegawai')->result();
        $data['barang']  = $this->m_model->join('tb_barang','tb_pegawai','tb_barang.nip=tb_pegawai.nip')->result();
        $data['riwayat'] = $this->m_model->get('tb_riwayat')->result();
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/barang', $data);
        $this->load->view('admin/templates/footer');
    }

    public function delete($id)
    {
        $where = array('id' => $id );

        $this->m_model->delete($where, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/barang');
    }

    public function insert()
    {
        date_default_timezone_set('Asia/Jakarta');
        $nip          = $_POST['nip'];
        $jenis_tugas  = $_POST['jenis_tugas'];
        $tujuan       = $_POST['tujuan'];
        $tgl_pergi    = $_POST['tgl_pergi'];
        $tgl_pulang   = $_POST['tgl_pulang'];
        $stok         = $_POST['stok'];
        $uraian       = $_POST['uraian'];        
        $createDate   = date('Y-m-d H:i:s');
        $gambar       = $_FILES['gambar'];
        if ($gambar = '') {} else {
            $config['upload_path'] = './uploads/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']            = 'gbr-'.date('Y-m-d').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);
            
            if(@$_FILES['gambar']['name'] !=null) {
                if ( !$this->upload->do_upload('gambar')){
               # $post['image'] =$this->upload->data('file_name');
                echo "Upload gambar gagal!!"; die();
            } else {
                $gambar =$this->upload->data('file_name');
               
            }
        }
    }
                        
        $data = array(
            'nip'          => $nip,
            'jenis_tugas'  => $jenis_tugas,
            'tujuan'          => $tujuan,
            'tgl_pergi'     => $tgl_pergi,
            'tgl_pulang'    => $tgl_pulang,
            'stok'          => $stok,
            'uraian'          => $uraian,          
            'gambar'        => $gambar,
            'createDate'    => $createDate
        );

        $this->m_model->insert($data, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('admin/barang');
    }

    public function insert_kelola()
    {
        date_default_timezone_set('Asia/Jakarta');
        $id         = $_POST['id'];
        $kode       = $_POST['kode'];
        $stok       = $_POST['stok'];        
        $untuk      = $_POST['untuk'];
        $penerima   = $_POST['penerima'];
        $jenis      = $_POST['jenis'];
        $jumlah     = $_POST['jumlah'];
        $createDate = date('Y-m-d H:i:s');
        $bukti        = $_FILES['bukti'];
        if ($bukti = '') {} else {
            $config['upload_path']          = './bukti/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2048;
            $config['file_name']            = 'bukti-'.date('Y-m-d').'-'.substr(md5(rand()),0,10);
            $this->load->library('upload', $config);
            if(@$_FILES['bukti']['name'] !=null) {
                if ( ! $this->upload->do_upload('bukti')){
                echo "Upload bukti gagal!!"; die();
            } else {
                $bukti =$this->upload->data('file_name');
            }
        }
    }

        $data = array(
            'kode'          => $kode,
            'jumlah'        => $jumlah,
            'jenis'         => $jenis,
            'untuk'         => $untuk,
            'penerima'      => $penerima,
            'bukti'         => $bukti,
            'createDate'    => $createDate
        );

        $whereBarang = array('id' => $id);

        if($jenis == 'Masuk') {
            $hasil = array(
                'stok' => $stok + $jumlah
            );
        } else {
            $hasil = array(
                'stok' => $stok - $jumlah
            );
        }

        $this->m_model->insert($data, 'tb_riwayat');
        $this->m_model->update($whereBarang, $hasil, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan!');
        redirect('admin/barang');
    }

    public function update()
    {
        $id     = $_POST['id'];
        $kode   = $_POST['kode'];
        $stok   = $_POST['stok'];

        $data = array(
            'kode' => $kode,
            'stok' => $stok
        );

        $where = array('id' => $id);

        $this->m_model->update($where, $data, 'tb_barang');
        $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
        redirect('admin/barang');
    }

    public function riwayat($id)
    {
        $where = array('id' => $id);

        $ambilKode = $this->m_model->get_where($where, 'tb_barang')->result();
        foreach ($ambilKode as $ablKd) {
            $kodeBarang = $ablKd->kode;
        }

        $data['kode'] = $kodeBarang;
        $whereKode = array('kode' => $kodeBarang);
        $data['riwayat'] = $this->m_model->get_where($whereKode, 'tb_riwayat')->result();
        $data['id'] = $id;
        $data['title'] = 'Riwayat Barang : ' . $kodeBarang;
        
        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar');
        $this->load->view('admin/riwayatBarang', $data);
        $this->load->view('admin/templates/footer');
    }

    public function printStokBarang()
    {
       $data['barang'] = $this->m_model->get('tb_barang')->result();
       $data['title'] = 'Cetak Stok Barang';

       $this->load->view('admin/cetakStokBarang', $data);
    }

    public function printRiwayatBarang($id)
    {
       $where = array('id' => $id);

       $ambilKode = $this->m_model->get_where($where, 'tb_barang')->result();
       foreach ($ambilKode as $ablKd) {
        $kodeBarang = $ablKd->kode;
       }

       $data['kode'] = $kodeBarang;
       $whereKode = array('kode' => $kodeBarang);
       $data['riwayat'] = $this->m_model->get_where($whereKode, 'tb_riwayat')->result();
       $data['jumlah'] = $this->m_model->get_where($whereKode, 'tb_riwayat')->num_rows();
       $data['title'] = 'Cetak Riwayat Stok Barang : ' . $kodeBarang;
       $data['id'] = $id;
       
       $this->load->view('admin/cetakRiwayatBarang', $data);
    }
}