<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Guest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guests = Guest::orderBy('id', 'desc')->get();
        return view('guest_information.index', compact('guests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Input Tamu";
        $categories = Categories::orderBy('id', 'desc')->get();
        return view("guest_information.create", compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nama_tamu' => ['required'],
            'check_in' => ['required'],
            'check_out' => ['required'],
            'no_kamar' => ['required', Rule::in(['A01', 'A02', 'A03', 'A04'])],
            'email' => ['required', 'email', 'unique:guests'],
            'no_tel' => ['required', 'string', 'unique:guests'],
            'status_tamu' => ['required'],
            'alamat' => ['required'],
            'kebutuhan_khusus' => ['nullable'],
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        Guest::create($request->all());
        return redirect()->to("guestinformation");
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
        $guest = Guest::find($id);
        $categories = Categories::all();
        return view('guest_information.edit', compact('categories', 'guest'));
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
    public function destroy(string $id)
    {
        //
    }
}
