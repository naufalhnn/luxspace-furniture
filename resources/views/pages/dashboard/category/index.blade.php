<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						Category
				</h2>
		</x-slot>


		<div class="py-12">
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
						<div class="mb-10">
								<a href="{{ route('category.create') }}"
										class="rounded bg-pink-500 px-4 py-2 font-bold text-white shadow-lg transition ease-in-out hover:bg-pink-700">+
										Add category</a>
						</div>
						<div class="sm-rounded-md overflow-hidden shadow">
								<div class="bg-white px-4 py-5 sm:p-6">
										<div class="flex flex-col">
												<div class="-m-1.5 overflow-x-auto">
														<div class="inline-block min-w-full p-1.5 align-middle">
																<div class="overflow-hidden">
																		<table class="min-w-full divide-y divide-gray-200">
																				<thead>
																						<tr>
																								<th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">ID
																								</th>
																								<th scope="col" class="px-6 py-3 text-start text-xs font-medium uppercase text-gray-500">Name
																								</th>
																								<th scope="col"
																										class="flex items-center justify-center px-6 py-3 text-end text-xs font-medium uppercase text-gray-500">
																										Action
																								</th>
																						</tr>
																				</thead>
																				<tbody class="divide-y divide-gray-200">
																						@forelse ($categories as $category)
																								<tr>
																										<td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-gray-800">
																												{{ $category->id }}</td>
																										<td class="whitespace-nowrap px-6 py-4 text-sm text-gray-800">{{ $category->name }}</td>
																										<td
																												class="flex items-center justify-center whitespace-nowrap px-6 py-4 text-end text-sm font-medium">
																												<a href="{{ route('category.edit', $category->id) }}"
																														class="mx-0.5 rounded-md bg-blue-500 px-2 py-1 text-white transition duration-300 hover:bg-blue-700">Edit</a>
																												<form action="{{ route('category.destroy', $category->id) }}" class="inline-block"
																														method="POST">
																														@csrf
																														@method('delete')
																														<button onclick="return confirm('{{ __('Are you sure?') }}')"
																																class="mx-0.5 rounded-md bg-red-500 px-2 py-1 text-white transition duration-300 hover:bg-red-700">
																																{{ __('Hapus') }}
																														</button>
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

								</div>
						</div>
				</div>
		</div>
</x-app-layout>
