<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						{{ __('Products') }}
				</h2>
		</x-slot>

		<x-slot name="script">
				<script type="text/javascript">
						// ajax datatables
						$(document).ready(function() {
								$('#crudTable').DataTable({
										processing: true,
										serverSide: true,
										ajax: "{!! url()->current() !!}",
										columns: [{
														data: 'id',
														name: 'id',
														width: '5%'
												},
												{
														data: 'name',
														name: 'name'
												},
												{
														data: 'category_id',
														name: 'category_id'
												},
												{
														data: 'price',
														name: 'price'
												},
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
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
						<div class="mb-10">
								<a href="{{ route('products.create') }}"
										class="rounded bg-pink-500 px-4 py-2 font-bold text-white shadow-lg transition ease-in-out hover:bg-pink-700">+
										Tambah Produk</a>
						</div>
						<div class="sm-rounded-md overflow-hidden shadow">
								<div class="bg-white px-4 py-5 sm:p-6">
										<table id="crudTable">
												<thead>
														<tr>
																<th>ID</th>
																<th>Nama</th>
																<th>Kategori</th>
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
