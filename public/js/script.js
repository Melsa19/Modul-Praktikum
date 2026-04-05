// 1. FITUR DARK MODE

const body = document.body;

// Inisialisasi dark mode dari localStorage
function initDarkMode() {
  console.log('Initializing dark mode...');
  if (localStorage.getItem("theme") === "dark") {
    body.classList.add("dark-mode");
    console.log('Dark mode activated from localStorage');
  }
  updateThemeButton();
}

function updateThemeButton() {
  const btnTheme = document.getElementById("btn-theme");
  if (btnTheme) {
    if (body.classList.contains("dark-mode")) {
      btnTheme.textContent = "☀️ Mode Terang";
      btnTheme.classList.add("btn-light");
      btnTheme.classList.remove("btn-outline-light");
    } else {
      btnTheme.textContent = "🌙 Mode Gelap";
      btnTheme.classList.add("btn-outline-light");
      btnTheme.classList.remove("btn-light");
    }
  }
}

// Event listener untuk tombol theme
function attachThemeListener() {
  const btnTheme = document.getElementById("btn-theme");
  if (btnTheme) { 
    btnTheme.addEventListener("click", function(e) {
      e.preventDefault();
      body.classList.toggle("dark-mode");

      if (body.classList.contains("dark-mode")) {
        localStorage.setItem("theme", "dark");
        console.log('Dark mode ON');
      } else {
        localStorage.setItem("theme", "light");
        console.log('Dark mode OFF');
      }
      updateThemeButton();
    });
  }
}

// 2. FITUR BELI DAN KURANGI STOK

function aktifkanTombolBeli() {
  console.log('Attaching buy button listeners...');
  const tombolBeli = document.querySelectorAll(".tombol-beli");
  console.log('Found ' + tombolBeli.length + ' buy buttons');
  
  tombolBeli.forEach(function (tombol, index) {
    // Hapus event listener lama
    tombol.replaceWith(tombol.cloneNode(true));
  });
  
  // Re-attach dengan event listener baru
  document.querySelectorAll(".tombol-beli").forEach(function(tombol) {
    tombol.addEventListener("click", handleBeli);
  });
}

function handleBeli(e) {
  e.preventDefault();
  e.stopPropagation();
  
  const tombol = this;
  const cardBody = tombol.closest(".card-body");
  if (!cardBody) {
    console.error('Card body not found');
    return;
  }
  
  const stokElement = cardBody.querySelector(".stok-text");
  const namaBarang = cardBody.querySelector(".card-title");
  
  if (!stokElement || !namaBarang) {
    console.error('Stok or product name element not found');
    return;
  }
  
  const namaBarangText = namaBarang.textContent.trim();
  let stok = parseInt(stokElement.textContent.replace("Stok: ", ""));

  console.log('Buying: ' + namaBarangText + ', Current stock: ' + stok);

  if (stok > 0) {
    stok--;
    stokElement.textContent = "Stok: " + stok;
    
    // Simpan stok ke localStorage
    localStorage.setItem('stok_' + namaBarangText, stok);
    
    // Notifikasi yang lebih baik
    alert("✅ Berhasil membeli " + namaBarangText + "\nSisa stok: " + stok);

    if (stok === 0) {
      tombol.disabled = true;
      tombol.textContent = "Habis";
      tombol.classList.remove("btn-primary");
      tombol.classList.add("btn-secondary");
    }
  } else {
    alert("❌ Maaf, stok barang habis!");
    tombol.disabled = true;
    tombol.textContent = "Habis";
    tombol.classList.remove("btn-primary");
    tombol.classList.add("btn-secondary");
  }
}

// Fungsi untuk memuat stok dari localStorage
function muatStok() {
  console.log('Loading stock from localStorage...');
  const produk = [
    { nama: 'Nike P 6000', stokAwal: 10 },
    { nama: 'Nike Air Force 1', stokAwal: 7 },
    { nama: 'Nike Air Jordan 1 Low', stokAwal: 10 }
  ];
  
  produk.forEach(function(produkItem) {
    const stokTersimpan = localStorage.getItem('stok_' + produkItem.nama);
    const cards = document.querySelectorAll('.card-title');
    cards.forEach(function(cardTitle) {
      if (cardTitle.textContent.trim() === produkItem.nama) {
        const stokElement = cardTitle.closest('.card-body').querySelector('.stok-text');
        if (stokElement) {
          const stok = stokTersimpan !== null ? parseInt(stokTersimpan) : produkItem.stokAwal;
          stokElement.textContent = "Stok: " + stok;
          
          const tombolBeli = stokElement.closest('.card-body').querySelector('.tombol-beli');
          if (stok === 0 && tombolBeli) {
            tombolBeli.disabled = true;
            tombolBeli.textContent = "Habis";
            tombolBeli.classList.remove("btn-primary");
            tombolBeli.classList.add("btn-secondary");
          }
          console.log('Loaded stock for ' + produkItem.nama + ': ' + stok);
        }
      }
    });
  });
}

