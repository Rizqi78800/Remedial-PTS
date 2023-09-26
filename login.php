<?php
// session_start();

// if($_SESSION["username"] !== null){
//     header("Location: home.php");
// }

include_once('./Auth.php');

if(isset($_POST['login'])){
    $data = [
        "username" => $_POST["username"],
        "password" => $_POST["password"],
    ];

    $result = Auth::login($data);
    // die(var_dump($result));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login Perpus</title>
</head>
<body class="bg-[url('img/login.jpg')] bg-cover bg-center ">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h2 class="text-2xl font-semibold mb-4 text-center">Login</h2>
            <form action="home.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="block text-gray-700 text-sm font-medium mb-2">Username</label>
                    <input type="text" id="username" name="username" class="form-control w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200" placeholder="Masukkan Username Anda" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Password</label>
                    <input type="password" id="password" name="password" class="form-control w-full px-3 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring focus:ring-blue-200" placeholder="Masukkan Password Anda" required>
                </div>
                <div class="flex items-center justify-center">
                    <button type="submit" id="login" name="login" class="bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-200">Masuk</button>
                </div>
                <div class="flex items-center justify-center">
                    <div class="text-center px-3 py-2">Belum punya akun? <a class="fw-bold text-red-500" href="register.php">Register Now<a></div>
                </div>      
            </form>
        </div>
    </div>
</body>
</html>