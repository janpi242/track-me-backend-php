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
    public function index(Request $request, string $user_id)
    {
        $friends = Friend::where("user_id", $user_id)
            ->distinct('friend_id')
            ->join('users', 'friends.friend_id', '=', 'users.id')
            ->select('friend_id as id', 'users.name', 'users.email')
            ->get();

        return response()->json(array("friends" => $friends));
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
        $friend_found = User::firstWhere('email', $request["friendsEmail"]);

        if (empty($friend_found)) {
            return response()->json(
                array(
                    'code' => 400,
                    'message' => 'No such user'
                ),
                400
            );
        } else {
            $friend = Friend::firstOrCreate(
                ['user_id' => $request["myId"], 'friend_id' => $friend_found['id']]
            );

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
