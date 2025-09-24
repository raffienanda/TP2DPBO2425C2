<?php
// Pengiriman.php
require_once __DIR__ . '/Pembelian.php';

class Pengiriman extends Pembelian {
    private $alamat;
    private $ekspedisi;
    private $waktuPengiriman;

    public function setAlamat(string $alamat) {
        $this->alamat = $alamat;
    }

    public function getAlamat(): string {
        return $this->alamat ?? '';
    }

    public function setEkspedisi(string $ekspedisi) {
        $this->ekspedisi = $ekspedisi;
    }

    public function getEkspedisi(): string {
        return $this->ekspedisi ?? '';
    }

    public function setWaktuPengiriman(string $waktu) {
        $this->waktuPengiriman = $waktu;
    }

    public function getWaktuPengiriman(): string {
        return $this->waktuPengiriman ?? '';
    }
}
