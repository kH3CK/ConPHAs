<?php

require_once("../template/components/head.php");

?>

<body>
  <div class="bg-[url('/public/images/bg.png')] bg-cover bg-center h-screen w-full relative">
    <img src="images/bg.png" class="absolute inset-0 w-full h-full object-cover" alt="line">
  </div>
  <div class="absolute top-60 left-0 w-full h-full opacity-50">
    <svg
      viewBox="0 0 500 100"
      className="w-full h-20"
      xmlns="http://www.w3.org/2000/svg">
      <path
        d="M 0 50 Q 50 0, 100 50 T 200 50 T 300 50 T 400 50 T 500 50"
        stroke="black"
        fill="transparent"
        strokeWidth="2" />
    </svg>
  </div>
  <div class="relative inline-block group">
    <img src="images/fles.png" alt="fles" class="hover-trigger">
    <div class="absolute bottom-full left-1/2 transform -translate-x-1/2 mb-2 w-100 bg-black text-white text-center rounded-lg py-1 opacity-0 transition-opacity duration-300 group-hover:opacity-100">
      Plastic word voor van alles gebruikt en vervuilt onze aarde. Dit is natuurlijk niet goed, daarom maken wij een materiaal wat lijkt op plastic. Dit is gemaakt van Polyhydroxyalkanoaten (PHA's). Die worden in de natuur geproduceerd door een grote hoeveelheid aan micro-organismen, waaronder bacteriën. Hiermee kan bioplastic gemaakt worden en dit is biologisch afbreekbaar.
    </div>
  </div>
</body>