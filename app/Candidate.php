<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\FromCollection;
use App\Candidate;

class Candidate extends Model
{
	use SoftDeletes;
	protected $dates = ['deleted_at'];
	protected $guarded = [];
    protected $fillable = ['fullName', 'email', 'contactNo', 'city', 'education', 'gender', 'address'];
}