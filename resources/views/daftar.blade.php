{{-- ekstend dengan layoyut app --}}
@extends('layouts.app')
{{-- section content --}}
@section('content')
<div class=" pt-16">
    <div class="flex justify-center py-5">
        <div class="max-w-6xl w-full bg-white rounded-md p-5">
            <div class="text-3xl font-semibold mb-5 pt-8 ps-5">
                <h3>Formulir Pendaftaran</h3>
            </div>
            {{-- formulir pendaftaran --}}
            <form action="{{ route('daftar.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="py-8 px-5 flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label for="nama">Nama</label>
                        <input id="nama" name="nama" type="text" autocomplete="nama" class="rounded-md p-3 border border-gray-300 w-full @error('name') border-red-500 @enderror" required value="{{ old('nama') }}">
                        {{-- menampilkan pesan error untuk nama--}}
                        @error('nama')
                            <span class="mt-2 text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="nim">NIM</label>
                        <input id="nim" name="nim" type="text" value="{{ old('nim') }}" autocomplete="nim" class="rounded-md p-3 border border-gray-300 w-full @error('name') border-red-500 @enderror" required>
                        {{-- menampilkan pesan error untuk nim--}}
                        @error('nim')
                            <span class="mt-2 text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" class="rounded-md p-3 border border-gray-300 w-full @error('email') border-red-500 @enderror" required>
                        {{-- menampilkan pesan error untuk email--}}
                        @error('email')
                            <span class="mt-2 text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="nomor_hp">Nomor HP</label>
                        <input id="nomor_hp" name="nomor_hp" type="number" value="{{ old('nomor_hp') }}" autocomplete="nomor_hp" class="rounded-md p-3 border border-gray-300 w-full" pattern="^[0-9]{10}(?:[0-9]{3})?$" @error('nomor_hp') border-red-500 @enderror" required>
                        {{-- menampilkan pesan error untuk nomor_hp--}}
                        @error('nomor_hp')
                            <span class="mt-2 text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="semester">Semester saat ini</label>
                        <select name="semester" id="semester" required class="rounded-md p-3 border border-gray-300 w-full" onchange="updateIPK()">
                            <option value="" disabled selected>Pilih Semester</option>
                            @foreach ($semesters as $sem)
                                <option value="{{ $sem->id }}">{{ $sem->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="ipk">IPK terkahir</label>
                        <input id="ipk" name="ipk" type="text" autocomplete="ipk" value="{{ old('ipk') }}" class="rounded-md p-3 border border-gray-300 w-full @error('ipk') border-red-500 @enderror" required readonly>
                        {{-- menampilkan pesan error untuk ipk--}}
                        @error('ipk')
                            <span class="mt-2 text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="beasiswa">Pilih Beasiswa</label>
                        <select name="beasiswa" id="beasiswa" required class="rounded-md p-3 border border-gray-300 w-full">
                            <option value="" disabled selected>Pilih Beasiswa</option>
                            @foreach ($beasiswas as $beasiswa)
                                <option value="{{ $beasiswa->id }}">{{ $beasiswa->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col gap-2">
                        <label for="berkas">Upload Berkas Syarat</label>
                        <input id="berkas" name="berkas" type="file" autocomplete="berkas" class="rounded-md p-3 border border-gray-300 w-full @error('berkas') border-red-500 @enderror" required>
                        {{-- menampilkan pesan error untuk berkas--}}
                        @error('berkas')
                            <span class="mt-2 text-red-500">{{ $message }}</span>
                        @enderror
                        <span class=" text-xs">* File harus berupa pdf, jpg, png</span>
                    </div>
                    <div class="w-full flex justify-end">
                        <button id="simpan" class="rounded-md bg-blue-300 border-2 border-blue-700 py-1 px-5 text-blue-700 font-medium text-lg hover:bg-blue-700 hover:text-white">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    // menampilkan ipk
    var ipkValues = <?php echo json_encode($semesters); ?>;
    // menampilkan ipk
    function updateIPK() {
        // mendapatkan id semester
        var selectedSemesterId = document.getElementById("semester").value;
        // mencari semester yang dipilih
        var selectedSemester = ipkValues.find(function(semester) {
            // mencocokan id semester
            return semester.id == selectedSemesterId;
        });
        // menampilkan ipk
        if (selectedSemester) {
            // menampilkan ipk
            document.getElementById("ipk").value = selectedSemester.ipk;
            // menampilkan beasiswa
            if (selectedSemester.ipk < 3) {
                // menampilkan beasiswa
                document.getElementById("beasiswa").disabled = true;
                const berkas = document.getElementById("berkas");
                berkas.disabled = true;
                // menampilkan tombol
                const tombol = document.getElementById("simpan");
                tombol.disabled = true;
                tombol.classList.remove("bg-blue-300");
                tombol.classList.add("bg-gray-300");
            }else{
                // menampilkan beasiswa
                const beasiswa = document.getElementById("beasiswa");
                beasiswa.disabled = false;
                beasiswa.focus();
                // menampilkan berkas
                const berkas = document.getElementById("berkas");
                berkas.disabled = false;
                // menampilkan tombol
                const tombol = document.getElementById("simpan");
                tombol.disabled = false;
                tombol.classList.add("bg-blue-300");
                tombol.classList.remove("bg-gray-300");

            }
        }
    }
</script>
    
@endsection