<?php
// index.php
require_once __DIR__ . '/Kurir.php';

define('UPLOAD_DIR', __DIR__ . '/uploads/');

// Pastikan folder uploads ada
if (!is_dir(UPLOAD_DIR)) {
    mkdir(UPLOAD_DIR, 0755, true);
}

// proses form submit
$errors = [];
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add') {
    // ambil input (sanitize)
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $metode = trim($_POST['metode'] ?? '');
    $alamat = trim($_POST['alamat'] ?? '');
    $ekspedisi = trim($_POST['ekspedisi'] ?? '');
    $waktu = trim($_POST['waktu'] ?? '');
    $namaKurir = trim($_POST['namaKurir'] ?? '');
    $noHP = trim($_POST['noHP'] ?? '');
    $status = trim($_POST['status'] ?? '');
    $barang = [];
    if (!empty($_POST['barang']) && is_array($_POST['barang'])) {
        foreach ($_POST['barang'] as $it) {
            $it = trim($it);
            if ($it !== '') $barang[] = $it;
        }
    }

    if ($nama === '') $errors[] = 'Nama pembeli wajib diisi.';
    if ($email === '') $errors[] = 'Email pembeli wajib diisi.';

    // proses upload foto (opsional)
    $uploadedFilename = '';
    if (!empty($_FILES['photo']) && $_FILES['photo']['error'] !== UPLOAD_ERR_NO_FILE) {
        $file = $_FILES['photo'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
            $errors[] = 'Upload foto gagal (error code ' . $file['error'] . ').';
        } else {
            $allowed = ['image/jpeg','image/png','image/gif'];
            $finfoType = mime_content_type($file['tmp_name']);
            if (!in_array($finfoType, $allowed)) {
                $errors[] = 'Tipe file tidak diijinkan. Gunakan JPG/PNG/GIF.';
            } else {
                $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
                $uploadedFilename = uniqid('foto_') . '.' . $ext;
                $moveTo = UPLOAD_DIR . $uploadedFilename;
                if (!move_uploaded_file($file['tmp_name'], $moveTo)) {
                    $errors[] = 'Gagal memindahkan file upload.';
                }
            }
        }
    }

    if (empty($errors)) {
        $success = 'Data berhasil ditambahkan! (sementara hanya tampil saat refresh halaman)';
        // buat data baru ditambah ke array sementara (tidak disimpan ke file)
        $allDataNew = [
            'nama' => $nama,
            'email' => $email,
            'metode' => $metode,
            'barang' => $barang,
            'alamat' => $alamat,
            'ekspedisi' => $ekspedisi,
            'waktu' => $waktu,
            'namaKurir' => $namaKurir,
            'noHP' => $noHP,
            'status' => $status,
            'photo' => $uploadedFilename
        ];
    }
}

// hardcode 5 data awal
$allData = [
    [
        'nama' => 'Raffie Arsy',
        'email' => 'raffie@example.com',
        'metode' => 'Transfer',
        'barang' => ['Laptop', 'Mouse'],
        'alamat' => 'Jl. Merdeka No.12',
        'ekspedisi' => 'JNE',
        'waktu' => '2 Hari',
        'namaKurir' => 'Andi',
        'noHP' => '08123456789',
        'status' => 'Sedang Dikirim',
        'photo' => 'foto_1.png'
    ],
    [
        'nama' => 'Nadia Lestari',
        'email' => 'nadia@example.com',
        'metode' => 'COD',
        'barang' => ['HP', 'Mouse', 'Keyboard'],
        'alamat' => 'Jl. Sudirman No.45',
        'ekspedisi' => 'TIKI',
        'waktu' => '1 Hari',
        'namaKurir' => 'Budi',
        'noHP' => '08987654321',
        'status' => 'Sampai Tujuan',
        'photo' => 'foto_2.png'
    ],
    [
        'nama' => 'Ahmad Fauzi',
        'email' => 'ahmad@example.com',
        'metode' => 'Transfer',
        'barang' => ['Speaker Bluetooth'],
        'alamat' => 'Jl. Gatot Subroto No.89',
        'ekspedisi' => 'POS Indonesia',
        'waktu' => '3 Hari',
        'namaKurir' => 'Citra',
        'noHP' => '082112345678',
        'status' => 'Sedang Dikirim',
        'photo' => 'foto_3.png'
    ],
    [
        'nama' => 'Budi',
        'email' => 'budi@gmail.com',
        'metode' => 'COD',
        'barang' => ['Monitor', 'Keyboard'],
        'alamat' => 'Jl. Paket',
        'ekspedisi' => 'J&T',
        'waktu' => '2 Hari',
        'namaKurir' => 'Adit',
        'noHP' => '08129089934',
        'status' => 'Sedang Dikirim',
        'photo' => 'foto_4.png'
    ],
    [
        'nama' => 'Wahyu',
        'email' => 'wahyu@gmail.com',
        'metode' => 'COD',
        'barang' => ['Headset', 'Keyboard'],
        'alamat' => 'Jl. Sinar',
        'ekspedisi' => 'J&T',
        'waktu' => '3 Hari',
        'namaKurir' => 'Mulyono',
        'noHP' => '08595875939',
        'status' => 'Sedang Dikirim',
        'photo' => 'foto_5.png'
    ]
];

// kalau ada data baru dari form, masukkan ke array sementara
if (!empty($allDataNew)) {
    $allData[] = $allDataNew;
}

