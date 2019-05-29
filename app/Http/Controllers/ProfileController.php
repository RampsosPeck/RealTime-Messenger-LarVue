<?php

namespace Realmessenger\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( )
    {
        return view('profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request  )
    {
        $user = auth()->user();
        $user->name = $request->name;
        if($request->password)
            $user->password = bcrypt($request->password);

        $file = $request->image;
        
        if($file){
            $path = public_path('/img');
            $fileName = time().'.'.$file->getClientOriginalExtension();
            $moved = $file->move($path, $fileName);
            $user->image = $fileName;
        }
        
        $user->save();  

        return back();   
        
    }

     
}
