<?php

class SignupController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {}

    public function registerAction()
    {
        $user = new Users();

        // Store and check for errors
        $success = $user->save(
            $this->request->getPost(),
            [
                "name",
                "email",
            ]
        );

        if ($success) {
            echo "Thanks you for signing up!";
        } else {
            echo "Oops, seems like the following issues were encountered: ";

            $messages = $user->getMessages();

            foreach ($messages as $message) {
                echo $message->getMessage(), "<br/>";
            }
        }

        $this->view->disable();
    }
}

