<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductGalleryRequest;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProductGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product, Request $request)
    {
        if ($request->ajax()) {
            
            $query = ProductGallery::where('products_id', $product->id);
            return DataTables::eloquent($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form action="' . route('gallery.destroy', $item->id) . '" class="inline-block" method="POST">
                        <button class="bg-red-500 text-white rounded-md px-2 py-1 mx-2">
                        Hapus
                        </button>
                       ' . method_field('delete') . csrf_field() . '
                       </form>
                    ';
                })
                ->editColumn('url', function ($item) {
                    return '<img style="max-width: 150px" src="' . Storage::url($item->url) . '">';
                })
                ->editColumn('is_featured', function ($item) {
                    return $item->is_featured ? 'YES' : 'NO';
                })
                ->rawColumns(['action', 'url'])
                ->toJson();
        }

        return view('pages.dashboard.gallery.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Product $product)
    {
        return view('pages.dashboard.gallery.create', compact('product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGalleryRequest $request, Product $product)
    {
        $files = $request->file('files');

        if ($request->hasFile('files')) {
            foreach ($files as $file) {
                $path = $file->store('public/gallery');

                ProductGallery::create([
                    'products_id' => $product->id,
                    'url' => $path
                ]);
            }
        }
        return redirect()->route('products.gallery.index', $product->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductGallery $gallery)
    {
        $gallery->delete();

        return redirect()->route('products.gallery.index', $gallery->products_id);
    }
}
