# Vegeere Cipher



### Nama    :RAHMA FAUZIAH AZIZ
### NIM     :312110166
### Kelas   :TI.21.A2
---

### Pengenalan transposition Cipher

"Vigenère Cipher," sebuah teknik enkripsi klasik yang menggunakan kunci yang terdiri dari sejumlah karakter (biasanya kata atau frasa) untuk mengenkripsi teks. Ini adalah metode substitusi yang bergantung pada posisi huruf dalam alfabet. Kunci digunakan berulang kali untuk mengenkripsi teks.

### Enkripsi:

1. Pertama, kode mengkonversi kunci dan sumber teks menjadi huruf besar (uppercase). Hal ini dilakukan untuk memastikan konsistensi dalam pengolahan huruf besar.

2. Kode kemudian melakukan penghapusan karakter non-huruf dari sumber teks dengan mengulangi teks asli dan hanya menyimpan huruf kapital dalam variabel $dest.

3. Selanjutnya, kode mengenkripsi atau mendekripsi karakter per karakter dalam variabel $dest. Ini adalah inti dari Vigenère Cipher.

- Jika $is_encode adalah true, maka kode akan melakukan enkripsi.
- Jika $is_encode adalah false, maka kode akan melakukan dekripsi.
- Proses enkripsi atau dekripsi terdiri dari beberapa langkah:

4. Untuk setiap karakter dalam teks sumber ($dest), kode memeriksa apakah itu huruf kapital. Jika tidak, kode akan melewatkannya tanpa perubahan.
Jika itu huruf kapital, kode akan mengganti karakter tersebut dengan karakter enkripsi sesuai dengan rumus Vigenère Cipher. Karakter ini akan diubah menggunakan perhitungan yang melibatkan huruf-huruf dari alfabet dan kunci yang digunakan pada saat yang bersangkutan. Hasilnya adalah karakter yang telah dienkripsi atau didekripsi.
5. Hasil enkripsi atau dekripsi disimpan kembali ke dalam variabel $dest.
Setelah seluruh teks sumber telah diolah, hasil akhir enkripsi atau dekripsi disimpan dalam variabel $dest dan dikembalikan sebagai output dari fungsi encipher.

### Dkripsi

1. Kode mengkonversi kunci dan sumber teks menjadi huruf besar (uppercase) untuk memastikan konsistensi dalam pengolahan huruf kapital.

2. Kode menghilangkan karakter non-huruf dari sumber teks dengan mengulangi teks asli dan hanya menyimpan huruf kapital dalam variabel $dest.

3. Kemudian, kode melakukan enkripsi atau dekripsi karakter per karakter dalam variabel $dest, sama seperti yang dijelaskan dalam penjelasan kode sebelumnya.

- Jika $is_encode adalah true, maka kode akan melakukan enkripsi.
- Jika $is_encode adalah false, maka kode akan melakukan dekripsi.
4. Proses enkripsi atau dekripsi sama dengan yang dijelaskan dalam penjelasan kode sebelumnya, di mana setiap karakter diubah berdasarkan rumus Vigenère Cipher menggunakan kunci yang sesuai.

5. Hasil enkripsi atau dekripsi disimpan dalam variabel $dest.

6. Setelah seluruh teks sumber telah diolah, hasil akhir enkripsi atau dekripsi disimpan dalam variabel $dest dan dikembalikan sebagai output dari fungsi decipher.
### Database

[Database](login_enkrip.sql)


### Form Register

![alt text](LoginVigenereCipher/img/regis.png)

### Form Login

![alt text](LoginVigenereCipherimg/login.png)
