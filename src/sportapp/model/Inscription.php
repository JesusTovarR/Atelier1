<?php
/**
 * Created by PhpStorm.
 * User: dano
 * Date: 16/11/16
 * Time: 08:53 PM
 */

namespace sportapp\model;

use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $table ='inscription';
    protected $primaryKey = 'id';

    protected $fillable = ['date_ins','id_e'];

    public function participants(){
        return $this->hasMany(Participant::class,'');
    }

}