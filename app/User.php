<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
     public function shoes()
    {
        return $this->hasMany(Shoe::class);
    }
    
    function favorites()
    {
        return $this->belongsToMany(Shoe::class, 'favorites','user_id', 'shoe_id' )->withTimestamps();
    }
    
     public function loadRelationshipCounts()
    {
        $this->loadCount(['shoes', 'favorites']);
    }
    
    public function favorite($shoeId)
    {
        // すでにフェイバリットしているかの確認
        $exist = $this->is_favorites($shoeId);
        // 相手が自分自身かどうかの確認

        if($exist) {
           
            return false;
        } else {
            
            $this->favorites()->attach($shoeId);
            return true;
        }
    }
    
      public function unfavorite($shoeId)
    {
        // すでにフェイバリットしているかの確認
        $exist = $this->is_favorites($shoeId);
        // 相手が自分自身かどうかの確認

        if ($exist) {
            // すでにフェイバリットしていればフェイバリットを外す
        $this->favorites()->detach($shoeId);
            return true;
        } else {
            // 未アンフェイバリットであれば何もしない
            return false;
        }
    }
     public function is_favorites($shoeId)
    {
        // フェイバリット中ユーザの中に $userIdのものが存在するか
        return $this->favorites()->where('shoe_id',$shoeId)->exists();
    }
}    

