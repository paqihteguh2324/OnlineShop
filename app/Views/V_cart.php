<div class="container-fluid" style="margin-top:120px ;">
    <div class="m-4">
        <div>
            <h1 class="text-center m-4">Keranjang Belanja</h1>
        </div>
        <div>
            <a class="btn btn-danger" href="<?php echo base_url('/cartDestroy'); ?>">hapus keranjang</a>
        </div>
        <table class="table table-sm text-black table-bordered">
            <tr align="center">
                <th>Image</th>
                <th>Name Product</th>
                <th>Quantity</th>
                <th>Harga</th>
                <th>Sub Total</th>
                <th>Hapus</th>
            </tr>
            <?php

            $cart = \Config\Services::cart();
            if ($cart->contents()) {
                foreach ($cart->contents() as $field) { ?>
                    <tr class="text-dark">
                        <td> <img src="<?php echo base_url('gambar/' . $field['options']['gambar']) ?>" style="width:100px ;" class="img-fluid p-2 rounded mx-auto d-block"></td>
                        <td><?= $field["name"] ?></td>
                        <td><?= $field["qty"] ?></td>
                        <td><?= $field["price"] ?></td>
                        <td><?= $field["subtotal"] ?></td>
                        <td><a class="btn btn-danger" href="/cartDelete/<?php echo $field['rowid'] ?>">Hapus</a></td>
                    </tr>
            <?php }
            } else {
                echo "<tr><td colspan='5' align='center'>Keranjang Belanja Kosong</td></tr>";
            } ?>
        </table>
        <div>
            <h4>Total : <?= $cart->total() ?></h4>
        </div>
        <div >
            <a class=" btn btn-info text-end text-dark btn " data-bs-toggle="modal" data-bs-target="#staticBackdrop"" href=" <?php echo base_url('/transaksi'); ?>">Checkout</a>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!- modal body ->
                    <div class="modal-body">
                        <form action="<?php echo base_url('/transaksi/input') ?>" method="post" enctype="multipart/form-data">
                            <?= csrf_field() ?>
                            <table class="text-dark">
                                <tr class="pb-2">
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td><input type="text" name="nama" class="input-group-text"></td>
                                </tr>
                                <tr>
                                    <td>No Hp</td>
                                    <td><input type="number" name="no_hp" class="input-group-text  "></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><input type="text" name="alamat" class="input-group-text  "></td>
                                </tr>
                                <tr>
                                    <td>Kecamatan</td>
                                    <td><input type="text" name="kecamatan" class="input-group-text  "></td>
                                </tr>
                                <tr>
                                    <td>Kota</td>
                                    <td><input type="text" name="kota" class="input-group-text  "></td>
                                </tr>
                            </table>
                            <div class="modal-footer">
                                <button type="submit" name="simpan" value="submit" class="btn">submit</button>
                            </div>
                        </form>
                    </div>

            </div>
        </div>
    </div>
</div>