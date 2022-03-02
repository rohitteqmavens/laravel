<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Events\StatusLiked;



class PushController extends Controller
{

    public function send(Request $request, Chat $chat)
    {
        // dd($request->all());
        $request->validate([
            'message' => 'required',
        ]);
        $chat->sender = $request->sender;
        $chat->reciever = $request->reciever;
        $chat->message = $request->message;
        // dd($chat);
        // dd($getUserName);
        if ($chat->save()) {
            $chat->name = Auth::user()->name;
            broadcast(new StatusLiked($chat))->toOthers();
            return  redirect()->back();
        }
    }
    public function home_page()
    {
        $users = Auth::user();
        $id = $users->id;
        $all_user = User::get()->where('id', '!=', $id);
        // dd($all_user);

        return view('home', compact('all_user', 'users'));
    }
    public function chat_message($id = null)
    {
        $users = Auth::user(); //its me
        $reciever = User::find($id); //the another person with whom we are chatting and  its details shown on front page
        $user_id = Auth::user()->id;
        $all_user = User::get()->where('id', '!=', $user_id);
        $chat_other = Chat::where(function ($query) use ($id, $user_id) {
            $query->where(function ($inner_query) use ($id, $user_id) {
                $inner_query->where('sender', $id)
                    ->where('reciever', $user_id);
            });
            $query->orwhere(function ($inner_query) use ($id, $user_id) {
                $inner_query->where('sender', $user_id)
                    ->where('reciever', $id);
            });
        })->get();
        $message_count = $chat_other->count();
        // dd($message_count);
        return view('chat_message', compact('all_user', 'users', 'chat_other', 'reciever', 'message_count'));
    }
}
//sdfskdhfsdkhfksdjhfksdhfdhfdkjhdkfhksvnkdskfhderoreorueour
