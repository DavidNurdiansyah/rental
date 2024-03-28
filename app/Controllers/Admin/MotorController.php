<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class MotorController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar Motor',
            'M_Motor' => $this->M_Motor->orderBy('id_motor', 'DESC')->findAll()
        ];
        
        return view('admin/motor/daftar motor', $data);
    }

    // Tambah daftar motor
    public function rental()
    {
        $gambar = $this->request->getFile('gambar');

        // Pindahkan file gambar ke folder yang ditentukan (public/uploads/motor)
        if ($gambar->isValid() && $gambar->move(ROOTPATH . 'public/uploads/motor')) {
            // Simpan data ke database
            $data = [
                'no_plat' => $this->request->getPost('no_plat'),
                'nama_motor' => $this->request->getPost('nama_motor'),
                'harga' => $this->request->getPost('harga'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $gambar->getName() // Simpan nama file gambar ke dalam database
            ];

            $this->M_Motor->insert($data);

            return redirect()->back()->with('success', 'Data Motor Berhasil Ditambahkan');
        } else {
            // Jika gagal mengunggah gambar, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect()->back()->withInput()->with('error', 'Gagal mengunggah gambar');
        }
    }

    // Ubah daftar motor
    public function update($id_motor)
    {
        // Simpan data ke database
        $data = [
            'no_plat' =>($this->request->getPost('no_plat')),
            'nama_motor' =>($this->request->getPost('nama_motor')),
            'harga' =>($this->request->getPost('harga')),
            'deskripsi' =>($this->request->getPost('deskripsi'))
        ];

        $this->M_Motor->update($id_motor, $data);

        return redirect()->back()->with('success', 'Data Motor Berhasil Diubah');
    }

    public function hapus($id_motor)
    {
        // Cek apakah motor dengan ID yang diberikan ada di database
        $motor = $this->M_Motor->find($id_motor);

        if (!$motor) {
            // Jika motor tidak ditemukan, tampilkan pesan error atau lakukan tindakan lainnya
            return redirect()->back()->with('error', 'Motor tidak ditemukan.');
        }

        // Hapus motor dari database
        $delete = $this->M_Motor->delete($id_motor);

        if ($delete) {
            // Jika penghapusan berhasil, tampilkan pesan sukses
            return redirect()->back()->with('success', 'Motor berhasil dihapus.');
        } else {
            // Jika terjadi kesalahan saat menghapus, tampilkan pesan error
            return redirect()->back()->with('error', 'Gagal menghapus motor.');
        }
    }
}
