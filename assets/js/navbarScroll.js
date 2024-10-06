window.addEventListener('scroll', function() {
  const navMenu = document.querySelector('.nav__menu');
  
  if (window.scrollY > 0) {
      navMenu.classList.add('scrolled'); // Tambahkan kelas saat digulir
  } else {
      navMenu.classList.remove('scrolled'); // Hapus kelas saat kembali ke atas
  }
});
