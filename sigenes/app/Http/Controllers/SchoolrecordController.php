<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schoolrecord;
use App\SchoolrecordType;
use App\Partner;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mockery\CountValidator\Exception;

class SchoolrecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('templates.admin.school_records.viewRecords');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRecordType(){
       
        return SchoolrecordType::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStudent(){

        $user = User::find(Auth::user()->id);
        $user->Partner->Student;
        $user->Partner->Student->Career;
        return  $user->Partner;
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.student.schoolrecords.createRequestRecord');
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
            'student_id'        =>  'required',
            'folio'             =>  'required',
            'status_id'         =>  'required',
            'date'              =>  'required'
        ];

        try{
            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return \Response::json(['created' => false,'errors' => $validator->errors()->all()], 500);
            }

            Schoolrecord::create($request->all());
            return ['created' => true];
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
    public function show()
    {
        $tramite = SchoolrecordType::all();
        $result = \DB::table('transact_students')
            ->select([
                "transact_students.id", 
                "transact_students.student_id as student", 
                "transact_students.transact_type_id",
                "transact_students.record",
                "transact_students.credential",
                "transact_students.date", 
                "transact_students.folio", 
                "transact_students.evidence", 
                "transact_students.clinic", 
                "transact_students.library", 
                "transact_students.lab", 
                "transact_students.social_services", 
                "students.account_number", 
                "status.name as estatus", 
                "status.id as idstatus", 
                "partners.name", 
                "partners.firstlastname", 
                "partners.secondlastname"
                ])
            ->join("students", "transact_students.student_id", "=", "students.id")
            ->join("status", "status.id", "=", "transact_students.status_id")
            ->join("partners", "partners.id", "=", "students.partner_id")
            ->where("transact_students.status_id", "<>", 1)
            ->get();

            foreach ($result as $value) {
                # code...
                $value->fullname = $value->name . ' ' . $value->firstlastname . ' ' . $value->secondlastname;
                foreach ($tramite as $k) {
                    # code...
                    if ($value->transact_type_id == $k->id) {
                        # code...
                        $value->transact = $k->name;
                    };
                }
                if ($value->transact_type_id == null) {
                        # code...
                        $value->transact = "Reposición de credencial";
                    };
                if($value->record == 1){
                    $value->tramint = "Constancía";
                }else{
                    if($value->credential == 1)
                        $value->tramint = "Reposición";
                }
            }

        return $result;
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
        $schoolrecords = Schoolrecord::find($request->input('id'));
        $schoolrecords->update($request->all());
        return ['updated' => true];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $schoolrecords = Schoolrecord::find($request->input('id'));
            $schoolrecords->update($request->all());
            Schoolrecord::destroy($request->input('id'));
            return ['deleted' => true];
        }catch(Exception $e){
            return ['deleted' => false];
        }
    }

    public function constancia_estudio(){
        $data = array();//Schoolrecord::find($id);
        $view =  \View::make('templates.admin.school_records.pdf.studentrecord', compact('data'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('templates.admin.school_records.pdf.studentrecord');

    }
}
