document.addEventListener("DOMContentLoaded", () => {
  // Logo Carousel
  initLogoCarousel();
  
  // FAQ Accordion
  initFaqAccordion();
});
  
// Logo Carousel Initialization
function initLogoCarousel() {
  const logos = [
    { id: 1, src: "/images/partners/partner1.png", alt: "Partner 1" },
    { id: 2, src: "/images/partners/partner2.png", alt: "Partner 2" },
    { id: 3, src: "/images/partners/partner3.png", alt: "Partner 3" },
    { id: 4, src: "/images/partners/partner4.png", alt: "Partner 4" },
    { id: 5, src: "/images/partners/partner5.png", alt: "Partner 5" },
    { id: 6, src: "/images/partners/partner6.png", alt: "Partner 6" }
  ];
  
  const logoSlider = document.querySelector(".logo-slider");
  if (!logoSlider) return;
  
  let position = 0;
  const visibleLogos = 4; // Aantal zichtbare logo's
  
  // Maak logo elementen leeg
  logoSlider.innerHTML = '';
  
  // Maak logo elementen
  logos.forEach((logo) => {
    const logoDiv = document.createElement("div");
    logoDiv.className = "flex-shrink-0 w-[200px] mx-4 p-4 bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow";
  
    const img = document.createElement("img");
    img.src = logo.src;
    img.alt = logo.alt;
    img.className = "h-16 w-full object-contain";
    
    // Fallback voor niet-bestaande afbeeldingen
    img.onerror = function() {
      this.src = "https://placehold.co/200x100";
    };
  
    logoDiv.appendChild(img);
    logoSlider.appendChild(logoDiv);
  });
  
  // Voeg event listeners toe voor navigatieknoppen
  const prevBtn = document.getElementById("prev-btn");
  const nextBtn = document.getElementById("next-btn");
  
  if (prevBtn && nextBtn) {
    prevBtn.addEventListener("click", () => {
      position = Math.max(0, position - 1);
      updateCarouselPosition();
    });
  
    nextBtn.addEventListener("click", () => {
      position = Math.min(logos.length - visibleLogos, position + 1);
      updateCarouselPosition();
    });
  }
  
  // Auto-scroll de carousel
  let autoScrollInterval = setInterval(() => {
    position = (position + 1) % (logos.length - visibleLogos + 1);
    updateCarouselPosition();
  }, 3000);
  
  // Stop auto-scroll bij hover
  logoSlider.addEventListener('mouseenter', () => {
    clearInterval(autoScrollInterval);
  });
  
  // Herstart auto-scroll na hover
  logoSlider.addEventListener('mouseleave', () => {
    autoScrollInterval = setInterval(() => {
      position = (position + 1) % (logos.length - visibleLogos + 1);
      updateCarouselPosition();
    }, 3000);
  });
  
  function updateCarouselPosition() {
    const slideWidth = 232; // 200px width + 2 * 16px margin
    logoSlider.style.transform = `translateX(-${position * slideWidth}px)`;
  }
}
  
// FAQ Accordion Initialization
function initFaqAccordion() {
  const faqItems = document.querySelectorAll('.faq-item');
  
  faqItems.forEach((item, index) => {
    const button = item.querySelector('button');
    const answer = item.querySelector('.faq-answer');
    
    if (button && answer) {
      button.addEventListener('click', () => {
        // Sluit alle andere FAQs
        faqItems.forEach(otherItem => {
          if (otherItem !== item) {
            otherItem.classList.remove('active');
          }
        });
        
        // Toggle huidige FAQ
        item.classList.toggle('active');
      });
      
      // Open eerste FAQ standaard
      if (index === 0) {
        item.classList.add('active');
      }
    }
  });
}
  
document.addEventListener('DOMContentLoaded', function() {
  const track = document.querySelector('.partner-track');
  const slides = document.querySelectorAll('.partner-slide');

  slides.forEach(slide => {
    const clone = slide.cloneNode(true);
    track.appendChild(clone);
  });

  let position = 0;
  const slideWidth = 280;
  const speed = 0.5;

  function updateSlides() {
    position -= speed;

    if (position <= -slideWidth * slides.length) {
      position = 0;
    }

    track.style.transform = `translateX(${position}px)`;

    const visibleIndex = Math.abs(Math.floor(position / slideWidth));
    slides.forEach((slide, index) => {
      const isVisible = index >= visibleIndex && index < visibleIndex + 4;
      slide.classList.toggle('active', isVisible);
      const clonedSlide = track.children[index + slides.length];
      if (clonedSlide) {
        clonedSlide.classList.toggle('active', isVisible);
      }
    });

    requestAnimationFrame(updateSlides);
  }

  requestAnimationFrame(updateSlides);
});
