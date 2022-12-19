<?php

namespace App\Models;

use CodeIgniter\Model;

class m_barang extends Model
{
    protected $table      = 'barang';
    protected $primaryKey = 'id';
    

    function getBarang()
    {
        $db = \Config\Database::connect();
        $data = $db->query('select * from barang')->getResultArray();
        return $data;
    }

    function insertBarang($data)
    {
        $db = \Config\Database::connect();
        $id = $data['id'];
        $nama_barang = $data['nama_barang'];
        $harga_barang = $data['harga_barang'];
        $stok = $data['stok'];
        $filename = $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/'.$filename);
		$file_gambar = $filename;
        $result = $db->query("insert into barang (id, nama_barang, harga_barang,stok, link_gambar) values('$id', '$nama_barang', '$harga_barang', '$stok' , '$file_gambar')");
        return $result;
    }
    function addCart($id)
    {
        $db = \Config\Database::connect();
        $data = $db->query("select * from barang where id = $id")->getResultArray();
        return $data;
    }
    function kurangStok($id, $stok){
        $db = \Config\Database::connect();
        $data = $db->query("UPDATE barang SET stok=stok-$stok where id = $id");
        return $data;
        
    }

}
?>
