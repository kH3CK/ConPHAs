<body>
  
  <nav id="navbar" class="fixed top-0 w-full z-50 transition-all duration-300 bg-white py-4">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        
        <div class="flex-shrink-0 flex items-center">
          <a href="/">
            <img 
              src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/ConPHAs-NQY4PeiYlO4Qvtxqaox8UBqm86H33v.png" 
              alt="ConPHAs Logo" 
              class="h-20 w-auto object-contain transition-transform duration-300 hover:scale-105"
            >
          </a>
        </div>
        
        <div class="hidden md:flex items-center space-x-1">
          <a href="/" class="relative px-5 py-2.5 font-medium text-gray-800 group">
            <span class="relative z-10">Home</span>
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-color transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
            <span class="absolute inset-0 rounded-md bg-[#36B843]/10 transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-bottom"></span>
          </a>
          <a href="/stageplekken" class="relative px-5 py-2.5 font-medium text-gray-800 group">
            <span class="relative z-10">Stage</span>
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-color transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
            <span class="absolute inset-0 rounded-md bg-[#36B843]/10 transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-bottom"></span>
          </a>
          <a href="/over_ons" class="relative px-5 py-2.5 font-medium text-gray-800 group">
            <span class="relative z-10">Over Ons</span>
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-color transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
            <span class="absolute inset-0 rounded-md bg-[#36B843]/10 transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-bottom"></span>
          </a>
          <a href="/blog" class="relative px-5 py-2.5 font-medium text-gray-800 group">
            <span class="relative z-10">Blog</span>
            <span class="absolute bottom-0 left-0 w-full h-0.5 bg-primary-color transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
            <span class="absolute inset-0 rounded-md bg-[#36B843]/10 transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-bottom"></span>
          </a>
          <div class="ml-6">
            <button class="relative overflow-hidden bg-primary-color text-white px-6 py-2.5 rounded-full font-medium transition-all duration-300 hover:bg-white hover:text-primary-color hover:shadow-lg hover:shadow-[#36B843]/30 group">
              <span class="relative z-10 group-hover:text-[#36B843]">Contact</span>
              <span class="absolute inset-0 w-full h-full bg-white transform scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-left"></span>
              <span class="absolute inset-0 rounded-md bg-[#36B843]/10 transform scale-y-0 group-hover:scale-y-100 transition-transform duration-300 origin-bottom"></span>
            </button>
          </div>
        </div>

        <div class="md:hidden flex items-center">
          <button
            id="menuButton"
            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-primary-color hover:bg-gray-100 transition-colors duration-200 focus:outline-none"
          >
            <span class="sr-only">Open hoofdmenu</span>
            <svg id="menuIcon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg id="closeIcon" xmlns="http://www.w3.org/2000/svg" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>
    </div>
    
    <div id="mobileMenu" class="md:hidden absolute w-full bg-white shadow-lg transition-all duration-300 ease-in-out transform opacity-0 -translate-y-10 pointer-events-none">
      <div class="px-4 pt-2 pb-3 space-y-1">
        <a href="/" class="block px-4 py-3 rounded-md text-base font-medium text-gray-800 hover:text-primary-color hover:bg-gray-50 transition-colors duration-200">
          Home
        </a>
        <a href="/stage" class="block px-4 py-3 rounded-md text-base font-medium text-gray-800 hover:text-primary-color hover:bg-gray-50 transition-colors duration-200">
          Stage
        </a>
        <a href="/over-ons" class="block px-4 py-3 rounded-md text-base font-medium text-gray-800 hover:text-primary-color hover:bg-gray-50 transition-colors duration-200">
          Over Ons
        </a>
        <div class="pt-2 pb-3">
          <button class="w-full bg-primary-color text-white px-4 py-3 rounded-md font-medium hover:bg-[#2da539] transition-colors duration-200">
            Contact
          </button>
        </div>
      </div>
    </div>
  </nav>
  <script>
   
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
  </script>
</body>