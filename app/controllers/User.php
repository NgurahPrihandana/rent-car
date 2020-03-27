<?php 

    class User extends Controller
    {

        public function index()
        {
            $data['judul'] = "Welcome Admin";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['pengembalian'] = $this->model('Pengembalian_model')->getAllPengembalian();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function member()
        {
            $data['judul'] = "Member Detail";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/member/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function table_view_member()
        {
            $data['judul'] = "Member Detail";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/member/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function cari_member()
        {
            $data['judul'] = "Member Detail";
            $data['as'] = $this->model('Member_model')->searchMember();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/member/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function detail_member($id)
        {
            $data['judul'] = "Welcome Admin";
            $data['getSpcMember'] = $this->model('Member_model')->getSpcMember($id);
            $data['spcMemberPeminjaman'] = $this->model('User_model')->getSpcMemberPeminjaman($id);
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/member/detail_member',$data);
            $this->view('templates/user/footer',$data);
        }

        public function pekerja()
        {
            $data['judul'] = "Detail Pekerja";
            $data['auth'] = $this->model('Auth_model')->getAllAuth();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/pekerja/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function hapus_pekerja($id_pekerja)
        {
            if($this->model('User_model')->hapusPekerja($id_pekerja) > 0) {
                Flasher::setFlash('berhasil','dihapus','success');
                header('Location:' . BASEURL . '/user/pekerja/index');
            } else {
                Flasher::setFlash('gagal','dihapus','danger');
                header('Location:' . BASEURL . '/user/pekerja/index');
            };
        }

        public function mobil()
        {
            $data['judul'] = "Detail Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/mobil/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function table_view_mobil()
        {
            $data['judul'] = "Detail Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/mobil/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function cari_mobil()
        {
            $data['judul'] = "Detail Mobil";
            $data['mobil'] = $this->model('Mobil_model')->searchMobil();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/mobil/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function hapus_mobil($id_mobil,$function)
        {
            if($this->model('Mobil_model')->hapusMobil($id_mobil) > 0) {
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/user/'.$function.'');
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/user/'.$function.'');
            }
        }

        public function detail_mobil($id_mobil)
        {
            $data['judul'] = "Detail Mobil";
            $data['spcDetailMobil'] = $this->model('User_model')->getSpcDetailMobil($id_mobil);
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['spcDetailService'] = $this->model('User_model')->getSpcDetailService($id_mobil);
            $data['spcDetailSamsat'] = $this->model('User_model')->getSpcDetailSamsat($id_mobil);
            $data['spcMobilPeminjaman'] = $this->model('User_model')->getSpcMobilPeminjaman($id_mobil);
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/mobil/detail_mobil',$data);
            $this->view('templates/user/footer',$data);
        }

        public function pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaran();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/pengeluaran/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function cari_pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->searchPengeluaran();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/pengeluaran/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function detail_pengeluaran($id_pengeluaran)
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['getSpcPengeluaran'] = $this->model('Pengeluaran_model')->getSpcPengeluaran($id_pengeluaran);
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/pengeluaran/detail_pengeluaran',$data);
            $this->view('templates/user/footer',$data);
        }

        public function table_view_pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaran();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/pengeluaran/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function history_pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['history_pengeluaran'] = $this->model('Pengeluaran_model')->getAllHistoryPengeluaran();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/history_pengeluaran/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function detail_history_pengeluaran($id_done_pengeluaran)
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['spc_history_pengeluaran'] = $this->model('Pengeluaran_model')->getSpcHistoryPengeluaran($id_done_pengeluaran);
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/history_pengeluaran/detail_history_pengeluaran',$data);
            $this->view('templates/user/footer',$data);
        }

        public function cari_history_pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['history_pengeluaran'] = $this->model('Pengeluaran_model')->searchHistoryPengeluaran();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/history_pengeluaran/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function hapus_history_pengeluaran($id_done_pengeluaran,$function)
        {
            if($this->model('pengeluaran_model')->hapusHistoryPengeluaran($id_done_pengeluaran) > 0) {
                Flasher::setFlash('berhasil','dihapus','success');
                header('Location:' . BASEURL . '/user/'.$function.'');
            } else {
                Flasher::setFlash('gagal','dihapus','danger');
                header('Location:' . BASEURL . '/user/'.$function.'');
            };
        }

        public function table_view_history_pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['history_pengeluaran'] = $this->model('Pengeluaran_model')->getAllHistoryPengeluaran();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/history_pengeluaran/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function peminjaman()
        {
            $data['judul'] = "Peminjaman Mobil";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['auth'] = $this->model('Auth_model')->getAllAuth();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/peminjaman/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function table_view_peminjaman()
        {
            $data['judul'] = "Peminjaman Mobil";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['auth'] = $this->model('Auth_model')->getAllAuth();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/peminjaman/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function cari_peminjaman()
        {
            $data['judul'] = "Peminjaman Mobil";
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['jenis'] = $this->model('Mobil_model')->getAllJenis();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['peminjaman'] = $this->model('Peminjaman_model')->searchPeminjaman();
            $data['auth'] = $this->model('Auth_model')->getAllAuth();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/peminjaman/table_view',$data);
            $this->view('templates/user/footer',$data);
        }

        public function detail_peminjaman($id)
        {
            $data['judul'] = 'Ubah Data Peminjaman';
            $data['getSpcPeminjaman'] = $this->model('Peminjaman_model')->getSpcPeminjaman($id);
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/peminjaman/detail_peminjaman',$data);
            $this->view('templates/user/footer',$data);
        }

        public function pengembalian()
        {
            $data['judul'] = 'Pengembalian';
            $data['as'] = $this->model('Member_model')->getAllMember();
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['pengeluaran'] = $this->model('Pengeluaran_model')->getAllPengeluaran();   
            $data['peminjaman'] = $this->model('Peminjaman_model')->getAllPeminjaman();
            $data['spc_mobil_kembali'] = $this->model('Pengembalian_model')->getSpecifiedPengembalian();
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/pengembalian/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function range_history_pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['history_pengeluaran'] = $this->model('Pengeluaran_model')->getAllHistoryPengeluaranByRange();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/history_pengeluaran/index',$data);
            $this->view('templates/user/footer',$data);
        }

        public function data_view_range_history_pengeluaran()
        {
            $data['judul'] = "Pengeluaran Mobil";
            $data['mobil'] = $this->model('Mobil_model')->getAllMobil();
            $data['spc_mobil'] = $this->model('Mobil_model')->getSpecifiedMobil();
            $data['history_pengeluaran'] = $this->model('Pengeluaran_model')->getAllHistoryPengeluaranByRange();
            $data['function'] = __FUNCTION__;
            $this->view('templates/user/header',$data);
            $this->view('templates/user/sidebar',$data);
            $this->view('templates/topbar',$data);
            $this->view('user/history_pengeluaran/table_view',$data);
            $this->view('templates/user/footer',$data);
        }
    }



?>