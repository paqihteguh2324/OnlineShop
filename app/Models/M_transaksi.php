<?php

namespace App\Models;

use CodeIgniter\Model;

class M_transaksi extends Model
{ 
    protected  $table = 'transaksi';
    
    function inputTransaksi($data)
    {
        $cart = \Config\Services::cart();
        $db = \Config\Database::connect();
        $nama= $data['nama'];
        $no_hp = $data['no_hp'];
        $alamat = $data['alamat'];
        $kecamatan = $data['kecamatan'];
        $kota = $data['kota'];
        $total = $cart->total();
        $result = $db->query("insert into transaksi ( total_transaksi, nama, no_hp, kecamatan, kota, alamat) values('$total', '$nama', '$no_hp', '$alamat' , '$kecamatan', '$kota')");
        return $result;
    }

  function getId()
    {
        $db = \Config\Database::connect();
        $result = $db->query("SELECT * FROM transaksi ORDER BY id_transaksi DESC LIMIT 1")->getResultArray();
        return $result;
    }
}