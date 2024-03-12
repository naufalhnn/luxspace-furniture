<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransactionRequest;
use App\Models\Transaction;
use App\Models\TransactionItem;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Transaction::query();
            return DataTables::eloquent($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a href="' . route('transaction.show', $item->id) . '" class="bg-blue-500 text-white rounded-md px-2 py-1.5 mx-0.5 transition duration-300 hover:bg-blue-700">
                        Show
                        </a>
                        <a href="' . route('transaction.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1.5 mx-0.5 transition duration-300 hover:bg-gray-700">
                        Edit
                        </a>
                    ';
                })
                ->editColumn('total_price', function ($item) {
                    return number_format($item->total_price);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('pages.dashboard.transaction.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction, Request $request)
    {
        if ($request->ajax()) {
            $query = TransactionItem::with(['product'])->where('transactions_id', $transaction->id);
            return DataTables::eloquent($query)
                ->editColumn('product.price', function ($item) {
                    return number_format($item->product->price);
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('pages.dashboard.transaction.show', compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        return view('pages.dashboard.transaction.edit', compact('transaction'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TransactionRequest $request, Transaction $transaction)
    {
        $data = $request->all();
        $transaction->update($data);

        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
