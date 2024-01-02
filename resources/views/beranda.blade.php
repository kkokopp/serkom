{{-- ekstend dengan app --}}
@extends('layouts.app')
<?php
// deklarasi variabel $items sebagai array
 $items = [
    ['title' => 'Beasiswa Akademik', 'description' => 'Program Beasiswa Pendidikan Akademik adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki prestasi akademik yang baik.  Mendorong dan memotivasi siswa atau mahasiswa untuk mencapai prestasi akademik yang tinggi dengan menyediakan bantuan keuangan', 'syarat' => ['IPK minimal 3.0', 'Berkas Persetujuan', 'Tidak Sedang Menerima Beasiswa Lain']],
    ['title' => 'Beasiswa Non Akademik', 'description' => 'Program Beasiswa Pendidikan Non Akademik adalah program beasiswa yang diberikan kepada mahasiswa yang memiliki kemampuan atau keterampilan dan bakat istimewa pada bidang - bidang tertentu.' , 'syarat' => ['IPK minimal 3.0', 'Berkas Persetujuan', 'Mahasiswa Aktif']],
    ['title' => 'Beasiswa Kedinasan', 'description' => 'Program Beasiswa Pendidikan Kedinasan adalah program beasiswa yang diberikan kepada mahasiswa yang ingin bekerja pada dinas tertentu.', 'syarat' => ['IPK minimal 3.0', 'Berkas Persetujuan']]
    ]
?>
{{-- section content --}}
@section('content')
    <div class="pt-16 bg-gray-50">
        <div class="w-full mx-auto overflow-hidden">
            <div class="bg-gray-50 relative dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="absolute flex flex-col bg-gray-50/60 justify-center items-center z-40 w-full backdrop-blur-sm right-1/2 left-1/2 -translate-x-1/2 top-1/2 bottom-1/2 -translate-y-1/2 gap-10" style="height: 40vh">
                    <p class=" text-xl max-w-2xl w-full text-center">
                        Program Beasiswa Terbuka bagi semua mahasiwa yang ingin mengikuti program beasiswa yang kami sediakan. Silahkan daftarkan diri anda sekarang juga.
                    </p>
                    <a href="{{ route('daftar') }}" class="px-10 bg-gradient-to-r from-cyan-400 to-blue-500 bg-white py-3 text-xl font-bold uppercase rounded-full text-white flex justify-center items-center cursor-pointer hover:bg-gradient-to-r hover:from-cyan-500/70 hover:to-cyan-500/70">Daftar Sekarang</a>
                </div>
                <div class="absolute flex flex-col bg-gradient-to-tr from-cyan-500 to-blue-400 opacity-50 justify-center items-center z-10 w-full right-1/2 left-1/2 -translate-x-1/2 top-1/2 bottom-1/2 -translate-y-1/2 " style="height: 60vh">
                </div>
                <img src="{{ asset('images/beranda.jpeg') }}" alt="beranda" class=" object-cover object-top w-full" style="height: 60vh">
            </div>
            <div class="flex bg-gray-50 flex-col w-full justify-center items-center py-6 mt-12">
                <h3 class="text-3xl font-semibold">Program Beasiswa</h3>
                <div class="flex gap-10 mt-8">
                    {{-- perulangan pada item array --}}
                    @foreach ($items as $item)                        
                        <div class="py-8">
                            <div class="flex">
                                <div class=" flex w-80 flex-col items-center justify-between transform duration-300 hover:-translate-y-5 h-80 bg-white hover:shadow-lg p-10 rounded-md hover:border-b-4 hover:border-cyan-400 hover:bg-gradient-to-t hover:from-cyan-400/25 hover:to-gray-50 group hover:scale-110 shadow-md">
                                    <img src="{{ asset('images/topi.jpg') }}" alt="" class=" w-28">
                                    <a class="text-xl font-semibold cursor-pointer" id="open-modal" data-index="{{ $loop->index }}">{{ $item['title'] }}</a>
                                </div>
                            </div>
                        </div>
                        {{-- modal --}}
                        <x-modal :item="$item" :index="$loop->index"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <script>
        // menampilkan modal
        document.addEventListener('DOMContentLoaded', function () {
            // mendapatkan semua element yang memiliki atribut data-index
            const clickableElements = document.querySelectorAll('[data-index]');
            // melakukan perulangan pada setiap element
            clickableElements.forEach(function (element) {
                // menambahkan event click pada setiap element
                element.addEventListener('click', function () {
                    // mendapatkan nilai dari atribut data-index
                    const dataIndex = element.getAttribute('data-index');
                    const modalId = 'modal_' + dataIndex;
                    const modal = document.getElementById(modalId);
                    modal.classList.toggle('hidden');
                });
            });
        });
    </script>
@endsection