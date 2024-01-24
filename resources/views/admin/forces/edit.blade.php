<x-dashboard-layout>
    <section class="bg-white dark:bg-gray-900 shadow-md">
        <div class="py-8 px-4 mx-auto max-w-full lg:py-16">
            @error($errors->all())
                $message
            @enderror
            <form action="{{ route('force.update') }}" method="POST">
                @csrf
                @method('put')
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="sm:col-span-1">
                        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Edit Mata Pelajaran</h2>
                        <input type="hidden" name="id" value="{{ $force->id }}">
                        <div class="mb-3">
                            <label for="year"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                                Mata Pelajaran</label>
                            <input type="text" name="year" id="year"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                value="{{ old('year', $force->year) }}" required="">
                            @error('year')
                                <p id="standard_error_help" class="mt-2 text-xs text-red-600 dark:text-red-400">
                                    {{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mt-5">
                            <button type="submit"
                                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Ubah</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-dashboard-layout>
