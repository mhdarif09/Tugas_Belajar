<?php
$x = new TopLibrary();

$x->content();


  $x->column(12);
    $x->box('type','success');
      $x->box('title','tambah biodata');
      $x->box('body');
      ?>

      <!-- data model -->
      <?php echo $data_model; ?>
      <!-- data model -->

       <form class="" action="" method="post" enctype="multipart/form-data">
         <?php $x->tag('div',array('class'=>'row')); ?>
         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Nama :</label>
           <input type="text" name="biodata_nama" value="" class="form-control" placeholder="Ketikan Nama" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Tanggal Kegiatan :</label>
           <input type="date" name="biodata_tanggal_surat" value="" class="form-control">
         </div>
         <?php $x->endcolumn(); ?>
         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">NIP :</label>
           <input type="number" name="biodata_nip" value="" class="form-control" placeholder="Ketikan NIP" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Jabatan :</label>
           <input type="text" name="biodata_jabatan" value="" class="form-control" placeholder="Ketikan Jabatan" required>
         </div>
         <?php $x->endcolumn(); ?>


         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Program Studi :</label>
           <input type="text" name="biodata_program" value="" class="form-control" placeholder="Ketikan Program Studi" required>
         </div>
        
<?php $x->endcolumn(); ?>
<?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Nama Kegiatan :</label>
           <input type="text" name="biodata_jurusan" value="" class="form-control" placeholder="Ketikan Program Studi" required>
         </div>
        
<?php $x->endcolumn(); ?>
<?php $x->column(4); ?>
<div class="form-group">
  <label for="">Jenis Kegiatan :</label>
  <select name="biodata_nomor" class="form-control" required>
    <option value="">Pilih Kegiatan</option>
    <option value="Penelitian"> Penelitian</option>
    <option value="Workshop">Workshop</option>
    <option value="Pengabdian Masyarakat">Pengabdian Masyarakat</option>
    <option value="kegiatan lainnya">Kegiatan Lainnya
    <!-- tambahkan opsi kegiatan lainnya sesuai kebutuhan -->
  </select>
</div>
<?php $x->endcolumn(); ?>



         <?php $x->column(4); ?>
         <div class="form-group">
           <label for="">Penyelenggara/Nama Instansi :</label>
           <input type="text" name="biodata_unit_kerja" value="" class="form-control" placeholder="Ketikan Penyelangara" required>
         </div>
         <?php $x->endcolumn(); ?>

         <?php $x->column(12); ?>
         <div class="form-group">
           <label for="">Alamat Kegiatan:</label>
           <textarea name="biodata_alamat" rows="8" cols="80" class="form-control" placeholder="Ketikan Alamat Kegiatan" required></textarea>
         </div>
         <?php $x->endcolumn(); ?>

         
         <?php $x->endtag('div'); ?>
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
