<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    public function getUsers($login = false)
{
    if ($login === false)
    {
        return $this->findAll();
    }

    return $this->asArray()
                ->where(['login' => $login])
                ->first();
}
}