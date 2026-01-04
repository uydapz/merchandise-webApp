<!-- resources/views/search/results.blade.php -->
<x-HomeLayout :title="$title">
    <section class="blog spad">
        <div class="container mb-2">
            <div class="row">
                <div class="col-md-12">
                    <style>
                        .search-container {
                            display: flex;
                            justify-content: center;
                            margin: 20px 0;
                        }
            
                        .search-form {
                            display: flex;
                            align-items: center;
                        }
            
                        .search-input {
                            padding: 10px;
                            font-size: 16px;
                            border: 1px solid #ccc;
                            border-radius: 12px 0 0 12px;
                            flex: 1;
                        }
            
                        .search-button {
                            padding: 10px 20px;
                            font-size: 16px;
                            border: none;
                            background-color: #4F6F52;
                            border-radius: 0 4px 4px 0;
                            color: #F5EFE6;
                            cursor: pointer;
                            transition: background-color 0.2s;
                        }
            
                        .search-button:hover {
                            color: #F5EFE6;
                            background-color: #1A4D2E;
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
            <div class="section-title">
                <h6> - Hasil Pencarian untuk : "{{ $query }}"</h1>
            </div>
            @if ($results->isEmpty())
                <p>Tidak ada hasil ditemukan.</p>
            @else
                <div class="row">
                    @foreach ($results as $marsyi)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            @include('components.atoms.StoryCard')
                        </div>
                    @endforeach
                </div>
                {{ $results->links() }}
            @endif
        </div>
    </section>
</x-HomeLayout>