function e($s) { return htmlspecialchars((string)$s, ENT_QUOTES|ENT_SUBSTITUTE, 'UTF-8'); }
?>
<!doctype html>
<html lang="id">
<head>
<meta charset="utf-8">
<title>App Pengiriman - PHP</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
body{font-family: Arial, Helvetica, sans-serif; margin:20px;}
table{border-collapse:collapse; width:100%;}
th,td{border:1px solid #ccc; padding:8px; text-align:left;}
th{background:#f0f0f0;}
.small{font-size:0.9em; color:#555;}
.success{color:green;}
.error{color:red;}
.flex {display:flex; gap:12px; align-items:center;}
.btn {padding:8px 12px; border-radius:4px; background:#1976d2; color:white; text-decoration:none; display:inline-block;}
.btn:hover{opacity:0.9;}
.add-barang {margin-bottom:8px;}
.img-thumb{max-width:80px; max-height:80px;}
</style>
<script>
function addBarangInput() {
  const container = document.getElementById('barangContainer');
  const div = document.createElement('div');
  div.className = 'add-barang';
  div.innerHTML = '<input type="text" name="barang[]" placeholder="Nama barang" style="width:70%"/> <button type="button" onclick="this.parentNode.remove()">Hapus</button>';
  container.appendChild(div);
}
window.addEventListener('DOMContentLoaded', function(){
  document.getElementById('addBarangBtn').addEventListener('click', addBarangInput);
});
</script>
</head>
<body>

<h2>App Pengiriman (PHP) — Tambah Data</h2>

<?php if (!empty($success)): ?>
  <p class="success"><?= e($success) ?></p>
<?php endif; ?>

<?php if (!empty($errors)): ?>
  <div class="error">
    <ul>
      <?php foreach ($errors as $err): ?><li><?= e($err) ?></li><?php endforeach; ?>
    </ul>
  </div>
<?php endif; ?>

<form method="post" enctype="multipart/form-data">
  <input type="hidden" name="action" value="add">
  <fieldset>
    <legend>Data Pembeli</legend>
    <label>Nama Pembeli: <br><input type="text" name="nama" required></label><br><br>
    <label>Email Pembeli: <br><input type="email" name="email" required></label><br><br>
    <label>Metode Pembayaran: <br>
      <select name="metode">
        <option value="Transfer">Transfer</option>
        <option value="COD">COD</option>
      </select>
    </label>
  </fieldset>

  <fieldset>
    <legend>Barang (bisa lebih dari 1)</legend>
    <div id="barangContainer">
      <div class="add-barang">
        <input type="text" name="barang[]" placeholder="Nama barang" style="width:70%"/>
      </div>
    </div>
    <p><button type="button" id="addBarangBtn" class="btn">Tambah Barang</button></p>
  </fieldset>

  <fieldset>
    <legend>Pengiriman</legend>
    <label>Alamat: <br><input type="text" name="alamat" style="width:60%"></label><br><br>
    <label>Ekspedisi: <br><input type="text" name="ekspedisi"></label><br><br>
    <label>Estimasi Waktu: <br><input type="text" name="waktu" placeholder="2 Hari / 1 Hari"></label>
  </fieldset>

  <fieldset>
    <legend>Kurir & Foto</legend>
    <label>Nama Kurir: <br><input type="text" name="namaKurir"></label><br><br>
    <label>No HP Kurir: <br><input type="text" name="noHP"></label><br><br>
    <label>Status Pengiriman: <br><input type="text" name="status" placeholder="Sedang Dikirim / Sampai Tujuan"></label><br><br>
    <label>Foto Kurir (opsional, jpg/png/gif): <br><input type="file" name="photo" accept="image/*"></label>
  </fieldset>

  <p><button type="submit" class="btn">Tambah Data</button></p>
</form>

<hr>

<h3 id="semua">Daftar Semua Data</h3>
<?php if (empty($allData)): ?>
  <p>Belum ada data.</p>
<?php else: ?>
<table>
<thead>
<tr>
  <th>No</th>
  <th>Nama Pembeli</th>
  <th>Email</th>
  <th>Metode</th>
  <th>Barang</th>
  <th>Alamat</th>
  <th>Ekspedisi</th>
  <th>Estimasi</th>
  <th>Nama Kurir</th>
  <th>No HP</th>
  <th>Status</th>
  <th>Foto Kurir</th>
</tr>
</thead>
<tbody>
<?php foreach ($allData as $i => $r): ?>
<tr>
  <td><?= $i+1 ?></td>
  <td><?= e($r['nama'] ?? '') ?></td>
  <td><?= e($r['email'] ?? '') ?></td>
  <td><?= e($r['metode'] ?? '') ?></td>
  <td>
    <?php
    $items = $r['barang'] ?? [];
    if (empty($items)) echo '-';
    else { echo '<ul>'; foreach ($items as $it) echo '<li>' . e($it) . '</li>'; echo '</ul>'; }
    ?>
  </td>
  <td><?= e($r['alamat'] ?? '') ?></td>
  <td><?= e($r['ekspedisi'] ?? '') ?></td>
  <td><?= e($r['waktu'] ?? '') ?></td>
  <td><?= e($r['namaKurir'] ?? '') ?></td>
  <td><?= e($r['noHP'] ?? '') ?></td>
  <td><?= e($r['status'] ?? '') ?></td>
  <td>
    <?php if (!empty($r['photo']) && file_exists(UPLOAD_DIR . $r['photo'])): ?>
      <img src="<?= 'uploads/' . e($r['photo']) ?>" alt="foto" class="img-thumb">
    <?php else: ?>
      -
    <?php endif; ?>
  </td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<?php endif; ?>

</body>
</html>
