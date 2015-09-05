<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Request extends Model {

	protected $fillable = [
	'url',
	'numberOfRequests',
	'body',
	'totalTime',
	'individualTime'
	];
	
}
