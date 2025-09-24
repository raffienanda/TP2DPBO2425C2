<?php
// Pembelian.php
class Pembelian {
    private $namaPembeli;
    private $emailPembeli;
    private $metodePembayaran;
    private $barang = []; // array of strings

    public function setPembelian(string $nama, string $email) {
        $this->namaPembeli = $nama;
        $this->emailPembeli = $email;
    }

    public function setMetode(string $metode) {
        $this->metodePembayaran = $metode;
    }

    public function setBarang(string $item) {
        $this->barang[] = $item;
    }

    public function setBarangArray(array $items) {
        $this->barang = $items;
    }

    public function getNama(): string {
        return $this->namaPembeli ?? '';
    }

    public function getEmail(): string {
        return $this->emailPembeli ?? '';
    }

    public function getMetode(): string {
        return $this->metodePembayaran ?? '';
    }

    public function getBarangList(): array {
        return $this->barang;
    }
}
