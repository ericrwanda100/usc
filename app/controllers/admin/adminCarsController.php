<?php

namespace app\controllers\admin;

use app\models\adminCars;
use system\library\Controller;

class adminCarsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCars()
    {
        $adminCars = new adminCars();
        $responce = $adminCars->getCars();
        return responce(json_encode($responce), 200);
    }
    public function addItem()
    {
        $model = input('model');
        $address = input('address');
        $price = input('price');
        $phone = input('phone');
        $image = input('image');
        $images = input('images');
        $adminCars = new adminCars();
        $addItem = $adminCars->addItem($model, $address, $price, $phone, $images, $image);
        if ($addItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Car was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Car was not saved";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateItem()
    {
        $id = input('id');
        $model = input('model');
        $address = input('address');
        $price = input('price');
        $phone = input('phone');
        $image = input('image');
        $images = input('images');
        $adminCars = new adminCars();
        $updateItem = $adminCars->updateItem($id, $model, $address, $price, $phone, $images, $image);
        if ($updateItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Car was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Car was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteItem($id)
    {
        $adminCars      = new adminCars();
        $deleteItem     = $adminCars->deleteItem($id);
        if ($deleteItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Car was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Car was not deleted";
            responce(json_encode($responce), 404);
        }
    }
};
