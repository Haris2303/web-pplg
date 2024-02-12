<x-dashboard-layout>

    <div class="mb-5">
        <h2 class="text-3xl text-center sm:text-left text-gray-900 dark:text-white font-bold">Kelas</h2>
        <hr>
    </div>

    @if (session()->has('success'))
        <x-alert type="success" />
    @endif

    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <x-outline-anchor :href="route('class.create')" :color="__('blue')">
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
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($classes))
                    @foreach ($classes as $class)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $class->name }}
                            </th>
                            <td class="px-6 py-4">
                                <div class="w-full flex gap-3 justify-center">
                                    <div>
                                        <x-button-tooltip-edit :href="route('class.edit', [$class->id])" :id="$class->id">
                                            Edit
                                        </x-button-tooltip-edit>
                                    </div>
                                    <div>
                                        <form action="{{ route('class.destroy') }}" method="post" class="inline">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $class->id }}">
                                            <x-button-tooltip-delete :id="$class->id">
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

    {{ $classes->links() }}

</x-dashboard-layout>
