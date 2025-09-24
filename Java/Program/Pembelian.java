import java.util.ArrayList;
import java.util.List;

// Kelas Pembelian untuk data pembeli dan barang
public class Pembelian {
    private String namaPembeli;           // Nama pembeli
    private String emailPembeli;          // Email pembeli
    private String metodePembayaran;      // Metode pembayaran
    private List<String> barang;          // List barang yang dibeli

    public Pembelian() {
        barang = new ArrayList<>();       // Inisialisasi list barang
    }

    // Set nama dan email pembeli
    public void setPembelian(String nama, String email) {
        this.namaPembeli = nama;
        this.emailPembeli = email;
    }

    // Set metode pembayaran
    public void setMetode(String metode) {
        this.metodePembayaran = metode;
    }

    // Tambah barang ke list
    public void setBarang(String item) {
        this.barang.add(item);
    }

    // Ambil nama pembeli
    public String getNama() {
        return namaPembeli;
    }

    // Ambil email pembeli
    public String getEmail() {
        return emailPembeli;
    }

    // Ambil metode pembayaran
    public String getMetode() {
        return metodePembayaran;
    }

    // Ambil list barang
    public List<String> getBarangList() {
        return barang;
    }
}
