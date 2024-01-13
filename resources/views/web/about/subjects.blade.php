<x-web-layout>
    <div class="max-w-screen-xl px-4 mx-auto">
        {{-- Mata Pelajaran --}}
        <div class="mt-32">
            <h2 class="text-3xl font-semibold text-center">Mata Pelajaran</h2>
            <hr class="w-32 h-1 mx-auto mt-3 bg-sky-800 rounded-full">
        </div>

        <div class="mt-10">


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 bg-gray-800">
                                Kelas 10
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-700">
                                Kelas 11
                            </th>
                            <th scope="col" class="px-6 py-3 bg-gray-800">
                                Kelas 12
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="border-b border-gray-700 text-white">
                            <th scope="row" class="px-6 py-4 font-medium whitespace-nowrap bg-gray-800">
                                Matematika
                            </th>
                            <td class="px-6 py-4 bg-gray-700">
                                Pemrograman Web
                            </td>
                            <td class="px-6 py-4 bg-gray-800">
                                Basis Data
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-web-layout>
