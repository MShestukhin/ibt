<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;
/**
 * Class Role
 *
 * @package App
 * @property string $title
*/
class Role extends Eloquent
{
    protected $fillable = ['title'];
    protected $hidden = []; 
}
