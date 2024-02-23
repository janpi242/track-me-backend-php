<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, string $user_id)
    {
        $positions = Position::where("user_id", $user_id)->orderBy('timestamp', 'desc')->first();

        return response()->json($positions);
    }

    public function index2(Request $request)    
    {
        $ids = request('ids');
        if(!$ids) {
            return response()->json([]);
        }
        
        $ids = explode(',',$ids);
        
        $result = [];
        
        foreach ($ids as &$id) {
            $position = Position::where("user_id", $id)->orderBy('timestamp', 'desc')->first();
            (!is_null($position)) ? ($result[] = $position) : "";
        }

        return response()->json($result);
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
        $position = new Position;
        $position->user_id = $request["userId"];
        $position->longitude = $request["longitude"];
        $position->latitude = $request["latitude"];
        $position->timestamp = date("Y-m-d H:i:s", $request["timestamp"]/1000);
        $position->save();
        return response()->json($position);
    }

    /**
     * Display the specified resource.
     */
    public function show(Position $position)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Position $position)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Position $position)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        //
    }
}
