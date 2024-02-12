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

        <x-search-data :action="__('/students')"/>
    </div>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        #
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        NISN
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
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
                                <img src="{{ asset(($student->picture === 'default.png') ? '/assets/profile/default.png' : 'storage/' . $student->picture) }}" alt="{{ $student->user->name }}" class="w-24">
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $student->nisn }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $student->user->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $student->hasClass->name }}
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
        <div class="flex justify-between">
            <table class="text-left text-gray-500 dark:text-gray-400">
                <tr>
                    <th>
                        <p class="text-base leading-relaxed mr-5">
                            Nama
                        </p>
                    </th>
                    <td>
                        : <span class="text-base leading-relaxed" id="info-name">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed">
                            NIS
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed" id="info-nis">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed">
                            NISN
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed" id="info-nisn">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed">
                            Email
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed" id="info-email">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed">
                            Jenis Kelamin
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed" id="info-gender">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed">
                            Agama
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed" id="info-religion">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed">
                            Kelas
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed" id="info-class">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed">
                            Angkatan
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed" id="info-force">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Nama Ayah
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="info-father">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Nama Ibu
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="info-mother">
                            -
                        </span>
                    </td>
                </tr>
                <tr>
                    <th>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            Alamat
                        </p>
                    </th>
                    <td class="">
                        : <span class="text-base leading-relaxed text-gray-500 dark:text-gray-400" id="info-address">
                            -
                        </span>
                    </td>
                </tr>
            </table>
            <div>
                <img src="#" alt="Picture" id="info-picture" class="w-52">
            </div>
        </div>
    </x-modal-view>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>

    <script>
        $('.view-button').on('click', function() {
            $

            var id = $(this).data('id')

            $.ajax({
                url: 'studentAjax/' + id,
                type: 'GET',
                success: function(response) {
                    $('#info-name').html(response.result.user.name)
                    $('#info-nis').html(response.result.student.nis)
                    $('#info-nisn').html(response.result.student.nisn)
                    $('#info-email').html(response.result.user.email)
                    $('#info-gender').html(response.result.student.gender)
                    $('#info-religion').html(response.result.student.religion)
                    $('#info-class').html(response.result.class.name)
                    $('#info-force').html(response.result.force.year)
                    $('#info-father').html(response.result.student.father)
                    $('#info-mother').html(response.result.student.mother)
                    $('#info-address').html(response.result.student.address)
                    
                    const picture = response.result.student.picture
                    const src = (picture === 'default.png') ? '/assets/profile/' + picture : `storage/${picture}`
                    $('#info-picture').attr('src', src)
                }
            })
        })
    </script>
</x-dashboard-layout>
