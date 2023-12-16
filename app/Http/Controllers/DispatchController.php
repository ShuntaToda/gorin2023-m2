<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dispatch;
use App\Models\Event;
use App\Models\Worker;
class DispatchController extends Controller
{
    
    public function index(){
        $dispatches = Dispatch::get();
        return view("dispatches/index", compact("dispatches"));
    }
    public function show($id){
        $dispatch = Dispatch::find($id);
        return view("dispatches/show", compact("dispatch"));
    }
    public function create(){
        $events = Event::get();
        $workers = Worker::get();
        return view("dispatches/create", compact(["events", "workers"]));
    }
    public function store(Request $request){
        $request->validate([
            "event" => "required",
            "workers" => "required",
        ]);

        foreach($request->workers as $worker){
            Dispatch::create([
                "event_id" => $request->event,
                "worker_id" => $worker,
                "memo" => $request->memo ? $request->memo : ""
            ]);
        }

        return redirect(route('dispatches.index'))->with(["message" => "派遣情報が登録されました"]);
    }
    public function edit($id){
        $dispatch = Dispatch::find($id);
        return view("dispatches/edit", compact(["dispatch", "event", "workers"]));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "place" => "required",
            "day" => "required",
        ]);

        $dispatch = Dispatch::find($id);
    
        $dispatch->update([
            "name" => $request->name,
            "place" => $request->place,
            "day" => $request->day,
        ]);

        return redirect(route('dispatches.index'))->with(["message" => "派遣情報が更新されました"]);
        
        
    }
    public function delete($id){
        $dispatch = Dispatch::find($id);
        $dispatch->delete();
        return redirect(route('dispatches.index'))->with(["message" => "派遣情報が削除されました"]);
    }
}
