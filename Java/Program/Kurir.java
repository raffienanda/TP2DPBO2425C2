public class Kurir extends Pengiriman {
    private String namaKurir;           // Nama kurir
    private String statusPengiriman;    // Status pengiriman
    private String noHP;                // Nomor HP kurir

    public Kurir() {} // Konstruktor default

    // Setter nama kurir
    public void setNamaKurir(String nama) {
        this.namaKurir = nama;
    }

    // Getter nama kurir
    public String getNamaKurir() {
        return namaKurir;
    }

    // Setter status pengiriman
    public void setStatusPengiriman(String status) {
        this.statusPengiriman = status;
    }

    // Getter status pengiriman
    public String getStatusPengiriman() {
        return statusPengiriman;
    }

    // Setter nomor HP kurir
    public void setNoHP(String noHP) {
        this.noHP = noHP;
    }

    // Getter nomor HP kurir
    public String getNoHP() {
        return noHP;
    }
}
