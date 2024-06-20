@extends('layouts.app')

@section('content')
<section id="hero"></section>
<section id="about" class="about section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Siapakah Calon Bupati Lampung Timur Periode 2024 - 2029 Pilihan Anda ?</h2>
        <p>Satu suara bisa membuat perubahan besar. Mari kita pilih pemimpin yang terbaik untuk daerah kita</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row g-5">
            <div style="width: 100%;">
                {!! $chart->container() !!}
            </div>
            {{ $chart->script() }}
        </div>
        <center>
            <span>Total : {{ $jumlah }} suara</span>
        </center>
    </div>

</section>
<!-- Services Section -->
<section id="services" class="services section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No. Urut</th>
                                <th>Foto Calon</th>
                                <th>Nama Calon</th>
                                <th>Jumlah Suara</th>
                                <th>Persentase</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($candidates as $key => $candidate)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>
                                    @if ($candidate['photo_paslon'])
                                    <img src="{{asset('storage/'.$candidate['photo_paslon'])}}" width="100px" />
                                    @endif
                                </td>
                                <td>{{$candidate['nama_ketua']}}</td>
                                <td>{{$candidate['jumlah']}} Suara</td>
                                <td>{{number_format(($candidate['jumlah']/$jumlah)*100, 2)}} %</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                    <div class="dropdown">
                        <button class="btn btn-info mt-2" style="width:217px;" id="btnRefresh" data-txt="Refresh" onclick="function reload(){window.location.reload()} reload(); return false;" type="button"><i class="fa-solid fa-arrows-rotate"></i> Refresh</button>
                        <a class="btn btn-dark mt-2" style="width:217px;" href="/"><i class="fa mr-2 fa-arrow-left" aria-hidden="true"></i> Kembali Ke Polling</a>
                        <button class="btn btn-success mt-2" style="width:217px;" onclick="shareToWhatsApp()" type="button">
                            <i class="fa-brands fa-whatsapp"></i> Bagikan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section><!-- /Services Section -->
<script>
   function shareToWhatsApp() {
        var url = "https://pollingindependent.com/hasil-polling"; // Replace with the actual polling link if different
        var text = `
        Assalamualaikum Wr.Wb.

        Mari berpartisipasi dalam polling untuk menentukan 
        
        SIAPAKAH CALON BUPATI LAMPUNG TIMUR PERIODE 2024 - 2029 PILIHAN ANDA! 
        
        Suara Anda sangat berharga untuk masa depan Lampung Timur. 
        
        Yuk, sampaikan pilihan Anda sekarang juga dan jadilah bagian dari perubahan!

        Berikan suaramu, klik link
        ${url}

        `;
        var whatsappUrl = "https://wa.me/?text=" + encodeURIComponent(text);
        window.open(whatsappUrl, '_blank');
    }
</script>
@endsection