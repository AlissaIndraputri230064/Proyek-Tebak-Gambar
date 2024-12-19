<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ImageModel;
use App\Models\UserModel;

class ImageController extends Controller
{
    public function __construct() 
    {
        helper(['url', 'form']);
    }

    public function tambahGambar()
    {
        return view('admin/tambah_gambar');
    }

    public function store()
    {
        $validated = $this->validate([
            'image_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id gambar tidak boleh kosong'
                ]
            ],
            'image_id' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Gambar tidak boleh kosong'
                ]
            ]
        ]);

        if (!$validated)
        {
            return view('admin/tambah_gambar', ['validation' => $this->validator]);
        }

        $imageId = $this->request->getPost('image_id');
        $imageImg = $this->request->getPost('image_img');

        if (!$imageImg->isValid()) {
            return redirect()->back()->withInput()->with('error', 'File gambar tidak valid.');
        }

        // Membaca file sebagai data biner
        $binaryData = file_get_contents($imageImg->getTempName());

        $data = [
            'image_id' => $imageId,
            'image_img' => $binaryData
        ];

        $imageModel = new ImageModel();
        $query = $imageModel->insert($data);

        if (!$query) 
        {
            return redirect()->to('admin/home_admin')->with('success', 'Gambar berhasil diunggah!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan data gambar.');
        }
    }
}
