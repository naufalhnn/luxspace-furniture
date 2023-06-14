<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = User::query();
            return DataTables::eloquent($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a href="' . route('user.edit', $item->id) . '" class="bg-gray-500 text-white rounded-md px-2 py-1.5 mx-2">
                        Edit
                        </a>
                        <form action="' . route('user.destroy', $item->id) . '" class="inline-block" method="POST">
                        <button class="bg-red-500 text-white rounded-md px-2 py-1 mx-2">
                        Hapus
                        </button>
                       ' . method_field('delete') . csrf_field() . '
                       </form>
                    ';
                })
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('pages.dashboard.user.index');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('pages.dashboard.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->all();
        $user->update($data);

        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index');
    }
}
