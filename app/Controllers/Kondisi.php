<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelKondisi;

class Kondisi extends BaseController
{
    public function __construct()
    {
        $this->ModelKondisi = new ModelKondisi();
    }
    
    public function index()
    {
        $data = [
            'judul' => 'Kondisi',
            'menu'  => 'kondisi', //variabel menu aktiv
            'page' => 'v_kondisi',
            'kondisi' => $this->ModelKondisi->AllData(),
        ];
        return view('v_template_back_end', $data);
    }
    public function UpdateData($id_kondisi)
    {
        $marker = $this->request->getFile('marker');
        $name_file = $marker->getRandomName();
        $data = [
            'id_kondisi' => $id_kondisi,
            'marker' => $name_file,
        ];
        $marker->move('marker', $name_file);
        $this->ModelKondisi->UpdateData($data);
        session()->setFlashdata('update', 'Marker Berhasil Diupdate !!');
        return redirect()->to('Kondisi');
    }
}