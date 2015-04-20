<?php

if($data->func === 'user.auth') {
    try {

        $user = UserQuery::create()
            ->filterByLogin($data->data->login)
            ->findOne();


        
        if($from->userObj = $user) {

            $from->user = array_change_key_case($user->toArray(), CASE_LOWER);

                        			if(password_verify($data->data->password, $from->user['password'])) {

                                    //$from->user['password'] = null;


                
                        				$from->send(json_encode([
                                            'callback' => $data->callback,
                        					'status' => 'ok',
                        					'data' => ''
                        				]));

                        			}  else {
                $from->send(json_encode([
                    'callback' => $data->callback,
                    'status' => 'error',
                    'error_type' => 'login',
                    'data' => ''
                ]));
            }
        } else {
            $from->send(json_encode([
                    'callback' => $data->callback,
                    'status' => 'error',
                    'error_type' => 'pass',
                    'data' => ''
            ]));
        }

    } catch(Exception $e) {
        var_dump($e->getMessage());

        $from->send(json_encode([
                'callback' => $data->callback,
                'status' => 'error',
                'error_type' => '',
                'data' => ''
        ]));
    }
} else if($data->func === 'user.reg'){
    try {
        //if(isset($data->data->login) && $data->data->login) {
            $pass = password_hash($data->data->password, PASSWORD_BCRYPT, ['cost'=>8]);
            $user = new User();
            $user->setLogin($data->data->login);
            $user->setFirstName($data->data->name);
            $user->setEmail($data->data->email);
            $user->setPassword($pass);
            $user->setBackground('/images/0.jpg');

            if ($user->validate()) {
                $user->save();

                $from->send(json_encode([
                    'callback' => $data->callback,
                    'status' => 'ok',
                    'data' => ''
                ]));
            } else {
                $errors = [];
                foreach ($user->getValidationFailures() as $failure) {
                    $errors[$failure->getPropertyPath()] = $failure->getMessage();
                }

                $from->send(json_encode([
                    'callback' => $data->callback,
                    'status' => 'error',
                    'errors' => $errors,
                    'data' => ''
                ]));
            }
        
        //}

    } catch(Exception $e) {
        var_dump($e->getMessage());

        $from->send(json_encode([
                'callback' => $data->callback,
                'status' => 'error',
                'error_type' => '',
                'data' => ''
        ]));
    }

}