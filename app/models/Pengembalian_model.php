<?php 

    class Pengembalian_model
    {
        private $table = 'pengembalian';
        private $relation = 'peminjaman';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getSpecifiedPengembalian()
        {
            $query = "SELECT * FROM " . $this->table . "
                        INNER JOIN " . $this->relation . " ON pengembalian.id_peminjaman = peminjaman.id_peminjaman 
                        INNER JOIN tb_mobil ON peminjaman.id_mobil = tb_mobil.id_mobil WHERE peminjaman.status = 1";
            $this->db->query($query);
            return $this->db->resultSet();
        }

        public function hapusPengembalian($id_pengembalian,$id_peminjaman)
        {
            $query = "DELETE FROM " . $this->table . " WHERE id_pengembalian = :id_pengembalian;
                      DELETE FROM " . $this->relation . " WHERE id_peminjaman = :id_peminjaman";
            $this->db->query($query);
            $this->db->bind('id_pengembalian',$id_pengembalian);
            $this->db->bind('id_peminjaman',$id_peminjaman);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getAllPengembalian()
        {
            $query = "SELECT * FROM ". $this->table ."";
            $this->db->query($query);
            $this->db->execute();
            return $this->db->resultSet();
        }
    }

?>