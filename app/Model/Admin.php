<?php


namespace app\Model;


use think\Model;

class Admin extends Model
{
    protected $name = 'admins';

    protected $hidden = [
        'password',
    ];
}
