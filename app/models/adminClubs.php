<?php

namespace app\models;

use system\library\DB;
use system\library\Models;
use Carbon\Carbon;

class adminClubs extends Models
{
    public function getClubs()
    {
        $data = DB::table('tb_clubs')->where('is_deleted', '=', false)->orderBy('id', 'desc')->get();
        return $data;
    }
    public function addItem($name, $address, $email, $phone, $entry, $likes, $image)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_clubs')->insert(
            [
                'name' => $name,
                'address' => $address,
                'email' => $email,
                'phone' => $phone,
                'entry' => $entry,
                'likes' => $likes,
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
    public function updateItem($id, $name, $address, $email, $phone, $entry, $likes, $image)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_clubs')
            ->where('id', '=', $id)
            ->update(
                [
                    'name' => $name,
                    'address' => $address,
                    'email' => $email,
                    'phone' => $phone,
                    'entry' => $entry,
                    'likes' => $likes,
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
            DB::table('tb_clubs')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
    public function getTopClubs()
    {
        $data = DB::table('tb_clubs')->where('is_deleted', '=', false)->orderBy('likes', 'desc')->limit(4)->get();
        return $data;
    }
    public function getSingleClub($id)
    {
        $data = DB::table('tb_clubs')->where([['id', '=', $id], ['is_deleted', '=', false]])->get()->first();
        $data->products = DB::table('tb_club_items')->where([['club_id', '=', $id], ['is_deleted', '=', false]])->orderBy('id','desc')->get();
        return $data;
    }


    // club products

    
    public function getClubProducts($id)
    {
        $data = [];
        $data['products'] = DB::table('tb_club_items')->where([['is_deleted', '=', false], ['club_id', '=', $id]])->orderBy('id', 'desc')->get();
        $data['club'] = DB::table('tb_clubs')->where([['id', '=', $id], ['is_deleted', '=', false]])->get()->first();
        return $data;
    }
    public function addClubProducts($name, $price, $image, $club_id)
    {
        $today = Carbon::now('+2:00');
        $password = 123;
        if (DB::table('tb_club_items')->insert(
            [
                'club_id' => $club_id,
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
    public function updateClubProducts($id, $name, $price, $image)
    {
        $today = Carbon::now('+2:00');
        if (DB::table('tb_club_items')
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
    public function deleteClubProduct($id)
    {
        $today = Carbon::now('+2:00');
        if (
            DB::table('tb_club_items')->where('id', '=', $id)->update(['is_deleted' => true, 'deleted_at' => $today])
        ) {
            return true;
        }
    }
};
