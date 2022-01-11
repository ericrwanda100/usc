<?php

namespace app\controllers\admin;

use app\models\adminRooms;
use system\library\Controller;

class adminRoomsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRooms($id)
    {
        $adminRooms = new adminRooms();
        $responce = $adminRooms->getRooms($id);
        return responce(json_encode($responce), 200);
    }
    public function addItem()
    {
        $hotel_id = input('hotel_id');
        $name = input('name');
        $price = input('price');
        $images = input('images');
        $other_images = input('other_images');
        $description = input('description');
        $features = input('features');
        $media = input('media');
        $amenities = input('amenities');
        $adminRooms = new adminRooms();
        $addItem = $adminRooms->addItem($hotel_id, $name, $price, $images, $description, $features, $media, $amenities, $other_images);
        if ($addItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Room was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Room was not saved";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateItem()
    {
        $id = input('id');
        $name = input('name');
        $price = input('price');
        $images = input('images');
        $other_images = input('other_images');
        $description = input('description');
        $features = input('features');
        $media = input('media');
        $amenities = input('amenities');
        $adminRooms = new adminRooms();
        $updateItem = $adminRooms->updateItem($id, $name, $price, $images, $description, $features, $media, $amenities, $other_images);
        if ($updateItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Room was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Room was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteItem($id)
    {
        $adminRooms      = new adminRooms();
        $deleteItem     = $adminRooms->deleteItem($id);
        if ($deleteItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Room was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Room was not deleted";
            responce(json_encode($responce), 404);
        }
    }
};
