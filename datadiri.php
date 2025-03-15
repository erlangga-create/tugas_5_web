<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Biodata</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
<div class="bg-white w-full max-w-sm border rounded-lg py-6 px-8 shadow-lg">
    <h1 class="font-bold text-2xl text-center">BIODATA</h1>
    <p class="text-center text-gray-600">Selamat datang, <b><?php echo htmlspecialchars($_SESSION['username']); ?></b></p>
    <form action="cv.php" method="post" enctype="multipart/form-data" class="mt-5">
        <div class="pb-4">
            <label for="nama" class="block text-sm font-semibold text-gray-700">Nama</label>
            <input class="w-full bg-gray-200 border rounded-lg py-2 px-3 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="text" id="nama" name="nama" required autocomplete="off">
        </div>
        <div class="pb-4">
            <label for="ttl" class="block text-sm font-semibold text-gray-700">Tempat & Tanggal Lahir</label>
            <input class="w-full bg-gray-200 border rounded-lg py-2 px-3 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="text" id="ttl" name="ttl" required autocomplete="off">
        </div>
        <div class="pb-4">
            <label for="SMA" class="block text-sm font-semibold text-gray-700">Pendidikan SMA</label>
            <input class="w-full bg-gray-200 border rounded-lg py-2 px-3 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="text" id="SMA" name="SMA" required autocomplete="off">
        </div>
        <div class="pb-4">
            <label for="pendidikan" class="block text-sm font-semibold text-gray-700">Pendidikan Sekarang</label>
            <input class="w-full bg-gray-200 border rounded-lg py-2 px-3 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="text" id="pendidikan" name="pendidikan" required autocomplete="off">
        </div>
        <div class="pb-4">
            <label for="deskripsi" class="block text-sm font-semibold text-gray-700">Deskripsi Saya</label>
            <textarea class="w-full bg-gray-200 border rounded-lg py-2 px-3 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                id="deskripsi" name="deskripsi" required></textarea>
        </div>
        <div class="pb-4">
            <label for="kontak" class="block text-sm font-semibold text-gray-700">Kontak</label>
            <input class="w-full bg-gray-200 border rounded-lg py-2 px-3 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="text" id="kontak" name="kontak" required autocomplete="off">
        </div>
        <div class="pb-4">
            <label for="sosmed" class="block text-sm font-semibold text-gray-700">Instagram</label>
            <input class="w-full bg-gray-200 border rounded-lg py-2 px-3 mt-1 focus:outline-none focus:ring-2 focus:ring-blue-400" 
                type="text" id="sosmed" name="sosmed" required autocomplete="off">
        </div>
        <div class="pb-4">
            <label for="input_foto" class="block text-sm font-semibold text-gray-700">Upload Foto</label>
            <input type="file" name="input_foto" class="file:bg-white file:text-Primary file:font-semibold file:p-2 file:rounded-xl file:mr-2 hover:file:bg-gray-200">
        </div>
        <input class="w-full h-[45px] bg-blue-500 text-white rounded-lg font-bold mt-4 cursor-pointer hover:bg-blue-600" 
            type="submit" name="submit" value="Submit">
    </form>
    
    <form method="post" class="mt-4">
        <button type="submit" name="logout" class="w-full h-[45px] bg-red-500 text-white rounded-lg font-bold cursor-pointer hover:bg-red-600">Logout</button>
    </form>
</div>
</body>
</html>
