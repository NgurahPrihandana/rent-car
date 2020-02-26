<?php

class Member_model {

    private $table = 'member';
    private $db;

    public function __construct() 
    {
        $this->db = new Database;
    }

    public function getAllMember() 
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMemberById($id) 
    {
        $this->db->query("SELECT * FROM " . $this->table . "WHERE id = :id");
        $this->db->bind('id',$id);
        return $this->db->single();
    }

    public function tambahMember($data) 
    {
        $query = "INSERT INTO member 
                VALUES
                    ('', :nama, :nomor_ktp, :alamat, :tanggal_lahir)";
        $this->db->query($query);
        $this->db->bind('nama',$data['nama']);
        $this->db->bind('nomor_ktp',$data['nomor_ktp']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('tanggal_lahir',$data['tanggal_lahir']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusMember($id) 
    {
        $query = "DELETE FROM member WHERE id_member = :id";
        $this->db->query($query);
        $this->db->bind('id',$id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getSpcMember($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id_member = :id_member";
        $this->db->query($query);
        $this->db->bind('id_member',$id);
        return $this->db->single();
    }

    public function editMember($data)
    {
        $query = "UPDATE " . $this->table ." 
                        SET
                    nama = :nama_member,
                    nomor_ktp = :nomor_ktp,
                    alamat = :alamat,
                    tanggal_lahir = :tanggal_lahir
                    WHERE id_member = :id_member";
        $this->db->query($query);
        $this->db->bind('nama_member',$data['nama_member']);
        $this->db->bind('nomor_ktp',$data['nomor_ktp']);
        $this->db->bind('alamat',$data['alamat']);
        $this->db->bind('tanggal_lahir',$data['tanggal_lahir']);
        $this->db->bind('id_member',$data['id_member']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }




}