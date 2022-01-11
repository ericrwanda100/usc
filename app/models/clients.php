<?php

namespace app\models;

use system\library\DB;
use system\library\Models;
use Carbon\Carbon;

class clients extends Models
{
    public function checkLogin($email, $password)
    {
        $today = Carbon::now('+2:00');
        $checkUser = DB::table('tb_clients')->where([
            ['email', '=', $email], ['is_deleted', '=', false]
        ]);
        $user_exists = $checkUser->exists();
        if ($user_exists) {
            $data = DB::table('tb_clients')->where([
                ['email', '=', $email]
            ])->get()->first();
            $hashed_password = $data->password;
            if (password_verify($password, $hashed_password)) {
                return $data;
            }
        } else {
            return null;
        }
    }
    public function setToken($newToken, $loggedInId)
    {
        if (DB::table('tb_clients')
            ->where([['id', '=', $loggedInId]])
            ->update(['token' => $newToken])
        ) {
            return $newToken;
        }
        return null;
    }
    public function validateToken($token)
    {
        $user = DB::table('tb_clients')->where([['token', '=', $token], ['is_deleted', '=', false]]);
        if ($user->exists()) {
            return $user->get()->first();
        }
        return false;
    }
    public function checkEmail($email)
    {
        $user = DB::table('tb_clients')->where([['email', '=', $email], ['is_deleted', '=', false]]);
        if ($user->exists()) {
            return $user;
        }
        return false;
    }
    public function getClients()
    {
        $data = DB::table('tb_clients')->where('is_deleted', '=', false)->orderBy('id', 'desc')->get();
        return $data;
    }
    public function addClient($firstname, $lastname, $email, $image, $gender, $phone, $address, $password, $type)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_clients')->insert(
            [
                'firstname' => $firstname,
                'lastname' => $lastname,
                'email' => $email,
                'image' => $image,
                'gender' => $gender,
                'phone' => $phone,
                'address' => $address,
                'type' => $type,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => $today,
                'updated_at' => $today,
                'is_deleted' => false,
            ]
        )) {
            return true;
        } else {
            return false;
        }
    }
    public function updateClient($id, $firstname, $lastname, $email, $image, $gender, $phone, $address)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_clients')
            ->where('id', '=', $id)
            ->update(
                [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'image' => $image,
                    'gender' => $gender,
                    'phone' => $phone,
                    'address' => $address,
                    'updated_at' => $today,
                ]
            )
        ) {
            return true;
        } else {
            return true;
        }
    }
    public function deleteClient($id)
    {
        $today = Carbon::now('+2:00');
        if (
            DB::table('tb_clients')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
};
