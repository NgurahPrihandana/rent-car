<?php 

    class Mobil_model {
        private $table = 'tb_mobil';
        private $jenis = 'jenis_mobil';
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }

        public function getAllMobil()
        {
        $query ="SELECT * FROM  " . $this->table . "
                    INNER JOIN jenis_mobil ON tb_mobil.id_jenis_mobil = jenis_mobil.id_jenis_mobil";
        
        $this->db->query($query);

            return $this->db->resultSet();
        }

        public function getSpecifiedMobil()
        {
            $query = "SELECT * FROM " . $this->table . " WHERE status = 1";
            $this->db->query($query);
            return $this->db->resultSet();
        }

        public function getAllJenis()
        {
            $this->db->query("SELECT * FROM " . $this->jenis);
            return $this->db->resultSet();
        }

        public function tambahMobil($data)
        {
            $query = "INSERT INTO " . $this->table . "
                        VALUES
                            ('',:jenis_mobil,:nama_mobil,:plat,1)";

            $this->db->query($query);
            $this->db->bind('nama_mobil',$data['nama_mobil']);
            $this->db->bind('jenis_mobil',$data['jenis_mobil']);
            $this->db->bind('plat',$data['plat']);

            $this->db->execute();
            return $this->db->rowCount();
        }

        public function hapusMobil($data)
        {
            $query = "DELETE FROM " . $this->table . "
                        WHERE id_mobil = :id
                        ;DELETE FROM pengeluaran WHERE id_mobil = :id
                        ;DELETE FROM peminjaman WHERE id_mobil = :id
            ";

            $this->db->query($query);
            $this->db->bind('id',$data);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function getSpcMobil($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_mobil = :id_mobil";
        $this->db->query($query);
        $this->db->bind('id_mobil',$id);
        return $this->db->single();
    }

    public function editMobil($data)
    {
        $query = "UPDATE " . $this->table ." 
                        SET
                    nama_mobil = :nama_mobil,
                    plat = :plat,
                    id_jenis_mobil = :id_jenis_mobil
                    WHERE id_mobil = :id_mobil";
        $this->db->query($query);
        $this->db->bind('nama_mobil',$data['nama_mobil']);
        $this->db->bind('plat',$data['plat']);
        $this->db->bind('id_jenis_mobil',$data['jenis_mobil']);
        $this->db->bind('id_mobil',$data['id_mobil']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function searchMobil()   {

        $keyword = $_POST['keyword'];
        
        $query ="SELECT * FROM  " . $this->table . "
                    INNER JOIN jenis_mobil ON tb_mobil.id_jenis_mobil = jenis_mobil.id_jenis_mobil WHERE 
                    nama_mobil LIKE :keyword OR
                    jenis_mobil LIKE :keyword OR
                    plat LIKE :keyword ";

        $this->db->query($query);
        $this->db->bind('keyword',"%$keyword%");

        return $this->db->resultSet();
    }

        
    }

?>