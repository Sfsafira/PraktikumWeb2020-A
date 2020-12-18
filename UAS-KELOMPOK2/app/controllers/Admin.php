<?php
// session_start();
class Admin extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'admin/dashboard');
    }

    public function dashboard()
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data['tutor'] = $this->model('AdminModel')->ambildatatutor();
        $data['siswa'] = $this->model('AdminModel')->ambildatasiswa();
        $this->view("admin/header");
        $this->view("admin/index", $data);
        $this->view("admin/footer");
    }
    public function tutor()
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data['tutor'] = $this->model('AdminModel')->ambildatatutor();
        $this->view("admin/header");
        $this->view("admin/tutor", $data);
        $this->view("admin/footer");
    }
    public function siswa()
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data['siswa'] = $this->model('AdminModel')->ambildatasiswa();
        $this->view("admin/header");
        $this->view("admin/siswa", $data);
        $this->view("admin/footer");
    }
    public function fototutor($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data = $this->model('AdminModel')->ambilsatu($id, 'tutor', 'id');
        if ($data['foto']) {
            echo '<img src="' . BASEURL . 'asset/tutor/foto/' . $data['foto'] . '" width="80%">';
        }
    }
    public function ijasahtutor($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data = $this->model('AdminModel')->ambilsatu($id, 'riwayatpendidikan', 'id_riwayat');
        if ($data['ijasah']) {
            echo '<iframe src="' . BASEURL . 'asset/tutor/ijasah/' . $data['ijasah'] . '#toolbar=0" height="500px" width="100%"></iframe>';
        }
    }
    public function buktibayartutor($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data = $this->model('AdminModel')->ambilsatu($id, 'tutor', 'id');
        if ($data['buktibayar']) {
            $text[0] = '<div class="text-center"><img src="' . BASEURL . 'asset/tutor/buktibayar/' . $data['buktibayar'] . '" width="70%"></div>';
            if ($data['status'] == '0')
                $text[1] = '
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="statustutor/' . $data['id'] . '" class="konfirm">
                        <button onclick="veriftutor()" class="btn btn-primary">Konfirmasi</button>
                    </a>
                ';
            else
                $text[1] = '
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="batalstatustutor/' . $data['id'] . '" class="konfirm">
                        <button onclick="veriftutor()" class="btn btn-danger">Batal Konfirmasi</button>
                    </a>
                ';
            echo json_encode($text);
        }
    }
    public function detailtutor($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data = $this->model('AdminModel')->ambilsatututor($id);
        $user = $this->model('Auth_model')->maumasuk($data['username']);
        if ($data) {
            $oke[0] =  '
                <table style="width: 100%;">
                    <tr>
                        <td><b>Nama Lengkap</b></td>
                        <td>:</td>
                        <td>' . $data['nama'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Jenis Kelamin</b></td>
                        <td>:</td>
                        <td>' . $data['jk'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Tempat Lahir</b></td>
                        <td>:</td>
                        <td>' . $data['tempatlahir'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Tanggal Lahir</b></td>
                        <td>:</td>
                        <td>' . $data['tanggallahir'] . '</td>
                    </tr>
                    <tr>
                        <td><b>No. Telepon</b></td>
                        <td>:</td>
                        <td>' . $data['notlp'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Alamat</b></td>
                        <td>:</td>
                        <td>' . $data['alamat'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Pendidikan Terakhir</b></td>
                        <td>:</td>
                        <td>' . $data['pendidikan_terakhir'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Perguruan Tinggi</b></td>
                        <td>:</td>
                        <td>' . $data['perguruan_tinggi'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Program Studi</b></td>
                        <td>:</td>
                        <td>' . $data['prodi'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Pengalaman</b></td>
                        <td>:</td>
                        <td>' . $data['pengalaman'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Minat Mengajar</b></td>
                        <td>:</td>
                        <td>' . $data['minatngajar'] . '</td>
                    </tr>
                    <tr>
                        <td><b>Minat Mata Pelajaran</b></td>
                        <td>:</td>
                        <td>' . $data['minatmapel'] . '</td>
                    </tr>
                    <tr>
                    </tr>
                </table>
            ';
            if ($user['profileLengkap'] != 4)
                $ok[1] = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
            else if ($user['verif'] == '0')
                $oke[1] = '
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="verifikasitutor/' . $user['username'] . '" class="konfirm">
                        <button onclick="veriftutor()" class="btn btn-primary">Konfirmasi</button>
                    </a>
                ';
            else
                $oke[1] = '
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="batalverifikasitutor/' . $user['username'] . '" class="konfirm">
                        <button onclick="veriftutor()" class="btn btn-danger">Batal Konfirmasi</button>
                    </a>
                ';
            echo json_encode($oke);
        }
    }
    public function verifikasitutor($user)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        if ($this->model('AdminModel')->veriftutor($user, 1) == 1) echo "Sukses";
        else echo "Gagal";
    }
    public function batalverifikasitutor($user)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        if ($this->model('AdminModel')->veriftutor($user, 0) == 1) echo "Sukses";
        else echo "Gagal";
    }
    public function statustutor($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        if ($this->model('AdminModel')->verifstatus(1, $id) == 1) echo "Sukses";
        else echo "Gagal";
    }
    public function batalstatustutor($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        if ($this->model('AdminModel')->verifstatus(0, $id) == 1) echo "Sukses";
        else echo "Gagal";
    }
    public function hapustutor($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        if ($this->model('AdminModel')->hapustutor($id) == 1) echo "Sukses";
        else echo "Gagal";
    }
    public function detailsiswa($id)
    {
        if ($this->cekrolenya(1)) {
            header('Location: ' . BASEURL);
            die;
        }
        $siswa = $this->model('SiswaModel')->ambilsatudatasiswa($id, 'id');
        if ($siswa) {
            $kata = '
            <table style="width: 980px;">
                <tr>
                    <td rowspan="15" width="250px">
                        <img src="' . BASEURL . 'asset/siswa/foto/' . $siswa['foto'] . '" width="200px" />
                    </td>
                </tr>
                <tr>
                    <td><b>Nama Lengkap</b></td>
                    <td>:</td>
                    <td>' . $siswa['nama'] . '</td>
                </tr>
                <tr>
                    <td><b>Jenis Kelamin</b></td>
                    <td>:</td>
                    <td>' . $siswa['jk'] . '</td>
                </tr>
                <tr>
                    <td><b>Tempat Lahir</b></td>
                    <td>:</td>
                    <td>' . $siswa['tempatlahir'] . '</td>
                </tr>
                <tr>
                    <td><b>Tanggal Lahir</b></td>
                    <td>:</td>
                    <td>' . $siswa['tanggallahir'] . '</td>
                </tr>
                <tr>
                    <td><b>No. Telepon</b></td>
                    <td>:</td>
                    <td>' . $siswa['notlp'] . '</td>
                </tr>
                <tr>
                    <td><b>Nama Orang Tua</b></td>
                    <td>:</td>
                    <td>' . $siswa['nama_ortu'] . '</td>
                </tr>
                <tr>
                    <td><b>No. Telepon Orang Tua</b></td>
                    <td>:</td>
                    <td>' . $siswa['notlp_ortu'] . '</td>
                </tr>
                <tr>
                    <td><b>Alamat</b></td>
                    <td>:</td>
                    <td>' . $siswa['alamat'] . '</td>
                </tr>
                <tr>
                    <td><b>Kelas</b></td>
                    <td>:</td>
                    <td>' . $siswa['jenjangpendidikan'] . '</td>
                </tr>
                <tr>
                    <td><b>Sekolah</b></td>
                    <td>:</td>
                    <td>' . $siswa['asalsekolah'] . '</td>
                </tr>
            </table>
            ';
            echo $kata;
        }
    }
}
