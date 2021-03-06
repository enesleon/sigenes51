<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Schoolrecord;
use App\SchoolrecordType;
use App\Partner;
use App\User;
use App\Student;
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
                "careers.name as careerN",
                "partners.name", 
                "partners.firstlastname", 
                "partners.secondlastname"
                ])
            ->join("students", "transact_students.student_id", "=", "students.id")
            ->join("status", "status.id", "=", "transact_students.status_id")
            ->join("careers", "careers.id", "=", "students.career_id")
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

    /**
    * Puente que enlaza y direcciona a las constancias segun sea el caso
    * requerido
    * 
    * @param Request $request
    */
    public function switch_record($student, $transact_type_id){
        
        switch ($transact_type_id) {
            case 5:
                //dd($transact_type_id,$student);
                # llama a la constancia de inscripción
                $this->constancia_estudio($student);           
                break;
            case 1:
                # llama a la constancia creditos y promedio
                $this->constancia_credito_promedio($student);
                break;
            default:
                # code...
                break;
        };
    }

    public function constancia_estudio($id){
        $student = Student::find($id);
        $parner = Partner::find($student->partner_id);

        $user = User::find(Auth::user()->id);
        $user->Partner;
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        /*$imageStyle = array(
            'width' => 240,
            'height' => 100,
            'wrappingStyle' => 'square',
            'positioning' => 'absolute',
            'posHorizontalRel' => 'margin',
            'posVerticalRel' => 'line',
        );
        $section->addImage('resources/images/logoenes.jpg', $imageStyle);*/
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $fontStyle = array('name' => 'Arial', 'size' => 12, 'bold' => true);
        $font = array('name' => 'Arial', 'size' => 12);
        $paragraphStyle = array('align' => 'right');
        $paragraph = array('align' => 'justify');
        $section->addText('');
        $section->addText('DEPARTAMENTO DE ADMINISTRACIÓN ESCOLAR', $fontStyle, $paragraphStyle);
        $section->addText('CONSTANCIA DE INSCRIPCIÓN', $fontStyle, $paragraphStyle);
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('A QUIEN CORRESPONDA', $fontStyle, array('align' => 'left'));
        $section->addText('');
        $section->addText('Por este conducto se le comunica que el (la) C. '.$parner->name.' '.$parner->firstlastname.' '.$parner->secondlastname.' con número de cuenta '.$student->account_number.' está inscrito (a) en el _______ año de la carrera de '.$student->Career->name.' en la Escuela Nacional de Estudios Superiores Unidad León clave 09FAC0008A.', 
            $font,
            $paragraph
        );
        $section->addText('');
        $section->addText('Se hace constar que el ciclo escolar 2015-2016 dio inicio el 10 de agosto del 2015 y concluye el 01 de julio del 2016 y corresponden a este ciclo los periodos vacacionales:', 
            $font,
            $paragraph
        );
        $section->addText('');
        $section->addText('         * Del 14 de Diciembre del 2015 al  01 de Enero del 2016', $font, $paragraph);
        $section->addText('         * Del 21 al 25 de Marzo  del 2016', $font, $paragraph);
        $section->addText('         * Del 04 al 22 de Julio del 2016', $font, $paragraph);

        $section->addText('');
        $section->addText('');
        $section->addText('Se extiende la presente petición del interesado (a) en la ciudad de León, Guanajuato a los _____ días del mes de __________________ del año ____________.', 
            $font,
            $paragraph
        );
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('ATENTAMENTE', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('"POR MI RAZA HABLARÁ MI ESPÍRITU"', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('Jefe del departamento de Administración Escolar', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('Lic. Héctor Rodríguez Ramos', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('');
        $section->addText('HRR/'.$user->Partner->name[0].$user->Partner->firstlastname[0].$user->Partner->secondlastname[0], array('name' => 'Arial', 'size' => 9),array('align' => 'left'));
        
        $file = $student->account_number.'_constancia.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");

    }


    public function constancia_credito_promedio($id){
        $student = Student::find($id);
        $parner = Partner::find($student->partner_id);

        $user = User::find(Auth::user()->id);
        $user->Partner;
        
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $fontStyle = array('name' => 'Arial', 'size' => 12, 'bold' => true);
        $font = array('name' => 'Arial', 'size' => 12);
        $paragraphStyle = array('align' => 'right');
        $paragraph = array('align' => 'justify');
        $section->addText('');
        $section->addText('DEPARTAMENTO DE ADMINISTRACIÓN ESCOLAR', $fontStyle, $paragraphStyle);
        $section->addText('CONSTANCIA DE CRÉDITOS Y PROMEDIO', $fontStyle, $paragraphStyle);
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('A QUIEN CORRESPONDA', $fontStyle, array('align' => 'left'));
        $section->addText('');

        $section->addText('Se hace constar que el (la) alumno(a)'.$parner->name.' '.$parner->firstlastname.' '.$parner->secondlastname.' con número de cuenta '.$student->account_number.' estuvo inscrito (a) en la carrera de '.$student->Career->name.' y le corresponde la siguiente situación escolar:',$font, $paragraph);
        $section->addText('');
        $section->addText('Asignaturas acreditadas:', $fontStyle);
        $section->addText('Créditos acumulados:', $fontStyle );
        $section->addText('Equivalencia en porcentaje:', $fontStyle);
        $section->addText('Promedio:', $fontStyle);
        $section->addText('');
        $section->addText('');
        $section->addText('De acuerdo con el plan de estudios vigente, el alumno puede iniciar los trámites de servicio social y/o práctica profesional supervisada.', $font, $paragraph);
        $section->addText('');
        $section->addText('Se extiende la presente a petición del interesado (a) en la ciudad  de León, Guanajuato a los _____ días del mes de _______ del año ________________.',$font, $paragraph);
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('ATENTAMENTE', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('"POR MI RAZA HABLARÁ MI ESPÍRITU"', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('Jefe del departamento de Administración Escolar', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('');
        $section->addText('Lic. Héctor Rodríguez Ramos', $fontStyle,array('align' => 'center'));
        $section->addText('');
        $section->addText('');
        $section->addText('HRR/'.$user->Partner->name[0].$user->Partner->firstlastname[0].$user->Partner->secondlastname[0], array('name' => 'Arial', 'size' => 9),array('align' => 'left'));
        
        $file = $student->account_number.'_constancia_creditos_promedio.docx';
        header("Content-Description: File Transfer");
        header('Content-Disposition: attachment; filename="' . $file . '"');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Transfer-Encoding: binary');
        header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
        header('Expires: 0');
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save("php://output");
    }
}
