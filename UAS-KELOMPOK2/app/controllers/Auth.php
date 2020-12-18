<?php

// session_start();
class Auth extends Controller
{
    public function index()
    {
        header('Location: ' . BASEURL . 'auth/daftar');
    }
    private function udahlogin()
    {
        if (isset($_SESSION['username']))
            if (isset($_SESSION['role']))
                if ($_SESSION['role'] == 1) {
                    header('Location: ' . BASEURL . 'admin/dashboard');
                    die;
                } elseif ($_SESSION['role'] == 2) {
                    header('Location: ' . BASEURL . 'tutor/dashboard');
                    die;
                } else if ($_SESSION['role'] == 3) {
                    header('Location: ' . BASEURL . 'siswa/dashboard');
                    die;
                }
    }
    public function login()
    {
        $this->udahlogin();
        $data['judul'] = 'Halaman Login';
        $this->view('auth/header', $data);
        $this->view('auth/login');
        $this->view('auth/footer');
    }
    public function daftar()
    {
        $this->udahlogin();
        $data['judul'] = 'Halaman Daftar';
        $this->view('auth/header', $data);
        $this->view('auth/daftar');
        $this->view('auth/footer');
    }

    public function sukdaftar()
    {
        if (isset($_POST['siswa'])) {
            //validation
            $rules = [
                'nama' => 'required',
                'notlp' => 'required|angka',
                'username' => 'required|satukata|unik:user',
                'email' => 'required|email|unik:siswa',
                'password' => 'required|sama:password2',
                'password2' => 'required'
            ];
            $error = $this->validation($_POST, $rules);
            if ($error) {
                header('Location: ' . BASEURL . 'auth/daftar');
                die;
            }
            $cek = $this->model('Auth_model')->pendaftaran($_POST, 'siswa');
        } else if (isset($_POST['tutor'])) {
            //validation
            $rules = [
                'nama' => 'required',
                'notlp' => 'required|angka',
                'username' => 'required|satukata|unik:user',
                'email' => 'required|email|unik:tutor',
                'password' => 'required|sama:password2',
                'password2' => 'required'
            ];
            $error = $this->validation($_POST, $rules);
            if ($error) {
                header('Location: ' . BASEURL . 'auth/daftar');
                die;
            }
            $cek = $this->model('Auth_model')->pendaftaran($_POST, 'tutor');
        }
        if ($cek == 1) {
            $_SESSION['sukses'] = "Berhasil mendaftar";
            header('Location: ' . BASEURL . 'auth/login');
        } else {
            $_SESSION['gagal'] = "Gagal mendaftar karna " . $cek;
            header('Location: ' . BASEURL . 'auth/daftar');
        }
    }
    public function masuk()
    {
        if (isset($_POST['login'])) {
            $username = amankan($_POST['username']);
            $password = amankan($_POST['password']);
            $rules = [
                'username' => 'required|satukata',
            ];
            if ($this->validation($_POST, $rules)) {
                header('Location: ' . BASEURL . 'auth/login');
                die;
            }
            $data = $this->model('Auth_model')->maumasuk($username);
            if ($data) {
                if (password_verify($password, $data['password'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['role'] = $data['role'];
                    if ($data['role'] == 1) { //admin
                        header('Location: ' . BASEURL . 'admin/dashboard');
                        die;
                    } else if ($data['role'] == 2) { //tutor
                        if ($data['profileLengkap'] <= 3) {
                            $_SESSION['ceklengkap'] = $data['profileLengkap'];
                            header('Location: ' . BASEURL . 'auth/tutor');
                            die;
                        } else {
                            header('Location: ' . BASEURL . 'tutor/dashboard');
                            die;
                        }
                    } else if ($data['role'] == 3) { //siswa
                        if ($data['profileLengkap'] <= 2) {
                            $_SESSION['ceklengkap'] = $data['profileLengkap'];
                            header("Location: " . BASEURL . "auth/siswa");
                            die;
                        } else {
                            header('Location: ' . BASEURL . 'siswa/dashboard');
                            die;
                        }
                    }
                } else $_SESSION['gagal'] = "Password anda salah";
            } else $_SESSION['gagal'] = "Username belum terdaftar";
            header('Location: ' . BASEURL . 'auth/login');
        }
    }
    public function tutor()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['ceklengkap'] == 3) {
                header('Location:' . BASEURL . 'tutor/dashboard');
                die;
            }
            $data['user'] = $this->model('Auth_model')->ambildatasatu($_SESSION['username'], 'tutor');
            $data['kabupaten'] = $this->model('AlamatModel')->ambilkabupaten();
            $this->view('profile/tutor', $data);
        } else {
            header('Location:' . BASEURL . 'auth/login');
        }
    }
    public function siswa()
    {
        if (isset($_SESSION['username'])) {
            if ($_SESSION['ceklengkap'] == 2) {
                header('Location:' . BASEURL . 'siswa/dashboard');
                die;
            }
            $data['user'] = $this->model('Auth_model')->ambildatasatu($_SESSION['username'], 'siswa');
            $data['kabupaten'] = $this->model('AlamatModel')->ambilkabupaten();
            $this->view('profile/siswa', $data);
        } else {
            header('Location:' . BASEURL . 'auth/login');
        }
    }
    public function sukdatatutor()
    {
        if (isset($_POST['kirim'])) {
            $cek = $_SESSION['ceklengkap'];
            $user = $_SESSION['username'];
            if ($cek == 0) {
                $rules = [
                    'nama' => 'required',
                    'namapanggilan' => 'required',
                    'jeniskelamin' => 'required',
                    'notlp' => 'required|angka',
                    'tempatlahir' => 'required',
                    'tanggallahir' => 'required',
                    'alamat' => 'required',
                ];
                if ($this->validation($_POST, $rules)) {
                    header('Location: ' . BASEURL . 'auth/tutor');
                    die;
                }
                if ($this->model('Auth_model')->updatetutorsatu($_POST, $user) == 1) {
                    $_SESSION['ceklengkap'] = 1;
                    $_SESSION['sukses'] = "Berhasil menambah data";
                } else $_SESSION['sukses'] = "Terdapat kesalahan";
            } else if ($cek == 1) {
                $_POST['foto'] = $_FILES['foto'];
                $_POST['ijasah'] = $_FILES['ijasah'];
                $rules = [
                    'pendidikan_terakhir' => 'required',
                    'keterangan_pendidikan' => 'required',
                    'perguruan_tinggi' => 'required',
                    'program_studi' => 'required',
                    'IPK' => 'required|angka',
                    'foto' => 'required|image|tipefile:jpg,jpeg,png',
                    'ijasah' => 'required|tipefile:pdf,jpg',
                ];
                if ($this->validation($_POST, $rules)) {
                    header('Location: ' . BASEURL . 'auth/tutor');
                    die;
                }
                $cekdeh = $this->model('Auth_model')->updatetutordua($_POST, $user);
                if ($cekdeh == 1) {
                    $_SESSION['ceklengkap'] = 2;
                    $_SESSION['sukses'] = "Berhasil menambah data";
                } else $_SESSION['sukses'] = "Terdapat kesalahan " . $cek;
            } else if ($cek == 2) {
                $rules = [
                    'perkenalan' => 'required',
                    'pengalaman' => 'required',
                    'prestasi' => 'required',
                    'biaya90menit' => 'required|angka',
                    'biaya120menit' => 'required|angka',
                    'metode_mengajar' => 'required',
                    'minatngajar' => 'required',
                    'minatmapel' => 'required',
                ];
                $minat = "";
                if (isset($_POST['minatngajar'])) {
                    foreach ($_POST['minatngajar'] as $minatngajar) $minat .= $minatngajar . ",";
                    $minat = rtrim($minat, ",");
                }
                $_POST['minatngajar'] = $minat;
                $mapel = "";
                if (isset($_POST['minatmapel'])) {
                    foreach ($_POST['minatmapel'] as $minatmapel)  $mapel .= $minatmapel . ",";
                    $mapel = rtrim($mapel, ",");
                }
                $_POST['minatmapel'] = $mapel;
                if ($this->validation($_POST, $rules)) {
                    header('Location: ' . BASEURL . 'auth/tutor');
                    die;
                }
                $cekdeh = $this->model('Auth_model')->updatetutortiga($_POST, $user);
                if ($cekdeh == 1) {
                    $_SESSION['ceklengkap'] = 3;
                    $_SESSION['sukses'] = "Berhasil menambah data";
                } else $_SESSION['sukses'] = "Terdapat kesalahan " . $cek;
            }
            header('Location: ' . BASEURL . 'auth/tutor');
        }
    }
    public function sukdatasiswa()
    {
        if (isset($_POST['masukan'])) {
            $username = $_SESSION['username'];
            $kelengkapan = $_SESSION['ceklengkap'];
            if ($kelengkapan == 0) {
                $rules = [
                    'nama' => 'required',
                    'namapanggilan' => 'required',
                    'jeniskelamin' => 'required',
                    'notlp' => 'required|angka',
                    'tempatlahir' => 'required',
                    'tanggallahir' => 'required',
                    'jenjangpendidikan' => 'required',
                    'asalsekolah' => 'required',
                ];
                if ($this->validation($_POST, $rules)) {
                    header('Location: ' . BASEURL . 'auth/siswa');
                    die;
                }
                if ($this->model('Auth_model')->updatesiswasatu($_POST, $username) == 1) {
                    $_SESSION['ceklengkap'] = 1;
                    $_SESSION['sukses'] = "Berhasil menambah data";
                } else $_SESSION['sukses'] = "Terdapat kesalahan";
            } elseif ($kelengkapan == 1) {
                $_POST['foto'] = $_FILES['foto'];
                $rules = [
                    'namaortu' => 'required',
                    'notlportu' => 'required|angka',
                    'alamat' => 'required',
                    'foto' => 'required|image|tipefile:jpg,jpeg,png',
                ];
                if ($this->validation($_POST, $rules)) {
                    header('Location: ' . BASEURL . 'auth/siswa');
                    die;
                }
                if ($this->model('Auth_model')->updatesiswadua($_POST, $username) == 1) {
                    $_SESSION['ceklengkap'] = 2;
                    $_SESSION['sukses'] = "Berhasil menambah data";
                } else $_SESSION['sukses'] = "Terdapat kesalahan";
            }
        }
        header('Location: ' . BASEURL . 'auth/siswa');
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        header('Location: ' . BASEURL);
    }
    public function alamat($jenis)
    {
        switch ($jenis) {
            case 'kecamatan':
                $idkab = $_POST['id_kabupaten'];
                $data = $this->model('AlamatModel')->ambilkecamatan($idkab);
                foreach ($data as $kecamatan) {
                    echo '<option value="' . $kecamatan['id'] . '">' . $kecamatan['name'] . '</option>';
                }
                break;
            case 'kelurahan':
                $idkec = $_POST['id_kecamatan'];
                $data = $this->model('AlamatModel')->ambilkelurahan($idkec);
                foreach ($data as $kelurahan) {
                    echo '<option value="' . $kelurahan['id'] . '">' . $kelurahan['name'] . '</option>';
                }
                break;
        }
    }
}
