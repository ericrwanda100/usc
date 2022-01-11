<?php

namespace app\controllers\site;

use app\models\clients;
use system\library\Controller;
use system\library\Cookies;

class clientsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function clientLogin()
    {
        $email        = input('email');
        $password     = input('password');
        $clients         = new clients();
        Cookies::delete('client_logged_data');
        $checkLogin = $clients->checkLogin($email, $password);
        if ($checkLogin) {
            Cookies::add('client_logged_data', json_encode($checkLogin), 10);
            $loggedInId = $checkLogin->id;
            $newToken = getToken($length = 200, $type = 'string');
            $token = $clients->setToken($newToken, $loggedInId);
            $responce['status'] = "ok";
            $responce['message'] = "You are successfully logged in";
            $responce['user'] = $checkLogin;
            $responce['user_token'] = $newToken;
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Email or password are not correct,Try again";
            responce(json_encode($responce), 200);
        }
    }
    public function validateToken()
    {
        $token = input('token');
        $clients         = new clients();
        $validateToken     = $clients->validateToken($token);
        if ($validateToken) {
            $responce['status'] = 'ok';
            $responce['validateToken'] = $validateToken;
            $responce['message'] = "The Token is valid";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = 'bad';
            $responce['validateToken'] = $validateToken;
            $responce['message'] = "The Token is not valid";
            responce(json_encode($responce), 200);
        }
    }
    public function getClients()
    {
        $clients = new clients();
        $responce = $clients->getClients();
        return responce(json_encode($responce), 200);
    }
    public function addClient()
    {
        $firstname = input('firstname');
        $lastname = input('lastname');
        $email = input('email');
        $image = input('image');
        $gender = input('gender');
        $phone = input('phone');
        $address = input('address');
        $password = input('password');
        $type = 'checkin';
        $clients = new clients();
        if ($clients->checkEmail($email)) {
            $responce['status'] = "bad";
            $responce['message'] = "Email Already used by another account";
            return responce(json_encode($responce), 200);
        } else {
            $addClient = $clients->addClient($firstname, $lastname, $email, $image, $gender, $phone, $address, $password, $type);
            if ($addClient) {
                Cookies::delete('client_logged_data');
                $checkLogin = $clients->checkLogin($email, $password);
                if ($checkLogin) {
                    Cookies::add('client_logged_data', json_encode($checkLogin), 10);
                    $loggedInId = $checkLogin->id;
                    $newToken = getToken($length = 200, $type = 'string');
                    $token = $clients->setToken($newToken, $loggedInId);
                    $responce['status'] = "ok";
                    $responce['message'] = "You are now registered";
                    $responce['user'] = $checkLogin;
                    $responce['user_token'] = $newToken;
                    responce(json_encode($responce), 202);
                } else {
                    $responce['status'] = "bad";
                    $responce['message'] = "Whoops! something went wrong, try again";
                    return responce(json_encode($responce), 200);
                }
            } else {
                $responce['status'] = "bad";
                $responce['message'] = "data was not saved";
                return responce(json_encode($responce), 200);
            }
        }
    }
    public function updateClient()
    {
        $clients = new clients();
        $token = input('token');
        $client = $clients->validateToken($token);
        if ($client) {
            $firstname = input('firstname');
            $lastname = input('lastname');
            $email = input('email');
            $image = input('image');
            $gender = input('gender');
            $phone = input('phone');
            $address = input('address');
            $updateClient = $clients->updateClient($client->id, $firstname, $lastname, $email, $image, $gender, $phone, $address);
            if ($updateClient) {
                $responce['status'] = "ok";
                $responce['message'] = "data was updated";
                return responce(json_encode($responce), 202);
            } else {
                $responce['status'] = "bad";
                $responce['message'] = "data was not updated";
                return responce(json_encode($responce), 200);
            }
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "Something went wrong";
            return responce(json_encode($responce), 200);
        }
    }
    public function deleteClient($id)
    {
        $clients      = new clients();
        $deleteClient     = $clients->deleteClient($id);
        if ($deleteClient) {
            $responce['status'] = "ok";
            $responce['message'] = "account was deleted";
            responce(json_encode($responce), 202);
        } else {
            $responce['status'] = "bad";
            $responce['message'] = "account was not deleted";
            responce(json_encode($responce), 200);
        }
    }
};
