<?php 

    class User_model
    {
        private $table = 'peminjaman';
        private $table_user = 'auth';
        private $tb;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getSpcMemberPeminjaman($id)
        {
            $query = "SELECT *, DATE_FORMAT(tanggal_peminjaman, '%d-%m-%Y') as tgl_pinjam, 
                        DATE_FORMAT(waktu_pinjam, '%d-%m-%Y') as waktu_pinjam FROM " . $this->table. 
                        " WHERE peminjaman.status = 1 AND peminjaman.id_member = :id";
            $this->db->query($query);
            $this->db->bind('id',$id);
            return $this->db->resultSet();
        }

        public function hapusPekerja($id_pekerja)
        {
            $query = "DELETE FROM " . $this->table_user . " WHERE id_auth = :id_pekerja";
            $this->db->query($query);
            $this->db->bind('id_pekerja',$id_pekerja);
            $this->db->execute();
            return $this->db->rowCount();
        }
    }



?>