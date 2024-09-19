<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require __DIR__ . '/phpmailer/src/PHPMailer.php';
require __DIR__ . '/phpmailer/src/Exception.php';
require __DIR__ . '/phpmailer/src/SMTP.php';

if (isset($_POST['email'], $_POST['subject'],$_POST['nama'], $_FILES['file'])) {

$mail = new PHPMailer(true);

try {

// Server Settings
$mail->isSMTP();
$mail->Host         = 'smtp.gmail.com';
$mail->SMTPAuth     = true;
$mail->Username     = 'ciptolsuciptol@gmail.com';
$mail->Password     = 'qlvqejaryumzwqrj';
$mail->SMTPSecure   = 'tls';
$mail->Port         = 587;

// Recipient
$mail->setFrom('ciptolsuciptol@gmail.com', 'JobsnakerID');
$mail->addAddress($_POST['email'],$_POST['nama']);


// Content
$mail->isHTML(true);
$mail->Subject = $_POST['subject'];
$mail->Body    = "<html>
<head>
   
<body>
   <h1 align='center'>Lamaran Pekerjaan</h1>
<h2>
<br>Kepada Yth.<br>
HRD Personalia<br>
Di Tempat.
<br></br>
<br>Dengan Hormat.</br>
<br>
Mendapat Informasi Lowongan Pekerjaan dari media Sosial JobsnakerID bahwa perusahaan yang sedang Bapak/Ibu pimpin Saat ini sedang membuka lowongan Pekerjaan.<br/> 
<br>Sesuai dengan persyaratan yang tercantum pada Lowongan Pekerjaan Saya memenuhi Syarat Kualifikasi calon tenaga Kerja diperusahaan Bapak/Ibu pimpin. 
Oleh Karena itu saya ingin berpartisipasi mencalonkan diri sebagai Candidat calon tenaga kerja di Perusahan Bapak/Ibu pimpin.<br>
Adapapun Data diri Singkat saya sebagai berikut:</br>
<p>
<table align='center'>
   <tr>
      <td>Nama Lengkap</td>
      <td>:</td>
      <td>Sucipto</td>
   </tr>
   <tr>
      <td>Tempat & Tanggal Lahir</td>
      <td>:</td>
      <td>Tegal, 10 Mei 2000</td>
   </tr>
   <tr>
      <td>Alamat</td>
      <td>:</td>
      <td>Desa kaladawa</td>
   </tr>
   <tr>
      <td>Pendidikan Terakhir</td>
      <td>:</td>
      <td>Smk listrik</td>
   </tr>
   <tr>
      <td>Jurusan</td>
      <td>:</td>
      <td>teknik listrik</td>
   </tr>
   <tr>
      <td>Email</td>
      <td>:</td>
      <td>ciptos213@gmail.com</td>
   </tr>
   <tr>
      <td>No.Handphone</td>
      <td>:</td>
      <td>085942010351</td>
   </tr>
</table>
<br>
<p>Besar Harapan Saya dapat diundang untuk berpartisipasi Ikut Seleksi calon Karyawan di Perusahaan Bapak/Ibu pimpin agar saya dapat berpartisipasi Aktif dalam memajukan Perusahan ini.</p>
<p>Sebagai bahan Pertimbagangan Bapak/Ibu HRD saya lampirkan Berkas pendukung Lainya dalam bentuk Attachment. Sekian dari saya ucapkan terimaksih Atas perhatianya.</p>
<br><br>
<p align='right'>Hormat Saya
<br></br>
Sucipto</p>
<h2>
</body>
</head>
</html>";

// Attachment
$file_path = $_FILES['file']['tmp_name'];
$file_name = $_FILES['file']['name'];
$mail->addAttachment($file_path, $file_name);

// Success Sent Email
$mail->send();
echo "
<script>
alert('Email berhasil dikirim');
document.location.href = 'index.html';
</script>
";
} catch (Exception $e) {
echo "Email tidak terkirim silahkan coba lagi: {$mail->ErrorInfo}";
}
} else {
echo "
<script>
alert('Fill all the inputs!');
document.location.href = 'index.html';
    </script>
    ";
}

?>
