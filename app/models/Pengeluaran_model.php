<?php 

    class Pengeluaran_model
    {
        private $table = "pengeluaran";
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }


        public function getAllPengeluaran()
        {
            $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->table . "
                INNER JOIN tb_mobil ON pengeluaran.id_mobil = tb_mobil.id_mobil WHERE riwayat=0";
            $this->db->query($query);
            return $this->db->resultSet();
        }

        public function tambahPengeluaran($data)
        {
            if($data['id_mobil']==NULL) {
                return false;
            }
            $query = "INSERT INTO " . $this->table . "
                    VALUES ('', :id_mobil,:type,:nominal,:tanggal_pengeluaran,'0')
                    ;UPDATE tb_mobil SET status = :type WHERE id_mobil = :id_mobil";
                    // double query
            $this->db->query($query);
            $this->db->bind('id_mobil',$data['id_mobil']);
            $this->db->bind('type',$data['type']);
            $this->db->bind('nominal',$data['nominal']);
            $this->db->bind('tanggal_pengeluaran',$data['tanggal_pengeluaran']);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function donePengeluaran($data,$id,$type)
        {
            if($type == 2) {
            $query = "UPDATE tb_mobil SET status = 1 WHERE id_mobil = :id_mobil
            ; UPDATE ". $this->table ." SET riwayat = 1 WHERE id_mobil = :id_mobil";
            $this->db->query($query);
            $this->db->bind('id_mobil',$data);
            $this->db->bind('id_pengeluaran',$id);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            $query = "DELETE FROM pengeluaran WHERE id_pengeluaran = :id_pengeluaran";
            $this->db->query($query);
            $this->db->bind('id_pengeluaran',$id);
            $this->db->execute();
            return $this->db->rowCount();
        }

        }

        public function getSpcPengeluaran($id_pengeluaran)
        {
            $query = "SELECT * FROM " . $this->table . "
                        INNER JOIN tb_mobil ON pengeluaran.id_mobil = tb_mobil.id_mobil
                        WHERE id_pengeluaran = :id";
            $this->db->query($query);
            $this->db->bind('id',$id_pengeluaran);
            return $this->db->single();
        }

        public function editPengeluaran($data)
    {
        $query = "UPDATE " . $this->table ." 
                        SET
                    id_mobil = :id_mobil,
                    type = :type,
                    nominal = :nominal,
                    tanggal_pengeluaran = :tanggal_pengeluaran
                    WHERE id_pengeluaran = :id_pengeluaran
                    ;UPDATE tb_mobil SET status = :type WHERE id_mobil = :id_mobil
                    ;UPDATE tb_mobil SET status = 1 WHERE id_mobil = :id_mobil_pengeluaran";
        $this->db->query($query);
        $this->db->bind('type',$data['type']);
        $this->db->bind('nominal',$data['nominal']);
        $this->db->bind('tanggal_pengeluaran',$data['tanggal_pengeluaran']);
        $this->db->bind('id_pengeluaran',$data['id_pengeluaran']);
        $this->db->bind('id_mobil',$data['id_mobil']);
        $this->db->bind('id_mobil_pengeluaran',$data['id_mobil_awal']);
        if($data['type_awal']==1 && $data['type']==2) {
            $query = "UPDATE tb_mobil SET status = 2 WHERE id_mobil = :id_mobil_pengeluaran
                        ;UPDATE ". $this->table ." SET type = :type WHERE id_mobil = :id_mobil";
            $this->db->query($query);
            $this->db->bind('id_mobil_pengeluaran',$data['id_mobil_awal']);
            $this->db->bind('id_mobil',$data['id_mobil']);
            $this->db->bind('type',$data['type']);
        }
        $this->db->execute();
        return $this->db->rowCount();
    }
    }

?>