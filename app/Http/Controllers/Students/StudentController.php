<?php

namespace App\Http\Controllers\Students;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;

use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\Student;
use PDF3;
use PDF2;

class StudentController extends Controller
{

    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }


    public function index()
    {
       return $this->Student->Get_Student();
    }
    public function pdfview() {
        $students = Student::all();
        $html = view('pages/Students/pdfview',['students'=>$students])->render(); // file render
        // or pure html
        //$html = '<h1>أسماء الطلبة المسجلين </h1>';
        $pdfarr = [
            'title'=>'اهلا بكم ',
            'data'=>$html, // render file blade with content html
            'header'=>['show'=>false], // header content
            'footer'=>['show'=>false], // Footer content
            'font'=>'aealarabiya', //  dejavusans, aefurat ,aealarabiya ,times
            'font-size'=>12, // font-size
            'text'=>'', //Write
            'rtl'=>true, //true or false
            'creator'=>'phpanonymous', // creator file - you can remove this key
            'keywords'=>'phpanonymous keywords', // keywords file - you can remove this key
            'subject'=>'phpanonymous subject', // subject file - you can remove this key
            'filename'=>'phpanonymous.pdf', // filename example - invoice.pdf
            'display'=>'print', // stream , download , print

    ];
   PDF2::HTML($pdfarr);
}

 public function create()
    {
        return $this->Student->Create_Student();
    }

    public function store(StoreStudentsRequest $request)
    {
       return $this->Student->Store_Student($request);
    }



    public function edit($id)
    {
       return $this->Student->Edit_Student($id);
    }


    public function update(StoreStudentsRequest $request)
    {
        return $this->Student->Update_Student($request);
    }


    public function destroy(Request $request)
    {
        return $this->Student->Delete_Student($request);
    }

    public function Get_classrooms($id)
    {
       return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id)
    {
        return $this->Student->Get_Sections($id);
    }

}
