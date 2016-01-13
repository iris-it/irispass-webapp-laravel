<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Licence extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'licences';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'price', 'outlet_number'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [''];

    /*
     * Relations
     */

    public function organizations()
    {
        return $this->hasMany('App\Organization');
    }
}
