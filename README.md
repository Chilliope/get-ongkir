# Laravel RajaOngkir JNE Shipping Calculator

**Deskripsi:**

Project Laravel ini digunakan untuk menghitung ongkos kirim antar-district di Indonesia menggunakan **API RajaOngkir khusus kurir JNE**.  
Fitur utama:

- Mengambil data provinsi, kota, dan district dari RajaOngkir.  
- Menghitung ongkos kirim antar-district untuk JNE saja.  
- **Caching hasil API** ke database agar limit API hemat dan response lebih cepat.  
- Cache memiliki **masa berlaku 7 hari**, setelah itu data akan di-refresh dari API.  
- Public repo aman, **API key disimpan di `.env`**, sehingga setiap user harus memiliki key sendiri.

---

## Fitur Utama

1. **Calculate Cost (JNE)**
   - Input: `destination`, `weight`  
   - Output: Biaya ongkir, estimasi waktu, layanan JNE.  
   - Hasil disimpan ke database dengan TTL 7 hari.  

2. **Cache Database**
   - Data ongkir disimpan di tabel `shipping_costs`.  
   - Jika data masih valid (belum expired), tidak akan memanggil API lagi.  

3. **Public-Friendly**
   - API key tidak disimpan di repo → user harus menambahkan sendiri di `.env`.

---

## Instalasi

1. Clone repository:
    ```bash
    git clone https://github.com/username/laravel-rajaongkir.git
    cd laravel-rajaongkir

2. Composer install:
    ```bash
    composer install

3. Copy .env.example menjadi .env dan isi API key RajaOngkir:
    ```env
    RAJAONGKIR_KEY=your_api_key_here

4. Generate app key:
    ```bash
    php artisan key:generate

5. Migrate
    ```bash
    php artisan migrate

6. Run
    ```bash
    php artisan serve

