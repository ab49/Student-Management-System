<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Studentinfo;
use App\Student;
use Session;
use DB;

class StdinfoController extends Controller {

	public function __construct(){
		$this->middleware('auth');				//checking authorization
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$std=Studentinfo::find(1)->student;
		//$std=Student::all()->studentinfo;

			$std= DB::table('students')
            ->join('studentinfos', 'students.id', '=', 'studentinfos.student_id')
            ->select('students.name', 'students.email', 'studentinfos.*')
            ->get();
        
        	$i=0;
            foreach($std as $stds):
            	
        		$student[$i]=(array)$stds;
        		$i++;
        	endforeach;
        	
		return view('stdinfo.index')->with('student',$student);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create($id)
	{
		
		//
		//$student = DB::table('students')->select('id', 'name')->where('id',$id)->get();
		$student['header']="Add New Student Details";

		$student=Student::find($id);
		
		$std[$student->id]=$student->name;
		
		return view('stdinfo.home')->with('student',$std);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
			$rules = array(
		                'date'    => 'required',
		                'address'    => 'required|min:2',
		                'fname'    => 'required|min:2',
		                'description'    => 'required|min:2',
		            );

		            $validator = Validator::make(Input::all(), $rules);

		            // if the validator fails, redirect back to the form
		            if ($validator->fails()) {
		                return Redirect::back()
		                    ->withErrors($validator) // send back all errors to the login form
		                    ->withInput();

		                

		            } 
		            else{

		            	Studentinfo::create(Input::all());
		            	
		            	Session::flash('message', 'Successfully Updated student Information!');
            			return Redirect::to('stdinfo');
		                //return 'saved';
		            }
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		$std=Student::find($id);
		$student['header']="Student Details";
		$student = Studentinfo::where('student_id',$id)->firstOrFail();
		$student['name']=$std['name'];
		$student['email']=$std['email'];
		return view('stdinfo.show')->with('student',$student);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
		$std=Student::find($id);
		$student['header']="Edit Student";

		$student = Studentinfo::where('student_id',$id)->firstOrFail();
		$student['name']=$std['name'];
		$student['email']=$std['email'];
        // show the edit form and pass the nerd
        return View('stdinfo.edit')
            ->with('student', $student);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
				    	$rules = array(
				                    'date'    => 'required',
				                    'address'    => 'required|min:2',
				                    'fname'    => 'required|min:2',
				                    'description'    => 'required|min:2',
				                );
				            $validator = Validator::make(Input::all(), $rules);

				            // if the validator fails, redirect back to the form
				            if ($validator->fails()) {
				                return Redirect::back()
				                    ->withErrors($validator) // send back all errors to the login form
				                    ->withInput();

				                

				            } 
				            else{
								
				            	$student			 	=  	Studentinfo::find($id);
				            	$student->sex      		= 	Input::get('sex');
				                $student->date    		= 	Input::get('date');
				                $student->address    	= 	Input::get('address');
				                $student->fname    		= 	Input::get('fname');
				                $student->description   = 	Input::get('description');
				                
				                $student->save();
				                Session::flash('message', 'Successfully Updated!!');
		            			return Redirect::to('stdinfo');
				                //return 'saved';
				            }
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		$student = Student::find($id);
		$student->delete();
		Session::flash('message', 'Successfully deleted the data!');
		return Redirect::to('stdinfo');
	}

}
