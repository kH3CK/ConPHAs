       document.addEventListener('DOMContentLoaded', function() {
    
      const navbar = document.getElementById('navbar');
      const menuButton = document.getElementById('menuButton');
      const mobileMenu = document.getElementById('mobileMenu');
      const menuIcon = document.getElementById('menuIcon');
      const closeIcon = document.getElementById('closeIcon');
      
      let isMenuOpen = false;

      function toggleMenu() {
        isMenuOpen = !isMenuOpen;
        
        if (isMenuOpen) {
          mobileMenu.classList.remove('opacity-0', '-translate-y-10', 'pointer-events-none');
          mobileMenu.classList.add('opacity-100', 'translate-y-0');
          menuIcon.classList.add('hidden');
          closeIcon.classList.remove('hidden');
        } else {
          mobileMenu.classList.add('opacity-0', '-translate-y-10', 'pointer-events-none');
          mobileMenu.classList.remove('opacity-100', 'translate-y-0');
          menuIcon.classList.remove('hidden');
          closeIcon.classList.add('hidden');
        }
      }

      menuButton.addEventListener('click', toggleMenu);

      const mobileMenuLinks = mobileMenu.querySelectorAll('a');
      mobileMenuLinks.forEach(link => {
        link.addEventListener('click', toggleMenu);
      });

      function handleScroll() {
        if (window.scrollY > 10) {
          navbar.classList.remove('py-4');
          navbar.classList.add('py-2', 'shadow-lg');
        } else {
          navbar.classList.add('py-4');
          navbar.classList.remove('py-2', 'shadow-lg');
        }
      }
      window.addEventListener('scroll', handleScroll);
    });