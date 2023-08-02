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
    <a href="<?php echo URL.$eizin_type."/".$eizin_id."/view"; ?>"><button type="button" name="button">Kembali</button></a>
    <button type="button" name="button" onclick="C('elem')"></button>
</div>
<div style="padding:5px;padding-bottom:60px;margin-bottom:60px;border:1px solid #777;float:left;width:50%;margin:0 auto;display:inline-block;" id="elem">
    <div style="position: relative;">
        <img src="<?php echo ASSET; ?>img/logounsri.png" style="position: absolute;width:100px;">
        <div style="padding: 0px 15%;font-family: 'Arial';">
            <center>
                <p style="font-size: 20px; margin-bottom: -10px;">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKONOLOGI</p>
                <p style="font-size: 20px; margin-bottom: -20px;">UNIVERSITAS SRIWIJAYA </p>
                <p style="font-size: 20px; margin-bottom: -1px;">FAKULTAS ILMU KOMPUTER </p>
                <span style="font-size:13px; ">Jl Palembang – Prabumulih km 32, Indralaya Ogan Ilir Kode Pos 30662 Telpon (+62711) 379249, 581700 Faksimile (+62711) 379248,581710 Pos-el humas@ilkom.unsri.ac.id
                </span>
            </center>
        </div>
        <hr>
        <hr style="background-color: black;margin-top: -7px; border: 2px solid black;">
        <div style="font-family: sans-serif;">
            <center>
                <p style="font-size: ">
                    SURAT TUGAS DOSEN<br>
                    Nomor : <span style="font-size:13px">/UN9.FIK/TU.ST.<?php echo date('Y'); ?></span>
                </p>
            </center>
        </div>
        <div style="text-align:justify">Berdasarkan permohonan dosen dari Program Studi Sistem Informasi Fakultas Ilmu Komputer Universitas Sriwijaya Nomor 156/UN9.1.9.1/DIII-SI/DL/2023 tanggal <?php echo $data->biodata_tanggal_surat; ?> perihal permohonan surat tugas, maka dengan ini Dekan Fakultas Ilmu Komputer Universitas Sriwijaya memberikan Surat Tugas kepada dosen:</div>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid black;
                padding: 5px;
            }
        </style>
        <span style="padding-bottom: 20px;"><span style="padding-left:2px;"></span></span><br>
        <table>
            <tr>
                <td style="padding-left:40px;">Nama<span style="padding-right: 107px;"></span></td>
                <td><?php echo $data->biodata_nama; ?></td>
            </tr>
            <tr>
                <td style="padding-left:40px;">NIP<span style="padding-right: 120px;"></span></td>
                <td><?php echo $data->biodata_nip; ?></td>
            </tr>
            <tr>
                <td style="padding-left:40px;">Jabatan<span style="padding-right: 90px;"></span></td>
                <td><?php echo $data->biodata_jabatan; ?></td>
            </tr>
            <tr>
                <td style="padding-left:40px;">Alamat Kegiatan<span style="padding-right: 81px;"></span></td>
                <td><?php echo $data->biodata_alamat; ?></td>
            </tr>
        </table>

        <br>
        <br><span style="padding-left:0px;">Untuk Melakasanakan Kegiatan <?php echo $data->biodata_nomor; ?>  <?php echo $data->biodata_jurusan; ?>,mulai tanggal <?php echo $data->biodata_tanggal_surat; ?></span><br>
        <br><span style="padding-left:0px;">Surat tugas ini dibuat untuk dilakukan dengan penuh rasa tanggung jawab.</span></br>

        <br>
<div style="float:right; margin-left:300px;">
    <br>Dikeluarkan di Palembang<br>
    Pada Tanggal : <?php echo $x->format_tanggal_real($tanggal_cetak); ?> <br>
    <b>a.n DEKAN <br>
    <b> Wakil Dekan Bidang Umum dan Keuangan<br>
    <!-- Add signature image here -->
    <img src="<?php echo ASSET; ?>img/ttd.png" alt="Signature" style="width: 150px; margin-top: 20px;"><br>
    <br><u>Mgs.Afriyan Firdaus, S.Si., M.I.T</u><br>
    NIP 198202122006041003</b></center>
</div>
<br>
<div class="" style="position: absolute; width: 95px;margin-top: 75px;margin-left:430px;">
</div>
</br>
        </div>
        <br>
        <div class="" style="position: absolute; width: 95px;margin-top: 75px;margin-left:430px;">
        </div>
        </br>
    </div>
</div>
</div>
</body>
</html>

<script type="text/javascript">
    function C(element){
        var bodyTag = document.body.innerHTML;
        var content = document.getElementById(element).innerHTML;
        document.body.innerHTML = content;
        window.();
        document.body.innerHTML = bodyTag;
    }
</script>


<?php endforeach; ?>
