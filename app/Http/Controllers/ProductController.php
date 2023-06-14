<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Product::query();
            return DataTables::eloquent($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a href="' . route('products.gallery.index', $item->id) . '" class="bg-blue-500 text-white rounded-md px-2 py-1.5 mx-2">
                        Galeri
                        </a>
                        <a href="' . route('products.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1.5 mx-2">
                        Edit
                        </a>
                        <form action="' . route('products.destroy', $item->id) . '" class="inline-block" method="POST">
                        <button class="bg-red-500 text-white rounded-md px-2 py-1 mx-2">
                        Hapus
                        </button>
                       ' . method_field('delete') . csrf_field() . '
                       </form>
                    ';
                })
                ->editColumn('price', function ($item) {
                    return number_format($item->price);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('pages.dashboard.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.dashboard.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        Product::create($data);

        return redirect()->route('products.index');
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
    public function edit(Product $product)
    {
        return view('pages.dashboard.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $product->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
