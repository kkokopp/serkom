{{-- extend dengan app --}}
@extends('layouts.app')
{{-- section content --}}
@section('content')
    <div class="pt-16 bg-gray-50">
        <div class="w-full mx-auto overflow-hidden">
            <div class="bg-gray-50 flex justify-center items-center relative dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="max-w-3xl w-full py-20">
                    <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>
                </div>
            </div>
        </div>
    </div>
    <script>
        // menampilkan grafik
        var data = <?php echo json_encode($data); ?>;
        // mendapatkan nama dan jumlah dari data
        var nama = data.map(function(e) {
            return e.nama;
        });
        // mendapatkan jumlah dari data
        var jumlah = data.map(function(e) {
            return e.jumlah
        });
        // mendapatkan warna dari data
        var barColors = ["red", "green","blue"];
        
        // membuat grafik
        new Chart("myChart", {
        type: "bar",
        data: {
            labels: nama,
            datasets: [{
            backgroundColor: barColors,
            data: jumlah
            }]
        },
        options: {
            legend: {display: false},
            title: {
            display: true,
            text: "Jumlah Pendaftar Beasiswa Berdasarkan Jenis Beasiswa"
            },
            scales:{
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        min: 0
                    }
                    }]
            }
        }
        });
    </script>
@endsection