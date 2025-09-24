#include "Pengiriman.cpp"

// Kelas Kurir turunan dari Pengiriman
class Kurir : public Pengiriman{
    private:
        string namaKurir;           // Nama kurir
        string statusPengiriman;    // Status pengiriman
        string noHP;                // Nomor HP kurir

    public:
        Kurir(){} // Konstruktor default

        // Setter nama kurir
        void setNamaKurir(string nama){
            this->namaKurir = nama;
        }

        // Getter nama kurir
        string getNamaKurir(){
            return this->namaKurir;
        }

        // Setter status pengiriman
        void setStatusPengiriman(string status){
            this->statusPengiriman = status;
        }

        // Getter status pengiriman
        string getStatusPengiriman(){
            return this->statusPengiriman;
        }

        // Setter nomor HP kurir
        void setNoHP(string noHP){
            this->noHP = noHP;
        }

        // Getter nomor HP kurir
        string getNoHP(){
            return this->noHP;
        }
};