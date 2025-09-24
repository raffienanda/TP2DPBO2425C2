<?php
// Kurir.php
require_once __DIR__ . '/Pengiriman.php';

class Kurir extends Pengiriman {
    private $namaKurir;
    private $statusPengiriman;
    private $noHP;
    private $photoFilename; // nama file foto (opsional)

    public function setNamaKurir(string $nama) {
        $this->namaKurir = $nama;
    }

    public function getNamaKurir(): string {
        return $this->namaKurir ?? '';
    }

    public function setStatusPengiriman(string $status) {
        $this->statusPengiriman = $status;
    }

    public function getStatusPengiriman(): string {
        return $this->statusPengiriman ?? '';
    }

    public function setNoHP(string $noHP) {
        $this->noHP = $noHP;
    }

    public function getNoHP(): string {
        return $this->noHP ?? '';
    }

    public function setPhotoFilename(string $name) {
        $this->photoFilename = $name;
    }

    public function getPhotoFilename(): string {
        return $this->photoFilename ?? '';
    }

    // Convert object to array for saving
    public function toArray(): array {
        return [
            'nama' => $this->getNama(),
            'email' => $this->getEmail(),
            'metode' => $this->getMetode(),
            'barang' => $this->getBarangList(),
            'alamat' => $this->getAlamat(),
            'ekspedisi' => $this->getEkspedisi(),
            'waktu' => $this->getWaktuPengiriman(),
            'namaKurir' => $this->getNamaKurir(),
            'status' => $this->getStatusPengiriman(),
            'noHP' => $this->getNoHP(),
            'photo' => $this->getPhotoFilename()
        ];
    }

    // Create object from array (for loading)
    public static function fromArray(array $a): Kurir {
        $k = new Kurir();
        $k->setPembelian($a['nama'] ?? '', $a['email'] ?? '');
        $k->setMetode($a['metode'] ?? '');
        if (!empty($a['barang']) && is_array($a['barang'])) $k->setBarangArray($a['barang']);
        $k->setAlamat($a['alamat'] ?? '');
        $k->setEkspedisi($a['ekspedisi'] ?? '');
        $k->setWaktuPengiriman($a['waktu'] ?? '');
        $k->setNamaKurir($a['namaKurir'] ?? '');
        $k->setStatusPengiriman($a['status'] ?? '');
        $k->setNoHP($a['noHP'] ?? '');
        $k->setPhotoFilename($a['photo'] ?? '');
        return $k;
    }
}
