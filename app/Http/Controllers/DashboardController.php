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

class DashboardController extends Controller {

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
			$std= DB::table('students')
            ->join('studentinfos', 'students.id', '=', 'studentinfos.student_id')
            ->select('students.name', 'students.email', 'studentinfos.*')
            ->get();
        
        	//$student=0;
        	
        	$boundary=array(
        				'8'=>0,
        				'12'=>0,
        				'18'=>0,
        				'60'=>0
        				);
        	foreach($std as $stds):
            	$list=explode('-',$stds->date);
            	foreach($boundary as $key=>$value):
            		if((date('Y')-$list[0])<$key) {
            			$boundary[$key]++;
            		}

            	endforeach;
           endforeach;
        	//dd($boundary);
		return view('dashboard.index')->with('student',$boundary);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
	}

}
