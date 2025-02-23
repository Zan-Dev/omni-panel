<x-layout>    
    <div class="flex flex-col p-5 md:flex-row">        
        <div class="bg-white p-6 w-full md:w-1/4 border-r border-gray-200">
            <div class="flex flex-col items-center">
                <img src="https://placehold.co/100x100" alt="Silhouette of a person" class="rounded-full mb-4" width="100" height="100">
                <h2 class="text-xl font-semibold mb-2">{{ auth('web')->user()->name }}</h2>                
            </div>
        </div>        
        <div x-data="{ activeTab: 'details' }" class="flex-1 p-6">
            <!-- Navigation Tabs -->
            <div class="border-b border-gray-200 mb-6">
                <nav class="flex space-x-4">
                    <button @click="activeTab = 'details'" :class="activeTab === 'details' ? 'text-teal-500 font-semibold border-b-2 border-teal-500 pb-2' : 'text-gray-500 hover:text-teal-500 pb-2'">Details</button>
                    <button @click="activeTab = 'change-password'" :class="activeTab === 'change-password' ? 'text-teal-500 font-semibold border-b-2 border-teal-500 pb-2' : 'text-gray-500 hover:text-teal-500 pb-2'">Change Password</button>
                    <button @click="activeTab = 'log'" :class="activeTab === 'log' ? 'text-teal-500 font-semibold border-b-2 border-teal-500 pb-2' : 'text-gray-500 hover:text-teal-500 pb-2'">Log</button>
                </nav>
            </div>

            <!-- User Information Section -->
            <div x-show="activeTab === 'details'">
                <h3 class="text-xl font-semibold mb-4">User Information</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-gray-700">First Name</label>
                        <input type="text" class="w-full border border-gray-300 p-2 rounded" value="{{ auth('web')->user()->first_name }}" disabled>
                    </div>                    
                    <div>
                        <label class="block text-gray-700">Last Name</label>
                        <input type="text" class="w-full border border-gray-300 p-2 rounded" value="{{ auth('web')->user()->last_name }}" disabled>
                    </div>                                        
                    <div>
                        <label class="block text-gray-700">Company Email <i class="fas fa-info-circle text-gray-400"></i></label>
                        <input type="text" class="w-full border border-gray-300 p-2 rounded" value="{{ auth('web')->user()->email }}" disabled>
                    </div>
                    <div class="col-span-1 md:col-span-2">
                        <label class="block text-gray-700">Description <i class="fas fa-info-circle text-gray-400"></i></label>
                        <textarea class="w-full border border-gray-300 p-2 rounded h-24"></textarea>
                    </div>
                </div>
            </div>

            <!-- Change Password Section -->
            <div x-show="activeTab === 'change-password'" x-cloak>
                {{-- <h2 class="text-xl font-semibold mb-4">Change Password</h2>                
                <form action="{{ route('change-password', auth()->user()->id) }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="current-password">Current Password</label>
                        <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="current-password" type="password" name="current_password"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="new-password">New Password</label>
                        <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="new-password" type="password" name="new_password"/>
                    </div>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700" for="confirm-password">Confirm New Password</label>
                        <input class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" id="confirm-password" type="password" name="confirm_password"/>
                    </div>
                    <button class="bg-teal-500 text-white font-medium py-2 px-4 rounded-md hover:bg-teal-600" type="submit">Change Password</button>
                </form> --}}                              
            </div>

            <!-- Log Activity Section -->
            <div x-show="activeTab === 'log'" x-cloak class="">
                <h2 class="text-xl font-semibold mb-4">Log Activity</h2>
                <div class="space-y-4">
                    <!-- Log Item -->
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-md">
                        <p class="text-sm text-gray-600">2023-10-01 10:00 AM</p>
                        <p class="text-gray-800">User logged in from IP address 192.168.1.1</p>
                    </div>
                    <!-- Log Item -->
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-md">
                        <p class="text-sm text-gray-600">2023-10-01 09:45 AM</p>
                        <p class="text-gray-800">User changed password</p>
                    </div>
                    <!-- Log Item -->
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-md">
                        <p class="text-sm text-gray-600">2023-09-30 08:30 PM</p>
                        <p class="text-gray-800">User updated profile information</p>
                    </div>
                    <!-- Log Item -->
                    <div class="p-4 bg-gray-50 border border-gray-200 rounded-md">
                        <p class="text-sm text-gray-600">2023-09-29 07:15 AM</p>
                        <p class="text-gray-800">User logged out</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>