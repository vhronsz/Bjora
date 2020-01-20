<?php

namespace App\Http\Controllers;

use App\chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ChatController extends Controller
{
    //Kirim pesan
    public function sendMessage(Request $req){
        $c = new chat();
        $c->name = $req->name;
        $c->sender = Session::get("user")->id;
        $c->receiver = $req->id;
        $c->save();
        return redirect()->back();
    }

    public function getInbox(){
        $chat = chat::where("receiver",Session::get("user")->id)->paginate(10);
        return view("inbox")->with("chat",$chat);
    }

    public function remove($id){
        $c = chat::where("id",$id)->first();
        $c->delete();
        return redirect()->back();
    }
}
