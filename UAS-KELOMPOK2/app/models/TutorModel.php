<?php
class TutorModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function ambilsatututor($user)
    {
        $sql = "SELECT * FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        WHERE username='$user'";
        return $this->db->single($sql);
    }
    public function satututor($id)
    {
        return $this->db->single("SELECT * FROM tutor WHERE id='$id'");
    }
    public function ambilmapel($idtutor, $mapelnya)
    {
        $sql = "SELECT * FROM reservasi JOIN siswa ON id_siswa=siswa.id WHERE id_tutor=$idtutor AND mapel='$mapelnya'";
        return $this->db->result($sql);
    }
    public function cekterima($kolom, $id, $mapelnya)
    {
        $s = "SELECT * FROM reservasi WHERE $kolom='$id' AND mapel='$mapelnya'";
        return $this->db->single($s);
    }

    public function updetreservasi($id, $mapel, $val)
    {
        return $this->db->queryexecute("UPDATE reservasi SET diterima='$val' WHERE id_res=$id AND mapel='$mapel'");
    }
    public function uploadbukti($data, $user)
    {
        $ekstensifoto = pathinfo($data['buktibayar']['name'], PATHINFO_EXTENSION);
        $namanya = uniqid(3) . "." . $ekstensifoto;
        $dir = "../public/asset/tutor/buktibayar/";
        $sql = "UPDATE tutor SET buktibayar='$namanya' WHERE username='$user'";
        if ($this->db->queryexecute($sql) == 1)
            if (move_uploaded_file($data['buktibayar']['tmp_name'], $dir . $namanya)) return 1;
    }
}
