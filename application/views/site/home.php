<?php
$x = new TopLibrary();
?>

<!-- box utama -->
<?php
$x->content();
?>
<div class="header-brand">
  <div class="header-brand-caption">
    <h1>Selamat Datang</h1>
    <h2>Di Aplikasi Layanan Pengajuan Surat Pengajuan</h2>
      <h2>UNIVERSITAS SRIWIJAYA </h2>
  </div>
  <!-- <a href="#" class="btn btn-primary">
    <i class="fa fa-angle-double-down"></i>
  </a> -->
</div>

<div class="container">
  <div class="" style="margin-top:30px;">
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Pengertian Surat Tugas </h3>
        </div>
        <div class="box-body text-justify">
        Surat Pengajuan adalah intruksi kerja yang dibuat dosen pengampu mata kuliah dalam melaksanakan proses pembelajaran selama satu semester ke depan dalam mencapai tujuan dalam pembelajaran 
        </div>
        <div class="box-footer">


          <a href="<?php echo URL; ?>ib" class="btn btn-default">
            <i class="fa fa-list"></i> Lihat
          </a>

          <a href="<?php echo URL; ?>ib/tambah" class="btn btn-primary">
            <i class="fa fa-pencil-square"></i> Buat
          </a>

        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">PERSYARATAN PENGAJUAN SURAT TUGAS</h3>
        </div>
        <div class="box-body text-justify">
          <ul>
<li>Surat Permintaan Dari Instansi. </li>
<li>Foto Pendukung.</li>
</ul>
      </div>
  </div>
</div>
<?php
$x->endcontent();
 ?>
