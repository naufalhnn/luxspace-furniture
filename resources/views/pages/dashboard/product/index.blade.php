<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <x-slot name="script">
        <script type="text/javascript">
            // ajax datatables
            $(document).ready(function () {
                $('#crudTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{!! url()->current() !!}",
                    columns: [
                        {data: 'id', name: 'id', width: '5%'},
                        {data: 'name', name: 'name'},
                        {data: 'price', name: 'price'},
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false,
                            width: '25%'
                        }
                    ]
                });
            });
        </script>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-10">
                <a href="{{ route('products.create') }}"
                   class="bg-pink-500 hover:bg-pink-700 transition ease-in-out text-white font-bold py-2 px-4 rounded shadow-lg">+
                    Tambah Produk</a>
            </div>
            <div class="shadow overflow-hidden sm-rounded-md">
                <div class="px-4 py-5 bg-white sm:p-6">
                    <table id="crudTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
