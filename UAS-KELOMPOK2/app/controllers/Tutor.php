<?php

// session_start();
class Tutor extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'tutor/dashboard');
    }
    public function dashboard()
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data = $this->model('Auth_model')->maumasuk($_SESSION['username']);
        if ($data['verif'] == 1) {
            $tutor = $this->model('TutorModel')->ambilsatututor($data['username']);
            $this->view("tutor/header", $tutor);
            $this->view("tutor/index", $tutor);
            $this->view("tutor/footer");
        } else if ($data['profileLengkap'] == 3) {
            if ($this->model('Auth_model')->updatedata($_SESSION['username'], 'profileLengkap', 4) != 1) die;
            $_SESSION['sukses'] = "Anda berhasil melengkapi isi data. Silahkan Login Ulang";
            unset($_SESSION['username']);
            unset($_SESSION['ceklengkap']);
            header('Location: ' . BASEURL . 'auth/login');
            die;
        } else {
            $_SESSION['sukses'] = "Anda belum di verifikasi oleh admin";
            unset($_SESSION['username']);
            unset($_SESSION['ceklengkap']);
            header('Location: ' . BASEURL . 'auth/login');
            die;
        }
    }
    public function mapel($mapelnya)
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $tutor = $this->model('TutorModel')->ambilsatututor($_SESSION['username']);
        $data = $this->model('TutorModel')->ambilmapel($tutor['id'], $mapelnya);
        $this->view("tutor/header", $tutor);
        $this->view("tutor/mapel", $data);
        $this->view("tutor/footer");
    }
    public function liatdetailsiswa($id, $mapelnya)
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $siswa = $this->model('SiswaModel')->ambilsatudatasiswa($id, 'id');
        $kata[0] = '
            <table class="table">
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
        $ter = $this->model('TutorModel')->cekterima('id_siswa', $id, $mapelnya);
        if ($ter['diterima'] == 0)
            $kata[1] = '
                <form action="' . BASEURL . 'tutor/updatediterima/' . $ter['id_res'] . '/' . $mapelnya . '" method="post" class="updatediterima">
                    <button onclick="updateterima(' . "'tolak'" . ')" class="btn btn-danger" type="submit">Tolak</button>
                    <button onclick="updateterima(' . "'terima'" . ')" class="btn btn-primary" type="submit">Terima</button>
                </form>
            ';
        else
            $kata[1] = '<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>';
        echo json_encode($kata);
    }
    public function updatediterima($id, $mapel)
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        if (isset($_POST['terima'])) {
            if ($this->model('TutorModel')->updetreservasi($id, $mapel, 1) == 1) {
                echo "Sukses";
            }
        } else if (isset($_POST['tolak'])) {
            if ($this->model('TutorModel')->updetreservasi($id, $mapel, 2) == 1) {
                echo "Sukses";
            }
        }
    }
    public function liatprofile($username)
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $data = $this->model('SiswaModel')->ambilsatututor($_SESSION['username']);
        echo '
            <table style="width: 980px;">
            <tr>
                <td rowspan="15" width="250px">
                    <img src="' . BASEURL . 'asset/tutor/foto/' . $data['foto'] . '" width="200px" />
                </td>
            </tr>
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
        </table>';
    }

    public function info()
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $tutor = $this->model('TutorModel')->ambilsatututor($_SESSION['username']);
        $this->view("tutor/header", $tutor);
        $this->view("tutor/info", $tutor);
        $this->view("tutor/footer");
    }
    public function uploadbukti($user)
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $rules = [
            'buktibayar' => 'required|image|tipefile:png,jpg,jpeg',
        ];
        if ($this->validation($_FILES, $rules)) {
            echo BASEURL . 'tutor/info/';
            die;
        }
        if ($this->model('TutorModel')->uploadbukti($_FILES, $user) == 1) {
            echo "Sukses";
        }
    }
    public function editprofile($id)
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $tutor = $this->model('TutorModel')->satututor($id);
        $this->view('auth/editprofile', $tutor);
    }
    public function sukprofile()
    {
        if ($this->cekrolenya(2)) {
            header('Location: ' . BASEURL);
            die;
        }
        $id = $_POST['idnya'];
        $rules = [
            'nama' => 'required',
            'namapanggilan' => 'required',
            'jeniskelamin' => 'required',
            'notlp' => 'required|angka',
            'tempatlahir' => 'required',
            'alamat' => 'required',
        ];
        if ($this->validation($_POST, $rules))
            echo BASEURL . "tutor/editprofile/" . $id;
        else if ($this->model('Auth_model')->updateprofile('tutor', $_POST, $_SESSION['username']) == 1)
            echo "Sukses";
        else
            echo "as";
    }
}
