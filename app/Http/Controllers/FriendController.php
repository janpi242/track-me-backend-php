<?php

namespace App\Http\Controllers;

use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $friend = new Friend;
        $friend->user_id = $request["myId"];
        $friend_found = User::firstWhere('email', $request["friendsEmail"], ['email']);

        // TODO: not found
        if (empty($friend_found)) {
            return response()->json(array(
                'code' => 400,
                'message' => 'No such user'
            ), 400);
        } else {
            $friend->friend_id = $friend_found['id'];
            $friend->save();
            return response()->json($friend);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Friend $friend)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Friend $friend)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Friend $friend)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Friend $friend)
    {
        //
    }
}