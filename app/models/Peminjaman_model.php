<?php 

    class Peminjaman_model
    {
        private $table = 'peminjaman';
        private $tb;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getAllPeminjaman()
        {
            $query = "SELECT *, DATE_FORMAT(tanggal_peminjaman, '%d-%m-%Y') as tgl_pinjam, 
                        DATE_FORMAT(waktu_pinjam, '%d-%m-%Y') as waktu_pinjam FROM " . $this->table. "
                        INNER JOIN tb_mobil ON peminjaman.id_mobil = tb_mobil.id_mobil
                        INNER JOIN member ON peminjaman.id_member = member.id_member
                        INNER JOIN auth ON peminjaman.id_auth = auth.id_auth WHERE peminjaman.status = 0";

            $this->db->query($query);
            return $this->db->resultSet();
        }

        public function tambahPeminjaman($data)
        {
            $query = "INSERT INTO " . $this->table . "
                        VALUES
                            ('',:id_mobil,:nama_member,:tanggal_pinjam,:waktu_pinjam,:biaya_pinjam,:nama_pekerja,'0')
                            ;UPDATE tb_mobil SET status = 0 WHERE id_mobil = :id_mobil";

            $this->db->query($query);
            $this->db->bind('id_mobil',$data['id_mobil']);
            $this->db->bind('nama_member',$data['nama_member']);
            $this->db->bind('tanggal_pinjam',$data['tanggal_pinjam']);
            $this->db->bind('waktu_pinjam',$data['waktu_pinjam']);
            $this->db->bind('biaya_pinjam',$data['biaya_pinjam']);
            $this->db->bind('nama_pekerja',$data['nama_pekerja']);

            $this->db->execute();
            return $this->db->rowCount();
        }

        public function hapusPeminjaman($data)
        {
            $query = "DELETE FROM " . $this->table . "
                        WHERE id_peminjaman = :id";
            $this->db->query($query);
            $this->db->bind('id',$data);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function donePeminjaman($data,$data2)
        {
            $time = date('Y-m-d H:i:s');
            $query = "UPDATE " . $this->table . " SET status = 1 WHERE id_peminjaman = :id_peminjaman;
                        INSERT INTO pengembalian
                            VALUES
                        ('',:id_peminjaman,'$time');
                      Update tb_mobil SET status = 1 WHERE id_mobil = :id_mobil";
            $this->db->query($query);
            $this->db->bind('id_peminjaman',$data);
            $this->db->bind('id_mobil',$data2);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getSpcPeminjaman($id_peminjaman)
        {
            $query = "SELECT * FROM " . $this->table . "
                        INNER JOIN tb_mobil ON peminjaman.id_mobil = tb_mobil.id_mobil
                        INNER JOIN member ON peminjaman.id_member = member.id_member
                        INNER JOIN auth ON peminjaman.id_auth = auth.id_auth
                        WHERE id_peminjaman = :id";
            $this->db->query($query);
            $this->db->bind('id',$id_peminjaman);
            return $this->db->single();
        }

        public function editPeminjaman($data)
        {
            $query = "UPDATE " . $this->table ." 
                            SET
                        id_mobil = :id_mobil,
                        id_member = :nama_member,
                        biaya_peminjaman = :nominal,
                        tanggal_peminjaman = :tanggal_peminjaman,
                        waktu_pinjam = :waktu_pinjam
                        WHERE id_peminjaman = :id_peminjaman";
                        
            $this->db->query($query);
            $this->db->bind('nama_member',$data['nama_member']);
            $this->db->bind('nominal',$data['nominal']);
            $this->db->bind('tanggal_peminjaman',$data['tanggal_peminjaman']);
            $this->db->bind('waktu_pinjam',$data['waktu_pinjam']);
            $this->db->bind('id_peminjaman',$data['id_peminjaman']);
            $this->db->bind('id_mobil',$data['id_mobil']);
            $this->db->execute();
            
            if($data['id_mobil_peminjaman'] !== $data['id_mobil'])  {
                $query = "UPDATE tb_mobil SET status = 0 WHERE id_mobil = :id_mobil
                            ;UPDATE tb_mobil SET status = 1 WHERE id_mobil = :id_mobil_peminjaman";
                $this->db->query($query);
                $this->db->bind('id_mobil',$data['id_mobil']);
                $this->db->bind('id_mobil_peminjaman',$data['id_mobil_awal']);
                $this->db->execute();
            }

            return $this->db->rowCount();
        }

        public function searchPeminjaman()
        {
            if(($_POST['keyword']) != null && isset($_POST['keyword']))    {
                $keyword = $_POST['keyword'];
    
                $query = "SELECT *, DATE_FORMAT(tanggal_peminjaman, '%d-%m-%Y') as tgl_pinjam, 
                        DATE_FORMAT(waktu_pinjam, '%d-%m-%Y') as waktu_pinjam FROM " . $this->table. "
                        INNER JOIN tb_mobil ON peminjaman.id_mobil = tb_mobil.id_mobil
                        INNER JOIN member ON peminjaman.id_member = member.id_member
                        INNER JOIN auth ON peminjaman.id_auth = auth.id_auth WHERE peminjaman.status = 0 AND
                        tanggal_peminjaman LIKE :keyword OR
                        waktu_pinjam LIKE :keyword OR
                        biaya_peminjaman LIKE :keyword OR
                        tb_mobil.nama_mobil LIKE :keyword OR
                        auth.nama_pekerja LIKE :keyword OR 
                        member.nama LIKE :keyword";
        
                $this->db->query($query);
                $this->db->bind('keyword',"%$keyword%");
            } else {
                $this->getAllPeminjaman();
            }
            return $this->db->resultSet();
        }
    }

?>