# Sistem Manajemen Sepatu 

Sebuah aplikasi web sederhana untuk mengelola katalog sepatu, dilengkapi dengan antarmuka yang responsif dan interaktif. Proyek ini dibangun menggunakan **HTML**, **CSS (Bootstrap 5)**, dan **Vanilla JavaScript**, dengan fokus pada manipulasi DOM dan pemanfaatan `localStorage` agar data tetap tersimpan secara lokal di peramban (browser) pengguna.

## Fitur Utama

- **Autentikasi Pengguna:** Login, Logout, dan "Remember Me" menggunakan Session & Cookies.
- **Mode Gelap (Dark Mode) Persisten:** Menggunakan `localStorage` untuk menyimpan preferensi tema pengguna.
- **Simulasi Pembelian & Manajemen Stok:** Stok sepatu berkurang secara real-time saat dibeli dan tersimpan di `localStorage`.
- **Sistem Wishlist (Daftar Keinginan):** Tambah/hapus item favorit dengan lencana (badge) dinamis pada navbar.
- **Desain Responsif:** Dibangun dengan Bootstrap 5, nyaman dilihat di Mobile maupun Desktop.

## Struktur Berkas (File Structure)

- `index.php` — _(Diperbarui)_ Halaman utama web yang dilengkapi pengecekan sesi & cookie.
- `login.php` — _(Baru)_ Halaman form login beserta proses validasi autentikasi.
- `logout.php` — _(Baru)_ Skrip untuk menghapus sesi/cookie dan melakukan _redirect_ ke beranda.
- `style.css` — Kode CSS kustom untuk transisi dan mode gelap.
- `script.js` — Logika _client-side_ untuk simulasi transaksi dan manipulasi DOM.
