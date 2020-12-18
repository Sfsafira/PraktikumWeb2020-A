<?php

class AlamatModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function ambilkabupaten()
    {
        $sql = "SELECT * FROM kabupaten";
        return $this->db->result($sql);
    }
    public function ambilkecamatan($id)
    {
        $sql = "SELECT * FROM kecamatan WHERE id_kabupaten='$id'";
        return $this->db->result($sql);
    }
    public function ambilkelurahan($id)
    {
        $sql = "SELECT * FROM kelurahan WHERE id_kecamatan='$id'";
        return $this->db->result($sql);
    }
}
