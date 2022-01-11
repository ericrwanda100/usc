<?php

namespace app\controllers\admin;

use app\models\adminRestaurants;
use system\library\Controller;

class adminRestaurantsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getRestaurants()
    {
        $adminRestaurants = new adminRestaurants();
        $responce = $adminRestaurants->getRestaurants();
        return responce(json_encode($responce), 200);
    }
    public function addItem()
    {
        $name = input('name');
        $address = input('address');
        $email = input('email');
        $phone = input('phone');
        $image = input('image');
        $adminRestaurants = new adminRestaurants();
        $addItem = $adminRestaurants->addItem($name, $address, $email, $phone, $image);
        if ($addItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Restaurant was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Restaurant was not saved";
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
        $adminRestaurants = new adminRestaurants();
        $updateItem = $adminRestaurants->updateItem($id, $name, $address, $email, $phone, $image);
        if ($updateItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Restaurant was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Restaurant was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteItem($id)
    {
        $adminRestaurants      = new adminRestaurants();
        $deleteItem     = $adminRestaurants->deleteItem($id);
        if ($deleteItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Restaurant was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Restaurant was not deleted";
            responce(json_encode($responce), 404);
        }
    }

    // Restaurant products


    public function getRestaurantProducts($id)
    {
        $adminRestaurants = new adminRestaurants();
        $responce = $adminRestaurants->getRestaurantProducts($id);
        return responce(json_encode($responce), 200);
    }
    public function addRestaurantProducts()
    {
        $restaurant_id = input('restaurant_id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $adminRestaurants = new adminRestaurants();
        $addRestaurantProducts = $adminRestaurants->addRestaurantProducts($name, $price, $image, $restaurant_id);
        if ($addRestaurantProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not saved";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateRestaurantProducts()
    {
        $id = input('id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $adminRestaurants = new adminRestaurants();
        $updateRestaurantProducts = $adminRestaurants->updateRestaurantProducts($id, $name, $price, $image);
        if ($updateRestaurantProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteRestaurantProduct($id)
    {
        $adminRestaurants      = new adminRestaurants();
        $deleteRestaurantProduct     = $adminRestaurants->deleteRestaurantProduct($id);
        if ($deleteRestaurantProduct) {
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
