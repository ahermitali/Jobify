<?php
namespace App\Models; 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobs extends Model
{
    use HasFactory;

    protected $table = 'company_jobs';

    protected $fillable = [
        'jobtitle', 'salary', 'location', 'qualification', 
        'category', 'responsibilities', 'jobdesc', 
        'companyname', 'company_location', 'website', 'companydescription'
    ];

    protected $casts = [
        'responsibilities' => 'array', // If stored as JSON
    ];
}
