<?php
function bulanRomawi($bulan) {
    $romawi = array(
        1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V', 6 => 'VI',
        7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X', 11 => 'XI', 12 => 'XII'
    );
    return $romawi[$bulan];
}

$x = new TopLibrary();
$custom = new SystemLibrary();
$nomor_surat = 1; // Nomor surat awal
foreach ($data_ib as $data):
    $bulan = date('n');
	?>

  <!DOCTYPE html>
  <html>
    <head>
      <meta charset="utf-8">
      <title><?php echo $data->biodata_nama; ?></title>
    </head>
    <body>
      <div style="float:left;width:49%">
        <a href="<?php echo ADMIN; ?>search"><button type="button" name="button">Kembali</button></a>
        <button type="button" name="button" onclick="printC('elem')">Print</button>
      </div>
      <div style="padding:5px;padding-bottom:60px;margin-bottom:60px;border:1px solid #777;float:left;width:50%;margin:0 auto;display:inline-block;" id="elem">
      <div style="position: relative;">
    <div style="padding: 0px 15%;font-family: 'Arial';">
      <center>
        <p style="font-weight: bold; font-size: 20px; margin-bottom: -10px;">SURAT REKOMENDASI  DOSEN</p>
        </span>
      </center>
      </div>
        <hr>
        <hr style="background-color: black;margin-top: -7px; border: 2px solid black;">
        <div style="font-family: sans-serif;">
  <div style="text-align:justify">Yth Wakil Dekan Di Tempat</div>
            <br><span style="padding-left:0px;">Dengan Hormat Saya</span></br>
            <br><span style="padding-left:0px;">Saya Yang bertanda tangan dibawah ini</span></br></div>

<span style="padding-bottom: 20px;"><span style="padding-left:2px;"></span></span><br>
<table>
    <span style="padding-left:40px;">Nama : <?php echo $data->biodata_nama; ?>
    <BR>
    <span style="padding-left:40px;">NIP : <?php echo $data->biodata_nip; ?>


      			<br>
      			<br><span style="padding-left:0px;">Dengan ini menyatakan mengajukan permohonan untuk dukungan untuk agenda yang akan saya laksanakan. Saya berharap agar mendapat dukungan serta doa agar agenda yang akan saya laksanakan dapat berjalan dengan lancar</span><br>
            <br>
            <br><span style="padding-left:0px;">Demikianlah permohonan dukungan ini saya sampaikan. Saya berharap agar bapak / ibu Wakil Dekan dapat mempertimbangkan permohonan ini dengan baik,terima kasih atas perhatian dan kesediaan dalam mendukung acara kami.a</span></br>

            <div style="float:right; margin-left:300px;	">
      				<b>HORMAT SAYA <br>
      				<br><br><br><br><br>
      				<br><br><?php echo $data->biodata_nama; ?><u></u><br>
      			</div>
                <br>
            <div class="" style="position: absolute; width: 95px;margin-top: 75px;margin-left:430px;">
            </div>
</br>
      		</div>
      	</div>
        </div>
      </div>
    </body>
  </html>

  <script type="text/javascript">
  function printC(element){
    var bodyTag = document.body.innerHTML;
    var content = document.getElementById(element).innerHTML;
    document.body.innerHTML = content;
    window.print();
    document.body.innerHTML = bodyTag;
  }
  </script>

<?php endforeach; ?>
