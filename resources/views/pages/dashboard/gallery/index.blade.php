<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						Product &raquo; {{ $product->name }} &raquo; Gallery
				</h2>
		</x-slot>

		{{-- <x-slot name="script">
        <script type="text/javascript">
            // ajax datatables
            $(document).ready(function () {
                $('#crudTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{!! url()->current() !!}",
                    columns: [
                        {data: 'id', name: 'id', width: '5%'},
                        {data: 'url', name: 'url'},
                        {data: 'is_featured', name: 'is_featured'},
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
    </x-slot> --}}
		<div class="py-12">
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
						<div class="mb-10">
								<a href="{{ route('products.gallery.create', $product->id) }}"
										class="rounded bg-pink-500 px-4 py-2 font-bold text-white shadow-lg transition ease-in-out hover:bg-pink-700">+
										Upload Foto</a>
						</div>
						<div class="sm-rounded-md overflow-hidden shadow">
								<div class="bg-white px-4 py-5 sm:p-6">
										<table class="w-full table-auto">
												<thead ">
														<tr>
																<th class="text-start">ID</th>
																<th class="text-start">Foto</th>
																<th class="text-start">Aksi</th>
														</tr>
												</thead>
												<tbody>
														@forelse ($galleries as $gallery)
														<tr>
																<td>{{ $gallery->id }}</td>
																<td><img src="{{ Storage::url($gallery->url) }}" alt="Product-gallery" class="w-40"></td>
																<td>
																		<form
																				action="{{ route('products.gallery.destroy', ['product' => $product->id, 'gallery' => $gallery->id]) }}"
																				method="post">
																				@csrf
																				@method('delete')
																				<button onclick="return confirm('{{ __('Are you sure?') }}')"
																						class="font-bold text-red-700 transition duration-300 hover:text-red-500">{{ __('Hapus') }}</button>
																		</form>
																</td>
														</tr>
												@empty
														<tr>
																<td colspan="3" class="text-center">Tidak ada data</td>
														</tr>
														@endforelse
														</tbody>
										</table>
								</div>
						</div>
				</div>
		</div>
</x-app-layout>
