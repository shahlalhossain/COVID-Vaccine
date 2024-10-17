<?php

namespace App\Services;

use App\Exceptions\GeneralException;
use App\Models\User;
use Exception;

class UserService extends BaseService
{
    public function store(array $data = []) : User
    {
        try {
            $user           = new User();
            $user->name     = $data['name'];
            $user->nid      = $data['nid'];
            $user->mobile   = $data['mobile'];
            $user->email    = $data['email'];
            $user->save();

            return $user;
        } catch (Exception $exception) {
            throw new GeneralException(__('There was a technical problem on registration. Please try again.'.$exception->getMessage()));
        }
    }
}
