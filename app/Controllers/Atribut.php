<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelWilayah;
use App\Models\ModelSetting;
use App\Models\ModelAtribut;
use App\Models\ModelKondisi;

class Atribut extends BaseController
{
    public function __construct()
    {
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelSetting = new ModelSetting();
        $this->ModelAtribut = new ModelAtribut();
        $this->ModelKondisi = new ModelKondisi();
    }
    public function index()
    {
        $data = [
            'judul' => 'Atribut',
            'menu'  => 'atribut',
            'page'  => 'atribut/v_index',
            'atribut' => $this->ModelAtribut->AllData(),
        ];
        return view('v_template_back_end', $data);
    }
    public function Input()
    {
        $data = [
            'judul' => 'Input Atribut',
            'menu'  => 'atribut',
            'page' => 'atribut/v_input',
            'web' => $this->ModelSetting->DataWeb(),
            'wilayah' => $this->ModelWilayah->AllData(),
            'provinsi' => $this->ModelAtribut->allProvinsi(),
            'kondisi' => $this->ModelKondisi->AllData(),
        ];
        return view('v_template_back_end', $data);
    }

    
    public function InsertData()
    {
        if ($this->validate([
            'nama_pemilik' => [
                'label' => 'Nama Pemilik',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jumlah_keluarga' => [
                'label' => 'Jumlah Keluarga',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'luas' => [
                'label' => 'Luas (m2)',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'anggaran' => [
                'label' => 'Anggaran (Rp)',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'jenis_atribut' => [
                'label' => 'Atribut',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_kondisi' => [
                'label' => 'Kondisi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],

            'koordinat' => [
                'label' => 'Koordinat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_provinsi' => [
                'label' => 'Provinsi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_kabupaten' => [
                'label' => 'Kabupaten',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_kecamatan' => [
                'label' => 'Kecamatan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'id_wilayah' => [
                'label' => 'Wilayah Administrasi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Diisi !!'
                ]
            ],
            'foto' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran {field} max 1024 kb !!',
                    'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                ]
            ],
            ])){
                $foto = $this->request->getFile('foto');
                $nama_file_foto = $foto->getRandomName();
    
                //jika validasi berhasil
                $data = [
                    'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                    'jumlah_keluarga' => $this->request->getPost('jumlah_keluarga'),
                    'luas' => $this->request->getPost('luas'),
                    'anggaran' => $this->request->getPost('anggaran'),
                    'jenis_atribut' => $this->request->getPost('jenis_atribut'),
                    'koordinat' => $this->request->getPost('koordinat'),
                    'id_kondisi' => $this->request->getPost('id_kondisi'),
                    'id_provinsi' => $this->request->getPost('id_provinsi'),
                    'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                    'id_kecamatan' => $this->request->getPost('id_kecamatan'),
                    'alamat' => $this->request->getPost('alamat'),
                    'id_wilayah' => $this->request->getPost('id_wilayah'),
                    'id_wilayah' => $this->request->getPost('id_wilayah'),
                    'foto' => $nama_file_foto,
                ];
                $foto->move('foto', $nama_file_foto);
                $this->ModelAtribut->InsertData($data);
                session()->setFlashdata('insert', 'Data Berhasil Diupdate !!');
                return redirect()->to('Atribut');
            } else {
                //jika validasi gagal
                session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                return redirect()->to('Atribut/Input')->withInput('validation', \Config\Services::validation());
            }
        }

        public function Edit($id_atribut)
        {
            $data = [
                'judul' => 'Input Atribut',
                'menu'  => 'atribut',
                'page' => 'atribut/v_edit',
                'web' => $this->ModelSetting->DataWeb(),
                'provinsi' => $this->ModelAtribut->allProvinsi(),
                'wilayah' => $this->ModelWilayah->AllData(),
                'kondisi' => $this->ModelKondisi->AllData(),
                'atribut' => $this->ModelAtribut->DetailData($id_atribut),
            ];

            return view('v_template_back_end', $data);
        }

        public function UpdateData($id_atribut)
        {
            if ($this->validate([
                'nama_pemilik' => [
                    'label' => 'Nama Pemilik',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'jumlah_keluarga' => [
                    'label' => 'Jumlah Keluarga',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'luas' => [
                    'label' => 'Luas (m2)',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'anggaran' => [
                    'label' => 'Anggaran (Rp)',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'jenis_atribut' => [
                    'label' => 'Atribut',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'id_kondisi' => [
                    'label' => 'Kondisi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
    
                'koordinat' => [
                    'label' => 'Koordinat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'id_provinsi' => [
                    'label' => 'Provinsi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'id_kabupaten' => [
                    'label' => 'Kabupaten',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'id_kecamatan' => [
                    'label' => 'Kecamatan',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'alamat' => [
                    'label' => 'Alamat',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'id_wilayah' => [
                    'label' => 'Wilayah Administrasi',
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} Wajib Diisi !!'
                    ]
                ],
                'foto' => [
                    'label' => 'Foto',
                    'rules' => 'max_size[foto,1024]|mime_in[foto,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'max_size' => 'Ukuran {field} max 1024 kb !!',
                        'mime_in' => 'Format {field} Harus JPG, JPEG, PNG !!',
                    ]
                ],
                ])){
                    $atribut = $this->ModelAtribut->DetailData($id_atribut);
                    $foto = $this->request->getFile('foto');
        
            if ($foto->getError() == 4) {
                $nama_file_foto = $atribut ['foto'];
            } else {
                $nama_file_foto = $foto->getRandomName();
                $foto->move('foto', $nama_file_foto);
            }

                    //jika validasi berhasil
                    $data = [
                        'id_atribut' => $id_atribut,
                        'nama_pemilik' => $this->request->getPost('nama_pemilik'),
                        'jumlah_keluarga' => $this->request->getPost('jumlah_keluarga'),
                        'luas' => $this->request->getPost('luas'),
                        'anggaran' => $this->request->getPost('anggaran'),
                        'jenis_atribut' => $this->request->getPost('jenis_atribut'),
                        'koordinat' => $this->request->getPost('koordinat'),
                        'id_kondisi' => $this->request->getPost('id_kondisi'),
                        'id_provinsi' => $this->request->getPost('id_provinsi'),
                        'id_kabupaten' => $this->request->getPost('id_kabupaten'),
                        'id_kecamatan' => $this->request->getPost('id_kecamatan'),
                        'alamat' => $this->request->getPost('alamat'),
                        'id_wilayah' => $this->request->getPost('id_wilayah'),
                        'id_wilayah' => $this->request->getPost('id_wilayah'),
                        'foto' => $nama_file_foto,
                    ];
                    $this->ModelAtribut->UpdateData($data);
                    session()->setFlashdata('insert', 'Data Berhasil Diupdate !!');
                    return redirect()->to('Atribut');
                } else {
                    //jika validasi gagal
                    session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
                    return redirect()->to('Atribut/Edit'. $id_atribut)->withInput('validation', \Config\Services::validation());
                }
            }

            
    //delete
    public function Delete($id_atribut)
    {
       //delete foto
       $atribut = $this->ModelAtribut->DetailData($id_atribut); 
       if ($atribut['foto'] <> '') {
        unlink('foto/' . $atribut['foto']);
    }

       $data = [
            'id_atribut' => $id_atribut,
        ];
        $this->ModelAtribut->DeleteData($data);
                    session()->setFlashdata('delete', 'Data Berhasil Dihapus !!');
                    return redirect()->to('Atribut');
    }

    public function Detail($id_atribut)
    {
    $data = [
        'judul' => 'Detail Atribut',
        'menu'  => 'atribut',
        'page' => 'atribut/v_detail',
        'web' => $this->ModelSetting->DataWeb(),
        'atribut' => $this->ModelAtribut->DetailData($id_atribut),
    ];
    return view('v_template_back_end', $data);
}

     //kabupaten, kecamatan
     public function Kabupaten()
     {
         $id_provinsi = $this->request->getPost('id_provinsi');
         $kab = $this->ModelAtribut->allKabupaten($id_provinsi);
         echo ' <option value="">--Pilih Kabupaten---</option>';
         foreach ($kab as $key => $value) {
             echo '<option value=' . $value['id_kabupaten'] . '>' . $value['nama_kabupaten'] . '</option>';
         }
     }

     public function Kecamatan()
     {
         $id_kabupaten = $this->request->getPost('id_kabupaten');
         $kec = $this->ModelAtribut->allKecamatan($id_kabupaten);
         echo ' <option value="">--Pilih Kecamatan---</option>';
         foreach ($kec as $key => $value) {
             echo '<option value=' . $value['id_kecamatan'] . '>' . $value['nama_kecamatan'] . '</option>';
         }
     }
}