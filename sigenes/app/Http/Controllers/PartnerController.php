<?php

namespace App\Http\Controllers;

use App\User;
use App\Partner;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates.admin.partners.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function getAllData()
    {
        return Partner::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllEmployee()
    {
        return Partner::join('users','users.id','=','partners.user_id')
            ->where('users.type','employee')
            ->get();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.admin.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!is_array($request->all())) {
            return ['error' => 'request must be an array'];
        }

        $rules = [
            'name' => 'required',
            'sex'  => 'required',
            'email1' => 'required',
            'nationality' => 'required',
            'maritalstatus' => 'required',
        ];


        try{
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return \Response::json(['created' => false,'errors'  => $validator->errors()->all()], 500);
            }
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email1'),
                'rfc' => $request->input('rfc'),
                'password' => str_random(10),
                'type' => 'employee'
            ]);
            $request->request->add(['user_id' => $user->id]);
           $partner = Partner::create($request->all());
           return \Response::json(['created' => true, 'partner_id' => $partner->id], 200);
        }catch (Exception $e){
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
    public function show($id)
    {
        return Partner::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        $partner = Partner::find($request->input('id'));
        $partner->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Partner::destroy($id);
        return ['deleted' => true];
    }
}
