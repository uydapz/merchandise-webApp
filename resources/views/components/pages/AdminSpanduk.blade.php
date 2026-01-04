<x-DashboardLayout :title="$title ?? ''">
    <x-CheckValidate />
    <x-Alert />
    @include('components.molecules.AddmodalSpanduk')
    <x-DataTables :tabel="$title" jenis="multi-filter-select" modal="AddModalSpanduk">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($spanduk as $s)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $s->title }}</td>
                    <td>{{ $s->description }}</td>
                    <td>{{ $s->link }}</td>
                    <x-buttonAction modal="EditModalSpanduk-{{ $s->id }}" delete="spanduk/{{ $s->id }}" />
                </tr>
                @include('components.molecules.EditModalSpanduk')
            @endforeach
        </tbody>
    </x-DataTables>
</x-DashboardLayout>
