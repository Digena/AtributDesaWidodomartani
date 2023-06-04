<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKondisi extends Model
{
    public function AllData()
    {
        return $this ->db->table('tbl_kondisi')
            ->get()->getResultArray();
    }

    public function InsertData($data)
    {
        $this->db->table('tbl_kondisi')->insert($data);
    }
    public function DetailData($id_kondisi)
    {
        return $this->db->table('tbl_kondisi')
            ->where('id_kondisi', $id_kondisi)
            ->get()->getRowArray();
    }

    public function UpdateData($data)
    {
        $this->db->table('tbl_kondisi')
            ->where('id_kondisi', $data['id_kondisi'])
            ->update($data);
    }

    public function DeleteData($data)
    {
        $this->db->table('tbl_kondisi')
            ->where('id_kondisi', $data['id_kondisi'])
            ->delete($data);
    }
    }
