<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UsersAcess;

class Users extends Model
{
	protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [ 
    	'name', 'email', 'active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];


    protected $appends = ['acessos', 'status_str'];


    public function getAcessosAttribute()
    {
    	return UsersAcess::where('users_id', $this->id)->count();
    }
    public function getStatusStrAttribute()
    {
    	return empty($this->active) ? "Inativo" : 'Ativo';
    }

}
