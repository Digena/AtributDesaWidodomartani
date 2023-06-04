<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelAdmin;
use App\Models\ModelKondisi;

class Admin extends BaseController
{

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelAdmin = new ModelAdmin();
        $this->ModelKondisi = new ModelKondisi();
    }


    public function index()
    {
        $data = [
            'judul' => 'Dashboard',
            'menu'  => 'dashboard',
            'page' => 'v_dashboard',
            'jmlatribut' => $this->ModelAdmin->JmlAtribut(),
            'jmlwilayah' => $this->ModelAdmin->JmlWilayah(),
            'kondisi' => $this->ModelKondisi->AllData(),
        ];
        return view('v_template_back_end' , $data);
    }
    public function Setting()
    {
        $data = [
            'judul' => 'Setting',
            'menu'  => 'setting',
            'page' => 'v_setting',
            'web' => $this->ModelSetting->DataWeb(),
        ];
        return view('v_template_back_end' , $data);
    }

    public function UpdateSetting()
 {
        $data = [
            'id' => 1,
            'nama_web' => $this->request->getPost('nama_web'),
            'koordinat_wilayah' => $this->request->getPost('koordinat_wilayah'),  
            'zoom_view' => $this->request->getPost('zoom_view'),
    ];
    $this ->ModelSetting->UpdateData($data);
    session()->setFlashdata('pesan' , 'Setingan Web Telah Diupdate !!!');
    return redirect()->to('Admin/Setting');    
    }
}
