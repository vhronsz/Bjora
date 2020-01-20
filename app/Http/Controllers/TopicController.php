<?php

namespace App\Http\Controllers;

use App\topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TopicController extends Controller
{
    //ambil semua data topic
    public function fetchTopic(){
        return view("masterTopic")->with("topic",topic::paginate(10));
    }

    //nambah data topic
    public function add(Request $req){
        $topic = new topic();
        $topic->name = $req->name;
        $topic->save();
        return redirect("/masterTopic");
    }

    //ambil data untuk update
    public function getDataUpdate(Request $req){
        $topic = topic::where("id",$req->id)->first();
        return view("updateTopic")->with("topic",$topic);
    }

    //update topic
    public function update(Request $req){
        $topic = topic::where("id",$req->id)->first();
        $topic->name = $req->name;
        $topic->save();
        return redirect("/masterTopic");
    }

    //delete topic
    public function delete(Request $req){
        $topic = topic::where("id",$req->id)->first();
        $topic->delete();
        return redirect()->back();
    }
}
