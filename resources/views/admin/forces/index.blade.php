<x-dashboard-layout>

    <div class="mb-5">
        <h2 class="text-3xl text-center sm:text-left text-gray-900 dark:text-white font-bold">Angkatan</h2>
        <hr>
    </div>

    @if (session()->has('success'))
        <x-alert type="success" />
    @endif

    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <x-outline-anchor :href="route('force.create')" :color="__('blue')">
            Tambah
        </x-outline-anchor>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tahun Angkatan
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($forces))
                    @foreach ($forces as $force)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration + 10 * ((request()->page ?? 1) - 1) }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $force->year }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="w-full flex gap-3 justify-center">
                                    <div>
                                        <x-button-tooltip-edit :href="route('force.edit', $force->id)" :id="$force->id">
                                            Edit
                                        </x-button-tooltip-edit>
                                    </div>
                                    <div>
                                        <form action="{{ route('force.destroy') }}" method="post" class="inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $force->id }}">
                                            <x-button-tooltip-delete :id="$force->id">
                                                Hapus
                                            </x-button-tooltip-delete>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td colspan="6" class="text-center py-5">Tidak ada data</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>

    {{ $forces->links() }}

</x-dashboard-layout>
