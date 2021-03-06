<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Participante extends Model {

	//
        /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'participantes';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'documento',
        'tipoDocumento',
        'nombre',
        'apellido',
        'sexo' , 
        'telefono',
        'correo',
        'lugarNacimiento',
        'fechaNacimiento',
        'observaciones',
        'tipo',
        'establecimiento_id'
        ];


    public function asistente(){

       return $this->hasMany('App\Asistente');
    }

    public function establecimiento(){
       return $this->belongsTo('App\Establecimiento');
    }

    public function investigador(){

        return $this->hasOne('App\Investigador');
    }

    /*
    * Custom functions
    */

    public function getFullNameAttribute(){

        return "$this->nombre $this->apellido";

    }

    public function scopeDocumento($query, $documento){

        if ($documento != " " ){
            $query->where('documento','like','%'.$documento.'%');
        }
    }




}
