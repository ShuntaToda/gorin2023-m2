<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Worker;
class WorkerController extends Controller
{
    
    public function index(){
        $workers = Worker::get();
        return view("workers/index", compact("workers"));
    }
    public function show($id){
        $worker = Worker::find($id);
        return view("workers/show", compact("worker"));
    }

    public function create(){
        return view("workers/create");
    }

    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required",
        ]);

        Worker::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => $request->password,
            "memo" => $request->memo ? $request->memo : "",
        ]);

        return redirect(route('workers.index'))->with(["message" => "人材情報が登録されました"]);
    }
    public function edit($id){
        $worker = Worker::find($id);
        return view("workers/edit", compact("worker"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "place" => "required",
            "day" => "required",
        ]);

        $event = Worker::find($id);
    
        $event->update([
            "name" => $request->name,
            "place" => $request->place,
            "day" => $request->day,
        ]);

        return redirect(route('workers.index'))->with(["message" => "人材情報が更新されました"]);
        
        
    }
    public function delete($id){
        $event = Worker::find($id);
        $event->delete();
        return redirect(route('workers.index'))->with(["message" => "人材情報が削除されました"]);
    }
}
