<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Idea;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Validator;

class IdeaController extends Controller
{
    public $request;

    public function index(Request $request)
    {
        $this->request = $request;

        return Idea::where('enabled', true)
            ->withSum('interactions', 'easy')
            ->withSum('interactions', 'unique')
            ->withSum('interactions', 'difficult')
            ->withSum('interactions', 'recurring')
            ->withSum('interactions', 'impossible')
            ->whereLike('data', "%{$request->search}%")
            ->where(
                function (Builder $query) {
                    if ($this->request->tag) {
                        $query->whereJsonContains('tags', $this->request->tag);
                    }
                }
            )
            ->simplePaginate(10);
    }

    public function show(Request $request)
    {
        return Idea::where('id', $request->id)
            ->withSum('interactions', 'easy')
            ->withSum('interactions', 'unique')
            ->withSum('interactions', 'difficult')
            ->withSum('interactions', 'recurring')
            ->withSum('interactions', 'impossible')
            ->where('enabled', true)
            ->first();
    }

    public function updateOrCreate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idea_id' => 'required|exists:ideas,id',
            'data' => 'required|min:100|max:5000',
            'tags' => 'required|array|min:1|max:3',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }

        $idea = Idea::where('id', $validator->validate()['idea_id'])
            ->where('user_ip', $request->ip())
            ->where('enabled', true)
            ->first('created_at');

        $eightHours = 28800000; // milliseconds
        $now = Carbon::now()->getTimestampMs() -  $eightHours; // milliseconds

        if ($idea) {
            if ($idea->created_at->timestamp >= $now) {

                $update = Idea::where('id', $request->id)
                    ->where('enabled', true)
                    ->update([
                        'data' => $validator->validate()['data'],
                        'tags' => $validator->validate()['tags'],
                    ]);

                if (boolval($update)) {
                    return response()->json([
                        'status' => true,
                        'message' =>  'تم تحديث الفكرة. بنجاح',
                    ]);
                }
            }
        }
        return response()->json([
            'status' => false,
            'message' =>  'هناك خطأ، لم يتم تحديث الفكرة.',
        ]);
    }
}
