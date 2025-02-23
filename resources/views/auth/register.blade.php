<x-layout>    
    <div class="flex items-center justify-center min-h-screen bg-gray-800">

        <!-- Container Form -->
        <div class="w-full max-w-xs sm:max-w-sm md:max-w-sm bg-white/80 p-6 rounded-lg shadow-lg transition-all duration-300 hover:shadow-2xl" x-data="{ password: '', confirmPassword: '' }">

            <!-- Judul Form -->
            <h2 class="text-2xl font-bold text-center text-gray-700 mb-4">Register</h2>

            <!-- Form -->
            @if (session('error'))
                <p class="text-red-500 text-center">{{ session('error') }}</p>
            @endif

            <form action="{{ route('register') }}" method="POST" class="space-y-4">
                @csrf
                <div class="flex space-x-4">
                    <div class="w-1/2">
                        <label class="block text-gray-700">First Name</label>
                        <input type="text" name="first_name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 transition-all duration-300 hover:border-blue-500" placeholder="Masukkan nama">
                    </div>
                    <div class="w-1/2">
                        <label class="block text-gray-700">Last Name</label>
                        <input type="text" name="last_name" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 transition-all duration-300 hover:border-blue-500" placeholder="Masukkan nama">
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 transition-all duration-300 hover:border-blue-500" placeholder="Masukkan email">
                </div>

                <div>
                    <label class="block text-gray-700">Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <input name="password" :type="show ? 'text' : 'password'" x-model="password" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 transition-all duration-300 hover:border-blue-500" placeholder="Masukkan password">
                        <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700 transition" @click="show = !show">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.5 10.5 0 0 1 12 20.5c-6.5 0-10-7.5-10-7.5S5.5 5.5 12 5.5c1.6 0 3.2.5 4.6 1.4"></path><path d="M2 2l20 20"></path></svg>
                        </button>
                    </div>
                </div>

                <div>
                    <label class="block text-gray-700">Konfirmasi Password</label>
                    <div class="relative" x-data="{ show: false }">
                        <input name="password_confirmation" :type="show ? 'text' : 'password'" x-model="confirmPassword" class="w-full px-4 py-2 border rounded-lg focus:ring focus:ring-blue-300 transition-all duration-300 hover:border-blue-500" 
                        :class="confirmPassword && confirmPassword !== password ? 'border-red-500 ring-red-300' : ''" 
                        placeholder="Masukkan ulang password">
                        <button type="button" class="absolute right-3 top-3 text-gray-500 hover:text-gray-700 transition" @click="show = !show">
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17.94 17.94A10.5 10.5 0 0 1 12 20.5c-6.5 0-10-7.5-10-7.5S5.5 5.5 12 5.5c1.6 0 3.2.5 4.6 1.4"></path><path d="M2 2l20 20"></path></svg>
                        </button>
                        <p x-show="confirmPassword && confirmPassword !== password" class="text-red-500 text-sm mt-1">Password tidak cocok</p>
                    </div>
                </div>

                <!-- Tombol Register -->
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg transition-all duration-300 hover:bg-blue-600 hover:shadow-lg">
                    Daftar
                </button>

                <!-- Atau -->
                <div class="text-center text-gray-600 text-sm">Atau</div>

                <!-- Tombol Register dengan Google -->
                <button type="button" class="w-full flex items-center justify-center bg-red-500 text-white py-2 rounded-lg transition-all duration-300 hover:bg-red-600 hover:shadow-lg">
                    <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48"><path fill="#4285F4" d="M24 9.5c3.8 0 6.4 1.6 7.9 2.9l5.9-5.7C33.8 3 29.3 1 24 1 14.8 1 7.1 6.6 3.4 14.7l6.9 5.3C12 13.5 17.3 9.5 24 9.5z"/><path fill="#34A853" d="M46.2 24.5c0-1.6-.1-3.3-.4-4.9H24v9.4h12.8c-.6 3-2.2 5.6-4.6 7.4l7.3 5.7c4.3-4 6.7-9.9 6.7-16.6z"/><path fill="#FBBC05" d="M10.3 28.6c-1.3-3-1.3-6.4 0-9.4l-6.9-5.3C-0.2 18.4-0.2 29.6 3.4 37.7l6.9-5.3z"/><path fill="#EA4335" d="M24 47c5.3 0 9.8-1.7 13.1-4.7l-7.3-5.7c-2 1.3-4.4 2.1-6.8 2.1-6.7 0-12.2-4-14.3-9.7l-6.9 5.3C7.1 41.4 14.8 47 24 47z"/></svg>
                    Daftar dengan Google
                </button>

                <!-- Sudah punya akun? -->
                <div class="text-center text-gray-600 text-sm mt-2">
                    Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-500 hover:underline transition-all duration-300 hover:text-blue-700">Login</a>
                </div>

            </form>

        </div>

    </div>   
</x-layout>
