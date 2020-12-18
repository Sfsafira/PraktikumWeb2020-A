<?php

class Home extends Controller
{
    public function index()
    {
        $data['judul'] = 'Tutorin Aja!';
        return $this->view('index', $data);
    }
}
