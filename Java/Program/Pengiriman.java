public class Pengiriman extends Pembelian {
    private String alamat;              // Alamat pengiriman
    private String ekspedisi;           // Nama ekspedisi
    private String waktuPengiriman;     // Estimasi waktu pengiriman

    public Pengiriman() {}              // Konstruktor default

    // Setter alamat pengiriman
    public void setAlamat(String alamat) {
        this.alamat = alamat;
    }

    // Getter alamat pengiriman
    public String getAlamat() {
        return alamat;
    }

    // Setter ekspedisi
    public void setEkspedisi(String ekspedisi) {
        this.ekspedisi = ekspedisi;
    }

    // Getter ekspedisi
    public String getEkspedisi() {
        return ekspedisi;
    }

    // Setter estimasi waktu pengiriman
    public void setWaktuPengiriman(String waktu) {
        this.waktuPengiriman = waktu;
    }

    // Getter estimasi waktu pengiriman
    public String getWaktuPengiriman() {
        return waktuPengiriman;
    }
}
