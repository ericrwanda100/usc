<?php

namespace app\models;

use system\library\DB;
use system\library\Models;
use Carbon\Carbon;

class adminRestaurants extends Models
{
    public function getRestaurants()
    {
        $data = DB::table('tb_restaurants')->where('is_deleted', '=', false)->orderBy('id', 'desc')->get();
        return $data;
    }
    public function addItem($name, $address, $email, $phone, $image)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_restaurants')->insert(
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
        if (DB::table('tb_restaurants')
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
            DB::table('tb_restaurants')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }


    // restaurant products


    public function getRestaurantProducts($id)
    {
        $data = [];
        $data['products'] = DB::table('tb_restaurant_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $id]])->orderBy('id', 'desc')->get();
        $data['restaurant'] = DB::table('tb_restaurants')->where([['id', '=', $id], ['is_deleted', '=', false]])->get()->first();
        return $data;
    }
    public function addRestaurantProducts($name, $price, $image, $restaurant_id)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_restaurant_items')->insert(
            [
                'restaurant_id' => $restaurant_id,
                'name' => $name,
                'price' => $price,
                'image' => $image,
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
    public function updateRestaurantProducts($id, $name, $price, $image)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_restaurant_items')
            ->where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'price' => $price,
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
    public function deleteRestaurantProduct($id)
    {
        $today = Carbon::now('+2:00');
        if (
            DB::table('tb_restaurant_items')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
};
