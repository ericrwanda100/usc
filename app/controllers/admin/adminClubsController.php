<?php

namespace app\controllers\admin;

use app\models\adminClubs;
use system\library\Controller;

class adminClubsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getClubs()
    {
        $adminClubs = new adminClubs();
        $responce = $adminClubs->getClubs();
        return responce(json_encode($responce), 200);
    }
    public function addItem()
    {
        $name = input('name');
        $address = input('address');
        $email = input('email');
        $phone = input('phone');
        $entry = input('entry');
        $likes = input('likes');
        $image = input('image');
        $adminClubs = new adminClubs();
        $addItem = $adminClubs->addItem($name, $address, $email, $phone, $entry, $likes, $image);
        if ($addItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Club was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Club was not saved";
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
        $entry = input('entry');
        $likes = input('likes');
        $image = input('image');
        $adminClubs = new adminClubs();
        $updateItem = $adminClubs->updateItem($id, $name, $address, $email, $phone, $entry, $likes, $image);
        if ($updateItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Club was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Club was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteItem($id)
    {
        $adminClubs      = new adminClubs();
        $deleteItem     = $adminClubs->deleteItem($id);
        if ($deleteItem) {
            $responce['status'] = "ok";
            $responce['message'] = "Club was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Club was not deleted";
            responce(json_encode($responce), 404);
        }
    }
    public function getTopClubs()
    {
        $adminClubs = new adminClubs();
        $responce = $adminClubs->getTopClubs();
        return responce(json_encode($responce), 200);
    }
    public function getSingleClub($id)
    {
        $adminClubs = new adminClubs();
        $responce = $adminClubs->getSingleClub($id);
        return responce(json_encode($responce), 200);
    }

    // club products


    public function getClubProducts($id)
    {
        $adminClubs = new adminClubs();
        $responce = $adminClubs->getClubProducts($id);
        return responce(json_encode($responce), 200);
    }
    public function addClubProducts()
    {
        $club_id = input('club_id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $adminClubs = new adminClubs();
        $addClubProducts = $adminClubs->addClubProducts($name, $price, $image, $club_id);
        if ($addClubProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was saved";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not saved";
            return responce(json_encode($responce), 404);
        }
    }
    public function updateClubProducts()
    {
        $id = input('id');
        $name = input('name');
        $price = input('price');
        $image = input('image');
        $adminClubs = new adminClubs();
        $updateClubProducts = $adminClubs->updateClubProducts($id, $name, $price, $image);
        if ($updateClubProducts) {
            $responce['status'] = "ok";
            $responce['message'] = "Product was updated";
            return responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Product was not updated";
            return responce(json_encode($responce), 404);
        }
    }
    public function deleteClubProduct($id)
    {
        $adminClubs      = new adminClubs();
        $deleteClubProduct     = $adminClubs->deleteClubProduct($id);
        if ($deleteClubProduct) {
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
