<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Validator, Input, Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class UserController extends BaseController
{
    public function recommend()
    {
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $user_followees = DB::table('user_followees')->where('user_id', $user_id)->get();
        }

        $recommend_users = DB::table('users')->get();
        foreach ($recommend_users as $recommend_user) {
            $recommend_user_data = array(
                "id" => $recommend_user->id,
                "name" => $recommend_user->name,
                "avatar_image" => $recommend_user->avatar_image,
            );

            $is_followed = false;
            foreach ($user_followees as $user_followee) {
                if ($recommend_user->id == $user_followee->followee_user_id) {
                    $is_followed = true;
                }
            }
            $recommend_user_data["is_followed"] = $is_followed;
            $recommend_user_map[$recommend_user->id] = $recommend_user_data;
        }
        return view('recommend_user')->with(['recommend_users' => $recommend_user_map]);
    }

    public function follow(Request $request)
    {
        $user_id = Auth::user()->id;
        $followee_user_id = $request->followee_user_id;
        $user_followee = DB::table('user_followees')->where('user_id', $user_id)->where('followee_user_id', $followee_user_id)->first();
        if ($user_followee == null) {
            DB::table('user_followees')->insert([
                'user_id'          => $user_id,
                'followee_user_id' => $request->followee_user_id,
                'created_at'       => date('Y-m-d H:i:s'),
                'updated_at'       => date('Y-m-d H:i:s'),
            ]);
        } else {
            DB::table('user_followees')->where('user_id', $user_id)->where('followee_user_id', $followee_user_id)->delete();
        }
        return redirect()->route('user.recommendUser');
    }
}