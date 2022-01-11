<?php

namespace app\controllers\site;

use system\library\Controller;

class PagesController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array('name' => "Welcome to Page");
        return $this->render("site", "Pages/notFound.twig", $data);
    }
    public function contactNow()
    {
        $Firstname = input('Firstname');
        $Lastname = input('Lastname');
        $email = input('email');
        $message = input('message');
        $subject = input('subject');

        // the email where the message is sent
        $to = "leonardremy3030@gmail.com";
        // The email subject
        $subject = $subject;
        // The message to be sent
        $txt = "Firstnames: " . $Firstname . " " . $Lastname . "\n" .
            "Email: " . $email . "\n" .
            "Message: " . $message;
        // Email headers
        $headers = "From: " . $email;
        if (mail($to, $subject, $txt, $headers)) {
            $data['status'] = 'ok';
            $data['message'] = 'Your message was sent';
            echo responce(json_encode($data), 202);
        } else {
            $data['status'] = 'bad';
            $data['message'] = 'Your message was not sent';
            echo responce(json_encode($data), 202);
        }
    }
    public function store()
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update($id)
    {
    }

    public function destroy($id)
    {
    }
};
