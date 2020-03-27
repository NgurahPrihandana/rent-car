<?php 

    class Pengeluaran_model
    {
        private $table = "pengeluaran";
        private $done_table = "tb_done_pengeluaran";
        private $db;

        public function __construct()
        {
            $this->db = new Database;
        }


        public function getAllPengeluaran()
        {
            $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->table . "
                INNER JOIN tb_mobil ON pengeluaran.id_mobil = tb_mobil.id_mobil";
            $this->db->query($query);
            return $this->db->resultSet();
        }

        public function tambahPengeluaran($data)
        {
            if($data['id_mobil']==NULL) {
                return false;
            }
            $query = "INSERT INTO " . $this->table . "
                    VALUES ('', :id_mobil,:type,:nominal,:tanggal_pengeluaran)
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

        public function hapusPengeluaran($id_pengeluaran)
        {
            $query = "DELETE FROM " . $this->table . " WHERE id_pengeluaran = :id_pengeluaran";
            $this->db->query($query);
            $this->db->bind('id_pengeluaran',$id_pengeluaran);
            $this->db->execute();
            return $this->db->rowCount();
        }

        public function donePengeluaran($data,$id,$type)
        {
            $ambil = $this->getSpcPengeluaran($id);
            $time = date('Y-m-d H:i:s');
            
            if($type == 2) {
            $query = "UPDATE tb_mobil SET status = 1 WHERE id_mobil = :id_mobil
                        ;INSERT INTO " . $this->done_table . " VALUES
                        ('', :id_mobil, :type, :nominal, :tanggal_pengeluaran,'$time')
                        ;DELETE FROM " . $this->table . " WHERE id_pengeluaran = :id_pengeluaran";

            $this->db->query($query);
            $this->db->bind('id_mobil',$data);
            $this->db->bind('type',$ambil['type']);
            $this->db->bind('nominal',$ambil['nominal']);
            $this->db->bind('tanggal_pengeluaran',$ambil['tanggal_pengeluaran']);
            $this->db->bind('id_pengeluaran',$id);
            $this->db->execute();
            return $this->db->rowCount();
        } else {
            $query = "INSERT INTO " . $this->done_table . " VALUES
                        ('', :id_mobil, :type, :nominal, :tanggal_pengeluaran,'$time')
                        ;DELETE FROM " . $this->table . " WHERE id_pengeluaran = :id_pengeluaran";

            $this->db->query($query);
            $this->db->bind('id_mobil',$data);
            $this->db->bind('type',$ambil['type']);
            $this->db->bind('nominal',$ambil['nominal']);
            $this->db->bind('tanggal_pengeluaran',$ambil['tanggal_pengeluaran']);
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

    public function searchPengeluaran() {
        if(($_POST['keyword']) != null && isset($_POST['keyword']))    {
            $keyword = $_POST['keyword'];

            $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->table . "
                    INNER JOIN tb_mobil ON pengeluaran.id_mobil = tb_mobil.id_mobil WHERE 
                    nama_mobil LIKE :keyword OR
                    tanggal_pengeluaran LIKE :keyword OR
                    nominal LIKE :keyword";
    
            $this->db->query($query);
            $this->db->bind('keyword',"%$keyword%");
        } else {
            $this->getAllPengeluaran();
        }
        return $this->db->resultSet();
    }

    public function getAllHistoryPengeluaran()
    {
        $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->done_table . "
                INNER JOIN tb_mobil ON tb_done_pengeluaran.id_mobil = tb_mobil.id_mobil";
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getSpcHistoryPengeluaran($id_done_pengeluaran)
    {
        $query = "SELECT * FROM " . $this->done_table . "
                        INNER JOIN tb_mobil ON tb_done_pengeluaran.id_mobil = tb_mobil.id_mobil
                        WHERE id_done_pengeluaran = :id";
        $this->db->query($query);
        $this->db->bind('id',$id_done_pengeluaran);
        return $this->db->single();
    }

    public function searchHistoryPengeluaran()
    {
        if(($_POST['keyword']) != null && isset($_POST['keyword']))    {
            $keyword = $_POST['keyword'];

            $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->done_table . "
                    INNER JOIN tb_mobil ON tb_done_pengeluaran.id_mobil = tb_mobil.id_mobil WHERE 
                    nama_mobil LIKE :keyword OR
                    tanggal_pengeluaran LIKE :keyword OR
                    nominal LIKE :keyword";
    
            $this->db->query($query);
            $this->db->bind('keyword',"%$keyword%");
        } else {
            $this->getAllHistoryPengeluaran();
        }
        return $this->db->resultSet();
    }

    public function hapusHistoryPengeluaran($id_done_pengeluaran)
    {
        $query = "DELETE FROM " . $this->done_table . " WHERE id_done_pengeluaran = :id_done_pengeluaran";
        $this->db->query($query);
        $this->db->bind('id_done_pengeluaran',$id_done_pengeluaran);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllHistoryPengeluaranByRange()
    {
        if(isset($_POST['submit']) && $_POST['submit']== 'range_view'){
            $tanggal_awal = $_POST['tanggal_awal'];
            $tanggal_akhir = $_POST['tanggal_akhir'];
            // Input hanya tanggal awal
            if(!empty($tanggal_awal) && empty($tanggal_akhir)) {
            $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->done_table . "
                INNER JOIN tb_mobil ON tb_done_pengeluaran.id_mobil = tb_mobil.id_mobil WHERE
                tanggal_pengeluaran >= :tanggal_awal
                ";

            $this->db->query($query);
            $this->db->bind('tanggal_awal',$tanggal_awal);
            }
            // Input hanya tanggal akhir
            if(empty($tanggal_awal) && !empty($tanggal_akhir)) {
            $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->done_table . "
                INNER JOIN tb_mobil ON tb_done_pengeluaran.id_mobil = tb_mobil.id_mobil WHERE
                tanggal_pengeluaran <= :tanggal_akhir AND :tanggal_akhir
                ";

            $this->db->query($query);
            $this->db->bind('tanggal_akhir',$tanggal_akhir);
            }
            // Input adalah tanggal awal & akhir
            if(!empty($tanggal_awal) && !empty($tanggal_akhir)) {
            $query = "SELECT *,DATE_FORMAT(tanggal_pengeluaran,'%d-%m-%Y') as tanggal_pengeluaran FROM " . $this->done_table . "
                INNER JOIN tb_mobil ON tb_done_pengeluaran.id_mobil = tb_mobil.id_mobil WHERE
                tanggal_pengeluaran BETWEEN :tanggal_awal AND :tanggal_akhir
                ";
            $this->db->query($query);
            $this->db->bind('tanggal_awal',$tanggal_awal);
            $this->db->bind('tanggal_akhir',$tanggal_akhir);
            }
            // Input kosong tampilkan data default
            if(empty($tanggal_awal) && empty($tanggal_akhir)) {
                $this->getAllHistoryPengeluaran();
            } 
            
        }
        return $this->db->resultSet();
        
    }
    
    


    }

?>