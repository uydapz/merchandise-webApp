<x-DashboardLayout :title="$title ?? ''">
    <style>
        .custom-img {
            max-width: 100%;
            /* Pastikan gambar tidak melebihi lebar elemen induknya */
            height: auto;
            /* Pertahankan aspek rasio gambar */
            max-height: 100px;
            /* Sesuaikan tinggi maksimal gambar sesuai kebutuhan */
            width: auto;
            /* Pertahankan aspek rasio gambar */
        }
    </style>
    <x-CheckValidate />
    <x-Alert />
    @include('components.molecules.AddModalStory')
    <x-DataTables :tabel="$title" jenis="multi-filter-select" modal="AddModalStory">
        <thead>
            <tr>
                <th>No</th>
                <th>Author</th>
                <th>Judul</th>
                <th>Excerpt</th>
                <th>Clickbait</th>
                <th>Slug</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Author</th>
                <th>Judul</th>
                <th>Excerpt</th>
                <th>Clickbait</th>
                <th>Slug</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($articles as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $a->user->username }}</td>
                    <td>{{ $a->title }}</td>
                    <td>{{ $a->excerpt }}</td>
                    <td>{{ $a->slug }}</td>
                    <td>
                        <img src="{{ asset('storage/story/' . $a->image) }}" class="img-fluid custom-img" alt="">
                    </td>
                    <x-buttonAction modal="EditModalStory-{{ $a->id }}" delete="story/{{ $a->id }}" />
                </tr>
                @include('components.molecules.EditModalStory')
            @endforeach
            
        </tbody>
    </x-DataTables>
</x-DashboardLayout>
