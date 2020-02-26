<?php 

class Pengeluaran extends Controller
{
    public function index()
    {
        $data['judul'] = 'Pengeluaran';
        $data['as'] = $this->model('Member_model')->getAllMember();
        $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
        $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
        $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaran();   
        $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('templates/header',$data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/topbar',$data);
        $this->view('pengeluaran/index',$data);
        $this->view('templates/footer',$data);
    }

    public function tambah()
    {
        if($this->model('Pengeluaran_model')->tambahPengeluaran($_POST) > 0){
            Flasher::setFlash("berhasil","ditambahkan","succes");
            header("Location: " . BASEURL . "/pengeluaran");
        }else {
            Flasher::setFlash("gagal","ditambahkan","danger");
            header("Location: " . BASEURL . "/pengeluaran");
        }
    }

    public function hapus($id)
    {
        if($this->model('Pengeluaran_model')->hapusPengeluaran($id) > 0) {
            Flasher::setFlash("berhasil","ditambahkan","success");
            header("Location: " . BASEURL . "/pengeluaran");
        }else {
            Flasher::setFlash("gagal","ditambahkan","danger");
            header("Location: " . BASEURL . "/pengeluaran");
        }
    }

    public function done($id,$id_pengeluaran,$type)
    {
        if($this->model('Pengeluaran_model')->donePengeluaran($id,$id_pengeluaran,$type) > 0) {
            Flasher::setFlash("berhasil","diselesaikan","success");
            header("Location: " . BASEURL . "/pengeluaran");
        } else {
            Flasher::setFlash("gagal","diselesaikan","danger");
            header("Location: " . BASEURL . "/pengeluaran");
        }
    }

    public function edit($id)
    {
        $data['judul'] = 'Ubah Data Pengeluaran';
        $data['getSpcPengeluaran'] = $this->model('Pengeluaran_model')->getSpcPengeluaran($id);
        $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
        $this->view('templates/header',$data);
        $this->view('templates/sidebar',$data);
        $this->view('templates/topbar',$data);
        $this->view('pengeluaran/edit',$data);
        $this->view('templates/footer',$data);
    }

    public function runEdit() {
        if($this->model('Pengeluaran_model')->editPengeluaran($_POST) > 0) {
            Flasher::setFlash('berhasil','dirubah','success');
            header('Location: ' . BASEURL . "/pengeluaran");  
        } else {
            Flasher::setFlash('gagal','dirubah','danger');
            header('Location: ' . BASEURL . "/pengeluaran");
        }
    }
    
}

?>