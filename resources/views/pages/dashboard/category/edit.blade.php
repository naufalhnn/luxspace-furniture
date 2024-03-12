<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						Category &raquo; Create
				</h2>
		</x-slot>

		<div class="py-12">
				<div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
						@if ($errors->any())
								<div class="mb-3" role="alert">
										<div class="rounded-t bg-red-500 px-4 py-2 font-bold text-white">
												There's something wrong!
										</div>
										<div class="border-t-6 rounded-b border border-red-400 bg-red-100 px-4 py-3 text-red-700">
												<p>
												<ul>
														@foreach ($errors->all() as $error)
																<li>{{ $error }}</li>
														@endforeach
												</ul>
												</p>
										</div>
								</div>
						@endif
						<form action="{{ route('category.update', $category->id) }}" method="post" class="w-full"
								enctype="multipart/form-data">
								@csrf
								@method('put')
								<div class="-mx-3 mb-6 flex flex-wrap">
										<div class="w-full px-3">
												<label class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700">Name</label>
												<input type="text" value="{{ $category->name }}" name="name"
														class="block w-full rounded border border-gray-400 bg-gray-50 px-4 py-3 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
														placeholder="Category name">
										</div>
								</div>
								<div class="-mx-3 mb-6 flex flex-wrap">
										<div class="w-full px-3">
												<button type="submit"
														class="rounded bg-pink-500 px-4 py-2 font-bold text-white shadow-lg transition ease-in-out hover:bg-pink-700">
														Save
												</button>
										</div>
								</div>
						</form>
				</div>
		</div>
		<script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
		<script>
				CKEDITOR.replace('description');
		</script>
</x-app-layout>
