<?php

namespace App\Http\Controllers;

use App\Events\ChatEvent;
use App\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Message[]|Collection|Response
     */
    public function index()
    {
        return Message::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $toUserId = $request->post('toUserId');
        $inputMessage = $request->post('message');


        $message = Message::create([
            'user_id' => $userId,
            'to_user_id' => $toUserId,
            'message' => $inputMessage
        ]);
        event(new ChatEvent($message, $toUserId));
        return $message;

    }

    /**
     * Display the specified resource.
     *
     * @param Message $message
     * @return Response
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Message $message
     * @return Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
