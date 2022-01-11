<?php

namespace app\models;

use system\library\DB;
use system\library\Models;
use Carbon\Carbon;

class adminAccomodations extends Models
{
    public function getAccomodations()
    {
        $data = DB::table('tb_accomodations')->where('is_deleted', '=', false)->orderBy('id', 'desc')->get();
        foreach ($data as $key => $value) {
            if ($value->gym) {
                $value->gymData = DB::table('tb_gym')->where([['hotel_id', '=', $value->id], ['is_deleted', '=', false]])->get()->first();
            }
            if ($value->pool) {
                $value->poolData = DB::table('tb_pool')->where([['hotel_id', '=', $value->id], ['is_deleted', '=', false]])->get()->first();
            }
            if ($value->hall) {
                $value->hallData = DB::table('tb_hall')->where([['hotel_id', '=', $value->id], ['is_deleted', '=', false]])->get()->first();
            }
            if ($value->restaurant) {
                $value->restaurantData = DB::table('tb_restaurant')->where([['hotel_id', '=', $value->id], ['is_deleted', '=', false]])->get()->first();
            }
        }
        return $data;
    }
    public function addItem($name, $address, $email, $phone, $image, $type, $details, $gym, $hall, $pool, $restaurant, $instagram, $facebook, $twitter)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        $accomodation = DB::table('tb_accomodations')->insertGetId(
            [
                'name' => $name,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'image' => $image,
                'type' => $type,
                'details' => $details,
                'gym' => $gym,
                'hall' => $hall,
                'pool' => $pool,
                'restaurant' => $restaurant,
                'instagram' => $instagram,
                'facebook' => $facebook,
                'twitter' => $twitter,
                'password' => password_hash($password, PASSWORD_DEFAULT),
                'created_at' => $today,
                'updated_at' => $today,
                'is_deleted' => false,
            ]
        );
        if ($accomodation && $gym) {
            DB::table('tb_gym')->insertGetId(
                [
                    'hotel_id' => $accomodation,
                    'created_at' => $today,
                    'updated_at' => $today,
                    'is_deleted' => false,
                ]
            );
        }
        if ($accomodation && $hall) {
            DB::table('tb_hall')->insertGetId(
                [
                    'hotel_id' => $accomodation,
                    'created_at' => $today,
                    'updated_at' => $today,
                    'is_deleted' => false,
                ]
            );
        }
        if ($accomodation && $pool) {
            DB::table('tb_pool')->insertGetId(
                [
                    'hotel_id' => $accomodation,
                    'created_at' => $today,
                    'updated_at' => $today,
                    'is_deleted' => false,
                ]
            );
        }
        if ($accomodation && $restaurant) {
            DB::table('tb_restaurant')->insertGetId(
                [
                    'hotel_id' => $accomodation,
                    'created_at' => $today,
                    'updated_at' => $today,
                    'is_deleted' => false,
                ]
            );
        }
        if ($accomodation) {
            return true;
        } else {
            return false;
        }
    }
    public function updateItem($id, $name, $address, $email, $phone, $image, $type, $details, $gym, $hall, $pool, $restaurant, $instagram, $facebook, $twitter)
    {
        $today = Carbon::now('+2:00');
        $accomodation = DB::table('tb_accomodations')
            ->where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'address' => $address,
                    'email' => $email,
                    'phone' => $phone,
                    'image' => $image,
                    'type' => $type,
                    'details' => $details,
                    'gym' => $gym,
                    'hall' => $hall,
                    'pool' => $pool,
                    'restaurant' => $restaurant,
                    'instagram' => $instagram,
                    'facebook' => $facebook,
                    'twitter' => $twitter,
                    'updated_at' => $today,
                ]
            );
        if ($accomodation && $gym) {
            $checkGym =  DB::table('tb_gym')->where('hotel_id', '=', $id);
            if ($checkGym->exists()) {
                DB::table('tb_gym')->where('hotel_id', '=', $id)->update(
                    [
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            } else {
                DB::table('tb_gym')->insertGetId(
                    [
                        'hotel_id' => $id,
                        'created_at' => $today,
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            }
        }
        if ($accomodation && $hall) {
            $checkHall =  DB::table('tb_hall')->where('hotel_id', '=', $id);
            if ($checkHall->exists()) {
                DB::table('tb_hall')->where('hotel_id', '=', $id)->update(
                    [
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            } else {
                DB::table('tb_hall')->insertGetId(
                    [
                        'hotel_id' => $id,
                        'created_at' => $today,
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            }
        }
        if ($accomodation && $pool) {
            $checkPool =  DB::table('tb_pool')->where('hotel_id', '=', $id);
            if ($checkPool->exists()) {
                DB::table('tb_pool')->where('hotel_id', '=', $id)->update(
                    [
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            } else {
                DB::table('tb_pool')->insertGetId(
                    [
                        'hotel_id' => $id,
                        'created_at' => $today,
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            }
        }
        if ($accomodation && $restaurant) {
            $checkRestaurant =  DB::table('tb_restaurant')->where('hotel_id', '=', $id);
            if ($checkRestaurant->exists()) {
                DB::table('tb_restaurant')->where('hotel_id', '=', $id)->update(
                    [
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            } else {
                DB::table('tb_restaurant')->insertGetId(
                    [
                        'hotel_id' => $id,
                        'created_at' => $today,
                        'updated_at' => $today,
                        'is_deleted' => false,
                    ]
                );
            }
        }
        if ($accomodation && !$gym) {
            DB::table('tb_gym')->where('hotel_id', '=', $id)->update(
                [
                    'updated_at' => $today,
                    'is_deleted' => true,
                ]
            );
        }
        if ($accomodation && !$hall) {
            DB::table('tb_hall')->where('hotel_id', '=', $id)->update(
                [
                    'updated_at' => $today,
                    'is_deleted' => true,
                ]
            );
        }
        if ($accomodation && !$pool) {
            DB::table('tb_pool')->where('hotel_id', '=', $id)->update(
                [
                    'updated_at' => $today,
                    'is_deleted' => true,
                ]
            );
        }
        if ($accomodation && !$restaurant) {
            DB::table('tb_restaurant')->where('hotel_id', '=', $id)->update(
                [
                    'updated_at' => $today,
                    'is_deleted' => true,
                ]
            );
        }
        if ($accomodation) {
            return true;
        } else {
            return false;
        }
    }
    public function deleteItem($id)
    {
        $today = Carbon::now('+2:00');
        if (
            DB::table('tb_accomodations')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
    public function getTopAccomodations()
    {
        $data = DB::table('tb_accomodations')->where('is_deleted', '=', false)->orderBy('stars', 'desc')->limit(4)->get();
        return $data;
    }
    public function getGroupedAccomodations()
    {
        $data = [];
        $data['hotels'] = DB::table('tb_accomodations')->where([['is_deleted', '=', false], ['type', '=', 'hotels']])->orderBy('id', 'desc')->get();
        $data['Guest_House'] = DB::table('tb_accomodations')->where([['is_deleted', '=', false], ['type', '=', 'Guest_House']])->orderBy('id', 'desc')->get();
        $data['apartments'] = DB::table('tb_accomodations')->where([['is_deleted', '=', false], ['type', '=', 'apartments']])->orderBy('id', 'desc')->get();
        $data['motels'] = DB::table('tb_accomodations')->where([['is_deleted', '=', false], ['type', '=', 'motels']])->orderBy('id', 'desc')->get();
        $data['resorts'] = DB::table('tb_accomodations')->where([['is_deleted', '=', false], ['type', '=', 'resorts']])->orderBy('id', 'desc')->get();
        $data['campsites'] = DB::table('tb_accomodations')->where([['is_deleted', '=', false], ['type', '=', 'campsites']])->orderBy('id', 'desc')->get();
        return $data;
    }
    public function getSingleAccomodations($id)
    {
        $data = DB::table('tb_accomodations')->where([['id', '=', $id], ['is_deleted', '=', false]])->get()->first();
        if ($data->gym) {
            $data->gymData = DB::table('tb_gym')->where([['hotel_id', '=', $data->id], ['is_deleted', '=', false]])->get()->first();
        }
        if ($data->pool) {
            $data->poolData = DB::table('tb_pool')->where([['hotel_id', '=', $data->id], ['is_deleted', '=', false]])->get()->first();
        }
        if ($data->hall) {
            $data->hallData = DB::table('tb_hall')->where([['hotel_id', '=', $data->id], ['is_deleted', '=', false]])->get()->first();
        }
        if ($data->restaurant) {
            $data->restaurantData = DB::table('tb_restaurant')->where([['hotel_id', '=', $data->id], ['is_deleted', '=', false]])->get()->first();
            $data->breakfast = DB::table('tb_hotel_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $data->restaurantData->id], ['type', '=', 'breakfast']])->orderBy('id', 'desc')->get();
            $data->lunch = DB::table('tb_hotel_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $data->restaurantData->id], ['type', '=', 'lunch']])->orderBy('id', 'desc')->get();
            $data->dinner = DB::table('tb_hotel_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $data->restaurantData->id], ['type', '=', 'dinner']])->orderBy('id', 'desc')->get();
        }
        $data->rooms = DB::table('tb_hotel_rooms')->where([['hotel_id', '=', $data->id], ['is_deleted', '=', false]])->get();
        $data->relateds = DB::table('tb_accomodations')->where([['type', '=', $data->type], ['id', '!=', $data->id], ['is_deleted', '=', false]])->orderBy('id', 'desc')->get();
        return $data;
    }
    public function updateGym($id, $images)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_gym')
            ->where('id', '=', $id)
            ->update(
                [
                    'images' => $images,
                    'updated_at' => $today,
                ]
            )
        ) {
            return true;
        } else {
            return false;
        }
    }
    public function updateHall($id, $images)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_hall')
            ->where('id', '=', $id)
            ->update(
                [
                    'images' => $images,
                    'updated_at' => $today,
                ]
            )
        ) {
            return true;
        } else {
            return false;
        }
    }
    public function updatePool($id, $images)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_pool')
            ->where('id', '=', $id)
            ->update(
                [
                    'images' => $images,
                    'updated_at' => $today,
                ]
            )
        ) {
            return true;
        } else {
            return false;
        }
    }
    public function updateRestaurant($id, $images)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_restaurant')
            ->where('id', '=', $id)
            ->update(
                [
                    'images' => $images,
                    'updated_at' => $today,
                ]
            )
        ) {
            return true;
        } else {
            return false;
        }
    }

    // hotel products


    public function getHotelProducts($id)
    {
        $data = [];
        $restaurant = DB::table('tb_restaurant')->where([['id', '=', $id], ['is_deleted', '=', false]])->get()->first();
        $data['products'] = DB::table('tb_hotel_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $id]])->orderBy('id', 'desc')->get();
        $data['hotel'] = DB::table('tb_accomodations')->where([['id', '=', $restaurant->hotel_id], ['is_deleted', '=', false]])->get()->first();
        return $data;
    }
    public function getGroupedHotelProducts($id)
    {
        $data = [];
        $restaurant = DB::table('tb_restaurant')->where([['id', '=', $id], ['is_deleted', '=', false]])->get()->first();
        $data['breakfast'] = DB::table('tb_hotel_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $id], ['type', '=', 'breakfast']])->orderBy('id', 'desc')->get();
        $data['lunch'] = DB::table('tb_hotel_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $id], ['type', '=', 'lunch']])->orderBy('id', 'desc')->get();
        $data['dinner'] = DB::table('tb_hotel_items')->where([['is_deleted', '=', false], ['restaurant_id', '=', $id], ['type', '=', 'dinner']])->orderBy('id', 'desc')->get();
        $data['hotel'] = DB::table('tb_accomodations')->where([['id', '=', $restaurant->hotel_id], ['is_deleted', '=', false]])->get()->first();
        return $data;
    }
    public function addHotelProducts($name, $price, $image, $restaurant_id, $type)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_hotel_items')->insert(
            [
                'restaurant_id' => $restaurant_id,
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
    public function updateHotelProducts($id, $name, $price, $image, $type)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_hotel_items')
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
    public function deleteHotelProduct($id)
    {
        $today = Carbon::now('+2:00');
        if (
            DB::table('tb_hotel_items')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
};
