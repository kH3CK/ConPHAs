<?php

require_once("../template/components/head.php");

?>

<html>
<body>
  <div class="flex min-h-screen flex-col">

    <section class="relative bg-white overflow-hidden">
      <div class="absolute inset-0 bg-gradient-to-r from-white to-white/20 z-10"></div>
      <div class="absolute inset-0 opacity-10">
        <img 
          src="https://placehold.co/1920x1080" 
          alt="Background pattern" 
          class="object-cover w-full h-full"
        />
      </div>
      <div class="container mx-auto px-4 py-20 md:py-32 relative z-20">
        <div class="max-w-4xl">
          <h1 class="text-4xl md:text-6xl font-bold mb-6">
            Jouw springplank naar een <span class="text-[#36B843]">groene carrière</span>
          </h1>
          <p class="text-xl md:text-2xl text-gray-700 mb-8 max-w-2xl">
            Bij ConPHAs helpen we jonge studenten hun eerste stappen te zetten in de wereld van bioplastics.
          </p>
          <div class="flex flex-col sm:flex-row gap-4">
            <a 
              href="/stageplekken" 
              class="bg-[#36B843] hover:bg-[#37852D] text-white px-8 py-3 rounded-md text-lg font-medium transition-colors inline-block text-center"
            >
              Vind een stageplek
            </a>
            <a 
              href="/over" 
              class="border-2 border-[#36B843] text-[#36B843] hover:bg-[#36B843] hover:text-white px-8 py-3 rounded-md text-lg font-medium transition-colors inline-block text-center"
            >
              Meer over ons
            </a>
          </div>
        </div>
      </div>
      <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg xmlns="images/aap.jpg" class="h-10 w-10 text-[#36B843]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 9l6 6 6-6"/>
        </svg>
      </div>
    </section>


    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <h2 class="text-2xl md:text-4xl font-bold mb-4 text-center text-[#37852D]">Onze Partners</h2>
        <p class="text-gray-600 text-center mb-10 max-w-2xl mx-auto">
          We werken samen met toonaangevende bedrijven en instellingen in de bioplastics industrie om de beste kansen te bieden.
        </p>
        <div id="logo-carousel" class="relative overflow-hidden">
          <div class="logo-slider flex items-center transition-transform duration-500 ease-in-out">

          </div>
          <div class="absolute top-1/2 -left-4 transform -translate-y-1/2 flex space-x-2 justify-center mt-4">
            <button 
              id="prev-btn"
              class="p-2 rounded-full bg-[#36B843] text-white shadow-md hover:bg-[#37852D] transition-colors"
            >
              <svg xmlns="images/aap.jpg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6" />
              </svg>
            </button>
          </div>
          <div class="absolute top-1/2 -right-4 transform -translate-y-1/2 flex space-x-2 justify-center mt-4">
            <button 
              id="next-btn"
              class="p-2 rounded-full bg-[#36B843] text-white shadow-md hover:bg-[#37852D] transition-colors"
            >
              <svg xmlns="images/aap.jpg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </section>

    <!-- Cards Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
          <!-- Card 1 -->
          <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-r from-[#36B843]/90 to-[#37852D]/90 opacity-0 group-hover:opacity-100 transition-opacity z-10"></div>
            <img 
              src="https://placehold.co/800x600" 
              alt="Stages" 
              class="w-full h-[300px] object-cover transition-transform duration-500 group-hover:scale-105"
            />
            <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
              <h3 class="text-2xl font-bold text-white mb-2 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                Vind jouw perfecte stageplek
              </h3>
              <p class="text-white/90 mb-4 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-100">
                Ontdek stageplekken bij innovatieve bedrijven in de bioplastics sector.
              </p>
              <a 
                href="/stageplekken" 
                class="inline-flex items-center text-white opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-200"
              >
                Bekijk stageplekken 
                <svg xmlns="images/aap.jpg" class="ml-2 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </a>
            </div>
            <div class="absolute inset-0 p-8 flex flex-col justify-end group-hover:opacity-0 transition-opacity">
              <h3 class="text-2xl font-bold text-[#37852D] mb-2 bg-white/80 p-2 inline-block">
                Stageplekken
              </h3>
            </div>
          </div>

          <!-- Card 2 -->
          <div class="group relative overflow-hidden rounded-xl shadow-lg hover:shadow-xl transition-all duration-300">
            <div class="absolute inset-0 bg-gradient-to-r from-[#36B843]/90 to-[#37852D]/90 opacity-0 group-hover:opacity-100 transition-opacity z-10"></div>
            <img 
              src="https://placehold.co/800x600" 
              alt="Partners" 
              class="w-full h-[300px] object-cover transition-transform duration-500 group-hover:scale-105"
            />
            <div class="absolute inset-0 p-8 flex flex-col justify-end z-20">
              <h3 class="text-2xl font-bold text-white mb-2 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300">
                Onze partners en bedrijven
              </h3>
              <p class="text-white/90 mb-4 opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-100">
                Leer meer over de bedrijven waarmee we samenwerken om innovatie te stimuleren.
              </p>
              <a 
                href="/partners" 
                class="inline-flex items-center text-white opacity-0 group-hover:opacity-100 transform translate-y-4 group-hover:translate-y-0 transition-all duration-300 delay-200"
              >
                Bekijk partners 
                <svg xmlns="images/aap.jpg" class="ml-2 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </a>
            </div>
            <div class="absolute inset-0 p-8 flex flex-col justify-end group-hover:opacity-0 transition-opacity">
              <h3 class="text-2xl font-bold text-[#37852D] mb-2 bg-white/80 p-2 inline-block">
                Partners
              </h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Blog/Info Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between items-center mb-12">
          <div>
            <h2 class="text-2xl md:text-4xl font-bold text-[#37852D]">Laatste Nieuws</h2>
            <p class="text-gray-600 mt-2">Blijf op de hoogte van de laatste ontwikkelingen</p>
          </div>
          <a 
            href="/blog" 
            class="mt-4 md:mt-0 inline-flex items-center text-[#36B843] font-medium hover:text-[#37852D] transition-colors"
          >
            Alle berichten bekijken 
            <svg xmlns="images/aap.jpg" class="ml-1 h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 18l6-6-6-6" />
            </svg>
          </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
          <!-- Blog Card 1 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img 
              src="https://placehold.co/600x400" 
              alt="Nieuw project gelanceerd" 
              class="w-full h-48 object-cover"
            />
            <div class="p-6">
              <p class="text-sm text-gray-500 mb-2">15 maart 2025</p>
              <h3 class="text-xl font-bold mb-2 text-[#37852D]">Nieuw project gelanceerd</h3>
              <p class="text-gray-700 mb-4">We hebben onlangs een nieuw project gelanceerd dat veel aandacht heeft gekregen...</p>
              <a 
                href="/blog/nieuw-project" 
                class="text-[#36B843] font-medium hover:underline inline-flex items-center"
              >
                Lees meer 
                <svg xmlns="images/aap.jpg" class="ml-1 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>

          <!-- Blog Card 2 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img 
              src="https://placehold.co/600x400" 
              alt="Uitbreiding van ons team" 
              class="w-full h-48 object-cover"
            />
            <div class="p-6">
              <p class="text-sm text-gray-500 mb-2">28 februari 2025</p>
              <h3 class="text-xl font-bold mb-2 text-[#37852D]">Uitbreiding van ons team</h3>
              <p class="text-gray-700 mb-4">ConPHAs verwelkomt drie nieuwe experts in ons groeiende team van professionals...</p>
              <a 
                href="/blog/team-uitbreiding" 
                class="text-[#36B843] font-medium hover:underline inline-flex items-center"
              >
                Lees meer 
                <svg xmlns="images/aap.jpg" class="ml-1 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>

          <!-- Blog Card 3 -->
          <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
            <img 
              src="https://placehold.co/600x400" 
              alt="Innovatie award gewonnen" 
              class="w-full h-48 object-cover"
            />
            <div class="p-6">
              <p class="text-sm text-gray-500 mb-2">10 februari 2025</p>
              <h3 class="text-xl font-bold mb-2 text-[#37852D]">Innovatie award gewonnen</h3>
              <p class="text-gray-700 mb-4">We zijn trots om aan te kondigen dat ConPHAs de prestigieuze innovatie award heeft gewonnen...</p>
              <a 
                href="/blog/innovatie-award" 
                class="text-[#36B843] font-medium hover:underline inline-flex items-center"
              >
                Lees meer 
                <svg xmlns="images/aap.jpg" class="ml-1 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M5 12h14"></path>
                  <path d="m12 5 7 7-7 7"></path>
                </svg>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="max-w-3xl mx-auto">
          <h2 class="text-2xl md:text-4xl font-bold mb-4 text-center text-[#37852D]">Veelgestelde Vragen</h2>
          <p class="text-gray-600 text-center mb-10">
            Antwoorden op de meest gestelde vragen over ConPHAs en onze diensten
          </p>
          <div id="faq-accordion" class="space-y-4">
            <!-- FAQs will be inserted here by JavaScript -->
          </div>
        </div>
      </div>
    </section>

    <!-- Footer with Contact -->
    <footer class="bg-[#37852D] text-white py-12">
      <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
          <!-- About -->
          <div class="col-span-1">
            <h3 class="text-xl font-bold mb-4">ConPHAs</h3>
            <p class="mb-4 text-white/80">
              Innovatieve oplossingen voor een duurzame toekomst. Wij verbinden studenten met de bioplastics industrie.
            </p>
            <div class="flex space-x-4">
              <a href="#" class="text-white hover:text-white/80 transition-colors">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="#" class="text-white hover:text-white/80 transition-colors">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                </svg>
              </a>
              <a href="#" class="text-white hover:text-white/80 transition-colors">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="#" class="text-white hover:text-white/80 transition-colors">
                <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                  <path fill-rule="evenodd" d="M19 3a2 2 0 012 2v14a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h14zm-.5 15.5v-5.3a3.26 3.26 0 00-3.26-3.26c-.85 0-1.84.52-2.32 1.3v-1.11h-2.79v8.37h2.79v-4.93c0-.77.62-1.4 1.39-1.4a1.4 1.4 0 011.4 1.4v4.93h2.79zM6.88 8.56a1.68 1.68 0 001.68-1.68c0-.93-.75-1.69-1.68-1.69a1.69 1.69 0 00-1.69 1.69c0 .93.76 1.68 1.69 1.68zm1.39 9.94v-8.37H5.5v8.37h2.77z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>

          <!-- Quick Links -->
          <div class="col-span-1">
            <h3 class="text-xl font-bold mb-4">Snelle Links</h3>
            <ul class="space-y-2">
              <li>
                <a href="/" class="text-white/80 hover:text-white transition-colors">Home</a>
              </li>
              <li>
                <a href="/over" class="text-white/80 hover:text-white transition-colors">Over ons</a>
              </li>
              <li>
                <a href="/stageplekken" class="text-white/80 hover:text-white transition-colors">Stageplekken</a>
              </li>
              <li>
                <a href="/partners" class="text-white/80 hover:text-white transition-colors">Partners</a>
              </li>
              <li>
                <a href="/blog" class="text-white/80 hover:text-white transition-colors">Blog</a>
              </li>
              <li>
                <a href="/contact" class="text-white/80 hover:text-white transition-colors">Contact</a>
              </li>
            </ul>
          </div>

          <!-- Contact Us -->
          <div class="col-span-2">
            <h3 class="text-xl font-bold mb-4">Neem Contact Op</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div>
                <div class="flex items-start mb-4">
                  <div class="mr-3 mt-1 bg-white/10 p-2 rounded-full">
                    <svg xmlns="images/aap.jpg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path>
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium">Telefoon</p>
                    <p class="text-white/80">+31 (0)20 123 4567</p>
                  </div>
                </div>
                <div class="flex items-start mb-4">
                  <div class="mr-3 mt-1 bg-white/10 p-2 rounded-full">
                    <svg xmlns="images/aap.jpg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <rect width="20" height="16" x="2" y="4" rx="2"></rect>
                      <path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"></path>
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium">E-mail</p>
                    <p class="text-white/80">info@conphas.nl</p>
                  </div>
                </div>
              </div>
              <div>
                <div class="flex items-start mb-4">
                  <div class="mr-3 mt-1 bg-white/10 p-2 rounded-full">
                    <svg xmlns="images/aap.jpg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"></path>
                      <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium">Adres</p>
                    <p class="text-white/80">Hoofdstraat 123, 1234 AB Amsterdam</p>
                  </div>
                </div>
                <div class="flex items-start mb-4">
                  <div class="mr-3 mt-1 bg-white/10 p-2 rounded-full">
                    <svg xmlns="images/aap.jpg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M12 8v4l3 3"></path>
                      <circle cx="12" cy="12" r="10"></circle>
                    </svg>
                  </div>
                  <div>
                    <p class="font-medium">Openingstijden</p>
                    <p class="text-white/80">Ma-Vr: 9:00 - 17:00</p>
                  </div>
                </div>
              </div>
            </div>
            <form class="mt-4 flex">
              <input
                type="email"
                placeholder="Uw e-mailadres"
                class="px-4 py-2 w-full bg-white/10 text-white rounded-l-md focus:outline-none focus:bg-white/20 transition-colors"
              />
              <button class="bg-[#36B843] hover:bg-[#32a83e] text-white px-4 py-2 rounded-r-md transition-colors">
                Aanmelden
              </button>
            </form>
          </div>
        </div>
        <div class="border-t border-white/20 mt-8 pt-8 text-center">
          <p>&copy; <script>document.write(new Date().getFullYear())</script> ConPHAs. Alle rechten voorbehouden.</p>
        </div>
      </div>
    </footer>
  </div>

  <script src="home.js"></script>
</body>
</html>