function initPrestasiSlider() {
  const carousel = document.getElementById("prestasiHeroCarousel");
  if (!carousel) return;

  const slides = Array.from(carousel.querySelectorAll(".hero-slide"));
  const dotsContainer = carousel.querySelector(".hero-carousel-dots");
  const dots = dotsContainer
    ? Array.from(dotsContainer.querySelectorAll(".hero-dot"))
    : [];
  const prevBtn = carousel.querySelector(".hero-carousel-btn.prev");
  const nextBtn = carousel.querySelector(".hero-carousel-btn.next");

  if (!slides.length) return;

  let currentIndex = 0;
  let autoSlide = null;
  let isAnimating = false;

  function syncDots(index) {
    dots.forEach((dot, i) => {
      dot.classList.toggle("active", i === index);
    });
  }

  function resetSlides() {
    slides.forEach((slide, i) => {
      slide.classList.remove("active", "prev-slide");
      slide.setAttribute("aria-hidden", i === currentIndex ? "false" : "true");
      if (i === currentIndex) {
        slide.classList.add("active");
      }
    });
    syncDots(currentIndex);
  }

  function goToSlide(newIndex) {
    if (
      isAnimating ||
      newIndex === currentIndex ||
      newIndex < 0 ||
      newIndex >= slides.length
    ) {
      return;
    }

    isAnimating = true;

    const currentSlide = slides[currentIndex];
    const nextSlide = slides[newIndex];

    currentSlide.classList.remove("active");
    currentSlide.classList.add("prev-slide");
    currentSlide.setAttribute("aria-hidden", "true");

    nextSlide.classList.add("active");
    nextSlide.setAttribute("aria-hidden", "false");

    syncDots(newIndex);
    currentIndex = newIndex;

    window.setTimeout(() => {
      slides.forEach((slide, i) => {
        slide.classList.remove("prev-slide");
        slide.classList.toggle("active", i === currentIndex);
        slide.setAttribute(
          "aria-hidden",
          i === currentIndex ? "false" : "true",
        );
      });
      isAnimating = false;
    }, 800);
  }

  function nextSlide() {
    const nextIndex = (currentIndex + 1) % slides.length;
    goToSlide(nextIndex);
  }

  function prevSlide() {
    const prevIndex = (currentIndex - 1 + slides.length) % slides.length;
    goToSlide(prevIndex);
  }

  function stopAutoSlide() {
    if (autoSlide) {
      window.clearInterval(autoSlide);
      autoSlide = null;
    }
  }

  function startAutoSlide() {
    stopAutoSlide();
    autoSlide = window.setInterval(() => {
      nextSlide();
    }, 4500);
  }

  resetSlides();

  dots.forEach((dot, index) => {
    dot.addEventListener("click", () => {
      goToSlide(index);
      startAutoSlide();
    });
  });

  if (nextBtn) {
    nextBtn.addEventListener("click", () => {
      nextSlide();
      startAutoSlide();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", () => {
      prevSlide();
      startAutoSlide();
    });
  }

  carousel.addEventListener("mouseenter", stopAutoSlide);
  carousel.addEventListener("mouseleave", startAutoSlide);

  startAutoSlide();
}

// Initialize when DOM loads
document.addEventListener("DOMContentLoaded", initPrestasiSlider);

// Fungsi untuk membuka Viewer Sertifikat
function openCertViewer(fileSrc, type) {
  const modal = document.getElementById("certModal");
  const iframe = document.getElementById("pdfFrame");
  const img = document.getElementById("imgFrame");

  // Reset tampilan
  iframe.style.display = "none";
  img.style.display = "none";
  iframe.src = "";
  img.src = "";

  if (type === "pdf") {
    iframe.src = fileSrc;
    iframe.style.display = "block";
  } else if (type === "image") {
    img.src = fileSrc;
    img.style.display = "block";
  }

  modal.classList.add("active");
  document.body.style.overflow = "hidden";
}

// Fungsi untuk menutup Viewer
function closeCertViewer() {
  const modal = document.getElementById("certModal");
  modal.classList.remove("active");
  document.body.style.overflow = "auto";
}

// Menutup modal dengan tombol ESC
document.addEventListener("keydown", function (e) {
  if (e.key === "Escape") closeCertViewer();
});