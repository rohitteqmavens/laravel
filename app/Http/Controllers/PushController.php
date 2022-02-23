<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;



class PushController extends Controller
{
    public function user_first()
    {
        $users = Auth::user();
        $id = $users->id;
        $all_user = User::get()->where('id', '!=', $id);
        // dd($all_user);

        return view('chat', compact('all_user', 'users'));
    }
    public function chat($id = null)
    {
        $users = Auth::user();//its me
        // $id = $users->id;
        $all_user = User::find($id);//the another person with whom we are chatting
        // dd($all_user);
        $chat_other=Chat::get()->where('sender','=',$all_user->id);
        $chat_me=Chat::get()->where('sender','=',$users->id);

        return view('messages', compact('all_user', 'users','chat_other','chat_me'));
    }
    public function send(Request $request,Chat $chat)
    {


        // dd($request->all());
        $request->validate([
            'message' => 'required',
        ]);

        $chat->sender=$request->sender;
        $chat->reciever=$request->reciever;
        $chat->message=$request->message;
        // dd($chat);



        if ($chat->save()) {
            return  redirect()->back();
        }
    }
}
//sdfskdhfsdkhfksdjhfksdhfdhfdkjhdkfhksvnkdskfhderoreorueour
