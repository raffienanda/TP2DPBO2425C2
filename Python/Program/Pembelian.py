class Pembelian:
    def __init__(self):
        self.nama_pembeli = ""            # Nama pembeli
        self.email_pembeli = ""           # Email pembeli
        self.metode_pembayaran = ""       # Metode pembayaran
        self.barang = []                  # List barang yang dibeli

    def set_pembelian(self, nama, email):
        self.nama_pembeli = nama          # Setter nama dan email pembeli
        self.email_pembeli = email

    def set_metode(self, metode):
        self.metode_pembayaran = metode   # Setter metode pembayaran

    def set_barang(self, item):
        self.barang.append(item)          # Tambah barang ke list

    def get_nama(self):
        return self.nama_pembeli          # Getter nama pembeli

    def get_email(self):
        return self.email_pembeli         # Getter email pembeli

    def get_metode(self):
        return self.metode_pembayaran     # Getter metode pembayaran

    def get_barang_list(self):
        return self.barang                # Getter list barang
