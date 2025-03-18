document.addEventListener("DOMContentLoaded", () => {
  
    initLogoCarousel()
  
    initFaqAccordion()
  })
  
  function initLogoCarousel() {
    const logos = [
      { id: 1, src: "https://placehold.co/200x100", alt: "Partner 1" },
      { id: 2, src: "https://placehold.co/200x100", alt: "Partner 2" },
      { id: 3, src: "https://placehold.co/200x100", alt: "Partner 3" },
      { id: 4, src: "https://placehold.co/200x100", alt: "Partner 4" },
      { id: 5, src: "https://placehold.co/200x100", alt: "Partner 5" },
      { id: 6, src: "https://placehold.co/200x100", alt: "Partner 6" },
      { id: 7, src: "https://placehold.co/200x100", alt: "Partner 7" },
      { id: 8, src: "https://placehold.co/200x100", alt: "Partner 8" },
    ]
  
    const logoSlider = document.querySelector(".logo-slider")
    let position = 0
  
    logos.forEach((logo) => {
      const logoDiv = document.createElement("div")
      logoDiv.className = "flex-shrink-0 w-[200px] mx-4 p-4 bg-white rounded-lg shadow-sm"
  
      const img = document.createElement("img")
      img.src = logo.src
      img.alt = logo.alt
      img.className = "h-16 object-contain"
  
      logoDiv.appendChild(img)
      logoSlider.appendChild(logoDiv)
    })
  
    const prevBtn = document.getElementById("prev-btn")
    const nextBtn = document.getElementById("next-btn")
  
    prevBtn.addEventListener("click", () => {
      position = Math.max(0, position - 1)
      updateCarouselPosition()
    })
  
    nextBtn.addEventListener("click", () => {
      position = Math.min(logos.length - 4, position + 1)
      updateCarouselPosition()
    })
  
    setInterval(() => {
      position = (position + 1) % (logos.length - 4)
      updateCarouselPosition()
    }, 3000)
  
    function updateCarouselPosition() {
      logoSlider.style.transform = `translateX(-${position * 200}px)`
    }
  }
  
  function initFaqAccordion() {
    const faqs = [
      {
        question: "Wat is ConPHAs?",
        answer:
          "ConPHAs is een platform dat jonge studenten helpt hun eerste stappen te zetten in de wereld van bioplastics. We verbinden studenten met bedrijven voor stages en bieden kennis over duurzame innovatie.",
      },
      {
        question: "Hoe kan ik een stageplek vinden via ConPHAs?",
        answer:
          "Je kunt op onze website naar de pagina 'Stageplekken' gaan waar alle beschikbare stageplaatsen staan vermeld. Je kunt filteren op locatie, duur en type stage om de perfecte match te vinden.",
      },
      {
        question: "Zijn jullie stages betaald?",
        answer:
          "Dit verschilt per bedrijf en type stage. Bij elke stageplek staat duidelijk vermeld of er een vergoeding wordt geboden en wat de hoogte hiervan is.",
      },
      {
        question: "Kan ik als bedrijf samenwerken met ConPHAs?",
        answer:
          "Zeker! We zijn altijd op zoek naar nieuwe partners. Neem contact met ons op via het contactformulier of stuur een e-mail naar partners@conphas.nl voor meer informatie.",
      },
      {
        question: "Bieden jullie ook cursussen of workshops aan?",
        answer:
          "Ja, we organiseren regelmatig workshops en webinars over verschillende onderwerpen binnen de bioplastics industrie. Houd onze agenda in de gaten voor aankomende evenementen.",
      },
    ]
  
    const faqContainer = document.getElementById("faq-accordion")
  
    faqs.forEach((faq, index) => {
      const faqItem = document.createElement("div")
      faqItem.className = "faq-item border border-gray-200 rounded-lg overflow-hidden"
  
      const faqButton = document.createElement("button")
      faqButton.className =
        "flex justify-between items-center w-full p-4 text-left bg-white hover:bg-gray-50 transition-colors"
      faqButton.innerHTML = `
        <span class="font-medium text-[#37852D]">${faq.question}</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="faq-icon h-5 w-5 text-[#36B843] transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 9l6 6 6-6"/>
        </svg>
      `
  
      const faqAnswer = document.createElement("div")
      faqAnswer.className = "faq-answer"
      faqAnswer.innerHTML = `
        <div class="p-4 bg-gray-50 text-gray-700">
          ${faq.answer}
        </div>
      `
  
      faqItem.appendChild(faqButton)
      faqItem.appendChild(faqAnswer)
      faqContainer.appendChild(faqItem)
  
      faqButton.addEventListener("click", () => {
        faqItem.classList.toggle("active")
      })
  
      if (index === 0) {
        faqItem.classList.add("active")
      }
    })
  }
  
  