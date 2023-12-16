<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\Event;
use App\Models\Worker;
use App\Models\Dispatch;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get("events", function(Request $request){
    $request->validate([
        "worker_id" => "required"
    ]);

    $dispatches = Dispatch::where("worker_id", $request->worker_id)->get();

    $events = [];
    foreach($dispatches as $dispatch){
        $events[] = Event::find($dispatch->event_id);
    }
    $results = [];
    foreach($events as $event){
        $query = Event::query();
        if( isset($request->date)){
            $query->where("date", $request->date);
        }
        if( isset($request->place)){
            $query->where("place", $request->place);
        }
        if( isset($request->title)){
            $query->where("name", $request->title);
        }

        $results[] = $query->find($event->id);
    }

    $aa = [];
    foreach($results as $result){
        if($result !== null){
            $aa[] = $result;
        }
    }

    return response()->json($aa, 200);
});


Route::post("events", function (Request $request){
    $request->validate([
        "event_id" => "required",
        "worker_id" => "required",
    ]);

    $dispatches = Dispatch::where("event_id", $request->event_id)->where("worker_id", $request->worker_id)->get();
    
    if(empty($dispatches[0])){
        return response()->json("error", 404);
    }
    foreach($dispatches as $dispatch){
        $dispatch->update([
            "flag" => true
        ]);
    }
    return response()->json("update ok", 204);

});