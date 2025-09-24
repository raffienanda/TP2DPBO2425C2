from Pembelian import Pembelian

# Kelas Pengiriman turunan dari Pembelian
class Pengiriman(Pembelian):
    def __init__(self):
        super().__init__()
        self.alamat = ""               # Alamat pengiriman
        self.ekspedisi = ""            # Nama ekspedisi
        self.waktu_pengiriman = ""     # Estimasi waktu pengiriman

    def set_alamat(self, alamat):
        self.alamat = alamat           # Setter alamat pengiriman

    def get_alamat(self):
        return self.alamat             # Getter alamat pengiriman

    def set_ekspedisi(self, ekspedisi):
        self.ekspedisi = ekspedisi     # Setter nama ekspedisi

    def get_ekspedisi(self):
        return self.ekspedisi          # Getter nama ekspedisi

    def set_waktu_pengiriman(self, waktu):
        self.waktu_pengiriman = waktu  # Setter estimasi waktu pengiriman

    def get_waktu_pengiriman(self):
        return self.waktu_pengiriman   # Getter estimasi waktu pengiriman
