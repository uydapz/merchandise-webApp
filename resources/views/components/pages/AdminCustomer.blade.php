<x-DashboardLayout :title="$title ?? ''">
    <x-CheckValidate />
    <x-Alert />
    @include('components.molecules.AddModalCustomer')
    <x-DataTables :tabel="$title" jenis="multi-filter-select" modal="AddModalCustomer">
        <thead>
            <tr>
                <th>No</th>
                <th>gambar</th>
                <th>nama</th>
                <th>judul</th>
                <th>quotes</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>No</th>
                <th>gambar</th>
                <th>nama</th>
                <th>judul</th>
                <th>quotes</th>
                <th>Aksi</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($customer as $c)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{ asset('storage/customer/' . $c->image) }}" class="img-fluid" style="max-width: 20%"
                        alt=""></td>
                        <td>{{ $c->name }}</td>
                    <td>{{ $c->title }}</td>
                    <td>{{ $c->said }}</td>
                    <x-buttonAction modal="EditModalCustomer-{{ $c->id }}" delete="customer/{{ $c->id }}" />
                </tr>
                @include('components.molecules.EditModalCustomer')
            @endforeach
        </tbody>
    </x-DataTables>
</x-DashboardLayout>
