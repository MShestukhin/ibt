<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;
/**
 * Class Company
 *
 * @package App
 * @property string $name
 * @property text $description
*/
class Company extends Eloquent
{
    use SoftDeletes;

    protected $fillable = ['name', 'description'];
    protected $hidden = [];
    
    
    
}
