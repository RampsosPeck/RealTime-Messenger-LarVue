<?php

namespace Realmessenger\Http\Controllers;

use Illuminate\Http\Request;
use Realmessenger\Message;
use DB;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /*return Message::select('id',
                'from_id',
                'to_id',
                'created_at','content')
                ->get();*/  

        $userId = auth()->id();
        $contactId = $request->contact_id;
        return Message::select(
                'id',
                //DB::raw("IF(`from_id`=$userId, TRUE, FALSE) as wirterMe"),
               DB::raw("(CASE WHEN (from_id = $userId) THEN TRUE ELSE FALSE END) as written_By_Me"), 
                'created_at',
                'content')
            ->where(function($query) use($userId,$contactId){
                $query->where('from_id', $userId)->where('to_id',$contactId);
            })->orWhere(function($query) use($userId,$contactId){
                $query->where('from_id', $contactId)->where('to_id',$userId);
            })->get();


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message = new Message();
        $message->from_id = auth()->id();
        $message->to_id = $request->to_id;
        $message->content = $request->content;
        $saved = $message->save();

        $data = [];
        $data['success'] = $saved;
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
