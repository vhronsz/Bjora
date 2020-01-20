<?php

namespace App\Http\Controllers;

use App\answer;
use App\question;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class QuestController extends Controller
{
    //Ambil data question
    public function fetchQuestion(){
        $quest = question::paginate(10);
        return view("home")->with("quest",$quest);
    }

    //Seraching question
    public function search(Request $re){
        $quest = question::where("title",$re->item)->paginate(10);
        return view("home")->with("quest",$quest);
    }

    //ambil data untuk update question
    public function getDataUpdate(Request $req){
        return view("updateQuestion")->with("question",question::where("id",$req->id)->first())->with("topic",\App\topic::all());
    }

    //ambil data untuk question dan answer
    public function getDataDetail(Request $req){
        $q = question::where('id',$req->id)->first();
        $a = answer::where("question_id",$req->id)->get();
        $u = User::where("id",$q->user_id)->first();
        return view("detail")->with("question",$q)->with("answer",$a)->with("user",$u);
    }

    //Menambah querstion
    public function add(Request $req){
        $val = Validator::make($req->all(),[
           "title"=>"required",
           "topic"=>"required"
        ]);

        $que = new question();
        $que->user_id = Session::get("user")->id;
        $que->title = $req->title;
        $que->topic = $req->topic;
        $que->status = true;
        $que->date = Date::now();
        $que->save();

        if($val->fails()){
            return redirect()->back()->withErrors($val->errors()->all());
        }
    return redirect('/home');
    }

    //Mengupdate question
    public function update(Request $req){
        $val = Validator::make($req->all(),[
            "title"=>"required",
            "topic"=>"required"
        ]);

        $que = question::where("id",$req->id)->first();
        $que->title = $req->title;
        $que->topic = $req->topic;
        $que->status = true;
        $que->date = Date::now();
        $que->save();

        if($val->fails()){
            return redirect()->back()->withErrors($val->errors()->all());
        }
        return redirect('/home');
    }

    //Menghapus question
    public function delete(Request $req){
        $q = question::where("id",$req->id)->first();
        $q->delete();
        return redirect()->back();
    }

    //ubah status jadi close
    public function close(Request $req){
        $q = question::where("id",$req->id)->first();
        $q->status = false;
        $q->save();
        return redirect()->back();
    }

    //ambil data untuk page my questoin
    public function getMy(){
        $q = question::where("id",Session::get("user")->id)->get();
        return view("myQuestion")->with("question",$q);
    }

    //menambah answer
    public function addAnswer(Request $req){
        $val = Validator::make($req->all(),[
            "name"=>"required"
        ]);

        $u = User::where("id",Session::get("user")->id)->first();
        $a = new answer();
        $a->name = $req->name;
        $a->user_id = Session::get("user")->id;
        $a->responder = $u->name;
        $a->save();

        return redirect()->back();
    }

    //Menghapus answeer
    public function deleteAnswer($id){
        $a = answer::where("id",$id)->first();
        $a->delete();

        return redirect()->back();
    }

}
