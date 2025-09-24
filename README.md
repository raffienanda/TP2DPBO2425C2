# JANJI
Saya Raffie Arsy Ananda dengan NIM 2405916 mengerjakan Tugas Praktikum 2 dalam mata kuliah Desain Pemrograman Berbasis Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.
<hr>

#DESAIN PROGRAM
Pada desain program kali ini terdapat 3 class yang bertemakan toko elektronik, dengan atribut.
- Class Pembelian
  1. nama_pembelian
  2. email_pembelian
  3. metode_pembayaran
  4. nama_barang
  5. photoFileName (khusus PHP)
 
- Class Pengiriman
  1. alamat
  2. ekspedisi
  3. waktuPengiriman
 
- Class Kurir
  1. namaKurir
  2. statusPengiriman
  3. noHP
 
Saya mendesain OOP dengan model multilevel inheritance, untuk penjelasannya sebagai berikut.
  Pertama pada class Pembelian saya menjadikannya sebagai base class, yang dimana isinya terdapat keterangan pembelian yang telah dilakukan oleh user.
  Kedua terdapat class Pengiriman yang menjadi anak dari class Pembelian (Intermediary Class), karena class Pengiriman berisi data alamat dan ekspedisi yang dimana berkaitan dengan data barang yang berada di class Pembelian. Pada pengiriman   barang pasti dibutuhkan data barang dan pemesan.
  Ketiga terdapat Class Kurir yang menjadi anak dari class Pengiriman dan cucu dari class Pembelian (Derived Class). Saya menjadikan class Kurir sebagai Derived Class karena kurir pasti memiliki data dari barang pembelian pada paketnya yang   akan dikirim dan kurir juga pasti harus mengetahui alamat pembeli, selain itu kurir juga mengetahui dia dari ekspedisi apa dan estimasi sampainya paket agar tidak telat.
<hr>

#DIAGRAM
<img width="477" height="946" alt="image" src="https://github.com/user-attachments/assets/af98260c-35a2-48ec-b1e8-bcdeb4605a6d" />
<hr>

#PENJELASAN ALUR PROGRAM
Untuk kode program C++, Java, Python menggunakan tampilan yang sama persis, yaitu.
  1. ADD data
  2. Menampilkan seluruh data dalam bentuk tabel
  3. Keluar program
Pemilihan opsi menggunakan inputan angka dari user, perintah yang dilakukan sesuai dengan nomor di atas. Program akan terus berjalan selama user belum mengetik angka 6.
  - pada saat menambahkan data user akan diminta untuk memasukkan data satu persatu, dimulai dari nama hingga nomor hape.
  - jika menampilkan data makan tabel akan langsung muncul
  - jika keluar, program akan langsung berhenti

Pada kode program php ditampilkan menggunakan HTML dalam bentuk form untuk menambahkan data dan table untuk menampilkan data. User dapat menambahkan data dengan mengisi kolom sesuai keterangan dan menekan tombol 
<hr>

#

