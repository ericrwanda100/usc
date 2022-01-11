<?php

namespace app\controllers\admin;

use app\models\adminCoffee;
use system\library\Controller;

class adminCoffeeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCoffees()
    {
        $adminCoffee = new adminCoffee();
        $responce = $adminCoffee->getCoffees();
        return responce(json_encode($responce), 200);
    }
    public function addItem()
    {
        $name = input('name');
        $address = input('address');
        $email = input('email');
        $phone = input('phone');
        $image = input('image');
        $adminCoffee = new adminCoffee();
        $addItem = $adminCoffee->addItem($name, $address, $email, $phone, $image);
        if ($addItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Coffee was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Coffee was not saved";
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
        $adminCoffee = new adminCoffee();
        $updateItem = $adminCoffee->updateItem($id, $name, $address, $email, $phone, $image);
        if ($updateItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Coffee was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Coffee was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteItem($id)
    {
        $adminCoffee      = new adminCoffee();
        $deleteItem     = $adminCoffee->deleteItem($id);
        if ($deleteItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Coffee was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Coffee was not deleted";
            responce(json_encode($responce), 404);
        }
    }

    // coffee products


    public function getCoffeeProducts($id)
    {
        $admincoffee = new admincoffee();
        $responce = $admincoffee->getCoffeeProducts($id);
        return responce(json_encode($responce), 200);
    }
    public function addCoffeeProducts()
    {
        $coffee_id = input('coffee_id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $type = input('type');
        $admincoffee = new admincoffee();
        $addCoffeeProducts = $admincoffee->addCoffeeProducts($name, $price, $image, $coffee_id, $type);
        if ($addCoffeeProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not saved";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateCoffeeProducts()
    {
        $id = input('id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $type = input('type');
        $admincoffee = new admincoffee();
        $updateCoffeeProducts = $admincoffee->updateCoffeeProducts($id, $name, $price, $image, $type);
        if ($updateCoffeeProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteCoffeeProduct($id)
    {
        $admincoffee      = new admincoffee();
        $deleteCoffeeProduct     = $admincoffee->deleteCoffeeProduct($id);
        if ($deleteCoffeeProduct) {
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
