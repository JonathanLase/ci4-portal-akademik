<?php

namespace App\Controllers;

use App\Models\ModelMataKuliah;


class Matakuliah extends BaseController
{
    protected $matakuliah;

    public function __construct()
    {
        $this->matakuliah = new ModelMataKuliah();
        helper(['swal_helper']);
    }

    public function index()
    {
        $data = [
            'title' => "SIPADI POLMED",
            'matakuliah' => $this->matakuliah->findAll()
        ];
        return view('layouts/matakuliah', $data);
    }

    public function save()
    {
        $this->matakuliah->save([
            'nama_matkul' => $this->request->getVar('nama_matkul'),
            'nama_dosen' => $this->request->getVar('nama_dosen'),
            'sks' => $this->request->getVar('sks'),
        ]);
        set_notifikasi_swal('success', 'Added', 'Data berhasil ditambahkan');
        return redirect()->to(base_url('/matakuliah'));
    }

    public function update($id)
    {
        if ($this->request->getMethod() == 'post') {
            $data = [
                'id' => $id,
                'nama_matkul' => $_POST['nama_matkul'],
                'nama_dosen' => $_POST['nama_dosen'],
                'sks' => $_POST['sks'],
            ];
            $this->matakuliah->save($data);
        }
        set_notifikasi_swal('success', 'Updated', 'Data berhasil diubah');
        return redirect()->to(base_url('/matakuliah'));
    }

    public function delete($id)
    {
        $this->matakuliah->delete($id);
        set_notifikasi_swal('success', 'Deleted', "Data Berhasil dihapus");
        return redirect()->to(base_url('/matakuliah'));
    }
}
