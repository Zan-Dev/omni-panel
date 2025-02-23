<x-layout>    
    <div class="flex items-center justify-center min-h-screen bg-gray-800">

        <!-- Container Form -->
        <div class="w-full max-w-xs sm:max-w-sm md:max-w-sm bg-white/80 p-6 rounded-lg shadow-lg transition-all duration-300 hover:shadow-2xl" x-data="{ email: '' }">

            <!-- Judul Form -->
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Lupa Password</h2>

            <!-- Deskripsi -->
            <p class="text-sm font-plex text-center text-gray-600 mb-4">Masukkan email yang terdaftar, kami akan mengirimkan link reset password.</p>

            <!-- Form -->
            <form action="#" method="POST" class="space-y-4">
                <div>
                    <label class="block text-gray-700">Email</label>
                    <input type="email" x-model="email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 transition-all duration-300 hover:border-blue-500" placeholder="Masukkan email"
                    x-bind:class="email && !/^[^@]+@[^@]+\.[^@]+$/.test(email) ? 'border-red-500' : ''">
                    <p x-show="email && !email.match(/^[^@]+@[^@]+\.[^@]+$/)" class="text-red-500 text-sm mt-1">Email tidak valid</p>
                </div>

                <!-- Tombol Kirim Link -->
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg transition-all duration-300 hover:bg-blue-600 hover:shadow-lg">
                    Kirim Link Reset Password
                </button>

                <!-- Kembali ke Login -->
                <div class="text-center text-gray-600 text-sm mt-2">
                    <a href="{{ route('login') }}" class="text-blue-500 hover:underline transition-all duration-300 hover:text-blue-700">Kembali ke Login</a>
                </div>
            </form>

        </div>

    </div>   
</x-layout>