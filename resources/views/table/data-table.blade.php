<x-layout>
    <div>    
        <div x-data="tableData()" class="max-w-7xl m-6 bg-white  p-5 rounded-lg shadow-xl">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold">Data Table 1</h2>
                <button @click="openModal = true" class="bg-blue-500 text-white px-4 py-2 rounded-lg">Tambah Data</button>
            </div>

            <!-- Filter & Search -->
            <div class="flex justify-between items-center mb-4">
                <select x-model="itemsPerPage" class="border p-2 rounded-lg">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="20">20</option>
                </select>
                <input type="text" x-model="search" placeholder="Cari data..." class="border p-2 rounded-lg w-1/3">
            </div>

            <div class="overflow-auto rounded-lg shadow">
                <table class="w-full border-collapse border border-gray-200">
                    <thead class="bg-gray-700 text-white">
                        <tr>                        
                            <th class="p-3 border cursor-pointer" @click="sortBy('nama')">                            
                                Nama
                                <i class="ml-2" :class="sortColumn === 'nama' ? (sortOrder === 'asc' ? 'fas fa-sort-up' : 'fas fa-sort-down') : 'fas fa-sort'"></i>
                            </th>
                            <th class="p-3 border cursor-pointer" @click="sortBy('email')">
                                Email 
                                <i class="ml-2" :class="sortColumn === 'email' ? (sortOrder === 'asc' ? 'fas fa-sort-up' : 'fas fa-sort-down') : 'fas fa-sort'"></i>
                            </th>
                            <th class="p-3 border cursor-pointer" @click="sortBy('role')">
                                Role 
                                <i class="ml-2" :class="sortColumn === 'role' ? (sortOrder === 'asc' ? 'fas fa-sort-up' : 'fas fa-sort-down') : 'fas fa-sort'"></i>
                            </th>
                            <th class="p-3 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(item, index) in filteredData" :key="index">
                            <tr class="hover:bg-gray-100">
                                <td class="p-3 border" x-text="item.nama"></td>
                                <td class="p-3 border" x-text="item.email"></td>
                                <td class="p-3 border" x-text="item.role"></td>
                                <td class="p-3 border text-center">
                                    <button @click="editData(index)" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                                    <button @click="deleteData(index)" class="bg-red-500 text-white px-2 py-1 rounded ml-2">Hapus</button>
                                </td>
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>

            <!-- Modal -->
            <div x-show="openModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
                <div class="bg-white p-5 rounded-lg shadow-lg w-96">
                    <h2 class="text-lg font-bold mb-4">Tambah Data</h2>
                    <input type="text" x-model="form.nama" placeholder="Nama" class="border p-2 w-full mb-2 rounded">
                    <input type="email" x-model="form.email" placeholder="Email" class="border p-2 w-full mb-2 rounded">
                    <select x-model="form.role" class="border p-2 w-full mb-2 rounded">
                        <option value="Admin">Admin</option>
                        <option value="User">User</option>
                    </select>
                    <div class="flex justify-end space-x-2">
                        <button @click="openModal = false" class="bg-gray-500 text-white px-4 py-2 rounded">Batal</button>
                        <button @click="saveData()" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function tableData() {
            return {
                openModal: false,
                search: '',
                itemsPerPage: 5,
                sortColumn: '',
                sortOrder: 'asc',
                form: { nama: '', email: '', role: 'User' },
                data: [
                    { nama: 'Zaki', email: 'zaki@gmail.com', role: 'Admin' },
                    { nama: 'Alya', email: 'alya@gmail.com', role: 'User' },
                    { nama: 'Rizky', email: 'rizky@gmail.com', role: 'Admin' },
                    { nama: 'Siti', email: 'siti@gmail.com', role: 'User' },
                    { nama: 'Andi', email: 'andi@gmail.com', role: 'User' },
                    { nama: 'Budi', email: 'budi@gmail.com', role: 'User' },
                    { nama: 'Cindy', email: 'cindy@gmail.com', role: 'Admin' },
                    { nama: 'Dika', email: 'dika@gmail.com', role: 'User' },
                    { nama: 'Eka', email: 'eka@gmail.com', role: 'Admin' },
                ],
                get filteredData() {
                    let sortedData = [...this.data];

                    if (this.sortColumn) {
                        sortedData.sort((a, b) => {
                            let fieldA = a[this.sortColumn].toLowerCase();
                            let fieldB = b[this.sortColumn].toLowerCase();

                            if (this.sortOrder === 'asc') {
                                return fieldA.localeCompare(fieldB);
                            } else {
                                return fieldB.localeCompare(fieldA);
                            }
                        });
                    }

                    return sortedData
                        .filter(item => item.nama.toLowerCase().includes(this.search.toLowerCase()))
                        .slice(0, this.itemsPerPage);
                },
                sortBy(column) {
                    if (this.sortColumn === column) {
                        this.sortOrder = this.sortOrder === 'asc' ? 'desc' : 'asc';
                    } else {
                        this.sortColumn = column;
                        this.sortOrder = 'asc';
                    }
                },
                saveData() {
                    if (this.form.nama && this.form.email) {
                        this.data.push({ ...this.form });
                        this.form = { nama: '', email: '', role: 'User' };
                        this.openModal = false;
                    }
                },
                editData(index) {
                    this.form = { ...this.data[index] };
                    this.openModal = true;
                },
                deleteData(index) {
                    this.data.splice(index, 1);
                }
            };
        }
    </script>
</x-layout>
