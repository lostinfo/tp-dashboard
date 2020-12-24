<?php


namespace app\Model;


use think\Model;

class User extends Model
{
    protected $name = 'users';

    protected $hidden = [
        'password',
    ];
}
