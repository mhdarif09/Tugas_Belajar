<?php
$x = new TopLibrary();

$x->content();

$x->column(12);
$x->box('type', 'success');
$x->box('title', 'Tambah Users');
$x->box('body');
?>

<!-- data model -->
<?php echo $data_model; ?>
<!-- data model -->

<form class="" action="" method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="">Nama Users</label>
    <input type="text" name="dinas_nama" value="" class="form-control" placeholder="Ketikan Nama Users" required>
  </div>
  <div class="form-group">
    <label for="">Username</label>
    <input type="text" name="dinas_user" value="" class="form-control" placeholder="Ketikan Username" required>
  </div>
  <div class="form-group">
    <label for="">Email Users</label>
    <input type="text" name="dinas_email" value="" class="form-control" placeholder="Ketikan Email Users" required>
    <small> <i>* Email dibutuhkan untuk notifikasi</i> </small>
  </div>
  <div class="form-group">
    <label for="">PASSWORD</label>
    <input type="text" name="dinas_password" value="" class="form-control" placeholder="Ketikan Password" required>
  </div>
  <div class="form-group">
    <label for="">Foto Users</label>
    <input type="file" name="dinas_photo" value="" class="form-control">
    <small> <i>* Boleh tidak diisi. Jika diisi, format file harus JPG atau PNG. size maximal 1MB</i> </small>
  </div>
  <?php
  $x->endbox('body');
  $x->box('footer');
  ?>
  <button type="submit" name="button" class="btn btn-primary" value="button">
    <?php echo $x->icon('save'); ?> Simpan
  </button>
</form>

<?php
$x->endbox('footer');
$x->endbox();
$x->endcolumn();

$x->endcontent();
?>