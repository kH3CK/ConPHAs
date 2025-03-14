<?php

require_once("../template/components/head.php");

?>

<div class="flex h-screen items-center justify-end bg-gradient-to-br from-green-300 to-green-400">
    <div class="">

    </div>
    <div class="bg-white shadow h-full p-50 w-170 flex items-center justify-center">
        <div class="flex flex-col justify-center items-center -translate-y-1/2">
            <img src="images/ConPHAs" alt="logo" class="h-16 w-auto mx-auto">

            <h2 class="text-2xl font-bold text-gray-700 text-center">Docenten Login</h2>
            <form class="space-y-4 mt-4">
                <div>
                    <label class="block text-gray-600 text-sm mb-1">E-mailadres</label>
                    <input
                        type="email"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="jouw@email.com">
                </div>
                <div>
                    <label class="block text-gray-600 text-sm mb-1">Wachtwoord</label>
                    <input
                        type="password"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-400 focus:outline-none"
                        placeholder="••••••••">
                </div>
                <button
                    type="submit"
                    class="w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-700 transition duration-200">
                    Inloggen
                </button>
            </form>
        </div>
    </div>
</div>