<?php

namespace App\Http\Controllers;

use App\User;
use App\Conversation;
use App\ConversationsReply;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Create a new controller instance.
     * protects from home and ads pages when user has not been loged in
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function chat($id)
    {
        $users = User::find($id);
        $user = auth()->user()->id;
        $conversation = DB::table('conversations')
            ->join('users', 'conversations.user_one', '=', 'users.id')
            ->where('user_one', $user)->where('user_two', $id)
            ->orwhere('user_two', $user)->where('user_one', $id)
            ->select('conversations.text', 'conversations.user_one', 'conversations.time', 'conversations.user_two', 'users.*')
            ->orderby('conversations.cid', 'asc')

            ->get();


        //dd($conversation);
        return view('/chat', compact('users', 'conversation'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'message' => 'required'
        ]);
        $conversation = new Conversation;
        $conversation->user_one = auth()->user()->id;
        $conversation->user_two = $request->input('usert');
        $date = Carbon::now()->toDateTimeString();
        $conversation->time = $date;
        $conversation->text = $request->input('message');
        $conversation->save();

        //$conversationr->c_fk=$conversation->cid;
        return redirect('/chat/' . $conversation->user_two)->with('success', 'message sent');
    }

    public function show($cid)
    {
        $conversation = Conversation::find($cid);
        //$comments = Comment::where('ad_id', $id)->with('users')->get();
        dd($conversation);
        return view('/chat', compact('conversation'));
    }
}
