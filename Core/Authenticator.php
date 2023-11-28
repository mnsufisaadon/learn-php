<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator {

    public function attempt($email, $password)
    {
        // if no error, check user email

        $db = App::resolve(Database::class);

        $user = $db->query('select * from users where email = :email', [
            'email' => $email,
        ])->find();

        // if email already exist, check password



        if ($user) {

            if (password_verify($password, $user['password'])) {
                
                $this->login([
                    'email' => $email,
                ]);
                
                return true;
            }

        }

        // if email not exist, attempt fail;

        return false;

    }


    public function login($user)
    {
    
        $_SESSION['user'] = $user;
    
        session_regenerate_id();
    }

}