@php use Illuminate\Support\Facades\Storage; @endphp
@extends('layouts.frontend')

@section('content')
		<!-- START: DETAILS -->
		<section class="container mx-auto">
				<div class="my-4 flex flex-wrap md:my-12">
						<div class="w-full px-4">
								<h2 class="text-3xl font-semibold">Living Room</h2>
						</div>
				</div>
				<div class="mx-auto grid max-w-screen-xl grid-cols-4 gap-5">
						@foreach ($products as $product)
								<a href="{{ route('details', $product->slug) }}" class="group">
										<div class="flex h-96 flex-col rounded-xl border border-gray-300 p-4">
												<div>
														<img class="mx-auto w-64 rounded-xl"
																src="{{ $product->galleries()->exists() ? Storage::url($product->galleries->first()->url) : 'data:image/gif;base64,R0lGODlhAQABAIAAAMLCwgAAACH5BAAAAAAALAAAAAABAAEAAAICRAEAOw==' }}"
																alt="" />
												</div>
												<div class="my-3 flex flex-col gap-2">
														<h3 class="line-clamp-2 text-base leading-tight">{{ $product->name }}</h3>
														<p class="text-base font-bold">IDR {{ number_format($product->price) }}</p>
												</div>
										</div>
								</a>
						@endforeach
				</div>
		</section>
		<!-- END: DETAILS -->
@endsection
