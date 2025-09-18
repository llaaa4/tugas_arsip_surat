# Tugas Arsip Surat

Aplikasi ini dibuat untuk memenuhi tugas LSP

## Tujuan
Tujuan dari aplikasi ini adalah untuk mengelola dan mengarsipkan surat-surat masuk dan keluar secara digital dalam format PDF.

## Fitur
- CRUD (Create, Read, Update, Delete) untuk data surat.
- Upload file PDF.
- Pencarian surat berdasarkan judul.
- CRUD untuk data kategori surat.
- Halaman "About" yang menampilkan informasi pengembang.

## Cara Menjalankan Aplikasi
1.  Clone repository ini: `git clone https://github.com/nama-anda/aplikasi-arsip-surat.git`
2.  Masuk ke folder proyek: `cd aplikasi-arsip-surat`
3.  Jalankan `composer install`.
4.  Salin file `.env.example` menjadi `.env`: `cp .env.example .env`.
5.  Jalankan `php artisan key:generate`.
6.  Buat database baru (misal `db_arsip_surat`) dan sesuaikan konfigurasi di file `.env`.
7.  Import file `db_arsip_surat.sql` ke database yang baru dibuat.
8.  Jalankan `php artisan serve` untuk memulai server pengembangan.
9.  Akses aplikasi melalui `http://127.0.0.1:8000`.

## Screenshot
### 1. Halaman Awal Atau Menu Arsip 
<img width="1919" height="1007" alt="image" src="https://github.com/user-attachments/assets/b7915b9a-ec66-4f6b-bc20-c6bc6fd47f36" />

### 2. Halaman Unggah Arsip Surat
<img width="1919" height="1018" alt="image" src="https://github.com/user-attachments/assets/fbb81803-493d-4caf-bb96-114e5704b6d3" />

### 3. Tampilan Notifikasi Jika Klik Hapus 
<img width="1919" height="1013" alt="image" src="https://github.com/user-attachments/assets/cd4fa768-dde5-4e42-a53a-f99dc5be3a45" />

### 4. Tampilan Jika Klik Lihat 
<img width="1785" height="963" alt="image" src="https://github.com/user-attachments/assets/1e1f9870-7dd5-4f46-ac31-dffc2b026a78" />

### 5. Halaman Kategori Atau Menu Kategori Surat
<img width="1919" height="1013" alt="image" src="https://github.com/user-attachments/assets/657ac261-8180-4ad9-b1d3-4c92083aefa0" />

### 6. Halaman Tambah Kategori Baru
<img width="1919" height="935" alt="image" src="https://github.com/user-attachments/assets/12c2fd6d-9529-4149-87b3-2f5a9d38e37f" />

### 7. Halaman Data Diri Mahasiswa Atau Menu About
<img width="1919" height="983" alt="image" src="https://github.com/user-attachments/assets/3e5a68be-d5a0-4979-b1ac-064101e2dfe6" />

