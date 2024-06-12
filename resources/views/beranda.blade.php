@extends('layouts.app')

@section('content')
<section id="hero" class="hero section">
    <div class="hero-bg">
        <img src="assets/img/hero-bg-light.webp" alt="">
    </div>
    <div class="container text-center">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <h1 data-aos="fade-up">Selamat datang di <span>Polling Independent</span></h1>
            <p data-aos="fade-up" data-aos-delay="100">Luncurkan polling Anda dengan cepat dan buat keputusan yang lebih cerdas<br></p>
            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                <a href="#about" class="btn-get-started">Mulai</a>
                <a href="/hasil-polling" class="btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Lihat Hasil</span></a>
            </div>
            <img src="assets/img/hero-services-img.webp" class="img-fluid hero-img" alt="" data-aos="zoom-out" data-aos-delay="300">
        </div>
    </div>

</section><!-- /Hero Section -->

<!-- Featured Services Section -->
<section id="featured-services" class="featured-services section">

    <div class="container">

        <div class="row gy-4">

            <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item d-flex">
                    <div class="icon flex-shrink-0"><i class="bi bi-briefcase"></i></div>
                    <div>
                        <h4 class="title"><a href="#" class="stretched-link">Kemudahan Penggunaan</a></h4>
                        <p class="description">Aplikasi dirancang agar pengguna dapat membuat dan mengikuti polling dengan cepat dan mudah.</p>
                    </div>
                </div>
            </div>
            <!-- End Service Item -->

            <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item d-flex">
                    <div class="icon flex-shrink-0"><i class="bi bi-card-checklist"></i></div>
                    <div>
                        <h4 class="title"><a href="#" class="stretched-link">Hasil Instan</a></h4>
                        <p class="description">Pengguna bisa melihat hasil polling secara real-time, memungkinkan interaksi yang lebih dinamis dan responsif</p>
                    </div>
                </div>
            </div><!-- End Service Item -->

            <div class="col-xl-4 col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item d-flex">
                    <div class="icon flex-shrink-0"><i class="bi bi-bar-chart"></i></div>
                    <div>
                        <h4 class="title"><a href="#" class="stretched-link">Keamanan Data</a></h4>
                        <p class="description">Melindungi privasi dan data pengguna dengan enkripsi yang kuat dan kebijakan privasi yang ketat</p>
                    </div>
                </div>
            </div><!-- End Service Item -->

        </div>

    </div>

</section><!-- /Featured Services Section -->

<!-- About Section -->
<section id="about" class="about section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Siapakah Calon Bupati Lampung Timur Periode 2024 - 2029 Pilihan Anda ?</h2>
        <p>Satu suara bisa membuat perubahan besar. Mari kita pilih pemimpin yang terbaik untuk daerah kita</p>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                @endif
                <form id="unique-form" enctype="multipart/form-data" action="{{ route('users.pilih') }}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" class="form-control">
                    <div class="card-group" style="display: block">
                        @foreach ($candidates as $candidate)
                        <div class="card">
                            <h1 align="center">{{$candidate->id}}</h1>
                            <img class="card-img-top" src="{{asset('storage/'.$candidate->photo_paslon)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 align="center" class="card-title">{{$candidate->nama_ketua}}</h5>
                            </div>
                            <div class="form-group" align="center">
                                <button name="candidate_id" value="{{$candidate->id}}" class="btn btn-primary">PILIH</button>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </form>
            </div>
            <a class="btn btn-info" href="{{ route('hasil-polling') }}"><i class="fa fa-pie-chart" aria-hidden="true"></i> Lihat Hasil Polling</a>
        </div>
    </div>
</section><!-- /About Section -->

<!-- Clients Section -->
<section id="clients" class="clients section">

    <div class="container" data-aos="fade-up">

        <div class="row gy-4">

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div><!-- End Client Item -->

        </div>

    </div>

</section><!-- /Clients Section -->

