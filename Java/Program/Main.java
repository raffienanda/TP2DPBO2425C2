import java.util.*;

public class Main {
    public static void main(String[] args) {
        List<Kurir> daftarKurir = new ArrayList<>();
        Scanner sc = new Scanner(System.in);
        int pilihan;

        // === Hardcode Data ===
        Kurir k1 = new Kurir();
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
        daftarKurir.add(k1);

        Kurir k2 = new Kurir();
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
        daftarKurir.add(k2);

        Kurir k3 = new Kurir();
        k3.setPembelian("Andi", "andi@gmail.com");
        k3.setMetode("COD");
        k3.setBarang("Monitor");
        k3.setAlamat("Jl. Sudirman 5");
        k3.setEkspedisi("J&T");
        k3.setWaktuPengiriman("3 Hari");
        k3.setNamaKurir("Joko");
        k3.setStatusPengiriman("Transit");
        k3.setNoHP("081298765432");
        daftarKurir.add(k3);

        Kurir k4 = new Kurir();
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
        daftarKurir.add(k4);

        Kurir k5 = new Kurir();
        k5.setPembelian("Dewi", "dewi@gmail.com");
        k5.setMetode("COD");
        k5.setBarang("Printer");
        k5.setAlamat("Jl. Gajah Mada 21");
        k5.setEkspedisi("TIKI");
        k5.setWaktuPengiriman("2 Hari");
        k5.setNamaKurir("Agus");
        k5.setStatusPengiriman("Menunggu Pickup");
        k5.setNoHP("08223344556");
        daftarKurir.add(k5);
        // === Hardcode selesai ===

        do {
            // Tampilkan menu utama
            System.out.println("\n=== MENU UTAMA ===");
            System.out.println("1. Tambah Data (Pembelian+Pengiriman+Kurir)");
            System.out.println("2. Lihat Semua Daftar data");
            System.out.println("3. Keluar");
            System.out.print("Pilih: ");
            pilihan = Integer.parseInt(sc.nextLine());

            if (pilihan == 1) {
                // Input data baru dari user
                Kurir k = new Kurir();

                System.out.print("Masukkan Nama Pembeli     : ");
                String nama = sc.nextLine();
                System.out.print("Masukkan Email Pembeli    : ");
                String email = sc.nextLine();
                k.setPembelian(nama, email);

                System.out.print("Masukkan Metode Pembayaran: ");
                String metode = sc.nextLine();
                k.setMetode(metode);

                System.out.print("Jumlah Barang Dibeli      : ");
                int jumlahBarang = Integer.parseInt(sc.nextLine());
                for (int i = 0; i < jumlahBarang; i++) {
                    System.out.print("  Barang ke-" + (i + 1) + " : ");
                    k.setBarang(sc.nextLine());
                }

                System.out.print("Masukkan Alamat Pengiriman: ");
                k.setAlamat(sc.nextLine());

                System.out.print("Masukkan Ekspedisi        : ");
                k.setEkspedisi(sc.nextLine());

                System.out.print("Masukkan Estimasi Waktu   : ");
                k.setWaktuPengiriman(sc.nextLine());

                System.out.print("Masukkan Nama Kurir       : ");
                k.setNamaKurir(sc.nextLine());

                System.out.print("Masukkan No HP Kurir      : ");
                k.setNoHP(sc.nextLine());

                System.out.print("Masukkan Status Pengiriman: ");
                k.setStatusPengiriman(sc.nextLine());

                daftarKurir.add(k);
                System.out.println("\nData berhasil ditambahkan!");

            } else if (pilihan == 2) {
                // Tampilkan semua data pesanan dalam bentuk tabel
                if (daftarKurir.isEmpty()) {
                    System.out.println("Belum ada data pesanan.");
                } else {
                    System.out.println("\n=== DAFTAR SEMUA DATA PESANAN ===");
                    System.out.printf("%-4s%-15s%-22s%-12s%-22s%-12s%-12s%-18s%-20s%s%n",
                            "No", "NamaPembeli", "Email", "Metode", "Alamat",
                            "Ekspedisi", "Estimasi", "NamaKurir", "Status", "Barang");
                    System.out.println("=====================================================================================================================================================");

                    for (int i = 0; i < daftarKurir.size(); i++) {
                        Kurir k = daftarKurir.get(i);
                        List<String> items = k.getBarangList();

                        // Baris pertama: semua kolom + barang pertama
                        System.out.printf("%-4d%-15s%-22s%-12s%-22s%-12s%-12s%-18s%-20s%s%n",
                                i + 1, k.getNama(), k.getEmail(), k.getMetode(),
                                k.getAlamat(), k.getEkspedisi(), k.getWaktuPengiriman(),
                                k.getNamaKurir(), k.getStatusPengiriman(),
                                items.isEmpty() ? "-" : items.get(0));

                        // Baris berikutnya: hanya kolom Barang jika ada lebih dari 1
                        for (int j = 1; j < items.size(); j++) {
                            System.out.printf("%-4s%-15s%-22s%-12s%-22s%-12s%-12s%-18s%-20s%s%n",
                                    "", "", "", "", "", "", "", "", "", items.get(j));
                        }
                        System.out.println("-----------------------------------------------------------------------------------------------------------------------------------------------------");
                    }
                }
            } else if (pilihan == 3) {
                // Keluar program
                System.out.println("Program selesai. Bye!");
            } else {
                System.out.println("Pilihan tidak valid!");
            }

        } while (pilihan != 3);

        sc.close();
    }
}
