# main.py
from Kurir import Kurir

def main():
    daftar_kurir = []

    # === Hardcode Data Awal ===
    k1 = Kurir()
    k1.set_pembelian("Budi", "budi@gmail.com")
    k1.set_metode("Transfer")
    k1.set_barang("Laptop")
    k1.set_barang("iPhone 19")
    k1.set_alamat("Jl. Merdeka 45")
    k1.set_ekspedisi("JNE")
    k1.set_waktu_pengiriman("2 Hari")
    k1.set_nama_kurir("Andi")
    k1.set_status_pengiriman("Sedang Dikirim")
    k1.set_no_hp("08123456789")
    daftar_kurir.append(k1)

    k2 = Kurir()
    k2.set_pembelian("Siti", "siti@yahoo.com")
    k2.set_metode("COD")
    k2.set_barang("Headset")
    k2.set_barang("Keyboard")
    k2.set_alamat("Jl. Asia Afrika 10")
    k2.set_ekspedisi("SiCepat")
    k2.set_waktu_pengiriman("1 Hari")
    k2.set_nama_kurir("Siti")
    k2.set_status_pengiriman("Sampai Tujuan")
    k2.set_no_hp("08987654321")
    daftar_kurir.append(k2)

    k3 = Kurir()
    k3.set_pembelian("Andi", "andi@gmail.com")
    k3.set_metode("COD")
    k3.set_barang("Monitor")
    k3.set_alamat("Jl. Sudirman 5")
    k3.set_ekspedisi("J&T")
    k3.set_waktu_pengiriman("3 Hari")
    k3.set_nama_kurir("Joko")
    k3.set_status_pengiriman("Transit")
    k3.set_no_hp("081298765432")
    daftar_kurir.append(k3)

    k4 = Kurir()
    k4.set_pembelian("Rina", "rina@yahoo.com")
    k4.set_metode("Transfer")
    k4.set_barang("Mouse")
    k4.set_barang("Speaker")
    k4.set_barang("Webcam")
    k4.set_alamat("Jl. Diponegoro 88")
    k4.set_ekspedisi("POS")
    k4.set_waktu_pengiriman("4 Hari")
    k4.set_nama_kurir("Rina")
    k4.set_status_pengiriman("Sedang Dikemas")
    k4.set_no_hp("08135554433")
    daftar_kurir.append(k4)

    k5 = Kurir()
    k5.set_pembelian("Dewi", "dewi@gmail.com")
    k5.set_metode("COD")
    k5.set_barang("Printer")
    k5.set_alamat("Jl. Gajah Mada 21")
    k5.set_ekspedisi("TIKI")
    k5.set_waktu_pengiriman("2 Hari")
    k5.set_nama_kurir("Agus")
    k5.set_status_pengiriman("Menunggu Pickup")
    k5.set_no_hp("08223344556")
    daftar_kurir.append(k5)
    # === Hardcode selesai ===

    while True:
        print("\n=== MENU UTAMA ===")
        print("1. Tambah Data (Pembelian+Pengiriman+Kurir)")
        print("2. Lihat Semua Daftar Pesanan")
        print("3. Keluar")
        pilihan = input("Pilih: ")

        if pilihan == "1":
            k = Kurir()
            nama = input("Masukkan Nama Pembeli     : ")
            email = input("Masukkan Email Pembeli    : ")
            k.set_pembelian(nama, email)

            metode = input("Masukkan Metode Pembayaran: (COD / Transfer) ")
            k.set_metode(metode)

            jumlah_barang = int(input("Jumlah Barang Dibeli      : "))
            for i in range(jumlah_barang):
                item = input(f"  Barang ke-{i+1} : ")
                k.set_barang(item)

            alamat = input("Masukkan Alamat Pengiriman: ")
            k.set_alamat(alamat)

            ekspedisi = input("Masukkan Ekspedisi        : ")
            k.set_ekspedisi(ekspedisi)

            waktu = input("Masukkan Estimasi Waktu   : ")
            k.set_waktu_pengiriman(waktu)

            nama_kurir = input("Masukkan Nama Kurir       : ")
            k.set_nama_kurir(nama_kurir)

            no_hp = input("Masukkan No HP Kurir      : ")
            k.set_no_hp(no_hp)

            status = input("Masukkan Status Pengiriman: ")
            k.set_status_pengiriman(status)

            daftar_kurir.append(k)
            print("\nData berhasil ditambahkan!")

        elif pilihan == "2":
            if not daftar_kurir:
                print("Belum ada data pesanan.")
            else:
                print("\n=== DAFTAR SEMUA DATA PESANAN ===")
                print(f"{'No':<4}{'NamaPembeli':<15}{'Email':<22}{'Metode':<12}"
                        f"{'Alamat':<22}{'Ekspedisi':<12}{'Estimasi':<12}"
                        f"{'NamaKurir':<18}{'Status':<20}Barang")
                print("="*150)
                for i, k in enumerate(daftar_kurir, start=1):
                    items = k.get_barang_list()
                    print(f"{i:<4}{k.get_nama():<15}{k.get_email():<22}{k.get_metode():<12}"
                            f"{k.get_alamat():<22}{k.get_ekspedisi():<12}{k.get_waktu_pengiriman():<12}"
                            f"{k.get_nama_kurir():<18}{k.get_status_pengiriman():<20}"
                            f"{items[0] if items else '-'}")
                    for item in items[1:]:
                        print(f"{'':<4}{'':<15}{'':<22}{'':<12}"
                                f"{'':<22}{'':<12}{'':<12}"
                                f"{'':<18}{'':<20}{item}")
                    print("-"*150)

        elif pilihan == "3":
            print("Program selesai. Bye!")
            break

        else:
            print("Pilihan tidak valid!")


if __name__ == "__main__":
    main()
