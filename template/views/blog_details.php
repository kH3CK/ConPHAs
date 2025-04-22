<?php

require_once("../template/components/navbar.php");
require_once("../template/components/head.php");

?>

<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center py-4">
                <div class="flex items-center">
                    <img src="https://hebbkx1anhila5yf.public.blob.vercel-storage.com/ConPHAs-zenBc0eVBbFXSyYT7CoHnoI9PT9rK5.png" alt="ConPHAs Logo" class="h-12">
                </div>

                <?= getTextFromDatabase(1) ?>

    </header>

    <main class="d-flex">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <article class="bg-white shadow-md rounded-lg overflow-hidden mb-10">
                <img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" alt="Duurzame innovaties" class="w-full h-64 object-cover">
                <div class="p-6">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <span>15 maart 2023</span>
                        <span class="mx-2">•</span>
                        <span>Door: Emma Jansen</span>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">Innovatieve oplossingen voor een duurzamere toekomst</h3>
                            <p class="text-gray-600 mb-4">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ratione expedita neque nostrum numquam. Aspernatur perferendis impedit, vero maxime delectus hic nihil, quasi odio error, autem laboriosam facere! Perferendis, obcaecati impedit deserunt repudiandae culpa excepturi mollitia quod molestias illum voluptates aliquam recusandae optio provident soluta esse? Vero dolorum blanditiis, quod, dignissimos quibusdam libero vel expedita dolor consectetur quas mollitia nemo id ad fuga commodi fugiat sapiente veritatis earum sint praesentium laboriosam, itaque aspernatur iste? Laborum blanditiis similique nisi quo, fuga hic obcaecati nostrum nulla delectus autem expedita reiciendis porro itaque, rem aliquam repellat vitae. Aspernatur totam maiores eaque perferendis aliquam!
                            </p>
                            <a href="blog_detail" class="inline-flex items-center text-conphas-green hover:text-green-700">
                            </a>
                </div>
            </article>
        </div>

    </main>
</body>