<?php

include_once("./Students.php");

$id = $_GET['id'];
$student = Student::show($id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Detail Kunjungan Perpus</title>
</head>
<body>
<nav class="bg-blue-500 p-3 w-full flex justify-between items-center">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-white text-xl font-semibold">Detail Daftar Kunjungan Perpustakaan SMKN 10 JAKARTA</a>
        <ul class="flex space-x-4">
        <li><a href="login.php" class="bg-gray-500 hover:bg-gray-600 p-2 rounded-lg text-white transition-all duration-200">Logout</a></li>
        </ul>
    </div>
</nav>
<!-- Content -->
<div class="container mx-auto my-5">
        <div class="bg-blue-400 rounded-xl shadow-md p-6 w-2/3 mx-auto">
            <div class="flex items-center mb-6 bg-slate-300 rounded-xl p-3">
                <div class="w-1/6">
                    <p class="font-bold text-gray-900">Nama :</p>
                    <p class="font-bold text-gray-900">NIS :</p>
                </div>
                <div class="w-5/6">
                    <p class="text-black"><?= $student['name'] ?></p>
                    <p class="text-black"><?= $student['nis'] ?></p>
                </div>
            </div>

            <div class="text-center">
                <a href="home.php" class="bg-cyan-600 hover:bg-cyan-800 hover:shadow-sm shadow-slate-700 text-white py-2 px-4 rounded-full inline-block transition-all duration-200">Back</a>
            </div>
        </div>
    </div>


<div>
<div class="bg-blue-500 text-center bottom-0 p-3 w-full absolute text-white">Copyright © 2023 Muhammad Rizqi Ramadhan</div>
</div>
</body>
</html>