<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Revervations;
use App\Models\Rooms;
use Illuminate\Http\Request;

class RevervationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Revervations::orderBy('id', 'desc')->get();
        $title = "Data Reservasi";
        return view('revervation.index', compact('datas','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categories::get();
        return view('revervation.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         try {
            $data = $request->validate([
                'guest_name' => 'required',
                'guest_email' => 'required|email',
                'guest_phone' => 'required',
                'guest_note' => 'nullable|string',
                'guest_room_number' => 'nullable|string',
                'guest_check_in' => 'required|date',
                'guest_check_out' => 'required|date|after:checkin',
                'payment_method' => 'required',
                'room_id' => 'required',
            ]);
            $create = Revervations::create($data);
            return response()->json(['status', 'message' => 'Reservation create success', 'data' => $create], 201);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'status' => 'Errorr',
                    'message' => 'Validation error',
                    'error' => $e->errors()
                ],
                422
            );
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'error' => $e->getMessage()
            ], 500);
        }
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
    public function destroy(string $id)
    {
        //
    }

    public function getRoomCategory($id_category) {
        try {
            $rooms = Rooms::where('category_id', $id_category)->get();
            return response()->json(['data' => $rooms, 'message' =>  'success']);
        } catch (\Throwable $th) {
            return response()->json(['message' =>'Errorrrrrr', 'error' => $th->getMessage()]);
        }
    }
}
