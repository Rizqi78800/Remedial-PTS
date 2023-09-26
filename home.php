<?php

include_once('./Students.php');

$students = Student::index();

if(isset($_POST['submit'])){
  $response = Student::create([
    'name' => $_POST['name'],
    'nis' => $_POST['nis'],
    'id' => $_POST['id'],
  ]);

  setcookie('message', $response, time() + 10);

  header("Location: home.php");
}

if(isset($_POST['delete'])) {
  $response= Student::delete($_POST['id']);

  setcookie('message', $response, time() + 10);
  
  header("Location: home.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Kunjungan Perpus</title>
</head>
<body>
<nav class="bg-blue-500 p-3 w-full flex justify-between items-center">
    <div class="container mx-auto flex justify-between items-center">
        <a href="#" class="text-white text-xl font-semibold">Daftar Kunjungan Perpustakaan SMKN 10 JAKARTA</a>
        <ul class="flex space-x-4">
        <li><a href="login.php" class="bg-gray-500 hover:bg-gray-600 p-2 rounded-lg text-white transition-all duration-200">Logout</a></li>
        </ul>
    </div>
</nav>

<?php 
if(isset($_COOKIE['message'])) : ?>
    <div class="pt-3 px-3">
      <p class="p-3 bg-cyan-500 rounded-xl">
        <?=$_COOKIE['message'] ?>
      </p>
    </div>
<?php endif ?>

<!-- main -->
<div class="flex">
        <!-- sidebar -->  
        <div class="basis-1/4 bg-white p-3">
          <div class="bg-blue-300 hover:drop-shadow-xl transition-all duration-300 rounded-xl p-2">
            <h1 class= "text-center text-xl mb-2 font-semibold">Form Input Nilai</h1>
            <form method="POST" action="">
              <div class="mb-3">
                <label class="font-semibold" for="nama">Nama</label>
                <input class="rounded-xl p-1 block w-full border-1 transition duration-300 ease-in-out border-gray-300 focus:outline-none focus:border-teal-500 focus:ring focus:ring-emerald-200 glowing-border" type="text" id="nama" name="name" placeholder="Enter Name" required/>
              </div>
              <div class="mb-3">
                <label class="font-semibold" for="nis">NIS</label>
                <input class="rounded-xl p-1 block w-full border-1 transition duration-300 ease-in-out border-gray-300 focus:outline-none focus:border-teal-500 focus:ring focus:ring-emerald-200 glowing-border" type="number" id="nis"name="nis" placeholder="Enter NIS" required />
              </div>
              
              <div class="grid gap-2">
                <button class="bg-blue-500 hover:bg-blue-700 text-white p-1 rounded-xl transition-all duration-200" type="submit" id="submit" name="submit">SUBMIT</button>
              </div>
            </form>
          </div>
        </div>
        <!-- content -->
        <div class="basis-3/4 p-3">
            <div class="bg-blue-300 rounded-xl p-3">
              <h1 class="text-center text-xl mb-2 font-semibold">Tabel Daftar Nama & NIS Siswa</h1>
                <table class="w-full">
                    <thead>
                        <tr class=" bg-blue-500 border-gray-50 text-white">
                            <th class="px-6 py-3">No.</th>
                            <th class="px-6 py-3 text-left">Nama</th>
                            <th class="px-6 py-3">NIS</th>
                            <th class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                      <?php foreach($students as $key => $student) : ?>
                        <tr class="border border-gray-400 bg-white">
                            <td class="px-6 py-3"><?= $key + 1 ?></td>
                            <td class="text-left px-6 py-3"><?= $student['name'] ?></td>
                            <td class="px-6 py-3"><?= $student['nis'] ?></td>
                            <td class="px-6 py-3">
                              <a href="detail.php?id=<?= $student['id'] ?>" class="bg-blue-500 hover:bg-blue-600 p-2 rounded-lg text-white transition-all duration-200">Detail</a>
                              <a href="edit.php?id=<?= $student['id'] ?>" class="bg-green-500 hover:bg-green-600 p-2 rounded-lg text-white transition-all duration-200">Edit</a>
                              <form action="" method="POST" class="inline" onsubmit="return confirm('Apakah Anda Yakin??');">
                                  <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                  <button name="delete" type="submit" class="bg-red-500 hover:bg-red-600 p-2 rounded-lg text-white transition-all duration-200">Hapus</button>
                              </form>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table> 
        </div>
      </div>
      <div class="bg-blue-500 text-center bottom-0 p-3 w-full absolute text-white">Copyright © 2023 Muhammad Rizqi Ramadhan</div>     
</body>
</html>