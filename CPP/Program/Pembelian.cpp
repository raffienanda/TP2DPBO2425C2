#include <string>
#include <iostream>
#include <vector>
using namespace std;

// Kelas Pembelian untuk data pembeli dan barang
class Pembelian {
private:
    string namaPembeli, emailPembeli, metodePembayaran; // Data pembeli
    vector<string> barang; // List barang yang dibeli

public:
    // Set nama dan email pembeli
    void setPembelian(string nama, string email){
        this->namaPembeli = nama;
        this->emailPembeli = email;
    }

    // Set metode pembayaran
    void setMetode(string metode){
        this->metodePembayaran = metode;
    }

    // Tambah barang ke list
    void setBarang(string item){
        this->barang.push_back(item);
    }

    // Ambil nama pembeli
    string getNama(){ 
        return namaPembeli; 
    }

    // Ambil email pembeli
    string getEmail(){ 
        return emailPembeli; 
    }
    
    // Ambil metode pembayaran
    string getMetode(){ 
        return metodePembayaran; 
    }

    // Ambil list barang
    vector<string> getBarangList(){ 
        return barang; 
    }
};
