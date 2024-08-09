<?php

namespace App\Http\Controllers;

use App\Models\Interaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class InteractionController extends Controller
{
    public function interaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'idea_id' => 'required|exists:ideas,id',
            'type_interaction' => 'required|in:easy,unique,difficult,recurring,impossible else',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors(),
            ]);
        }

        $day = 86400000; // milliseconds
        $now = Carbon::now()->getTimestampMs() -  $day; // milliseconds

        $getInteraction =  Interaction::where('user_ip', $request->ip())
            ->where('idea_id', $validator->validate()['idea_id'])
            ->orderByDesc('created_at')->first();
        $getInteraction = $getInteraction ? $getInteraction->created_at->timestamp >= $now : true;

        if ($getInteraction) {

            $interaction = Interaction::create(
                [
                    'user_ip' => $request->ip(),
                    'idea_id' => $validator->validate()['idea_id'],
                    $validator->validate()['type_interaction'] => true
                ],
            );
            return response()->json([
                'status' => boolval($interaction),
                'data' => Interaction::get(),
            ]);
        }
        return response()->json([
            'status' => false,
            'message' =>  'هناك خطأ، لم يتم التفاعل مع الفكرة.',
        ]);
    }
}
