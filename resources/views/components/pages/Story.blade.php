<x-HomeLayout :title="$title">
</div>
</header>
    <section class="blog spad">
        <div class="container mb-2">
            <div class="row">
                <div class="col-md-12">
                    <style>
                        .pagination-container {
                            display: flex;
                            justify-content: center;
                            /* Memusatkan pagination secara horizontal */
                            margin-top: 20px;
                            /* Jarak atas untuk memberikan spasi */
                        }

                        .search-container {
                            display: flex;
                            /* Mengaktifkan Flexbox */
                            justify-content: center;
                            /* Memusatkan konten secara horizontal */
                            margin: 20px 0;
                            /* Jarak vertikal dari elemen di atas dan bawah */
                        }

                        .search-form {
                            display: flex;
                            /* Mengaktifkan Flexbox untuk form */
                            align-items: center;
                            /* Menyelaraskan elemen form secara vertikal */
                        }

                        .search-input {
                            padding: 10px;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 12px 0 0 12px;
                            /* Membuat sudut kiri input bulat */
                            flex: 1;
                            /* Membuat input mengambil sisa ruang */
                        }

                        .search-button {
                            padding: 10px 20px;
                            font-size: 16px;
                            border: none;
                            background-color: #071952;
                            border-radius: 0 4px 4px 0;
                            /* Membuat sudut kanan tombol bulat */
                            color: #F5EFE6;
                            cursor: pointer;
                            transition: background-color 0.2s;
                        }

                        .search-button:hover {
                            color: #F5EFE6;
                            background-color: #088395;
                        }
                    </style>
                    <div class="search-container">
                        <form action="{{ route('search') }}" method="GET" class="search-form">
                            <input type="text" name="query" class="search-input" placeholder="Cari artikel...">
                            <button type="submit" class="search-button"><i class="fa fa-magnifying-glass"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($story as $marsyi)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        @include('components.atoms.StoryCard')
                    </div>
                    @include('components.molecules.StoryDetail')
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="pagination-container">
                {{ $story->links() }}
            </div>
        </div>
    </section>
</x-HomeLayout>
