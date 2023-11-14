<?php
// Proses enkripsi karakter per karakter
function encipher($src, $key, $is_encode)
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
// Mengkonversi kunci dan sumber teks menjadi huruf besar (uppercase)
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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil nilai dari formulir
    $email = $_POST['email'];
    $password = $_POST['password'];
    $key = "kuncisaya";

    // Enkripsi password menggunakan fungsi Vigenere Cipher
    $encrypted_password = encipher($password, $key, true); // true untuk enkripsi

    // Koneksi ke database dan masukkan data pendaftaran ke dalam tabel
    $servername = "localhost"; 
    $username = "root";
    $password_db = ""; 
    $dbname = "login_enkrip"; 

    $conn = new mysqli($servername, $username, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Koneksi database gagal: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user (email, password) VALUES ('$email', '$encrypted_password')";
?>


<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Form Registrasi</h2>
    <div class="container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Daftar">
      <p>sudah punya akun?<a href="login.php">login</a></p>
      <?php
    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!<br>";
        echo "password = $password<br>";
        echo "key = $key<br>";
        echo "enkripsi password = $encrypted_password";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
    </form>
    </div>
</body>
</html>
