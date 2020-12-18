<?php
class AdminModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function ambildatatutor()
    {
        $sql = "SELECT *, `user`.profileLengkap, `user`.verif FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        JOIN `user` USING(username)";
        return $this->db->result($sql);
    }
    public function ambilsatu($id, $table, $kolom)
    {
        $sql = "SELECT * FROM $table WHERE $kolom='$id'";
        return $this->db->single($sql);
    }
    public function ambilsatututor($id)
    {
        $sql = "SELECT *, kabupaten.name AS namakab,  kecamatan.name AS namakec, kelurahan.name AS namakel 
        FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        JOIN kabupaten ON tutor.kabupaten=kabupaten.id 
        JOIN kecamatan ON tutor.kecamatan=kecamatan.id 
        JOIN kelurahan ON tutor.kelurahan=kelurahan.id 
        WHERE tutor.id='$id'";
        return $this->db->single($sql);
    }
    public function veriftutor($user, $data)
    {
        $sql = "UPDATE user SET verif=$data WHERE username='$user'";
        if ($this->db->queryexecute($sql) == 1) return 1;
    }
    public function ambildatasiswa()
    {
        $sql = "SELECT * FROM siswa JOIN orangtuasiswa ON siswa.id=orangtuasiswa.id_siswa";
        return $this->db->result($sql);
    }
    public function verifstatus($data, $id)
    {
        return $this->db->queryexecute("UPDATE tutor SET status='$data' WHERE id='$id'");
    }
    public function hapustutor($id)
    {
        $dirijasah = "../public/asset/tutor/ijasah/";
        $ij = $this->db->single("SELECT ijasah FROM riwayatpendidikan WHERE id_tutor='$id'");
        $ijasah = $ij['ijasah'];
        if (unlink($dirijasah . $ijasah))
            if ($this->db->queryexecute("DELETE FROM riwayatpendidikan WHERE id_tutor='$id'") == 1)
                if ($this->db->queryexecute("DELETE FROM deskripsitutor WHERE id_tutor='$id'") == 1) {
                    $tmp = $this->db->single("SELECT * FROM tutor WHERE id='$id'");
                    $dirfoto = "../public/asset/tutor/foto/";
                    $user = $tmp['username'];
                    $foto = $tmp['foto'];
                    if (unlink($dirfoto . $foto))
                        if ($this->db->queryexecute("DELETE FROM tutor WHERE id='$id'") == 1) {
                            if ($this->db->queryexecute("DELETE FROM user WHERE username='$user'") == 1) return 1;
                        }
                }
    }
}
