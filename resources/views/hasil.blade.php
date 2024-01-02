{{-- extends app --}}
@extends('layouts.app')
{{-- section content --}}
@section('content')
{{-- jika data di definisikan --}}
    @isset($data)
        <div class=" pt-16">
            <div class="flex justify-center py-5">
                <div class="max-w-6xl w-full bg-white rounded-md p-5">
                    <div class="text-3xl font-semibold mb-5 pt-8 ps-5">
                        <h3>Hasil Pendaftaran</h3>
                    </div>
                    <div class="py-8 px-5 flex flex-col gap-4">
                        <div class="flex flex-col gap-2">
                            <label for="nama">Nama</label>
                            <input id="nama" name="nama" type="text" autocomplete="nama" class="rounded-md p-3 border border-gray-300 w-full" required value="{{ $data->nama }}" disabled>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="nim">NIM</label>
                            <input id="nim" name="nim" type="text" value="{{ $data->nim }}" autocomplete="nim" class="rounded-md p-3 border border-gray-300 w-full" required disabled>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="email">Email</label>
                            <input id="email" name="email" type="email" value="{{ $data->email }}" autocomplete="email" class="rounded-md p-3 border border-gray-300 w-full" required disabled>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="nomor_hp">Nomor HP</label>
                            <input id="nomor_hp" name="nomor_hp" type="number" value="{{ $data->nomor_hp }}" autocomplete="nomor_hp" class="rounded-md p-3 border border-gray-300 w-full" pattern="^[0-9]{10}(?:[0-9]{3})?$" disabled required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="semester">Semester</label>
                            <input id="semester" name="semester" type="text" value="{{ $data->semester }}" autocomplete="semester" class="rounded-md p-3 border border-gray-300 w-full" disabled required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="ipk">IPK</label>
                            <input id="ipk" name="ipk" type="num" value="{{ $data->ipk }}" autocomplete="ipk" class="rounded-md p-3 border border-gray-300 w-full" disabled required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="beasiswa">Beasiswa</label>
                            <input id="beasiswa" name="beasiswa" type="text" value="{{ $data->beasiswa }}" autocomplete="beasiswa" class="rounded-md p-3 border border-gray-300 w-full" disabled required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="status">Status</label>
                            <input id="status" name="status" type="text" value="{{ $data->status }}" autocomplete="status" class="rounded-md p-3 border border-gray-300 w-full" disabled required>
                        </div>
                        <div class="flex flex-col gap-2">
                            <label for="berkas">Berkas</label>
                            <a href="{{ route('download', ['filename' => $data->berkas]) }}" class=" underline hover:text-blue-500 rounded-md p-3 border border-gray-300 w-full">{{ $data->berkas }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
    <div class=" pt-16">
        <div class="flex justify-center py-5">
            <div class="max-w-6xl w-full bg-white rounded-md p-5">
                <div class="font-semibold mb-5 pt-8 ps-5">
                    <h3>Table Pendaftaran</h3>
                </div>
                {{-- mengecek hasil --}}
                @empty($hasil)
                    <div>
                        Data Kosong
                    </div>  
                @else
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        NIM
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Email
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nomor HP
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Semester
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        IPK
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Jenis Beasiswa
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Status Ajuan
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- perulangan pada table --}}
                                @foreach ($hasil as $item)                                
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $item->nama  }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $item->nim  }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->email   }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->nomor_hp }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->semester }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->ipk }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->beasiswa }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $item->status }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endempty
                
            </div>
        </div>
    </div>
    @endisset
@endsection