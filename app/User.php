<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Todo;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // ACCESSOR & MUTATORS

    //Define value password to hashpassword
    // public function setPasswordAttribute($password)
    // {
    //     $this->attributes['password'] = bcrypt($password);
    // }

    // //Define value name to capital
    // public function getNameAttribute($name)
    // {
    //     return 'The' . ucfirst($name);
    // }

    public static function uploadAvatar($image)
    {
        $originname = $image->getClientOriginalName();
        (new self())->deleteOldImage();
        $image->storeAs('images', $originname, 'public');
        auth()->user()->update(['avatar' => $originname]);
    }

    protected function deleteOldImage()
    {
        if ($this->avatar) {
            Storage::delete('/public/images/' . $this->avatar);
        }
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
