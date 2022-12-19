<?php

namespace App\Controllers;
use \App\Models\M_transaksi;
use \App\Models\M_order;

class C_transaksi extends BaseController
{
    protected $transaksiModel;
    public function __construct()
    {
        $this->transaksiModel = new M_transaksi();
        $this->orderModel = new M_order();
    }
    public function submitCheckout()
    {

        $data = [
            'nama' => $this->request->getVar('nama'),
            'no_hp' => $this->request->getVar('no_hp'),
            'alamat' => $this->request->getVar('alamat'),
            'kecamatan' => $this->request->getVar('kecamatan'),
            'kota' => $this->request->getvar('kota'),
        ];
        $order = $this->orderModel->inputTransaksi();
        $result = $this->transaksiModel->inputTransaksi($data);
        
        if ($result) {
            $cart = \Config\Services::cart();
            $cart->destroy();
            session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
            return redirect()->route('barang/display');
        }
    }
}