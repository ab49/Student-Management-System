<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentinfo extends Model {

	//
	protected $fillable = ['student_id','sex','fname','address','description','date'];


	public function student(){
        return $this->belongsTo('App\Student','student_id','id'); // this matches the Eloquent model
    }

}
