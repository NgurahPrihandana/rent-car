<?php 

    class Pengembalian extends Controller
    {
        public function index()
        {
            $data['judul'] = 'Pengembalian';
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaran();   
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['spc_mobil_kembali'] = $this->model('Pengembalian_model')->getSpecifiedPengembalian();
            $this->view('templates/header',$data);
            $this->view('templates/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('pengembalian/index',$data);
            $this->view('templates/footer',$data);
        }

        public function hapus($id_pengembalian,$id_peminjaman)
        {
            if($this->model('Pengembalian_model')->hapusPengembalian($id_pengembalian,$id_peminjaman) > 0) {
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/pengembalian');
                  }else {
                      header('Location:' .BASEURL. '/user/pengembalian');
                  }
            } else {
                if($_SESSION['role'] == "2")  {
                    header('Location: ' . BASEURL . '/pengembalian');
                  }else {
                      header('Location:' .BASEURL. '/user/pengembalian');
                  }
            }
        }

        
    }

?>