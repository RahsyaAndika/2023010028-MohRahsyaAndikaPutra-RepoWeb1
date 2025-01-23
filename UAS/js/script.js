document.addEventListener('DOMContentLoaded', function() {
    const eyeIcons = document.querySelectorAll('.icon-eye');

    eyeIcons.forEach(icon => {
        icon.addEventListener('click', function() {
            const overlay = this.nextElementSibling;
            overlay.style.display = 'flex';

            // Tambahkan event listener untuk tombol close
            const closeButton = overlay.querySelector('button');
            closeButton.addEventListener('click', function() {
                overlay.style.display = 'none';
            });

            // Tambahkan event listener untuk tombol slide
            const prevButton = overlay.querySelector('.slide-before-image-certificate');
            const nextButton = overlay.querySelector('.slide-after-image-certificate');
            const imgOverlay = overlay.querySelector('.img-certificate');
            let currentImageIndex = 0;
            let imageSources = [
                'img/undangan.jpeg',
                'img/s2.png',
                'img/s3.png',
                'img/s4.png'
            ]; // Ganti dengan sumber gambar yang benar
            let imageArray = [
                'overlay-image-certificate-1',
                'overlay-image-certificate-2',
                'overlay-image-certificate-3',
                'overlay-image-certificate-4'
            ]; // Ganti dengan id gambar yang benar

            prevButton.addEventListener('click', function() {
                currentImageIndex--;
                if (currentImageIndex < 0) {
                    currentImageIndex = imageSources.length - 1;
                }
                imgOverlay.src = imageSources[currentImageIndex];
                imgOverlay.id = imageArray[currentImageIndex];
            });

            nextButton.addEventListener('click', function() {
                currentImageIndex++;
                if (currentImageIndex >= imageSources.length) {
                    currentImageIndex = 0;
                }
                imgOverlay.src = imageSources[currentImageIndex];
                imgOverlay.id = imageArray[currentImageIndex];
            });
        });
    });
});
document.querySelectorAll('.nav-link').forEach(item => {
    item.addEventListener('click', event => {
      document.querySelectorAll('.nav-link').forEach(link => {
        link.classList.remove('active'); // Remove active class from all
      });
      item.classList.add('active'); // Add active class to clicked tab
    });
  });