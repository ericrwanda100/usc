<?php

namespace app\controllers\admin;

use app\models\adminAccomodations;
use system\library\Controller;

class adminAccomodationsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAccomodations()
    {
        $adminAccomodations = new adminAccomodations();
        $responce = $adminAccomodations->getAccomodations();
        return responce(json_encode($responce), 200);
    }
    public function addItem()
    {
        $name = input('name');
        $address = input('address');
        $email = input('email');
        $phone = input('phone');
        $image = input('image');
        $type = input('type');
        $details = input('details');
        $gym = input('gym');
        $hall = input('hall');
        $pool = input('pool');
        $restaurant = input('restaurant');
        $instagram = input('instagram');
        $facebook = input('facebook');
        $twitter = input('twitter');
        $adminAccomodations = new adminAccomodations();
        $addItem = $adminAccomodations->addItem($name, $address, $email, $phone, $image, $type, $details, $gym, $hall, $pool, $restaurant, $instagram, $facebook, $twitter);
        if ($addItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Accomodation was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Accomodation was not saved";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateItem()
    {
        $id = input('id');
        $name = input('name');
        $address = input('address');
        $email = input('email');
        $phone = input('phone');
        $image = input('image');
        $type = input('type');
        $details = input('details');
        $gym = input('gym');
        $hall = input('hall');
        $pool = input('pool');
        $restaurant = input('restaurant');
        $instagram = input('instagram');
        $facebook = input('facebook');
        $twitter = input('twitter');
        $adminAccomodations = new adminAccomodations();
        $updateItem = $adminAccomodations->updateItem($id, $name, $address, $email, $phone, $image, $type, $details, $gym, $hall, $pool, $restaurant, $instagram, $facebook, $twitter);
        if ($updateItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Accomodation was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Accomodation was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteItem($id)
    {
        $adminAccomodations      = new adminAccomodations();
        $deleteItem     = $adminAccomodations->deleteItem($id);
        if ($deleteItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Accomodation was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Accomodation was not deleted";
            responce(json_encode($responce), 404);
        }
    }
    public function getTopAccomodations()
    {
        $adminAccomodations = new adminAccomodations();
        $responce = $adminAccomodations->getTopAccomodations();
        return responce(json_encode($responce), 200);
    }
    public function getGroupedAccomodations()
    {
        $adminAccomodations = new adminAccomodations();
        $responce = $adminAccomodations->getGroupedAccomodations();
        return responce(json_encode($responce), 200);
    }
    public function getSingleAccomodations($id)
    {
        $adminAccomodations = new adminAccomodations();
        $responce = $adminAccomodations->getSingleAccomodations($id);
        return responce(json_encode($responce), 200);
    }
    public function updateGym()
    {
        $id = input('id');
        $images = input('images');
        $adminAccomodations = new adminAccomodations();
        $updateGym = $adminAccomodations->updateGym($id, $images);
        if ($updateGym) {
            $responce['status'] = "ok";
            $responce['message'] = "Gym was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Gym was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateHall()
    {
        $id = input('id');
        $images = input('images');
        $adminAccomodations = new adminAccomodations();
        $updateHall = $adminAccomodations->updateHall($id, $images);
        if ($updateHall) {
            $responce['status'] = "ok";
            $responce['message'] = "Hall was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Hall was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function updatePool()
    {
        $id = input('id');
        $images = input('images');
        $adminAccomodations = new adminAccomodations();
        $updatePool = $adminAccomodations->updatePool($id, $images);
        if ($updatePool) {
            $responce['status'] = "ok";
            $responce['message'] = "Pool was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Pool was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateRestaurant()
    {
        $id = input('id');
        $images = input('images');
        $adminAccomodations = new adminAccomodations();
        $updateRestaurant = $adminAccomodations->updateRestaurant($id, $images);
        if ($updateRestaurant) {
            $responce['status'] = "ok";
            $responce['message'] = "Restaurant was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Restaurant was not updated";
            return responce(json_encode($responce), 404);
        }
    }

    // hotel products


    public function getHotelProducts($id)
    {
        $adminAccomodations = new adminAccomodations();
        $responce = $adminAccomodations->getHotelProducts($id);
        return responce(json_encode($responce), 200);
    }
    public function getGroupedHotelProducts($id)
    {
        $adminAccomodations = new adminAccomodations();
        $responce = $adminAccomodations->getGroupedHotelProducts($id);
        return responce(json_encode($responce), 200);
    }
    public function addHotelProducts()
    {
        $restaurant_id = input('restaurant_id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $type = input('type');
        $adminAccomodations = new adminAccomodations();
        $addHotelProducts = $adminAccomodations->addHotelProducts($name, $price, $image, $restaurant_id, $type);
        if ($addHotelProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not saved";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateHotelProducts()
    {
        $id = input('id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $type = input('type');
        $adminAccomodations = new adminAccomodations();
        $updateHotelProducts = $adminAccomodations->updateHotelProducts($id, $name, $price, $image, $type);
        if ($updateHotelProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteHotelProduct($id)
    {
        $adminAccomodations      = new adminAccomodations();
        $deleteHotelProduct     = $adminAccomodations->deleteHotelProduct($id);
        if ($deleteHotelProduct) {
            $responce['status'] = "ok";
            $responce['message'] = "Products was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Products was not deleted";
            responce(json_encode($responce), 404);
        }
    }
};
