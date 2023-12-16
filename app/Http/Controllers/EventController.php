<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    
    public function index(){
        $events = Event::get();
        return view("events/index", compact("events"));
    }
    public function show($id){
        $event = Event::find($id);
        return view("events/show", compact("event"));
    }
    public function create(){
        return view("events/create");
    }
    public function store(Request $request){
        $request->validate([
            "name" => "required",
            "place" => "required",
            "day" => "required",
        ]);

        Event::create([
            "name" => $request->name,
            "place" => $request->place,
            "day" => $request->day,
        ]);

        return redirect(route('events.index'))->with(["message" => "イベント情報が登録されました"]);
    }
    public function edit($id){
        $event = Event::find($id);
        return view("events/edit", compact("event"));
    }
    public function update(Request $request, $id){
        $request->validate([
            "name" => "required",
            "place" => "required",
            "day" => "required",
        ]);

        $event = Event::find($id);
    
        $event->update([
            "name" => $request->name,
            "place" => $request->place,
            "day" => $request->day,
        ]);

        return redirect(route('events.index'))->with(["message" => "イベント情報が更新されました"]);
        
        
    }
    public function delete($id){
        $event = Event::find($id);
        $event->delete();
        return redirect(route('events.index'))->with(["message" => "イベント情報が削除されました"]);
    }
}
