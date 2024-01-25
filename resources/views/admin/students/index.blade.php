<x-dashboard-layout>

    <div class="mb-5">
        <h2 class="text-3xl text-center sm:text-left text-gray-900 dark:text-white font-bold">Siswa</h2>
        <hr>
    </div>

    @if (session()->has('success'))
        <x-alert type='success' />
    @endif

    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <x-outline-anchor :href="route('student.create')" :color="__('blue')">
            Tambah
        </x-outline-anchor>

        <x-search-data />

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
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Kelas
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Jenis Kelamin
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @if (count($students))
                    @foreach ($students as $student)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration + 10 * ((request()->page ?? 1) - 1) }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $student->user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $student->user->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $student->hasClass->name }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                {{ $student->gender }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="w-full flex gap-2 justify-center">
                                    <div>
                                        <x-button-tooltip-edit :href="route('student.edit', [$student->id])" :id="$student->id">
                                            Edit
                                        </x-button-tooltip-edit>
                                    </div>
                                    <div>
                                        <form action="{{ route('student.destroy', [$student->user->id]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <x-button-tooltip-delete :id="$student->id">Hapus
                                            </x-button-tooltip-delete>
                                        </form>
                                    </div>
                                    <div>
                                        <x-button-tooltip-view :id="$student->id" :dataid="$student->id">Lihat
                                            Detail</x-button-tooltip-view>
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

    {{ $students->links() }}

    <!-- Main modal -->

    <x-modal-view :title="__('Detail Siswa')">
        <div class="flex">
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                Nama:
            </p>
            <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="info-name">
                Haris
            </p>
        </div>
    </x-modal-view>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $('.view-button').on('click', function() {
            var id = $(this).data('id')

            $.ajax({
                url: 'studentAjax/' + id,
                type: 'GET',
                success: function(response) {
                    $('#info-name').html(response.result.user.name)
                }
            })
        })
    </script>
</x-dashboard-layout>
