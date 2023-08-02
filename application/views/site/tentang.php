<?php
$x = new TopLibrary();
?>

<!-- box utama -->
<?php
$x->content();
$x->column('6');
$x->box('type','success');
  $x->box('title','TENTANG APLIKASI');
  $x->box('body');
    ?>
   Aplikasi ini merupakan aplikasi pengajuan Pengajuan  bagi Dosen Jurusan Sistem Informasi Universitas Sriwijaya Kota Palembang<br>
    
    <?php
  $x->endbox('body');
$x->endbox();
$x->endcolumn();

$x->column('6');
$x->box('type','success');
  $x->box('title','BANTUAN APLIKASI');
  $x->box('body');
    if ($_SESSION['level'] == "admin1") {
      ?>
      <ul>
        <li>Admin 1 Login dari Akun yang telah disediakan.</li>
        <li>Admin 1 dapat memverifikasi setelah Dinas mengirimkan persyaratan, dan kemudian persyaratan diteruskan kepada Admin 2 untuk diverifikasi terakhir.</li>
        <li>Admin 1 dapat mencetak surat berdasarkan kode yang ditukarkan oleh pihak dinas setelah Admin 2 memverifikasi persyaratan yang sebelumnya telah diverifikasi oleh Admin 1.</li>
      </ul>
      <?php
    }
    elseif ($_SESSION['level'] == "admin2") {
      ?>
      <ul>
        <li>Admin 2 Login dari Akun yang telah disediakan.</li>
        <li>Admin 2 dapat memverifikasi setelah Admin 1 memverifikasi persyaratan yang sebelumnya telah diverifikasi oleh Admin 1.</li>
      </ul>

      <?php
    }
    else {
      ?>
      <ul style="margin-bottom:0px;">
        <li>User Login setelah admin membuatkan akun user</li>
        <li>Sistem pengajuan Pengajuan :</li>
        <ol>
          <li>Mengisikan Form Biodata</li>
          <li>Menginputkan Lampiran</li>
          <li>Mengirim Persyaratan kepada Admin jika persyaratan lengkap</li>
        </ol>
        <li>Tunggu Verifikasi ke-2 dari Admin untuk mendapatkan Kartu Pengambilan untuk Menukarkan dengan Surat Izin.</li>
        <li>Setelah menerima notif dari Admin 2, bisa langsung mencetak Kartu Pengambilan untuk ditukarkan.</li>
      </ul>
      <?php
    }
    ?>
    <?php
  $x->endbox('body');
$x->endbox();
$x->endcolumn(); 

$x->endcontent();
 ?>
