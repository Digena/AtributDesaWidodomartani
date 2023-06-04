<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAtribut extends Model
{
    public function AllData()
    {
        return $this->db->table('tbl_atribut')
            ->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_atribut.id_kondisi', 'left')
        ->get()->getResultArray();
    }

    public function AllDataPerWilayah($id_wilayah)
    {
        return $this->db->table('tbl_atribut')
            ->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_atribut.id_kondisi', 'left')
            ->where('id_wilayah', $id_wilayah)
            ->get()->getResultArray();
    }

    public function AllDataPerKondisi($id_kondisi)
    {
        return $this->db->table('tbl_atribut')
            ->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_atribut.id_kondisi', 'left')
            ->where('tbl_atribut.id_kondisi', $id_kondisi)
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_atribut')->insert($data);
    }

    public function DetailData($id_atribut)
    {
        return $this->db->table('tbl_atribut')
        ->join('tbl_kondisi', 'tbl_kondisi.id_kondisi = tbl_atribut.id_kondisi', 'left')
        ->join('tbl_provinsi', 'tbl_provinsi.id_provinsi = tbl_atribut.id_provinsi', 'left')
        ->join('tbl_kabupaten', 'tbl_kabupaten.id_kabupaten = tbl_atribut.id_kabupaten', 'left')
        ->join('tbl_kecamatan', 'tbl_kecamatan.id_kecamatan = tbl_atribut.id_kecamatan', 'left')
        ->join('tbl_wilayah', 'tbl_wilayah.id_wilayah = tbl_atribut.id_wilayah', 'left')
            ->where('id_atribut', $id_atribut)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_atribut')
            ->where('id_atribut', $data['id_atribut'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_atribut')
            ->where('id_atribut', $data['id_atribut'])
            ->delete($data);
    }

    //provinsi
    public function allProvinsi()
    {
        return $this->db->table('tbl_provinsi')
            ->orderBy('id_provinsi', 'ASC')
            ->get()->getResultArray();
    }
    public function allKabupaten($id_provinsi)
    {
        return $this->db->table('tbl_kabupaten')
            ->where('id_provinsi', $id_provinsi)
            ->get()->getResultArray();
    }

    public function allKecamatan($id_kabupaten)
    {
        return $this->db->table('tbl_kecamatan')
            ->where('id_kabupaten', $id_kabupaten)
            ->get()->getResultArray();
    }
}
