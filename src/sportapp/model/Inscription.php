<?php
/**
 * Created by PhpStorm.
 * User: dano
 * Date: 16/11/16
 * Time: 08:53 PM
 */

namespace sportnet\model;

use Illuminate\Database\Eloquent\Model;

class inscription extends Model
{
    protected $table ='inscription';
    protected $primaryKey = 'id';

    protected $fillable = ['date_ins','id_e'];

    public function participants(){
        return $this->hasMany(Participant::class,'');
    }

}