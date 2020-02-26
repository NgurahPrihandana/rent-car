<?php 

    class Dashboard extends Controller
    {
        public function index() {
            $data['judul'] = 'Dashboard';
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['pengembalian'] = $this->model('Pengembalian_model')->getAllPengembalian();
            $this->view('templates/header', $data);
            $this->view('templates/sidebar');
            $this->view('templates/topbar',$data);
            $this->view('dashboard/index',$data);
            $this->view('templates/footer');
        }
    }

?>