// 3. FITUR WISHLIST

let wishlist = JSON.parse(localStorage.getItem('wishlist')) || [];

console.log('Initial wishlist:', wishlist);

function updateWishlistCount() {
  const countElement = document.getElementById('wishlist-count');
  if (countElement) {
    countElement.textContent = wishlist.length;
    console.log('Updated wishlist count to: ' + wishlist.length);
  }
}

function tambahKeWishlist(namaBarang) {
  console.log('Adding to wishlist: ' + namaBarang);
  
  if (!wishlist.includes(namaBarang)) {
    wishlist.push(namaBarang);
    localStorage.setItem('wishlist', JSON.stringify(wishlist));
    updateWishlistCount();
    console.log('Added successfully. New count: ' + wishlist.length);
    alert("❤️ " + namaBarang + ' ditambahkan ke wishlist!');
    return true;
  } else {
    console.log('Already in wishlist');
    alert("⚠️ " + namaBarang + ' sudah ada di wishlist!');
    return false;
  }
}

function tampilkanWishlist() {
  console.log('Displaying wishlist with ' + wishlist.length + ' items');
  const daftarWishlist = document.getElementById('daftar-wishlist');
  if (daftarWishlist) {
    daftarWishlist.innerHTML = '';
    if (wishlist.length === 0) {
      daftarWishlist.innerHTML = '<li class="list-group-item text-center">Wishlist kosong 😢</li>';
    } else {
      wishlist.forEach(function(item, index) {
        const li = document.createElement('li');
        li.className = 'list-group-item d-flex justify-content-between align-items-center';
        li.innerHTML = '<span>' + (index + 1) + '. ' + item + '</span><span class="badge bg-danger rounded-pill">❤️</span>';
        daftarWishlist.appendChild(li);
      });
    }
  }
}

function hapusWishlist() {
  if (confirm("Apakah Anda yakin ingin menghapus semua wishlist?")) {
    wishlist = [];
    localStorage.removeItem('wishlist');
    updateWishlistCount();
    tampilkanWishlist();
    alert("Wishlist berhasil dihapus 🗑️");
    console.log('Wishlist cleared');
  }
}

function aktifkanTombolWishlist() {
  console.log('Attaching wishlist button listeners...');
  const tombolWishlist = document.querySelectorAll(".btn-wishlist");
  console.log('Found ' + tombolWishlist.length + ' wishlist buttons');
  
  tombolWishlist.forEach(function(tombol, index) {
    // Clone untuk menghapus event listener lama
    const newTombol = tombol.cloneNode(true);
    tombol.replaceWith(newTombol);
  });
  
  // Re-attach dengan event listener baru
  document.querySelectorAll(".btn-wishlist").forEach(function(tombol) {
    tombol.addEventListener('click', handleWishlist);
  });
}

function handleWishlist(e) {
  e.preventDefault();
  e.stopPropagation();
  
  const namaBarang = this.getAttribute('data-product');
  console.log('Wishlist click for: ' + namaBarang);
  
  if (namaBarang) {
    tambahKeWishlist(namaBarang);
  }
}

// 4. INISIALISASI SAAT DOM LOADED

document.addEventListener("DOMContentLoaded", function() {
  console.log('=== DOM LOADED - Initializing Application ===');
  
  // Inisialisasi dark mode
  initDarkMode();
  attachThemeListener();
  
  // Inisialisasi stok
  muatStok();
  
  // Inisialisasi tombol beli
  aktifkanTombolBeli();
  
  // Inisialisasi tombol wishlist
  aktifkanTombolWishlist();
  
  // Update wishlist count
  updateWishlistCount();
  
  // Tampilkan wishlist awal
  tampilkanWishlist();
  
  console.log('=== Initialization Complete ===');
});

// Re-initialize ketika modal ditampilkan
document.addEventListener('shown.bs.modal', function(e) {
  if (e.target.id === 'wishlistModal') {
    console.log('Wishlist modal shown - refreshing display');
    tampilkanWishlist();
  }
});