<?php

namespace Realmessenger\Http\Controllers;

use Illuminate\Http\Request;
use Realmessenger\Conversation;
class ConversationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Conversation::where('user_id', auth()->id())->get([
            'id','contact_id','has_blocked','last_message','last_time','listen_notifications'
        ]);

        
    }

     
}
