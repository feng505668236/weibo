<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [//可以被批量查询和复制的字段
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [//显示时进行隐藏的密码等
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


    //4步 1.为gravatar方法设置size = 默认100,2:使用$this->attributes['email']获取到用户邮箱
    //3.使用trim剔除了邮箱前后的空白内容,4.用strtolower将邮箱转化为小写,5。使用md5加密小写邮箱
    //6.将转码后的邮箱于链接，尺寸拼接成完成url返回
    public function gravatar($size = '100')
    {
        $hash= md5(strtolower(trim($this->attributes['email'])));
        return "http://www.gravatar.com/avatar/$hash?s=$size";
    }
}
