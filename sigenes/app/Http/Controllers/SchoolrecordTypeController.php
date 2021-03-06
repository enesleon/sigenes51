<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolrecordType;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SchoolrecordTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates.admin.schoolrecordTypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.admin.schoolrecordTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            //dd($request);  
            SchoolrecordType::create(['name'=> $request->input('name'),
                'description'=> $request->input('description'),
                'record'=> $request->input('record')]);
            return \Response::json(['created' => true], 200);
        } catch (Exception $e) {
            \Log::info('Error creating user: '.$e);
            return \Response::json(['created' => false], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return SchoolrecordType::all();
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
    public function update(Request $request)
    {
        try{
            $schoolrecordType = SchoolrecordType::find($request->input('id'));
            $schoolrecordType->update($request->all());
            return ['updated' => true];
        }catch (Exception $e){
            \Log::info('Error creating Period: '.$e);
            return \Response::json(['updated' => false], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SchoolrecordType::destroy($id);
        return ['deleted' => true];
    }
}
