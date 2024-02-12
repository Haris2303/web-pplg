<x-dashboard-layout>

    <div class="mb-5">
        <h2 class="text-3xl text-center sm:text-left text-gray-900 dark:text-white font-bold">Mata Pelajaran</h2>
        <hr>
    </div>

    @if (session()->has('success'))
        <x-alert type="success" />
    @endif

    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <x-outline-anchor :href="route('subject.create')" :color="__('blue')">
            Tambah
        </x-outline-anchor>
        
        <x-search-data :action="__('/subjects')" />
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($subjects))
                    @foreach ($subjects as $subject)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration + 10 * ((request()->page ?? 1) - 1) }}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $subject->name }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-full flex gap-2 justify-center">
                                    <div>
                                        <x-button-tooltip-edit :href="__('/subject/edit/' . $subject->id)" :id="$subject->name">
                                            Edit
                                        </x-button-tooltip-edit>
                                    </div>
                                    <div>
                                        <form action="{{ route('subject.destroy', [$subject->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <input type="hidden" name="id" value="{{ $subject->id }}">
                                            <x-button-tooltip-delete :id="$subject->name">Hapus</x-button-tooltip-delete>
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

    {{ $subjects->links() }}

</x-dashboard-layout>
