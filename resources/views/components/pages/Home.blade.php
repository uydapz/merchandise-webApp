        <x-HomeLayout :title="$title ?? ''">
            <style>
                .whatsapp-float {
                    position: fixed;
                    width: 60px;
                    height: 60px;
                    bottom: 40px;
                    right: 40px;
                    background-color: #25d366;
                    color: #FFF;
                    border-radius: 50px;
                    text-align: center;
                    font-size: 30px;
                    box-shadow: 2px 2px 3px #999;
                    z-index: 100;
                }

                .my-float {
                    margin-top: 16px;
                }
            </style>
            <a href="https://wa.me/6287766304421" class="whatsapp-float" target="_blank">
                <i class="fa fa-whatsapp my-float"></i>
            </a>
            <section class="slider_section">
                <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php $active = true; @endphp
                        @foreach ($spanduk as $loops)
                            @if ($loops->active)
                                <div class="carousel-item {{ $active ? 'active' : '' }}">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-7 col-lg-6">
                                                <div class="detail-box">
                                                    <h1>{{ $loops->title }}</h1>
                                                    <p>{{ $loops->description }}</p>
                                                    <div class="btn-box">
                                                        @if ($loops->link)
                                                            <a href="{{ $loops->link }}" class="btn1">
                                                                Kunjungi
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php $active = false; @endphp
                            @endif
                        @endforeach
                    </div>
                    <div class="container">
                        <ol class="carousel-indicators">
                            @foreach ($spanduk as $index => $loops)
                                @if ($loops->active)
                                    <li data-target="#customCarousel1" data-slide-to="{{ $index }}"
                                        class="{{ $index == 0 ? 'active' : '' }}"></li>
                                @endif
                            @endforeach
                        </ol>
                    </div>
                </div>
            </section>
            @if ($title = 'Beranda')
                </div>
                </header>
            @endif

            <!-- end slider section -->

            <section id="katalog" class="food_section layout_padding-bottom" style="margin-top: 30px">
                <div class="container">
                    <div class="heading_container heading_center">
                        <h2>
                            Katalog Merchandise
                        </h2>
                    </div>

                    <ul class="filters_menu">
                        <li class="active" data-filter="*">Semua</li>
                        <li data-filter=".t-shirt">Pakaian</li>
                        <li data-filter=".book">Buku</li>
                        <li data-filter=".pigura">Pigura</li>
                        <li data-filter=".merchandise">Merchandise</li>
                    </ul>

                    <div class="filters-content">
                        <div class="row grid">
                            @foreach ($catalogue as $loops)
                                <div class="col-6 col-md-4 col-lg-4 all {{ $loops->category }}">
                                    <div class="box">
                                        <div>
                                            <div class="img-box">
                                                <img src="{{ asset('storage/catalogue/' . $loops->image) }}"
                                                    alt="">
                                            </div>
                                            <div class="detail-box">
                                                <h5>
                                                    {{ $loops->title }}
                                                </h5>
                                                <div class="options">
                                                    <h6>
                                                        IDR. {{ $loops->price }}
                                                    </h6>
                                                    <a
                                                        href="https://wa.me/6287766304421?text={{ urlencode("assalamualaikum min, saya mau pesan product '" . $loops->title . "' dengan harga Rp." . $loops->price) }}">
                                                        <i class="fa fa-cart-shopping" style="color:#EBF4F6;"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="btn-box">
                            <a href="/catalogue">
                                Lihat Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </section>


            <section id="client" class="client_section layout_padding-bottom">
                <div class="container">
                    <div class="heading_container heading_center psudo_white_primary mb_45">
                        <h2>
                            Apa yang mereka katakan?
                        </h2>
                    </div>
                    <div class="carousel-wrap row ">
                        <div class="owl-carousel client_owl-carousel">
                            @foreach ($customer as $loops)
                            <div class="item">
                                <div class="box">
                                        <div class="detail-box">
                                            <p>
                                                {{ $loops->said }}
                                            </p>
                                            <h6>
                                                {{ $loops->title }}
                                            </h6>
                                            <p>
                                                - {{ $loops->name }}
                                            </p>
                                        </div>
                                        <div class="img-box">
                                            <img src="{{ asset('storage/customer/' . $loops->image) }}" alt=""
                                                class="box-img">
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </section>

            <section class="about_section layout_padding">
                <div class="container  ">

                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="img-box">
                                <img src="{{ asset('assets/images/design.png') }}" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-box">
                                <div class="heading_container">
                                    <h2>
                                        Santripasir Merchandise
                                    </h2>
                                </div>
                                <p>
                                    Merchandise Santripasir merupakan buah karya dari santri PPSQ Asy-Syadzili dengan
                                    menyelipkan dakwah dalam bentuk fashion, seluruh tema desain dari merchandise ini
                                    diambil dari nasehat-nasehat dari para ulama' Nusantara dan pejuang agama Islam.
                                    Yukk... berdakwah jalur fashion dengan beli merchandise Santripasir. Bergaya Lebih
                                    Gagah Berkarya Dengan Dakwah...
                                </p>
                                <a href="">
                                    Tata cara pemesanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </x-HomeLayout>
