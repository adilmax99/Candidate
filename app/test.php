<?php 
use Rap2hpoutre\FastExcel\FastExcel;
use App\Candidate;


/**
 * 
 */
class ClassName extends AnotherClass
{
	

}
// Load users
$users = Candidate::all();

// Export all users
$collection = (new FastExcel)->import('file.xlsx');
$collection = (new FastExcel)->configureCsv(';', '#', '\n', 'gbk')->import('file.csv');


 ?>