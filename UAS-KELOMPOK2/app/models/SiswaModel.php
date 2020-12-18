<?php
class SiswaModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function ambildatatutor()
    {
        $sql = "SELECT * FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        WHERE tutor.status=1";
        return $this->db->result($sql);
    }

    public function ambilsatututor($username)
    {
        $sql = "SELECT * FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
        JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor 
        WHERE username='$username'";
        return $this->db->single($sql);
    }
    public function reservasi($data, $user)
    {
        $durasi = amankan($data['durasi']);
        $matapelajaran = amankan($data['matapelajaran']);
        $lokasibelajar = amankan($data['lokasibelajar']);
        $siswa = $this->db->single("SELECT id FROM siswa WHERE username='$user'");
        $idt = amankan($data['idtutor']);
        $sql = "INSERT INTO reservasi (id_siswa, id_tutor, durasi, mapel, lokasibelajar) VALUES (?, ?, ?, ?, ?)";
        $this->db->query($sql);
        $param = 'iisss';
        $values = [$siswa['id'], $idt, $durasi, $matapelajaran, $lokasibelajar];
        $this->db->bind($param, $values);
        if ($this->db->execute() == 1) return 1;
    }
    public function cekreservasi($data, $user)
    {
        $mapel = amankan($data['matapelajaran']);
        $siswa = $this->db->single("SELECT id FROM siswa WHERE username='$user'");
        $ids = $siswa['id'];
        $idtutor = amankan($data['idtutor']);
        $s = "SELECT * FROM reservasi WHERE id_siswa='$ids' AND id_tutor='$idtutor' AND mapel='$mapel'";
        return $this->db->single($s);
    }
    public function ambilreservasi($ids)
    {
        $sql = "SELECT * FROM reservasi JOIN tutor ON id_tutor=tutor.id WHERE id_siswa='$ids'";
        return $this->db->result($sql);
    }
    public function ambilsatudatasiswa($data, $kolom)
    {
        $sql = "SELECT * FROM siswa JOIN orangtuasiswa ON siswa.id=orangtuasiswa.id_siswa WHERE $kolom='$data'";
        return $this->db->single($sql);
    }
    public function satututordaerah($cari)
    {
        $cari = strtoupper($cari);
        $sql = "SELECT tutor.id,foto,nama,perkenalan,minatmapel,minatngajar, 
                kabupaten.`name` AS namakabupaten, 
                kecamatan.`name` AS namakecamatan, kelurahan.`name` AS namakelurahan
                FROM tutor JOIN riwayatpendidikan ON tutor.id=riwayatpendidikan.id_tutor 
                JOIN deskripsitutor ON tutor.id=deskripsitutor.id_tutor
                JOIN kabupaten ON tutor.kabupaten=kabupaten.id 
                JOIN kecamatan ON tutor.kecamatan=kecamatan.id 
                JOIN kelurahan ON tutor.kelurahan=kelurahan.id 
                WHERE kabupaten.`name`='$cari' OR kecamatan.`name`='$cari' OR kelurahan.`name`='$cari'";
        return $this->db->result($sql);
    }
    public function hapusreservasi($idnya)
    {
        if ($this->db->queryexecute("DELETE FROM reservasi WHERE id_res='$idnya'") == 1) return 1;
    }
    public function satusiswa($idnya)
    {
        return $this->db->single("SELECT * FROM siswa WHERE id='$idnya'");
    }
}
