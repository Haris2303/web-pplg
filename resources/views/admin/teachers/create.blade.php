<x-dashboard-layout>
    <section class="bg-white dark:bg-gray-900 shadow-md">
        <div class="py-8 px-4 mx-auto max-w-full lg:py-16">
            <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-1">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Tambahkan Guru Baru</h2>
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
                        {{-- NIP --}}
                        <div class="mb-3">
                            <label for="nip"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                            <input type="text" name="nip" id="nip"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('nip') }}" required="">
                            <x-input-error :messages="$errors->get('nip')" />
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
                        {{-- Foto --}}
                        <div class="mb-3">
                            <label for="picture"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                                <input name="picture" id="picture" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" type="file" value="{{ old('picture') }}">
                            <x-input-error :messages="$errors->get('picture')" />
                        </div>
                        
                        {{-- Mata Pelajaran --}}
                        <div class="mb-3">
                            <label class="text-sm mb-2 font-semibold text-gray-900 dark:text-white">Mata Pelajaran Yang Diambil</label>
                            <ul class="w-full text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                @foreach ($subjects as $subject)
                                <li class="w-full border-b border-gray-200 rounded-t-lg dark:border-gray-600">
                                    <div class="flex items-center ps-3">
                                        <input id="{{ $subject->id }}-checkbox" name="subjects[]" type="checkbox" value="{{ $subject->id }}" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                        <label for="{{ $subject->id }}-checkbox" class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $subject->name }}</label>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="sm:col-span-1">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Biodata</h2>
                        <div class="sm:col-span-1">
                            {{-- Pendidikan --}}
                            <div class="mb-3">
                                <label for="education"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pendidikan</label>
                                <input type="text" name="education" id="education"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    value="{{ old('education') }}" placeholder="Cth: S1 Teknik Informasi"
                                    required="">
                                <x-input-error :messages="$errors->get('education')" />
                            </div>
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
