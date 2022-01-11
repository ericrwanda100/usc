<?php

namespace app\models;

use system\library\DB;
use system\library\Models;
use Carbon\Carbon;

class adminCars extends Models
{
    public function getCars()
    {
        $data = DB::table('tb_cars')->where('is_deleted', '=', false)->orderBy('id', 'desc')->get();
        $number = 1;
        foreach ($data as $key => $value) {
            $value->number = $number;
            $number++;
        }
        return $data;
    }
    public function addItem($model, $address, $price, $phone, $images, $image)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_cars')->insert(
            [
                'model' => $model,
                'address' => $address,
                'price' => $price,
                'phone' => $phone,
                'image' => $image,
                'images' => $images,
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
    public function updateItem($id, $model, $address, $price, $phone, $images, $image)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_cars')
            ->where('id', '=', $id)
            ->update(
                [
                    'model' => $model,
                    'address' => $address,
                    'price' => $price,
                    'phone' => $phone,
                    'image' => $image,
                    'images' => $images,
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
            DB::table('tb_cars')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
};
