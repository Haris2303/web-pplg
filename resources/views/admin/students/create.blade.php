<x-dashboard-layout>
    <section class="bg-white dark:bg-gray-900 shadow-md">
        <div class="py-8 px-4 mx-auto max-w-full lg:py-16">
            @error($errors->all())
                $message
            @enderror
            <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-1">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambahkan Siswa Baru</h2>
                        {{-- Nama Lengkap --}}
                        <div class="mb-3">
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Lengkap</label>
                            <input type="text" name="name" id="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('name') }}" required="">
                            <x-input-error :messages="$errors->get('name')" />
                        </div>
                        {{-- NIS --}}
                        <div class="mb-3">
                            <label for="nis"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                            <input type="text" name="nis" id="nis"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('nis') }}" required="">
                            <x-input-error :messages="$errors->get('nis')" />
                        </div>
                        {{-- NISN --}}
                        <div class="mb-3">
                            <label for="nisn"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NISN</label>
                            <input type="text" name="nisn" id="nisn"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('nisn') }}" required="">
                            <x-input-error :messages="$errors->get('nisn')" />
                        </div>
                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="example@gmail.com" value="{{ old('email') }}" required="">
                            <x-input-error :messages="$errors->get('email')" />
                        </div>
                        {{-- Kelas --}}
                        <div class="mb-3">
                            <label for="class"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelas</label>
                            <select name="class_id" id="class"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>-- Pilih Kelas --</option>
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('class_id')" />
                        </div>
                        {{-- Angkatan --}}
                        <div class="mb-3">
                            <label for="force"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Angkatan</label>
                            <select name="force_id" id="force"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected disabled>-- Pilih Angkatan --</option>
                                @foreach ($forces as $force)
                                    <option value="{{ $force->id }}">{{ $force->year }}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('force_id')" />
                        </div>
                        {{-- Foto --}}
                        <div class="mb-3">
                            <label for="picture"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                                <input name="picture" id="picture" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" value="{{ old('picture') }}">
                            <x-input-error :messages="$errors->get('picture')" />
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Biodata</h2>
                        <div class="sm:col-span-1">
                            {{-- Tanggal Lahir --}}
                            <div class="mb-3">
                                <label for="birth"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal
                                    Lahir</label>
                                <input type="date" name="birth" id="birth"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ old('birth') }}" required="">
                                <x-input-error :messages="$errors->get('birth')" />
                            </div>
                            {{-- Jenis Kelamin --}}
                            <div class="mb-3">
                                <label for="nis"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis
                                    Kelamin</label>
                                <div class="flex items-center mb-4">
                                    <input id="default-radio-1" type="radio" value="L" name="gender"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-radio-1"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                                        Laki-Laki</label>
                                </div>
                                <div class="flex items-center">
                                    <input id="default-radio-2" type="radio" value="P" name="gender"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="default-radio-2"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Perempuan
                                    </label>
                                </div>
                                <x-input-error :messages="$errors->get('gender')" />
                            </div>
                            {{-- Agama --}}
                            <div class="mb-3">
                                <label for="religion"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Agama</label>
                                <input type="text" name="religion" id="religion"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ old('religion') }}" required="">
                                <x-input-error :messages="$errors->get('religion')" />
                            </div>
                            {{-- Nama IBU --}}
                            <div class="mb-3">
                                <label for="mother"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Ibu</label>
                                <input type="text" name="mother" id="mother"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ old('mother') }}" required="">
                                <x-input-error :messages="$errors->get('mother')" />
                            </div>
                            {{-- Nama Ayah --}}
                            <div class="mb-3">
                                <label for="father"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                    Ayah</label>
                                <input type="text" name="father" id="father"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ old('father') }}" required="">
                                <x-input-error :messages="$errors->get('father')" />
                            </div>
                            {{-- Alamat --}}
                            <div class="mb-3">
                                <label for="address"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                                <textarea id="address" rows="8" name="address"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">{{ old('address') }}</textarea>
                                <x-input-error :messages="$errors->get('address')" />
                            </div>
                        </div>
                        <div class="mt-5">
                            <button type="submit"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Tambah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-dashboard-layout>
