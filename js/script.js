// 1. FITUR DARK MODE

const btnTheme = document.getElementById("btn-theme");
const body = document.body;

if (localStorage.getItem("theme") === "dark") {
  body.classList.add("dark-mode");
  if (btnTheme) { // Pengecekan aman
    btnTheme.textContent = "Mode Terang";
  }
}

// Pengecekan aman agar tidak error jika btn-theme tidak ada di halaman
if (btnTheme) { 
  btnTheme.addEventListener("click", function() {
    body.classList.toggle("dark-mode");

    if (body.classList.contains("dark-mode")) {
      localStorage.setItem("theme", "dark");
      btnTheme.textContent = "Mode Terang";
    } else {
      localStorage.setItem("theme", "light");
      btnTheme.textContent = "Mode Gelap";
    }
  });
}

// 2. FITUR BELI DAN KURANGI STOK

function aktifkanTombolBeli() {
  const tombolBeli = document.querySelectorAll(".tombol-beli");
  tombolBeli.forEach(function (tombol) {
    tombol.addEventListener("click", function (e) {
      const cardBody = e.target.closest(".card-body");
      const stokElement = cardBody.querySelector(".stok-text");
      const namaBarang = cardBody.querySelector(".card-title").textContent;
      
      if (stokElement) { // Pengecekan aman
        let stok = parseInt(stokElement.textContent.replace("Stok: ", ""));

        if (stok > 0) {
          stok--;
          stokElement.textContent = "Stok: " + stok;
          
          // Simpan stok ke localStorage
          localStorage.setItem('stok_' + namaBarang, stok);
          
          alert("Berhasil membeli " + namaBarang);

          if (stok === 0) {
            e.target.disabled = true;
            e.target.textContent = "Habis";
          }
        } else {
          alert("Maaf, stok barang habis!");
          e.target.disabled = true;
          e.target.textContent = "Habis";
        }
      }
    });
  });
}

// Fungsi untuk memuat stok dari localStorage
function muatStok() {
  const produk = [
    { nama: 'Nike P 6000', stokAwal: 10 },
    { nama: 'Nike Air Force 1', stokAwal: 7 },
    { nama: 'Nike Air Jordan 1 Low', stokAwal: 10 }
  ];
  
  produk.forEach(function(produkItem) {
    const stokTersimpan = localStorage.getItem('stok_' + produkItem.nama);
    const cards = document.querySelectorAll('.card-title');
    cards.forEach(function(cardTitle) {
      if (cardTitle.textContent === produkItem.nama) {
        const stokElement = cardTitle.closest('.card-body').querySelector('.stok-text');
        if (stokElement) {
          const stok = stokTersimpan !== null ? parseInt(stokTersimpan) : produkItem.stokAwal;
          stokElement.textContent = "Stok: " + stok;
          
          const tombolBeli = stokElement.closest('.card-body').querySelector('.tombol-beli');
          if (stok === 0 && tombolBeli) {
            tombolBeli.disabled = true;
            tombolBeli.textContent = "Habis";
          }
        }
      }
    });
  });
}

// 3. FITUR WISHLIST

let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

function updateWishlistCount() {
  const countElement = document.getElementById('wishlist-count');
  if (countElement) { // Pengecekan aman
    countElement.textContent = wishlist.length;
  }
}

function tambahKeWishlist(namaBarang) {
  if (!wishlist.includes(namaBarang)) {
    wishlist.push(namaBarang);
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateWishlistCount();
    alert(namaBarang + ' ditambahkan ke wishlist!');
  } else {
    alert(namaBarang + ' sudah ada di wishlist!');
  }
}

function tampilkanWishlist() {
  const daftarWishlist = document.getElementById('daftar-wishlist');
  if (daftarWishlist) { // Pengecekan aman
    daftarWishlist.innerHTML = '';
    if (wishlist.length === 0) {
      daftarWishlist.innerHTML = '<li class="list-group-item">Wishlist kosong</li>';
    } else {
      wishlist.forEach(function(item) {
        const li = document.createElement('li');
        li.className = 'list-group-item';
        li.textContent = item;
        daftarWishlist.appendChild(li);
      });
    }
  }
}

function hapusWishlist() {
  wishlist = [];
  localStorage.removeItem('wishlist');
  updateWishlistCount();
  tampilkanWishlist();
}

function aktifkanTombolWishlist() {
  const tombolWishlist = document.querySelectorAll('.btn-outline-danger');
  tombolWishlist.forEach(function(tombol) {
    if (tombol.textContent.trim() === 'Wishlist') {
      tombol.addEventListener('click', function(e) {
        const cardBody = e.target.closest('.card-body');
        const namaBarang = cardBody.querySelector('.card-title').textContent;
        tambahKeWishlist(namaBarang);
      });
    }
  });
}

// Menjalankan fungsi setelah elemen HTML ter-load
document.addEventListener("DOMContentLoaded", function() {
  muatStok();
  aktifkanTombolBeli();
  aktifkanTombolWishlist();
  updateWishlistCount();
});