<!-- Features Section -->
<section id="features" class="features section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Fitur</h2>
        <p>Berikan suara Anda dan lihat hasil polling secara langsung!</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row justify-content-between">

            <div class="col-lg-5 d-flex align-items-center">

                <ul class="nav nav-tabs" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item">
                        <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#features-tab-1">
                            <i class="bi bi-binoculars"></i>
                            <div>
                                <h4 class="d-none d-lg-block">Interaksi dan Keterlibatan Pengguna</h4>
                                <p>
                                    Polling meningkatkan interaksi dan partisipasi pengguna secara cepat dan mudah, memperkuat hubungan penyelenggara-audiens.
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-2">
                            <i class="bi bi-box-seam"></i>
                            <div>
                                <h4 class="d-none d-lg-block">Pengumpulan Data yang Cepat dan Efisien</h4>
                                <p>
                                    Polling mengumpulkan data instan untuk keputusan informatif, sangat berguna dalam rapat dan survei konsumen.
                                </p>
                            </div>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" data-bs-target="#features-tab-3">
                            <i class="bi bi-brightness-high"></i>
                            <div>
                                <h4 class="d-none d-lg-block">Anonimitas dan Kejujuran Responden</h4>
                                <p>
                                    Anonimitas polling memastikan jawaban jujur dari responden, meningkatkan keandalan data dalam berbagai survei.
                                </p>
                            </div>
                        </a>
                    </li>
                </ul><!-- End Tab Nav -->

            </div>

            <div class="col-lg-6">

                <div class="tab-content" data-aos="fade-up" data-aos-delay="200">

                    <div class="tab-pane fade active show" id="features-tab-1">
                        <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid">
                    </div><!-- End Tab Content Item -->

                    <div class="tab-pane fade" id="features-tab-2">
                        <img src="assets/img/tabs-2.jpg" alt="" class="img-fluid">
                    </div><!-- End Tab Content Item -->

                    <div class="tab-pane fade" id="features-tab-3">
                        <img src="assets/img/tabs-3.jpg" alt="" class="img-fluid">
                    </div><!-- End Tab Content Item -->
                </div>

            </div>

        </div>

    </div>

</section><!-- /Features Section -->

<!-- Services Section -->
<section id="services" class="services section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Servis</h2>
        <p>Membuat, mengelola, dan menganalisis polling dengan mudah dan efisien</p>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row g-5">

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item item-cyan position-relative">
                    <i class="bi bi-activity icon"></i>
                    <div>
                        <h3>Pembuatan Polling Cepat</h3>
                        <p>Pengguna dapat membuat polling dengan berbagai opsi pertanyaan dan jawaban dalam hitungan menit</p>
                        <a href="#!" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="service-item item-orange position-relative">
                    <i class="bi bi-broadcast icon"></i>
                    <div>
                        <h3>Pengelolaan Hasil Real-Time</h3>
                        <p>Menyediakan visualisasi hasil polling secara langsung, memungkinkan pengguna untuk melihat dan menganalisis data dengan grafik dan diagram yang mudah dipahami</p>
                        <a href="#!" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <div class="service-item item-teal position-relative">
                    <i class="bi bi-easel icon"></i>
                    <div>
                        <h3>Keamanan dan Privasi Data</h3>
                        <p>Melindungi informasi pribadi dan hasil polling pengguna dengan enkripsi end-to-end dan kebijakan privasi yang ketat</p>
                        <a href="#!" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                <div class="service-item item-red position-relative">
                    <i class="bi bi-bounding-box-circles icon"></i>
                    <div>
                        <h3>Kustomisasi Polling</h3>
                        <p>Memberikan opsi kustomisasi seperti tema warna, logo, dan gambar latar untuk menciptakan pengalaman yang sesuai dengan branding atau preferensi pengguna</p>
                        <a href="#!" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                <div class="service-item item-indigo position-relative">
                    <i class="bi bi-calendar4-week icon"></i>
                    <div>
                        <h3>Notifikasi dan Pengingat</h3>
                        <p>Mengirimkan pemberitahuan dan pengingat kepada peserta polling untuk memastikan partisipasi yang tinggi dan menginformasikan tentang hasil atau polling baru</p>
                        <a href="#!" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End Service Item -->

            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                <div class="service-item item-pink position-relative">
                    <i class="bi bi-chat-square-text icon"></i>
                    <div>
                        <h3>Integrasi Media Sosial</h3>
                        <p>Memungkinkan pengguna untuk membagikan polling mereka dengan mudah di berbagai platform media sosial, meningkatkan jangkauan dan partisipasi</p>
                        <a href="#!" class="read-more stretched-link">Learn More <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div><!-- End Service Item -->

        </div>

    </div>

</section><!-- /Services Section -->

