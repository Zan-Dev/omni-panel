<div x-data="{ open: true, submenu: false }" class="flex flex-col min-h-screen border-r-white">
        
    <!-- Sidebar -->
    <div :class="open ? 'w-64' : 'w-16'" class="bg-gray-800 text-white h-full transition-all duration-300 flex flex-col">
        
        <!-- Logo & Toggle -->
        <div class="flex items-center justify-between p-4">
            <span 
                x-show="open"
                x-transition.opacity.duration.300ms        
                class="text-lg font-bold whitespace-nowrap">
                Omni Panel
            </span>    
            <button @click="open = !open" class="text-white p-2 focus:outline-none rounded-lg hover:bg-gray-700">
                <svg x-show="open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                <svg x-show="!open" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
        </div>

        <!-- Menu -->
        <nav class="flex-1">
            <a href="{{ route('dashboard') }}" class="{{ request()->is('dashboard') ? 'flex items-center space-x-2 p-3 pl-5 bg-gray-700' : 'flex items-center space-x-2 p-3 pl-5 hover:bg-gray-700' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2 7-7 7 7 2 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2v-8z"></path>
                </svg>
                <span :class="open ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-opacity duration-300">
                    Dashboard
                </span>
            </a>

            <a href="#" class="flex items-center space-x-2 p-3 pl-5 hover:bg-gray-700">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span :class="open ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-opacity duration-300">
                    component
                </span>
            </a>

            <a href="#" class="flex items-center space-x-2 p-3 pl-5 hover:bg-gray-700">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h4l2 4h10v10H3V7z"></path>
                </svg>
                <span :class="open ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-opacity duration-300">
                    Pages
                </span>
            </a>

            <!-- Dropdown -->
            <div class="relative">
                <button @click="[submenu = !submenu, open = true]"  class="flex items-center space-x-2 p-3 pl-5 w-full hover:bg-gray-700 focus:outline-none">
                    <!-- Icon Chart -->
                    <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M7 10v8M11 6v12M15 12v6M19 8v10"></path>
                    </svg>
                
                    <!-- Teks -->
                    <span :class="open ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-opacity duration-300">
                        Chart
                    </span>
                
                    <!-- Ikon Panah Kanan --> 
                    <svg class="w-5 h-5 flex-shrink-20 transform transition-transform duration-300 ml-auto" 
                        :class="submenu ? 'rotate-90' : 'rotate-0'" 
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </button>
                
                
                <div x-show="submenu && open" 
                    x-transition:enter="transition transform ease-out duration-300"
                    x-transition:enter-start="opacity-0 translate-y-[-10px]"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    x-transition:leave="transition transform ease-in duration-200"
                    x-transition:leave-start="opacity-100 translate-y-0"
                    x-transition:leave-end="opacity-0 translate-y-[-10px]"
                    class="ml-6 rounded-lg shadow-lg my-1">
                    
                    <a href="#" :class="open ? 'opacity-100 visible' : 'opacity-0 invisible'"
                        class="block p-2 rounded-2xl text-white hover:bg-gray-600">
                        Web Development
                    </a>
                    
                    <a href="#" :class="open ? 'opacity-100 visible' : 'opacity-0 invisible'"
                        class="block p-2 rounded-2xl text-white hover:bg-gray-600">
                        SEO
                    </a>
                    
                    <a href="#" :class="open ? 'opacity-100 visible' : 'opacity-0 invisible'"
                        class="block p-2 rounded-2xl text-white hover:bg-gray-600">
                        Marketing
                    </a>

                </div>

            </div>

            <a href="{{ route('table') }}" class="{{ request()->is('data-table') ? 'flex items-center space-x-2 p-3 pl-5 bg-gray-700' : 'flex items-center space-x-2 p-3 pl-5 hover:bg-gray-700'}}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3zM3 9h18M9 3v18"></path>
                </svg>
                <span :class="open ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-opacity duration-300">
                    Table
                </span>
            </a>

            <a href="{{ route('profile') }}" class="{{ request()->is('profile') ? 'flex items-center space-x-2 p-3 pl-5 bg-gray-700' : 'flex items-center space-x-2 p-3 pl-5 hover:bg-gray-700' }}">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14c-4.418 0-8 3.582-8 8h16c0-4.418-3.582-8-8-8zM12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4z"></path>
                </svg>
                <span :class="open ? 'opacity-100' : 'opacity-0 w-0 overflow-hidden'" class="transition-opacity duration-300">
                    Profile
                </span>
            </a>            
        </nav>
    </div>
</div>