<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cangga extends CI_Controller {


    public function __construct()
    {
        parent::__construct();
        //load model yg angga buat
        $this->load->model('Mangga');
     }

    //  public $data = array(
    //      "nim" => "Nim Kalian",
    //      "nama" => "Isi Nama Kalian",
    //      "kampus"=>"Telkom University"
    //  );

   public function index()
   {
       
       $data_obat = $this->Mangga->Getobat();
       // load view obat di index
       $this->load->view('Admin/Anggaobat',['data' => $data_obat]);
   }

   public function penyakit()
   {
       $data_penyakit = $this->Mangga->Getpenyakit();
       $this->load->view('Admin/anggapenyakit',['data'=>$data_penyakit]);
   }

   public function artikel()
   {
    $data_artikel = $this->Mangga->Getartikel();
    $this->load->view('Admin/anggaartikel',['data'=>$data_artikel]);
   }


   #lengkapi FUNCTION BERIKUT
   public function hapusobat($id)
   {
       $this->Mangga->delobat($id);
       redirect('/cangga/');	
   }

   public function hapuspenyakit($id)
   {
       $this->Mangga->delsakit($id);
       redirect('/cangga/penyakit');	
   }

   public function hapusartikel($id)
   {
       $this->Mangga->delartikel($id);
       redirect('/cangga/artikel');	
   }


   public function tambahobat()
   {
       $nama = $this->input->post('nama');
       $deskripsi = $this->input->post('deskripsi');
       $data = array(
           'nama' => $deskripsi,
           'deskripsi' => $deskripsi,
       );
       $this->Mangga->tambahobat($data);

       redirect('cangga');	

   }

   public function tambahsakit()
   {
       $nama = $this->input->post('nama');
       $gejala = $this->input->post('gejala');
       $tindakan = $this->input->post('tindakan');
       $data = array(
           'nama' => $nama,
           'gejala' => $gejala,
           'tindakan' => $tindakan,
       );
       $this->Mangga->tambahsakit($data);

       redirect('/cangga/penyakit');	

   }


   public function tambahartikel()
   {
       $judul = $this->input->post('judul');
       $penulis = $this->input->post('penulis');
       $isi = $this->input->post('isi');
       $data = array(
           'judul' => $judul,
           'penulis' => $penulis,
           'isi' => $isi,
       );
       $this->Mangga->tambahartikel($data);

       redirect('/cangga/artikel');	

   }


   public function editobat()
   {
       $id = $this->input->post('idx');
       $nama = $this->input->post('nama');
       $deskripsi = $this->input->post('deskripsi');
       $data = array(
           'nama' => $nama,
           'deskripsi' => $deskripsi,
       );
       $this->Mangga->editobat($id,$data);

       redirect('/cangga/');	
   }


   public function editsakit()
   {
       $id = $this->input->post('idx');
       $nama = $this->input->post('nama');
       $gejala = $this->input->post('gejala');
       $tindakan = $this->input->post('tindakan');
       $data = array(
           'nama' => $nama,
           'gejala' => $gejala,
           'tindakan' => $tindakan,
       );
       $this->Mangga->editsakit($id,$data);

       redirect('/cangga/penyakit');	
   }

   public function editartikel()
   {
       $id = $this->input->post('idx');
       $judul = $this->input->post('judul');
       $penulis = $this->input->post('penulis');
       $isi = $this->input->post('isi');
       $data = array(
           'judul' => $judul,
           'penulis' => $penulis,
           'isi'=>$isi,
       );
       $this->Mangga->editartikel($id,$data);

       redirect('/cangga/artikel');	
   }
}

?>