<!-- Faq Section -->
<section id="faq" class="faq section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Pertanyaan yang Sering Diajukan</h2>
    </div><!-- End Section Title -->

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-10" data-aos="fade-up" data-aos-delay="100">

                <div class="faq-container">

                    <div class="faq-item faq-active">
                        <h3>Apa keuntungan menggunakan aplikasi polling?</h3>
                        <div class="faq-content">
                            <p>Aplikasi polling memungkinkan pengguna untuk mengumpulkan pendapat secara cepat, mudah, dan efisien dari berbagai peserta, serta menganalisis hasil dengan cepat.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Bagaimana cara membuat polling menggunakan aplikasi ini?</h3>
                        <div class="faq-content">
                            <p>Pengguna dapat membuat polling dengan mengakses fitur pembuatan polling di aplikasi dan mengikuti langkah-langkah yang intuitif.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Apakah hasil polling dapat dilihat secara real-time?
                        </h3>
                        <div class="faq-content">
                            <p>Ya, aplikasi menyajikan hasil polling secara langsung, memungkinkan pengguna untuk melihat respons secara real-time.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Bagaimana keamanan data pengguna dijamin dalam aplikasi polling?</h3>
                        <div class="faq-content">
                            <p>Aplikasi menerapkan enkripsi end-to-end dan kebijakan privasi ketat untuk melindungi data pengguna</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Apakah aplikasi ini mendukung integrasi dengan media sosial?</h3>
                        <div class="faq-content">
                            <p>Ya, pengguna dapat membagikan polling mereka melalui berbagai platform media sosial dengan mudah</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                    <div class="faq-item">
                        <h3>Apakah aplikasi ini menyediakan fitur notifikasi untuk mengingatkan peserta polling?
                        </h3>
                        <div class="faq-content">
                            <p>Ya, aplikasi mengirimkan notifikasi kepada peserta untuk memastikan partisipasi yang aktif.</p>
                        </div>
                        <i class="faq-toggle bi bi-chevron-right"></i>
                    </div><!-- End Faq item-->

                </div>

            </div><!-- End Faq Column-->

        </div>

    </div>

</section><!-- /Faq Section -->

<!-- Testimonials Section -->
<section id="testimonials" class="testimonials section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>Pengalaman dari klien yang telah menggunakan layanan kami</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper">
            <script type="application/json" class="swiper-config">
                {
                    "loop": true,
                    "speed": 600,
                    "autoplay": {
                        "delay": 5000
                    },
                    "slidesPerView": "auto",
                    "pagination": {
                        "el": ".swiper-pagination",
                        "type": "bullets",
                        "clickable": true
                    },
                    "breakpoints": {
                        "320": {
                            "slidesPerView": 1,
                            "spaceBetween": 40
                        },
                        "1200": {
                            "slidesPerView": 3,
                            "spaceBetween": 1
                        }
                    }
                }
            </script>
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            Aplikasi polling ini sangat membantu dalam mendapatkan feedback cepat dari tim kami. Antarmukanya mudah digunakan dan hasilnya bisa langsung dilihat!
                        </p>
                        <div class="profile mt-auto">
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            Saya menggunakan aplikasi ini untuk mengadakan polling di kelas. Siswa sangat antusias, dan saya bisa melihat hasilnya langsung di layar proyektor. Sangat praktis!
                        </p>
                        <div class="profile mt-auto">
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            Keamanan data adalah prioritas saya, dan aplikasi ini memberikan jaminan privasi yang saya butuhkan. Selain itu, fitur kustomisasinya memudahkan saya membuat polling yang menarik.
                        </p>
                        <div class="profile mt-auto">
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            Integrasi dengan media sosial memudahkan saya menyebarkan polling kepada peserta acara. Partisipasi meningkat drastis, dan saya bisa mengukur kepuasan mereka secara real-time.
                        </p>
                        <div class="profile mt-auto">
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <div class="stars">
                            <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                        </div>
                        <p>
                            Aplikasi ini telah menjadi alat penting untuk mengukur sentimen karyawan dalam waktu singkat. Notifikasi dan pengingatnya membantu memastikan semua orang berpartisipasi.
                        </p>
                        <div class="profile mt-auto">
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                        </div>
                    </div>
                </div><!-- End testimonial item -->

            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>

</section><!-- /Testimonials Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Kontak</h2>
        <p>Hubungi kami untuk informasi lebih lanjut atau bantuan.</p>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

            <div class="col-lg-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>A108 Adam Street, New York, NY 535022</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                    <i class="bi bi-telephone"></i>
                    <h3>Call Us</h3>
                    <p>+1 5589 55488 55</p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-lg-3 col-md-6">
                <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-envelope"></i>
                    <h3>Email Us</h3>
                    <p>info@example.com</p>
                </div>
            </div><!-- End Info Item -->

        </div>

        <div class="row gy-4 mt-1">
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d48389.78314118045!2d-74.006138!3d40.710059!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c25a22a3bda30d%3A0xb89d1fe6bc499443!2sDowntown%20Conference%20Center!5e0!3m2!1sen!2sus!4v1676961268712!5m2!1sen!2sus" frameborder="0" style="border:0; width: 100%; height: 400px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div><!-- End Google Maps -->

            <div class="col-lg-6">
                <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                    <div class="row gy-4">

                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                        </div>

                        <div class="col-md-6 ">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>

                    </div>
                </form>
            </div><!-- End Contact Form -->

        </div>

    </div>

</section><!-- /Contact Section -->

@endsection