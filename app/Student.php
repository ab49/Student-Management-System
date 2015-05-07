<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model {

	//
	protected $fillable = ['name','email'];

	public function studentinfo(){
        return $this->hasOne('App\Studentinfo'); // this matches the Eloquent model
    }

}
