<x-dashboard-layout>
    <div class="mb-5">
        <h2 class="text-3xl text-center sm:text-left text-gray-900 dark:text-white font-bold">Mulai Absen
        </h2>
        <hr>
        <div class="mt-3 dark:text-gray-200">
            <p><span class="font-bold">Kelas:</span> {{ $class->name }}</p>
            <p><span class="font-bold">Mata Pelajaran:</span> {{ $subject->name }}</p>
            <p><span class="font-bold">Tanggal: </span>{{ request()->date }}</p>
        </div>
    </div>

    <form action="{{ route('attendance.store') }}" method="post">
        @csrf
        <input type="hidden" name="class_id" value="{{ $class->id }}">
        <input type="hidden" name="subject_id" value="{{ $subject->id }}">
        <input type="hidden" name="datetime" value="{{ request()->date }}">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            #
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Siswa
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            Jenis Kelamin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Keterangan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $loop->iteration }}
                            </th>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $student->user->name }}
                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            </th>
                            <td class="px-6 py-4 text-center">
                                {{ $student->gender }}
                            </td>
                            <td class="flex items-center px-6 py-4">
                                <select name="status[{{ $student->id }}]" id="status"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option disabled>-- Keterangan --</option>
                                    <option value="hadir" selected>Hadir</option>
                                    <option value="izin">Izin</option>
                                    <option value="sakit">Sakit</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <button type="submit"
                class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Simpan</button>
        </div>
    </form>
</x-dashboard-layout>
