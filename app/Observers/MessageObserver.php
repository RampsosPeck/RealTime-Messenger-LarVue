<?php
 
namespace Realmessenger\Observers;

use Realmessenger\Message;
use Realmessenger\Conversation;
use Realmessenger\Events\MessageSent;

class MessageObserver
{
    /**
     * Handle to the Message "created" event.
     *
     * @param  \App\Message  $Message
     * @return void
     */
    public function created(Message $message)
    {
        $conversation = Conversation::where('user_id',$message->from_id)->where('contact_id',$message->to_id)->first();

        if($conversation){
            $conversation->last_message = "Tú: $message->content";
            $conversation->last_time = $message->created_at;
            $conversation->save();
        }

        $conversation = Conversation::where('contact_id',$message->from_id)->where('user_id',$message->to_id)->first();

        if($conversation){
            $conversation->last_message = "$conversation->contact_name: $message->content";
            $conversation->last_time = $message->created_at;
            $conversation->save();
        }

        event(new MessageSent($message));
    }

    /**
     * Handle the message "updated" event.
     *
     * @param  \App\Message  $Message
     * @return void
     */
    public function updated(Message $message)
    {
        //
    }

    /**
     * Handle the Message "deleted" event.
     *
     * @param  \App\Message  $Message
     * @return void
     */
    public function deleted(Message $message)
    {
        //
    }
}