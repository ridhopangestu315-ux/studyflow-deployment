# StudyFlow — paket deployment InfinityFree

Folder ini adalah paket deployment terpisah. Untuk pengujian Laragon, buka `http://localhost/studyflow-deployment/`. Untuk InfinityFree, unggah isi folder ini ke `htdocs` setelah meninjau konfigurasi servernya.

## Memperbarui deployment lokal

1. Jalankan `npm run build -- --base=/studyflow-deployment/` dari `C:\laragon\www\belajar-react`.
2. Salin seluruh isi `C:\laragon\www\belajar-react\dist` ke folder ini, timpa file lama.
3. Di bundle JavaScript hasil salinan, URL API harus memakai prefix `/studyflow-deployment/api/`. Build ini disiapkan untuk subfolder Laragon; untuk hosting pada root domain, lakukan build terpisah dengan base `/` dan sesuaikan URL API menjadi `/api/`.
4. Perubahan backend diperbarui dengan menyalin file API yang berubah dari `belajar-react\api` ke `studyflow-deployment\api`. Pertahankan `api/config/config.local.php` yang hanya berisi kredensial lokal, dan jangan salin kredensial ke frontend atau Git.
5. Pastikan Apache dan MySQL Laragon aktif. Uji halaman, `http://localhost/studyflow-deployment/api/`, dan `http://localhost/studyflow-deployment/api/test.php`.

## Konfigurasi database

Jangan gunakan konfigurasi localhost pada InfinityFree. Buat konfigurasi server produksi secara terpisah dan jangan menyalin `config.local.php` dari Laragon.

## Verifikasi dan catatan

- `index.html`, JavaScript, CSS, logo, ikon, dan gambar adalah keluaran build Vite untuk root domain.
- `.htaccess` mengarahkan rute React Router ke `index.html`, tetapi mengecualikan `/api/` agar PHP berjalan normal.
- Endpoint PHP yang disertakan: register, login, check-session, logout, perubahan email/password, dan test koneksi.
- Folder `api/tugas`, `api/mata-pelajaran`, `api/jadwal`, dan `api/catatan` disiapkan untuk API berikutnya; saat ini belum ada endpoint CRUD PHP di folder tersebut. Data fitur belajar masih menggunakan LocalStorage.
- Pastikan HTTPS aktif di InfinityFree agar cookie sesi memakai atribut Secure.
- Paket ini tidak menyertakan `config.local.php`, SQL, backup, `.env`, source React, dependensi Node, atau kredensial.
