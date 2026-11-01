# StudyFlow — paket deployment InfinityFree

Folder ini adalah hasil build untuk diunggah ke folder `htdocs` akun InfinityFree. Unggah seluruh isi folder ini (termasuk `.htaccess` dan folder `api`) memakai File Manager atau FTP. Jangan unggah folder proyek sumber.

## Konfigurasi database

1. Buat database melalui Control Panel InfinityFree, lalu impor `database/studyflow_infinityfree.sql` dari proyek utama setelah memilih database tersebut di phpMyAdmin. File SQL tidak disertakan dalam paket web.
2. Buka `api/config/config.production.example.php` di server dan salin/ubah namanya menjadi `config.local.php`.
3. Isi host, nama database lengkap, username, password, dan port persis dari Control Panel InfinityFree. Jangan memakai kredensial Laragon. `config.local.php` diblokir dari akses HTTP oleh `api/config/.htaccess`.
4. Buka `https://DOMAIN-ANDA/api/test.php`. Hasil sukses menampilkan status PHP dan koneksi serta nama database, tanpa kredensial.

## Verifikasi dan catatan

- `index.html`, JavaScript, CSS, logo, ikon, dan gambar adalah keluaran build Vite untuk root domain.
- `.htaccess` mengarahkan rute React Router ke `index.html`, tetapi mengecualikan `/api/` agar PHP berjalan normal.
- Endpoint PHP yang disertakan: register, login, check-session, logout, perubahan email/password, dan test koneksi.
- Folder `api/tugas`, `api/mata-pelajaran`, `api/jadwal`, dan `api/catatan` disiapkan untuk API berikutnya; saat ini belum ada endpoint CRUD PHP di folder tersebut. Data fitur belajar masih menggunakan LocalStorage.
- Pastikan HTTPS aktif di InfinityFree agar cookie sesi memakai atribut Secure.
- Paket ini tidak menyertakan `config.local.php`, SQL, backup, `.env`, source React, dependensi Node, atau kredensial.
