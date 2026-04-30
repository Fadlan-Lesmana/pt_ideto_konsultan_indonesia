// =========================================
// 1. MOBILE MENU TOGGLE (Hamburger Menu)
// =========================================
const hamburger = document.getElementById('hamburger');
const navLinks = document.getElementById('nav-links');

if (hamburger && navLinks) {
    hamburger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
        const icon = hamburger.querySelector('i');
        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    });

    const navItems = document.querySelectorAll('.nav-item');
    navItems.forEach(item => {
        item.addEventListener('click', () => {
            navLinks.classList.remove('active');
            const icon = hamburger.querySelector('i');
            if(icon.classList.contains('fa-times')) {
                icon.classList.replace('fa-times', 'fa-bars');
            }
        });
    });
}

// =========================================
// 2. SMOOTH SCROLLING
// =========================================
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        const targetId = this.getAttribute('href');
        if(targetId !== "#") {
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                e.preventDefault();
                targetElement.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }
    });
});

// =========================================
// 3. GALLERY FILTER 
// =========================================
const filterBtns = document.querySelectorAll('.filter-btn');
const galleryCards = document.querySelectorAll('.gallery-card');

if (filterBtns.length > 0) {
    filterBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            filterBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            const filterValue = btn.getAttribute('data-filter');

            galleryCards.forEach(card => {
                const cardCategory = card.getAttribute('data-category');
                if (filterValue === 'semua' || cardCategory === filterValue) {
                    card.classList.remove('hide');
                } else {
                    card.classList.add('hide');
                }
            });
        });
    });
}

// =========================================
// 4. WHATSAPP FORM SUBMIT (Halaman Kontak)
// =========================================
const waForm = document.getElementById('whatsapp-form');

if (waForm) {
    waForm.addEventListener('submit', function(e) {
        // Mencegah halaman me-refresh saat tombol diklik
        e.preventDefault(); 

        // 1. Ambil nilai (teks) yang diketik oleh pengunjung
        const nama = document.getElementById('wa-nama').value;
        const email = document.getElementById('wa-email').value;
        const telp = document.getElementById('wa-telp').value;
        const subjek = document.getElementById('wa-subjek').value;
        const pesan = document.getElementById('wa-pesan').value;

        // 2. Nomor tujuan WhatsApp (Bapak Irwan Mulyadi)
        // Pastikan pakai format kode negara (62) tanpa tanda + atau angka 0 di depan
        const noTujuan = "6282298804710"; 

        // 3. Merakit format pesan agar rapi saat masuk ke WA
        // %0A adalah kode HTML untuk Enter (Baris Baru)
        const formatPesan = `Halo PT Ideto Konsultan Indonesia, saya ingin berdiskusi mengenai layanan Anda.%0A%0A*Nama:* ${nama}%0A*Email:* ${email}%0A*No. Telepon:* ${telp}%0A*Subjek:* ${subjek}%0A*Pesan:* ${pesan}%0A%0ATerima kasih.`;

        // 4. Membuat link WhatsApp resmi
        const linkWhatsApp = `https://wa.me/${noTujuan}?text=${formatPesan}`;

        // 5. Membuka link tersebut di tab baru
        window.open(linkWhatsApp, '_blank');
    });
}

// =========================================
// 🌟 WOW FACTORS (Animasi & Interaktivitas)
// =========================================

// 1. SCROLL REVEAL (Efek Muncul Perlahan)
// Kita otomatis menambahkan class 'reveal' ke elemen penting biar nggak usah edit HTML satu-satu
document.addEventListener("DOMContentLoaded", function() {
    const elementsToReveal = document.querySelectorAll('.card, .section-title, .main-title, .project-card, .form-wrapper, .stats-grid');
    
    elementsToReveal.forEach(el => {
        el.classList.add('reveal');
    });

    function revealOnScroll() {
        const reveals = document.querySelectorAll('.reveal');
        const windowHeight = window.innerHeight;
        const elementVisible = 100; // Seberapa cepat elemen muncul saat di-scroll

        reveals.forEach(reveal => {
            const elementTop = reveal.getBoundingClientRect().top;
            if (elementTop < windowHeight - elementVisible) {
                reveal.classList.add('active');
            }
        });
    }

    // Jalankan sekali saat pertama kali web dibuka
    revealOnScroll();
    // Jalankan setiap kali di-scroll
    window.addEventListener('scroll', revealOnScroll);

    // 2. TOMBOL BACK TO TOP
    // Buat elemen tombolnya pakai JavaScript dan masukkan ke body
    const backToTopBtn = document.createElement('div');
    backToTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    backToTopBtn.classList.add('back-to-top');
    document.body.appendChild(backToTopBtn);

    // Logika memunculkan tombol saat scroll ke bawah
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add('show');
        } else {
            backToTopBtn.classList.remove('show');
        }
    });

    // Logika scroll halus ke atas saat tombol diklik
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});