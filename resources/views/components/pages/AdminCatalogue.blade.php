<x-DashboardLayout :title="$title ?? ''">
    <x-CheckValidate />
    <x-Alert />
    @include('components.molecules.AddmodalCatalogue')
    <x-DataTables :tabel="$title" jenis="multi-filter-select" modal="AddModalCatalogue">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Link</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Link</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($catalogue as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/catalogue/' . $c->image) }}" class="img-fluid" style="max-width: 20%"
                            alt=""></td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->link }}</td>
                    <td>{{ $c->description }}</td>
                    <td>{{ $c->price }}</td>
                    <td>{{ $c->category }}</td>
                    <x-buttonAction modal="EditModalCatalogue-{{ $c->id }}"
                        delete="catalogue/{{ $c->id }}" />
                    @include('components.molecules.EditModalCatalogue')
                </tr>
            @endforeach
        </tbody>
    </x-DataTables>
</x-DashboardLayout>
