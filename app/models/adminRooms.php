<?php

namespace app\models;

use system\library\DB;
use system\library\Models;
use Carbon\Carbon;

class adminRooms extends Models
{
    public function getRooms($id)
    {
        $data = DB::table('tb_hotel_rooms')->where([['is_deleted', '=', false], ['hotel_id', '=', $id]])->orderBy('id', 'desc')->get();
        return $data;
    }
    public function addItem($hotel_id, $name, $price, $images, $description, $features, $media, $amenities, $other_images)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_hotel_rooms')->insert(
            [
                'hotel_id' => $hotel_id,
                'name' => $name,
                'price' => $price,
                'images' => $images,
                'other_images' => $other_images,
                'description' => $description,
                'features' => $features,
                'media' => $media,
                'amenities' => $amenities,
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
    public function updateItem($id, $name, $price, $images, $description, $features, $media, $amenities, $other_images)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_hotel_rooms')
            ->where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'price' => $price,
                    'images' => $images,
                    'other_images' => $other_images,
                    'description' => $description,
                    'features' => $features,
                    'media' => $media,
                    'amenities' => $amenities,
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
            DB::table('tb_hotel_rooms')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
    public function getTopRooms()
    {
        $data = DB::table('tb_hotel_rooms')->where('is_deleted', '=', false)->orderBy('likes', 'desc')->limit(4)->get();
        return $data;
    }
};
