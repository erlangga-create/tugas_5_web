<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_POST['submit'])) {
    die("<script>alert('Form tidak dikirim dengan benar!'); window.history.back();</script>");
}

$target_dir = "uploads/";
if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($_FILES["input_foto"]["name"], PATHINFO_EXTENSION));
$target_file = $target_dir . time() . "_" . basename($_FILES["input_foto"]["name"]);

if ($_FILES["input_foto"]["size"] > 2000000) {
    die("<script>alert('Ukuran file terlalu besar!'); window.history.back();</script>");
}

if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    die("<script>alert('Hanya file JPG, JPEG, dan PNG yang diperbolehkan!'); window.history.back();</script>");
}

if (!move_uploaded_file($_FILES["input_foto"]["tmp_name"], $target_file)) {
    die("<script>alert('Gagal mengunggah gambar!'); window.history.back();</script>");
}

$foto_path = htmlspecialchars($target_file);
$nama = htmlspecialchars($_POST["nama"]);
$kontak = htmlspecialchars($_POST["kontak"]);
$sosmed = htmlspecialchars($_POST["sosmed"]);
$deskripsi = htmlspecialchars($_POST["deskripsi"]);
$ttl = htmlspecialchars($_POST["ttl"]);
$pendidikan = htmlspecialchars($_POST["pendidikan"]);
$SMA = htmlspecialchars($_POST["SMA"]);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CV - <?php echo $nama; ?></title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: linear-gradient(135deg, white, #8b9dc3);
            font-family: 'Roboto', sans-serif;
            padding: 20px;
        }
        .cv-container {
            width: 100%;
            max-width: 900px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            display: flex;
            overflow: hidden;
        }
        .left-side {
            width: 35%;
            background: #ECF0F1;
            padding: 20px;
            text-align: center;
        }
        .left-side img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .right-side {
            width: 65%;
            padding: 20px;
        }
        .header {
            background: #2C3E50;
            color: white;
            text-align: center;
            padding: 20px;
        }
        .header h1 {
            font-size: 28px;
            margin-bottom: 5px;
        }
        .section-title {
            background: #2C3E50;
            color: white;
            padding: 8px;
            text-align: center;
            border-radius: 8px;
            margin-bottom: 10px;
        }
        .list {
            list-style: none;
            padding-left: 15px;
        }
        .list li::before {
            content: '\2022';
            color: #2C3E50;
            font-weight: bold;
            display: inline-block;
            width: 1em;
            margin-left: -1em;
        }
    </style>
</head>
<body>
    <div class="cv-container">
        <div class="left-side">
            <img src="<?php echo $foto_path; ?>" alt="Foto Profil">
            <div class="section-title">KONTAK</div>
            <ul class="list">
                <li>📞 <?php echo $kontak; ?></li>
                <li>📷 <?php echo $sosmed; ?></li>
            </ul>
            <div class="section-title">KEMAMPUAN</div>
            <ul class="list">
                <li>Ms. Word</li>
                <li>Ms. Excel</li>
                <li>Canva</li>
                <li>Java</li>
                <li>HTML, CSS, JavaScript</li>
            </ul>
        </div>
        <div class="right-side">
            <div class="header">
                <h1><?php echo $nama; ?></h1>
                <h2>S1 Sistem Informasi</h2>
            </div>
            <div class="section-title">TENTANG SAYA</div>
            <p><?php echo $deskripsi; ?></p>
            <div class="section-title">DATA DIRI</div>
            <ul class="list">
                <li><?php echo $ttl; ?></li>
            </ul>
            <div class="section-title">JENJANG PENDIDIKAN</div>
            <ul class="list">
                <li><?php echo $SMA; ?></li>
                <li><?php echo $pendidikan; ?></li>
            </ul>
        </div>
    </div>
</body>
</html>
