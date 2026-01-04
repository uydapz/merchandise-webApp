<x-HomeLayout :title="$title">
    </div>
    </header>
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
                    @foreach ($catalogue as $marsyi)
                    <div class="col-6 col-md-4 col-lg-4 all {{ $marsyi->category }}">
                        <div class="box">
                            <div>
                                <div class="img-box">
                                    <img src="{{ asset('storage/catalogue/' . $marsyi->image) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h5>
                                        {{ $marsyi->title }}
                                    </h5>
                                    <p style="font-size:12px; ">
                                        {{ $marsyi->description }}
                                    </p>
                                    <div class="options">
                                        <h6>
                                            IDR. {{ $marsyi->price }}
                                        </h6>
                                        <a
                                            href="https://wa.me/6287766304421?text={{ urlencode("assalamualaikum min, saya mau pesan product '" . $marsyi->title . "' dengan harga Rp." . $marsyi->price) }}">
                                            <i class="fa fa-cart-shopping" style="color:#EBF4F6;"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach                
                </div>
            </div>
        </div>
    </section>
</x-HomeLayout>
