<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Association;
use Auth;

class AssociationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id=1){

        $ste = Association::find($id);
        $users = Auth::User()->all();
        if($ste==null) $ste = new Association;
        return view('association.ass.index',[
            'ste'   => $ste,
            'users' => $users
        ]);
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
        $id = $request->input('id');

        $Association = Association::find($id);
     
        if($Association==null)

        $Association = new Association;

        $Association->id            = $request->input('id');
        $Association->n_association = $request->input('n_association');
        $Association->raison_social = $request->input('raison_social');
        $Association->adresse       = $request->input('adresse');
        $Association->date_ouvert   = $request->input('date_ouvert');
        $Association->responsable   = $request->input('responsable');
        $Association->note          = $request->input('note');

        if($request->hasFile('logo')){

           $Association->logo   =  $request->file('logo')->store('logo','public'); 

        }
       /* if($Association->user_add != null ){
            $Association->user_update = Auth::user()->name;
        }else{
            $Association->user_add    = Auth::user()->name;
            $Association->user_update = "";
        }
        
        $Association->user_deleted    = "";
        */

        $Association->save();

        return view('alerts.operations',[
                    'b' => true,
                    'msg' => 'العملية تمت بنجاح'
            ]);
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
