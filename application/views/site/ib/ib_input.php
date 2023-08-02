<?php
$x = new TopLibrary();
$sql_at = $this->db->get_where('tb_attachment_type',["at_id" => $at_id]);
$data_at = $sql_at->row();

$x->content();
$x->column(4);
  $x->box('type','success');
    $x->box('title','Biodata');
    $x->box('body');
     ?>
    <?php foreach ($data_table as $data): ?>
      <form class="" action="" method="post">
        <div class="form-group">
          <label for="">Nama :</label>
          <input type="text" name="biodata_nama" value="<?php echo $data->biodata_nama; ?>" class="form-control" placeholder="Ketikan Nama" required>
        </div>
        <div class="form-group">
          <label for="">Tanggal kegiatan :</label>
          <input type="date" name="biodata_tanggal_surat" value="<?php echo $data->biodata_tanggal_surat; ?>" class="form-control" required>
        </div>
        <div class="form-group">
          <label for="">NIP :</label>
          <input type="text" name="biodata_nip" value="<?php echo $data->biodata_nip; ?>" class="form-control" placeholder="Ketikan NIP" required>
        </div>
        <div class="form-group">
          <label for="">Jabatan :</label>
          <input type="text" name="biodata_jabatan" value="<?php echo $data->biodata_jabatan; ?>" class="form-control" placeholder="Ketikan Jabatan" required>
        </div>
        <div class="form-group">
          <label for="">Program Studi :</label>
          <input type="text" name="biodata_program" value="<?php echo $data->biodata_program; ?>" class="form-control" placeholder="Ketikan Program Studi" required>
        </div>
          <div class="form-group">
          <label for="">Kegiatan :</label>
          <input type="text" name="biodata_nomor" value="<?php echo $data->biodata_nomor; ?>" class="form-control" placeholder="Ketikan Kegiatan" required>
        </div>
        <div class="form-group">
          <label for="">Alamat  :</label>
          <textarea name="biodata_alamat" class="form-control" required placeholder="Ketikan Alamat" rows="8" cols="80"><?php echo $data->biodata_alamat; ?></textarea>
        </div>
        <div class="form-group">
          <label for="">Penyelangara :</label>
          <input type="text" name="biodata_unit_kerja" value="<?php echo $data->biodata_unit_kerja; ?>" class="form-control" placeholder="Ketikan Unit Kerja" required>
        </div>
      <?php endforeach; ?>
      <!-- /.mailbox-read-message -->
    <?php $x->endbox('body'); ?>
    <!-- /.box-body -->
    <?php $x->box('footer'); ?>
      <button type="submit" name="button" class="btn btn-primary" value="button">
        <?php echo $x->icon('save'); ?> Update
      </button>
    </form>
    <?php $x->endbox('footer');
  $x->endbox();
$x->endcolumn();

  $x->column(8);
    $x->box('type','success');
      $x->box('title','Input : '.$data_at->at_nama);
      ?>
      <form class="" action="" method="post" enctype="multipart/form-data">
        <!-- box body -->
        <?php $x->box('body'); ?>
        <?php
        if ($data_upload!=null) {
          ?>
          <div class="alert alert-danger animated shake">
            <h4><i class="fa fa-warning"></i> Opps</h4>
            <?php print_r($data_upload); ?>
          </div>
          <?php
        }
        ?>
        <div class="form-group" style="margin-bottom:0px">
          <label for="">Browse file :</label>
          <input type="file" name="file" value="" class="form-control">
          <small> <i><i class="fa fa-exclamation-circle"></i> Inputan harus PNG/JPG/PDF</i> </small>
        </div>
        <?php $x->endbox('body'); ?>
        <!-- box body -->

        <!-- box-footer -->
        <?php $x->box('footer'); ?>
          <button type="submit" class="btn btn-default" name="upload" value="button">
            <i class="fa fa-cloud-upload"></i> Upload
          </button>
        <?php $x->endbox('footer'); ?>
        <!-- box footer -->
      </form>

      <?php
    $x->endbox();
  $x->endcolumn();
$x->endcontent();
 ?>


 <?php
 if ($data_model == "berhasil") {
   ?>
   <script type="text/javascript">
     swal({
       type : 'success',
       title : 'Sukses',
       text : 'Berhasil diupdate'
     });
   </script>
   <?php
 }
 elseif($data_model == "gagal") {
   ?>
   <script type="text/javascript">
     swal({
       type : 'error',
       title : 'Opps',
       text : 'Gagal diupdate. Silahkan coba kembali'
     });
   </script>
   <?php
 }
  ?>