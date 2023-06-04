<?php

namespace App\Controllers;

use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelAtribut;
use App\Models\ModelKondisi;


class Home extends BaseController
{

    public function __construct()
    {
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelAtribut = new ModelAtribut();
        $this->ModelKondisi = new ModelKondisi();
    }

    public function index()
    {
        $data = [
            'judul' => 'Home',
            'page' => 'v_home',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this -> ModelWilayah->AllData(),
            'atribut' => $this->ModelAtribut->AllData(),
            'kondisi' => $this->ModelKondisi->AllData(),
        ];
        return view('v_template_front_end' , $data);
    }

    
    public function Wilayah($id_wilayah)
    {
        $dw = $this->ModelWilayah->DetailData($id_wilayah);
        $data = [
            'judul' => $dw['nama_wilayah'],
            'page' => 'v_detail_wilayah',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kondisi' => $this->ModelKondisi->AllData(),
            'detailwilayah' => $this->ModelWilayah->DetailData($id_wilayah),
            'atribut' => $this->ModelAtribut->AllDataPerWilayah($id_wilayah),

        ];
        return view('v_template_front_end', $data);
    }

    public function Kondisi($id_kondisi)
    {
        $dk = $this->ModelKondisi->DetailData($id_kondisi);
        $data = [
            'judul' =>  $dk['kondisi'],
            'page' => 'v_atribut_per_kondisi',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kondisi' => $this->ModelKondisi->AllData(),
            'atribut' => $this->ModelAtribut->AllDataPerKondisi($id_kondisi),

        ];
        return view('v_template_front_end', $data);
    }

    public function DetailAtribut($id_atribut)
    {
        $atribut = $this->ModelAtribut->DetailData($id_atribut);
        $data = [
            'judul' => $atribut['nama_pemilik'],
            'page' => 'v_detail_atribut',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'kondisi' => $this->ModelKondisi->AllData(),
            'atribut' => $atribut,

        ];
        return view('v_template_front_end', $data);
    }
}

