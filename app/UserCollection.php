<?php
/**
 * Created by PhpStorm.
 * User: qing
 * Date: 2018-12-11
 * Time: 23:09
 */

namespace App;


use Illuminate\Database\Eloquent\Collection;

class UserCollection extends Collection
{
    public function areAllVerified()
    {
        return $this->filter->isVerified()->count() === $this->count();
    }
}