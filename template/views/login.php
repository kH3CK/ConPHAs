<?php

require_once("../template/components/head.php");

?>
<div class="flex h-screen items-center justify-center bg-gradient-to-br from-blue-50 to-blue-100">
    <div class="bg-white shadow-lg rounded-2xl p-8 w-96">
        <div class="flex flex-col items-center mb-6">
            <img src="/logo.png" alt="ConPHAs Logo" class="h-16 mb-4" />
            <h2 class="text-2xl font-bold text-gray-700">Docenten Login</h2>
        </div>
        <form class="space-y-4">
            <div>
                <label class="block text-gray-600 text-sm mb-1">E-mailadres</label>
                <input
                    type="email"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="jouw@email.com" />
            </div>
            <div>
                <label class="block text-gray-600 text-sm mb-1">Wachtwoord</label>
                <input
                    type="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                    placeholder="••••••••" />
            </div>
            <button
                type="submit"
                class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                Inloggen
            </button>
        </form>
        <div class="text-center mt-4">
            <a href="#" class="text-sm text-blue-600 hover:underline">
                Wachtwoord vergeten?
            </a>
        </div>
    </div>
</div>