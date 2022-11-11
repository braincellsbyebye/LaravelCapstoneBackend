<?php

namespace App\Http\Controllers\API;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json([
            'status'=> 200,
            'students'=>$students,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'fname'=>'required|max:191',
            'lname'=>'required|max:191',
            'bday'=>'required',
            'sex'=>'required',
            'phone'=>'required|max:10|min:10',
            'address'=>'required|max:191',
            'religion'=>'required|max:191',
            'cvs'=>'required|max:191',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'validate_err'=> $validator->messages(),
            ]);
        }
        else
        {
            $student = new Student;
            $student->fname = $request->input('fname');
            $student->lname = $request->input('lname');
            $student->bday = $request->input('bday');
            $student->sex = $request->input('sex');
            $student->phone = $request->input('phone');
            $student->address = $request->input('address');
            $student->religion = $request->input('religion');
            $student->cvs = $request->input('cvs');
            $student->save();

            return response()->json([
                'status'=> 200,
                'message'=>'Student Added Successfully',
            ]);
        }

    }

    public function edit($id)
    {
        $student = Student::find($id);
        if($student)
        {
            return response()->json([
                'status'=> 200,
                'student' => $student,
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 404,
                'message' => 'No Student ID Found',
            ]);
        }

    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[
            'fname'=>'required|max:191',
            'lname'=>'required|max:191',
            'bday'=>'required',
            'sex'=>'required',
            'phone'=>'required|max:10|min:10',
            'address'=>'required|max:191',
            'religion'=>'required|max:191',
            'cvs'=>'required|max:191',
            
        ]);

        if($validator->fails())
        {
            return response()->json([
                'status'=> 422,
                'validationErrors'=> $validator->messages(),
            ]);
        }
        else
        {
            $student = Student::find($id);
            if($student)
            {

                $student->fname = $request->input('fname');
                $student->lname = $request->input('lname');
                $student->bday = $request->input('bday');
                $student->sex = $request->input('sex');
                $student->phone = $request->input('phone');
                $student->address = $request->input('address');
                $student->religion = $request->input('religion');
                $student->cvs = $request->input('cvs');
                $student->update();

                return response()->json([
                    'status'=> 200,
                    'message'=>'Student Updated Successfully',
                ]);
            }
            else
            {
                return response()->json([
                    'status'=> 404,
                    'message' => 'No Student ID Found',
                ]);
            }
        }
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        if($student)
        {
            $student->delete();
            return response()->json([
                'status'=> 200,
                'message'=>'Student Deleted Successfully',
            ]);
        }
        else
        {
            return response()->json([
                'status'=> 404,
                'message' => 'No Student ID Found',
            ]);
        }
    }
    public function search($key)
    {
        return Student::where('fname', 'Like', "%$key%")->get();
    }

    public function num()
    {
        $RC = Student::where('religion', 'Like', "RomanCatholic")->get();
        $BA = Student::where('religion', 'Like', "BornAgain")->get();
        $IG = Student::where('religion', 'Like', "Iglesia")->get();
        $PR = Student::where('religion', 'Like', "Prefer not to say")->get();

        $RCC = $RC->count();
        $BAC = $BA->count();
        $IGG = $IG->count();
        $PRR = $PR->count();

        $data = [
            $RCC,
            $BAC,
            $IGG,
            $PRR,
        ];

        return $data;
    }
    public function numall()
    {
        $student = Student::all();
        $test = $student->count();

        return $test;
    }
    public function female()
    {
        $FE = Student::where('sex', 'Like', "Female")->get();
        $test = $FE->count();

        return $test;
    }
    public function male()
    {
        $FE = Student::where('sex', 'Like', "Male")->get();
        $test = $FE->count();

        return $test;
    }
    public function RC()
    {
        $RC = Student::where('religion', 'Like', "RomanCatholic")->get();
        $RCC = $RC->count();
        return $RCC;
    }
    public function BA()
    {
        $BA = Student::where('religion', 'Like', "BornAgain")->get();
        $BAC = $BA->count();
        return $BAC;
    }
    public function IG()
    {
        $IG = Student::where('religion', 'Like', "Iglesia")->get();
        $IGG = $IG->count();
        return $IGG;
    }
    public function PRR()
    {
        $PR = Student::where('religion', 'Like', "Prefer not to say")->get();
        $PRR = $PR->count();
        return $PRR;
    }
    public function cvs()
    {
        $RC = Student::where('cvs', 'Like', "Single")->get();
        $BA = Student::where('cvs', 'Like', "Married")->get();
        $IG = Student::where('cvs', 'Like', "Seperated")->get();
        $PR = Student::where('cvs', 'Like', "Prefer not to say")->get();

        $RCC = $RC->count();
        $BAC = $BA->count();
        $IGG = $IG->count();
        $PRR = $PR->count();

        $data = [
            $RCC,
            $BAC,
            $IGG,
            $PRR,
        ];

        return $data;
    }
    public function single()
    {
        $RC = Student::where('cvs', 'Like', "Single")->get();
        $RCC = $RC->count();
        return $RCC;
    }
    public function married()
    {
        $BA = Student::where('cvs', 'Like', "Married")->get();
        $BAC = $BA->count();
        return $BAC;
    }
    public function sep()
    {
        $IG = Student::where('cvs', 'Like', "Seperated")->get();
        $IGG = $IG->count();
        return $IGG;
    }
    public function pref()
    {
        $PR = Student::where('cvs', 'Like', "Prefer not to say")->get();
        $PRR = $PR->count();
        return $PRR;
    }
}