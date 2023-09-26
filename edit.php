<?php

include_once("./Students.php");

$student = Student::show($_GET['id']);

if(isset($_POST['submit'])){
    $response = Student::update([
        'id' => $_GET['id'],
        'name' => $_POST['name'],
        'nis' => $_POST['nis'],
    ]);

    setcookie('message', $response, time() + 10);

    header('Location: home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Kunjungan Perpus</title>
</head>
<body>
<nav class="bg-blue-500 p-3 w-full flex justify-between items-center">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-white text-xl font-semibold">Edit Daftar Kunjungan Perpustakaan SMKN 10 JAKARTA</a>
        <ul class="flex space-x-4">
        <li><a href="login.php" class="bg-gray-500 hover:bg-gray-600 p-2 rounded-lg text-white transition-all duration-200">Logout</a></li>
        </ul>
    </div>
</nav>

<!-- content -->
<div class="basis-1/4 p-3">
    <div class="bg rounded-xl p-3 bg-blue-500 hover:drop-shadow-xl  transition-all duration-300">
        <h1 class="text-white text-center text-2xl mb-2 font-semibold">Form Edit</h1>
          <input type="hidden" name="id" value="<?=$student['id']?>">
            <form action="" method="POST">
              <div class="mb-3">
                <label class="text-white font-semibold" for="nama">Nama</label>
                <input class="rounded-xl p-1.5 block w-full border-1 transition duration-300 ease-in-out border-gray-300 focus:outline-none focus:border-teal-500 focus:ring focus:ring-emerald-200 glowing-border" type="text" id="nama" name="name" value="<?=$student['name'] ?>" placeholder="Enter Name" required />
              </div>
              <div class="mb-3">
                <label class="text-white font-semibold" for="nis">NIS</label>
                <input class="rounded-xl p-1.5 block w-full border-1 transition duration-300 ease-in-out border-gray-300 focus:outline-none focus:border-teal-500 focus:ring focus:ring-emerald-200 glowing-border" type="number" id="nis" name="nis" value="<?=$student['nis'] ?>" placeholder="Enter NIS" required/>
              </div>
              <div class="grid gap-2">
                <button class="bg-emerald-500 hover:bg-emerald-800 text-white p-1 rounded-xl transition-all duration-200" type="submit" id="submit" name="submit">SUBMIT</button>
              </div>
            </form>
      </div>
  </div>


<div>
<div class="bg-blue-500 text-center bottom-0 p-3 w-full absolute text-white">Copyright © 2023 Muhammad Rizqi Ramadhan</div>
</div>
</body>
</html>