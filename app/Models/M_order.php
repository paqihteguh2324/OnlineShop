<?php

namespace App\Models;

use CodeIgniter\Model;
use \App\Models\M_transaksi;

class M_order extends Model
{
    protected  $table = 'order';
    public function __construct()
    {
        $this->transaksiModel = new M_transaksi();
    }
    function inputTransaksi()
    {
        $cart = \Config\Services::cart();
        $db = \Config\Database::connect();
        $Ktransaksi = $db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1")->getResultArray();
        foreach ($Ktransaksi as $item) {
            $kdeTransaksi = $item['id_transaksi'];
        }

        $kode = $kdeTransaksi;
        if ($cart->contents()) {
        foreach ($cart->contents() as $item) {
            $Kbarang = $item['id'];
            $Jjual = $item['qty'];
            $Hpenjualan = $item['price'];
           $result = $db->query("INSERT INTO `order`(`kode_transaksi`, `kode_barang`, `jumlah_jual`, `harga_penjualan`) VALUES($kode, $Kbarang, $Jjual, $Hpenjualan)");
           $data = $db->query("UPDATE barang SET stok=stok-$Jjual where id = $Kbarang");
        }}
        return $result;
    }
}
