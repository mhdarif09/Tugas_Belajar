<!-- <div class="jumbotron" style="border-bottom:1px solid #ddd; background-image:url('<?php echo ASSET; ?>img/hexagon.png');background-color:rgb(0, 200, 80);border-radius:0px;">
  <h2 class="text-center">
    <span style="letter-spacing:5px;text-shadow:0px 1px 0px #111;color:#fdfdfd;">
      <?php echo $data_page['parent']; ?>
    </span>
  </h2>
</div>
</div> -->
<?php
$x = new TopLibrary();

$data_order = isset($data_sort)?$data_sort:null;
$menu_terkirim = "default";
$menu_verifikasi1 = "default";
$menu_verifikasi2 = "default";
$menu_belum_terkirim = "default";
$menu_empty = "default";

if ($data_order == "terkirim") {
  $menu_terkirim = "info";
}
elseif ($data_order == "verifikasi 1") {
  $menu_verifikasi1 = "info";
}
elseif ($data_order == "verifikasi 2") {
  $menu_verifikasi2 = "info";
}
elseif ($data_order == "belum dikirim") {
  $menu_belum_terkirim = "info";
}
else {
  $menu_empty = "info";
}

$x->content();
  $x->column(12);
  $x->tag('a',array('attr'=>'href='.URL.'ib/tambah'));
    $x->button('primary','<i class="fa fa-pencil-square"></i> Tambah','style="width:200px;"');
  $x->endtag('a');

    $x->tag('br');
    $x->tag('br');
  $x->endcolumn();


  $x->column(12);
      ?>
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">
          Pengajuan
        </h3>
        <div class="pull-right box-tools">
                  <a href="<?php echo URL; ?>ib">
                    <button type="button" class="btn btn-<?php echo $menu_empty; ?> btn-sm" data-widget="Tampilkan Semua" data-toggle="tooltip" title="" data-original-title="Tampilkan Semua">
                      <i class="fa fa-th-list"></i>
                    </button>
                  </a>
                  <a href="<?php echo URL; ?>ib/tag/belum-dikirim">
                    <button type="button" class="btn btn-<?php echo $menu_belum_terkirim; ?> btn-sm" data-widget="Tampilkan Yang Belum Dikirim" data-toggle="tooltip" title="" data-original-title="Tampilkan Yang Belum Dikirim">
                      <i class="fa fa-archive"></i>
                    </button>
                  </a>
                  <a href="<?php echo URL; ?>ib/tag/terkirim">
                    <button type="button" class="btn btn-<?php echo $menu_terkirim; ?> btn-sm" data-widget="Tampilkan Yang Telah Terkirim" data-toggle="tooltip" title="" data-original-title="Tampilkan Yang Telah Terkirim">
                      <i class="fa fa-paper-plane"></i>
                    </button>
                  </a>
                  <a href="<?php echo URL; ?>ib/tag/verifikasi-1">
                    <button type="button" class="btn btn-<?php echo $menu_verifikasi1; ?> btn-sm" data-widget="Tampilkan Yang Telah Diverifikasi ke 1" data-toggle="tooltip" title="" data-original-title="Tampilkan Yang Telah Diverifikasi ke 1">
                      <i class="fa fa-hourglass-start"></i>
                    </button>
                  </a>
                    <a href="<?php echo URL; ?>ib/tag/verifikasi-2">
                      <button type="button" class="btn btn-<?php echo $menu_verifikasi2; ?> btn-sm" data-widget="Tampilkan Yang Telah Diverifikasi ke 2" data-toggle="tooltip" title="" data-original-title="Tampilkan Yang Telah Diverifikasi ke 2">
                        <i class="fa fa-check-square-o"></i>
                      </button>
                    </a>
              </div>
      </div>
      <div class="box-body">
        <table class="table table-striped dataTable">
          <thead>
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Progress</th>
              <th class="text-center">NIP</th>
              <th class="text-center">Nama</th>
              <th class="text-center">Tanggal Entri</th>
              <th class="text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            foreach ($data_table as $data)
            {
              $this->db->where('at_type' , 'IB');
              $this->db->or_where('at_type' , 'semua');
              $count_at = $this->db->get("tb_attachment_type")->num_rows();
              $count_attachment = $this->db->get_where("tb_attachment",[
                "attachment_eizin_id" => $data->eizin_id
                ])->num_rows();
              ?>
              <tr>
                <td class="text-center">
                  <?php echo $no; ?>
                </td>
                <td class="text-center">
                  <div class="progress progress-sm active" style="margin-bottom:0px">
                <?php
                if ($data->eizin_status == "terkirim") {
                  ?>
                  <div class="progress-bar progress-bar-info progress-bar-striped" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%">
                    <span class="sr-only">50% Complete</span>
                  </div>
                  <?php
                }
                elseif ($data->eizin_status == "verifikasi 1") {
                  ?>
                  <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                    <span class="sr-only">75% Complete</span>
                  </div>
                  <?php
                }
                elseif ($data->eizin_status == "verifikasi 2") {
                  ?>
                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                    <span class="sr-only">100% Complete</span>
                  </div>
                  <?php
                }
                else {
                  if ($count_at == $count_attachment) {
                    ?>
                    <div class="progress-bar progress-bar-warning progress-bar-striped" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">
                      <span class="sr-only">25% Complete</span>
                    </div>
                    <?php
                  }
                  else {
                      ?>
                      <div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="width: 10%">
                        <span class="sr-only">10% Complete</span>
                      </div>
                      <?php
                  }
                }
                ?>
                </div>
                </td>
                <td class="text-center">
                  <?php echo $data->biodata_nip; ?>
                </td>
                <td>
                  <?php echo $data->biodata_nama; ?>
                </td>
                <td class="text-center">
                  <?php echo $x->format_tanggal($data->biodata_entri); ?>
                </td>
                <td>
                  <a href="<?php echo URL; ?>ib/<?php echo $data->biodata_eizin_id; ?>/view" title="Lihat" data-toggle="tooltip">
                    <button type="button" name="button" class="btn btn-default">
                      <i class="fa fa-eye"></i>
                    </button>
                  </a>
                  <?php
                  if ($data->eizin_status == "verifikasi 2") {
                    ?>
                    <a href="<?php echo URL; ?>ib/print_kartu/<?php echo $data->eizin_id; ?>" title="Cetak Kartu Pengambilan" data-toggle="tooltip">
                      <button type="button" name="button" class="btn btn-success">
                        <i class="fa fa-print"></i>
                      </button>
                    </a>
                    <?php
                  }
                  elseif ($data->eizin_status == "belum dikirim") {
                    ?>
                    <button type="button" name="button" class="btn btn-danger delete" data-id="<?php echo $data->eizin_id; ?>">
                      <i class="fa fa-trash"></i>
                    </button>
                    <?php
                  }
                   ?>
                </td>
              </tr>
              <?php
              $no++;
            }
             ?>
          </tbody>
        </table>
      </div>
    </div>
      <?php
  $x->endcolumn();

 ?>


 <script type="text/javascript">

   $('.delete').click(function () {
     data_id = $(this).attr('data-id');

     swal({
       type : 'warning',
       title : 'Konfirmasi',
       text : 'Apakah Anda ingin menghapus data ini ?',
       showCancelButton : true,
       showLoaderOnConfirm : true
     },function () {
       setTimeout(function () {
         $.ajax({
           method : 'post',
           url : '<?php echo URL; ?>ib/hapus_data',
           data : {data_id : data_id},
           success : function () {
             swal({
               type : 'success',
               title : 'Sukses',
               text : 'Berhasil Dihapus'
             },function () {
               window.location = '<?php echo URL; ?>ib';
             })
           }
         })
       },400)
     })
   })
 </script>
