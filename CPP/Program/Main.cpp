#include <iostream>
#include <vector>
#include <iomanip>
#include "kurir.cpp"

using namespace std;

int main() {
    vector<Kurir> daftarKurir;
    int pilihan;

    // Data awal (hardcode sesuai soal)
    Kurir k1;
    k1.setPembelian("Budi", "budi@gmail.com");
    k1.setMetode("Transfer");
    k1.setBarang("Laptop");
    k1.setBarang("iPhone 19");
    k1.setAlamat("Jl. Merdeka 45");
    k1.setEkspedisi("JNE");
    k1.setWaktuPengiriman("2 Hari");
    k1.setNamaKurir("Andi");
    k1.setStatusPengiriman("Sedang Dikirim");
    k1.setNoHP("08123456789");
    daftarKurir.push_back(k1);

    Kurir k2;
    k2.setPembelian("Siti", "siti@yahoo.com");
    k2.setMetode("COD");
    k2.setBarang("Headset");
    k2.setBarang("Keyboard");
    k2.setAlamat("Jl. Asia Afrika 10");
    k2.setEkspedisi("SiCepat");
    k2.setWaktuPengiriman("1 Hari");
    k2.setNamaKurir("Siti");
    k2.setStatusPengiriman("Sampai Tujuan");
    k2.setNoHP("08987654321");
    daftarKurir.push_back(k2);

    Kurir k3;
    k3.setPembelian("Andi", "andi@gmail.com");
    k3.setMetode("COD");
    k3.setBarang("Monitor");
    k3.setAlamat("Jl. Sudirman 5");
    k3.setEkspedisi("J&T");
    k3.setWaktuPengiriman("3 Hari");
    k3.setNamaKurir("Joko");
    k3.setStatusPengiriman("Transit");
    k3.setNoHP("081298765432");
    daftarKurir.push_back(k3);

    Kurir k4;
    k4.setPembelian("Rina", "rina@yahoo.com");
    k4.setMetode("Transfer");
    k4.setBarang("Mouse");
    k4.setBarang("Speaker");
    k4.setBarang("Webcam");
    k4.setAlamat("Jl. Diponegoro 88");
    k4.setEkspedisi("POS");
    k4.setWaktuPengiriman("4 Hari");
    k4.setNamaKurir("Rina");
    k4.setStatusPengiriman("Sedang Dikemas");
    k4.setNoHP("08135554433");
    daftarKurir.push_back(k4);

    Kurir k5;
    k5.setPembelian("Dewi", "dewi@gmail.com");
    k5.setMetode("COD");
    k5.setBarang("Printer");
    k5.setAlamat("Jl. Gajah Mada 21");
    k5.setEkspedisi("TIKI");
    k5.setWaktuPengiriman("2 Hari");
    k5.setNamaKurir("Agus");
    k5.setStatusPengiriman("Menunggu Pickup");
    k5.setNoHP("08223344556");
    daftarKurir.push_back(k5);
    // === Hardcode selesai ===

    do {
        // Tampilkan menu utama
        cout << "\n=== MENU UTAMA ===\n";
        cout << "1. Tambah Data (Pembelian+Pengiriman+Kurir)\n";
        cout << "2. Lihat Semua Daftar Pesanan\n";
        cout << "3. Keluar\n";
        cout << "Pilih: ";
        cin >> pilihan;
        cin.ignore();

        if(pilihan == 1){
            // Input data baru dari user
            Kurir k;
            string nama, email, metode;
            int jumlahBarang;
            string alamat, ekspedisi, waktu;
            string namaKurir, status, noHP;

            cout << "Masukkan Nama Pembeli     : "; getline(cin, nama);
            cout << "Masukkan Email Pembeli    : "; getline(cin, email);
            k.setPembelian(nama, email);

            cout << "Masukkan Metode Pembayaran: (COD / Transfer)"; getline(cin, metode);
            k.setMetode(metode);

            cout << "Jumlah Barang Dibeli      : "; cin >> jumlahBarang;
            cin.ignore();
            for (int i = 0; i < jumlahBarang; ++i) {
                string item;
                cout << "  Barang ke-" << i+1 << " : "; getline(cin, item);
                k.setBarang(item);
            }

            cout << "Masukkan Alamat Pengiriman: "; getline(cin, alamat);
            k.setAlamat(alamat);

            cout << "Masukkan Ekspedisi        : "; getline(cin, ekspedisi);
            k.setEkspedisi(ekspedisi);

            cout << "Masukkan Estimasi Waktu   : "; getline(cin, waktu);
            k.setWaktuPengiriman(waktu);

            cout << "Masukkan Nama Kurir       : "; getline(cin, namaKurir);
            k.setNamaKurir(namaKurir);

            cout << "Masukkan No HP Kurir      : "; getline(cin, noHP);
            k.setNoHP(noHP);

            cout << "Masukkan Status Pengiriman: "; getline(cin, status);
            k.setStatusPengiriman(status);

            daftarKurir.push_back(k);
            cout << "\nData berhasil ditambahkan!\n";

        } else if(pilihan == 2){
            // Tampilkan semua data pesanan dalam bentuk tabel
            if (daftarKurir.empty()) {
                cout << "Belum ada data pesanan.\n";
            } else {
                cout << "\n=== DAFTAR SEMUA DATA PESANAN ===\n";
                cout << left << setw(4)  << "No"
                    << setw(15) << "NamaPembeli"
                    << setw(22) << "Email"
                    << setw(12) << "Metode"
                    << setw(22) << "Alamat"
                    << setw(12) << "Ekspedisi"
                    << setw(12) << "Estimasi"
                    << setw(18) << "NamaKurir"
                    << setw(20) << "Status"
                    << "Barang" << endl;
                cout << string(150, '=') << endl;

                for (size_t i = 0; i < daftarKurir.size(); ++i) {
                    Kurir &k = daftarKurir[i];
                    vector<string> items = k.getBarangList();

                    // Baris pertama: semua kolom + barang pertama
                    cout << left << setw(4)  << i+1
                        << setw(15) << k.getNama()
                        << setw(22) << k.getEmail()
                        << setw(12) << k.getMetode()
                        << setw(22) << k.getAlamat()
                        << setw(12) << k.getEkspedisi()
                        << setw(12) << k.getWaktuPengiriman()
                        << setw(18) << k.getNamaKurir()
                        << setw(20) << k.getStatusPengiriman();

                    if (!items.empty())
                        cout << items[0] << endl;
                    else
                        cout << "-" << endl;

                    // Baris berikutnya: hanya kolom barang (jika barang > 1)
                    for (size_t j = 1; j < items.size(); ++j) {
                        cout << left << setw(4)  << ""
                            << setw(15) << ""
                            << setw(22) << ""
                            << setw(12) << ""
                            << setw(22) << ""
                            << setw(12) << ""
                            << setw(12) << ""
                            << setw(18) << ""
                            << setw(20) << ""
                            << items[j] << endl;
                    }

                    cout << string(150, '-') << endl;
                }
            }
        } 
    } while (pilihan != 3);

    return 0;
}
