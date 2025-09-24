#include "Pembelian.cpp"

class Pengiriman : public Pembelian{
    private:
        string alamat;          //menyimpan alamat pengiriman
        string ekspedisi;       //menyimpan nama ekspedisi pengiriman
        string waktuPengiriman; //menyimpan estimasi waktu pengiriman

    public:
        Pengiriman(){}

        void setAlamat(string alamat){
            this->alamat = alamat; //set alamat pengiriman
        }

        string getAlamat(){
            return this->alamat; //mengembalikan alamat pengiriman
        }

        void setEkspedisi(string ekspedisi){
            this->ekspedisi = ekspedisi; //set nama ekspedisi pengiriman
        }

        string getEkspedisi(){
            return this->ekspedisi; //mengembalikan nama ekspedisi pengiriman
        }

        void setWaktuPengiriman(string waktu){
            this->waktuPengiriman = waktu; //
        }

        string getWaktuPengiriman(){
            return this->waktuPengiriman; //mengembalikan estimasi waktu pengiriman
        }


};