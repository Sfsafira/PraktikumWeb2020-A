<?php

session_start();
class Controller
{
    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
    protected function validation($data, $rules)
    {
        $error = false;
        foreach ($rules as $name => $isinya) {
            if (!isset($data[$name]['name']))
                $data[$name] = amankan($data[$name]);
            $isi = explode("|", $isinya);
            foreach ($isi as $ini) {
                if (strcmp($ini, 'required') == 0) {
                    if (isset($data[$name]['name'])) {
                        if (empty($data[$name]['name'])) {
                            $_SESSION['error' . $name] = $name .  " harus di isi";
                            $error = true;
                        }
                    } else {
                        if (empty($data[$name])) {
                            $_SESSION['error' . $name] = $name . " harus di isi";
                            $error = true;
                        }
                    }
                } else if (strcmp($ini, 'satukata') == 0) {
                    $tmp = explode(" ", $data[$name]);
                    if (count($tmp) > 1) {
                        $_SESSION['error' . $name] = $name . " tidak boleh ada spasi";
                        $error = true;
                    }
                } else if (strcmp($ini, 'email') == 0) {
                    if (!filter_var($data[$name], FILTER_VALIDATE_EMAIL)) {
                        $_SESSION['error' . $name] = $name .  " haruslah valid email";
                        $error = true;
                    }
                } else if (strpos($ini, 'sama') !== false) {
                    $tmp = explode(":", $ini);
                    if (strcmp($data[$name], $data[$tmp[1]]) != 0) {
                        $_SESSION['error' . $name] = $name . " dan " . $tmp[1] . " harus sama";
                        $error = true;
                    }
                } else if (strpos($ini, 'unik') !== false) {
                    $tp = explode(":", $ini);
                    $tmp = $this->model('Auth_model')->cekunik($tp[1], $name, $data[$name]);
                    if ($tmp) {
                        $_SESSION['error' . $name] = $name .  " sudah terdaftar";
                        $error = true;
                    }
                } else if (strcmp($ini, 'image') == 0) {
                    if (getimagesize($data[$name]['tmp_name']) === false) {
                        $_SESSION['error' . $name] = $name .  " haruslah sebuah image";
                        $error = true;
                    }
                } else if (strpos($ini, 'tipefile') !== false) {
                    $tmp = explode(":", $ini);
                    $tipenya = explode(",", $tmp[1]);
                    $ekstensinya = strtolower(pathinfo($data[$name]['name'], PATHINFO_EXTENSION));
                    if (!in_array($ekstensinya, $tipenya)) {
                        if (!isset($_SESSION['error' . $name])) $_SESSION['error' . $name] = $name .  " ekstensinya tidak sesuai";
                        $error = true;
                    }
                } else if (strcmp($ini, "angka") == 0) {
                    if (!is_numeric($data[$name])) {
                        $_SESSION['error' . $name] = $name .  " haruslah angka!";
                        $error = true;
                    }
                }
            }
        }
        foreach ($rules as $name => $isi) if ($error) $_SESSION['val' . $name] = $data[$name];
        return $error;
    }
    protected function cekrolenya($role)
    {
        if (isset($_SESSION['role']))
            if ($_SESSION['role'] != $role) return true;
            else return false;
        else return true;
    }
}
