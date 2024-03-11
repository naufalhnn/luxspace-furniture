<x-app-layout>
		<x-slot name="header">
				<h2 class="text-xl font-semibold leading-tight text-gray-800">
						Product &raquo; <span class="line-clamp-1 truncate">{{ $product->name }}</span> &raquo; Gallery &raquo; Upload
						Photos
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
						<form action="{{ route('products.gallery.store', $product->id) }}" method="post" class="w-full"
								enctype="multipart/form-data">
								@csrf
								<div class="-mx-3 mb-6 flex flex-wrap">
										<div class="w-full px-3">
												<label for="files"
														class="mb-2 block text-xs font-bold uppercase tracking-wide text-gray-700">Name</label>
												<input id="files" type="file" multiple name="files[]" accept="image/*"
														class="block w-full rounded border border-gray-200 bg-gray-200 px-4 py-3 leading-tight text-gray-700 focus:border-gray-500 focus:bg-white focus:outline-none"
														placeholder="Upload Foto">
										</div>
										<img id="preview" class="mx-auto my-5 max-w-md" />
										<div class="my-5 w-full px-3">
												<button
														class="rounded bg-pink-500 px-4 py-2 font-bold text-white shadow-lg transition ease-in-out hover:bg-pink-700">
														Save Gallery
												</button>
										</div>
								</div>
						</form>
				</div>
		</div>
		@push('script')
				<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
				<script type="text/javascript">
						$(document).ready(function(e) {
								$('#files').change(function() {
										let reader = new FileReader();
										reader.onload = (e) => {

												$('#preview').attr('src', e.target.result);
										}
										reader.readAsDataURL(this.files[0]);
								});

						});
				</script>
		@endpush
</x-app-layout>
