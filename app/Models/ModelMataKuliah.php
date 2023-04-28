<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelMataKuliah extends Model
{
    protected $table = 'matkul_sem1';
    protected $allowedFields = ['nama_matkul', 'nama_dosen', 'sks'];
}
