<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;
use App\Models\Worker;
class Dispatch extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'worker_id',
        'memo',
        'flag',
    ];

    static function getEvent($id){
        $dispatch = Dispatch::find($id);
        $event = Event::find($dispatch->event_id);
        if(empty($event)){
            return "none";
        }
        return $event->name;
    }
    static function getWorker($id){
        $dispatch = Dispatch::find($id);
        $worker = Worker::find($dispatch->worker_id);
        if(empty($worker)){
            return "none";
        }
        return $worker->name;
    }
}
