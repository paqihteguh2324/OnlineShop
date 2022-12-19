<?php

namespace App\Controllers;

use \App\Models\M_barang;
use \App\Models\M_transaksi;
use \PhpOffice\PhpSpreadsheet\Spreadsheet;
use \PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class C_barang extends BaseController
{
    protected $barangModel;
    protected $transaksiModel;
    public function __construct()
    {
        $this->barangModel = new M_barang();
        helper('form');
        $this->transaksiModel = new M_transaksi();
    }

    public function display()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $data['content_view'] = "V_barangDisplay.php";
            $data['barang'] = $this->barangModel->getBarang();
            return view('V_template', $data);
        }
    }

    public function inputDisplay()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $data['content_view'] = "V_barangInput.php";
            return view('V_template', $data);
        }
    }

    public function input()
    {

        $data = [
            'id' => $this->request->getVar('id'),
            'nama_barang' => $this->request->getVar('nama_barang'),
            'harga_barang' => $this->request->getVar('harga_barang'),
            'stok' => $this->request->getVar('stok'),
            'link_gambar' => $this->request->getvar('link_gambar'),
        ];

        $result = $this->barangModel->insertBarang($data);

        if ($result) {
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->route('barang/display');
        }
    }

    public function grafik()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $model = new m_barang();

            $data['content_view'] = "V_grafik.php";
            $data['hasil'] = $model->getBarang();

            return view('v_template', $data);
        }
    }

    public function addCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getPost('id'),
            'qty'     => 1,
            'price'   => $this->request->getPost('price'),
            'name'    => $this->request->getPost('name'),
            'options' => array(
                'gambar' => $this->request->getPost('gambar'),
            )
        ));

        return redirect()->to('/barang/display');
    }

    public function cartDestroy()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $cart = \Config\Services::cart();
            $cart->destroy();
            $data['content_view'] = "V_cart.php";
            return view('V_template', $data);
        }
    }

    public function cartDisplay()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            // $cart = \Config\Services::cart();
            // echo '<pre>';
            // print_r($cart->contents());
            // echo '</pre>';
            $data['transaksi'] = $this->transaksiModel->getId();
            $data['content_view'] = "V_cart.php";
            return view('V_template', $data);
        }
    }

    public function cartDelete($rowid)
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $cart = \Config\Services::cart();
            $cart->remove($rowid);
            $data['content_view'] = "V_cart.php";
            return view('V_template', $data);
        }
    }
    public function formTransaksiDisplay()
    {
        if (!session()->get('logged_in')) {
            // maka redirct ke halaman login
            return redirect()->to('/login');
        } else {
            $data['content_view'] = "V_formTransaksi.php";
            return view('V_template', $data);
        }
    }

}
