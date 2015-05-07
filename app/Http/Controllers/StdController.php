<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Student;
use Session;


class StdController extends Controller {

	public function __construct(){
		$this->middleware('auth');			//checking authorization
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		//return \Auth::User();
		$student= Student::all();
		return view('std.index')->with('student',$student);
			
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		$student['header']="Add New Student";
		return view('std.home')->with('student',$student);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		//
		//return 'the game is back';
		//return \Redirect::route('home')
		     // ->with('message', 'Thanks for contacting us!');
		/*
		$v = Validator::make($request->all(), [
		        'name' => 'required|min:2',
		        'email' => 'required|email',
		        'message' => 'required',
		    ]);

		    if ($v->fails())
		    {
		        //return 'game';
		        return redirect()->back()->withErrors($v->errors());
		    }
		   */
		    $rules = array(
		                'name'    => 'required|min:2',
		                'email' => 'required|email',
		                
		            );

		            $validator = Validator::make(Input::all(), $rules);

		            // if the validator fails, redirect back to the form
		            if ($validator->fails()) {
		                return Redirect::back()
		                    ->withErrors($validator) // send back all errors to the login form
		                    ->withInput();

		                

		            } 
		            else{
		            	Student::create(Input::all());
		            	//$student             = 	Input::all();
		            	//dd($student);
		            	/*print_r($student);
		            	$student			 =  new Student;
		                $student->name       = 	Input::get('name');
		                $student->email      = 	Input::get('email');
		                $student->message    = 	Input::get('message');*/
		                
		                //$student->save();
		                Session::flash('message', 'Successfully created student!');
            			return Redirect::to('std');
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
		$student['header']="Student Details";
		$student = Student::find($id);
		return view('std.show')->with('student',$student);
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
		$student = Student::find($id);
		$student['header']="Edit Student";

        // show the edit form and pass the nerd
        return View('std.edit')
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
				                'name'    => 'required|min:2',
				                'email' => 'required|email',
				            );

				            $validator = Validator::make(Input::all(), $rules);

				            // if the validator fails, redirect back to the form
				            if ($validator->fails()) {
				                return Redirect::back()
				                    ->withErrors($validator) // send back all errors to the login form
				                    ->withInput();

				                

				            } 
				            else{
				            	
				            	$student			 =  Student::find($id);
				                $student->name       = 	Input::get('name');
				                $student->email      = 	Input::get('email');
				                
				                $student->save();
				                Session::flash('message', 'Successfully Updated!!');
		            			return Redirect::to('std');
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
		return Redirect::to('std');
	}

}
