<?php

namespace app\models;

use system\library\DB;
use system\library\Models;
use Carbon\Carbon;

class adminCoffee extends Models
{
    public function getCoffees()
    {
        $data = DB::table('tb_shops')->where('is_deleted', '=', false)->orderBy('id', 'desc')->get();
        return $data;
    }
    public function addItem($name, $address, $email, $phone, $image)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_shops')->insert(
            [
                'name' => $name,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'image' => $image,
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
    public function updateItem($id, $name, $address, $email, $phone, $image)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_shops')
            ->where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'address' => $address,
                    'email' => $email,
                    'phone' => $phone,
                    'image' => $image,
                    'updated_at' => $today,
                ]
            )
        ) {
            return true;
        } else {
            return true;
        }
    }
    public function deleteItem($id)
    {
        $today = Carbon::now('+2:00');
        if (
            DB::table('tb_shops')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }


    // club products


    public function getCoffeeProducts($id)
    {
        $data = [];
        $data['products'] = DB::table('tb_coffee_items')->where([['is_deleted', '=', false], ['coffee_id', '=', $id]])->orderBy('id', 'desc')->get();
        $data['coffee'] = DB::table('tb_shops')->where([['id', '=', $id], ['is_deleted', '=', false]])->get()->first();
        return $data;
    }
    public function addCoffeeProducts($name, $price, $image, $coffee_id, $type)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_coffee_items')->insert(
            [
                'coffee_id' => $coffee_id,
                'name' => $name,
                'price' => $price,
                'image' => $image,
                'type' => $type,
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
    public function updateCoffeeProducts($id, $name, $price, $image, $type)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_coffee_items')
            ->where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'price' => $price,
                    'image' => $image,
                    'type' => $type,
                    'updated_at' => $today,
                ]
            )
        ) {
            return true;
        } else {
            return true;
        }
    }
    public function deleteCoffeeProduct($id)
    {
        $today = Carbon::now('+2:00');
        if (
            DB::table('tb_coffee_items')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
};
