<?php
// Proses  dekripsi karakter per karakter
function decipher($src, $key, $is_encode)
{

    $key = strtoupper($key);
    $src = strtoupper($src);
    $dest = '';

    // Menghilangkan karakter non-huruf dari sumber teks
    for ($i = 0; $i < strlen($src); $i++) {
        $char = substr($src, $i, 1);
        if (ctype_upper($char)) {
            $dest .= $char;
        }
    }
// Proses enkripsi atau dekripsi karakter per karakter
    for ($i = 0; $i < strlen($dest); $i++) {
        $char = substr($dest, $i, 1);
        if (!ctype_upper($char)) {
            continue;
        }
        $dest = substr_replace($dest,
            chr(
                ord('A') +
                ($is_encode
                    ? (ord($char) - ord('A') + ord($key[$i % strlen($key)]) - ord('A')) % 26
                    : (ord($char) - ord($key[$i % strlen($key)]) + 26) % 26
                )
            )
        , $i, 1);
    }

    return $dest;
}

// Proses login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];
    $key = "kuncisaya"; 

    // Enkripsi password yang dimasukkan oleh pengguna
    $decrypted_password = decipher($password, $key, true); // true untuk enkripsi

    // Koneksi ke database dan periksa login
    $servername = "localhost"; 
    $username = "root"; 
    $password_db = ""; 
    $dbname = "login_enkrip"; 

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    // Query untuk memeriksa login
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$decrypted_password'";
    $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Login</title>
    <link rel="stylesheet"  href="style.css">
    <style>
        /* Style for the login and registration forms */


    </style>
</head>
<body>
    <div class="container">
    <h2>Form Login</h2>
    <form  method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Login">
        <p>Belum punya akun?<a href="register.php">Registrasi</a></p>
        <?php
    if ($result->num_rows > 0) {
        echo "Login berhasil!<br>";
        echo "password enkripsi= $password<br>";
        echo "key = $key<br>";
        echo "dekripsi password = $decrypted_password";
    } else {
        // Login gagal
        echo "Login gagal. Silakan coba lagi.";
    }

    $conn->close();
}
?>
    </form>
    </div>
</body>
</html>
