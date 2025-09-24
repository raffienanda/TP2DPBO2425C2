from Pengiriman import Pengiriman

# Kelas Kurir turunan dari Pengiriman
class Kurir(Pengiriman):
    def __init__(self):
        super().__init__()
        self.nama_kurir = ""           # Nama kurir
        self.status_pengiriman = ""    # Status pengiriman
        self.no_hp = ""                # Nomor HP kurir

    def set_nama_kurir(self, nama):
        self.nama_kurir = nama         # Setter nama kurir

    def get_nama_kurir(self):
        return self.nama_kurir         # Getter nama kurir

    def set_status_pengiriman(self, status):
        self.status_pengiriman = status    # Setter status pengiriman

    def get_status_pengiriman(self):
        return self.status_pengiriman      # Getter status pengiriman

    def set_no_hp(self, no_hp):
        self.no_hp = no_hp             # Setter nomor HP kurir

    def get_no_hp(self):
        return self.no_hp              # Getter nomor HP kurir
