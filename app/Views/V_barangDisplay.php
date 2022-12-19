<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Nova Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url() ?>/assets/img/favicon.png" rel="icon">
  <link href="<?php echo base_url() ?>/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>/assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Nova - v1.2.1
  * Template URL: https://bootstrapmade.com/nova-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
  <div class="container-fluid" style="margin-top:100px ;">
    <table class="table table-sm text-light table-bordered table-dark table-hover align-middle">
      <div class="text-center container py-5">
        <div class="row ">
          <?php
          foreach ($barang as $field) { ?>
            <div class="col-lg-3 mb-3">
              <?php echo form_open('/addCart'); 
              echo form_hidden('id', $field['id']) ;
              echo form_hidden('name', $field['nama_barang']) ;
              echo form_hidden('price', $field['harga_barang']) ;
              echo form_hidden('gambar', $field['link_gambar']) ;
              ?>
              <div class="card h-100">
                <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light" data-mdb-ripple-color="light">
                  <img src="<?php echo base_url() ?>/gambar/<?= $field["link_gambar"] ?>" class="w-100" />
                  <a href="#!">
                    <div class="mask">
                      <div class="d-flex justify-content-start align-items-end h-100">
                        <h5><span class="badge bg-primary ms-2">New</span></h5>
                      </div>
                    </div>
                    <div class="hover-overlay">
                      <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                  </a>
                </div>
                <div class="card-body">
                  <a class="text-reset">
                    <h5 class="card-title mb-3"><?= $field["nama_barang"] ?></h5>
                  </a>
                  <a class="text-reset">
                    <p><?= $field["stok"] ?></p>
                  </a>
                  <h6 class="mb-3"><?= $field["harga_barang"] ?></h6>
                  <button class="btn btn-primary" type="submit">Tambah ke Chart</button>
                </div>
              </div>
              <?php echo form_close(); ?>
            </div>
          <?php } ?>
        </div>
      </div>
    </table>
    <table class="table table-sm text-light">
      <form action='/barang/inputDisplay' method="POST">
        <input type='submit' value='input' class="btn btn-secondary m-2">
      </form>
      <form action='/barang/grafik' method="get">
        <input type='submit' value='grafik' class="btn btn-secondary m-2">
      </form>

    </table>
  </div>

  <!-- Vendor JS Files -->
  <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/aos/aos.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="<?php echo base_url() ?>/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="<?php echo base_url() ?>/assets/js/main.js"></script>
</body>