<?php

namespace shop\controllers;

use shop\models\User;
use shop\services\SessionService;
use shop\services\UserService;

class UserController extends BaseController
{
    public function registrationAction()
    {
        if (count($_POST) > 0) {
            $errors = array();
            $name = $this->getValue('name', $_POST);
            $lastname = $this->getValue('lastname', $_POST);
            $email = $this->getValue('email', $_POST);
            $password = $this->getValue('password', $_POST);
            if (!$this->isValidName($name)) {
                $errors[] = 'Имя должно содержать только буквы и иметь длину не более 50 символов';
            }
            if (!$this->isValidLastname($lastname)) {
                $errors[] = 'Фамилия должна содержать только буквы и иметь длину не более 50 символов';
            }
            if (!$this->isValidEmail($email)) {
                $errors[] = 'Не корректный email';
            }
            if (!$this->isValidPassword($password)) {
                $errors[] = 'Слабый пароль';
            }

            if (count($errors) > 0) {
                $this->render(
                    'user/registration',
                    [
                        'errors' => $errors
                    ]
                );
            } else {
                $userModel = new User();
                $userId = $userModel->saveUser(
                    [
                        'name' => $name,
                        'lastname' => $lastname,
                        'email' => $email,
                        'password' => $password
                    ]
                );

                if ($userId) {
                    UserService::login($email);
                    header('location: index.php');
                }
            }
        } else {
            $this->render('user/registration');
        }
    }

    public function loginAction()
    {
        if (count($_POST) > 0) {
            $email = $this->getValue('email', $_POST);
            $password = $this->getValue('password', $_POST);
            $errors = [];
            if (!$this->isValidEmail($email)) {
                $errors[] = 'Не корректный email';
            }
            if (!$this->isValidPassword($password)) {
                $errors[] = 'Не корректный пароль';
            }

            if (count($errors) === 0) {
                $userModel = new User();
                $user = $userModel->getUserByEmail($email);
                if (!$user) {
                    $errors[] = 'Пользователь с таким email-ом не найден';
                } else {
                    if ($user['password'] === $password) {
                        UserService::login($email);
                        header('location: index.php');
                    } else {
                        $errors[] = 'Не правильный пароль';
                    }
                }
            }
            $this->render('user/login', ['errors' => $errors]);
        } else {
            $this->render('user/login');
        }
    }

    public function logoutAction()
    {
        UserService::logout();
        header('location: index.php');
    }

    public function indexAction()
    {
        echo SessionService::getInstance()->getValue('login') ? 'Текущий юзер: ' . SessionService::getInstance()->getValue('login') : 'Вы не авторизовались!';
    }

    public function profileAction()
    {
        $email = SessionService::getInstance()->getValue('login'); // получаем e-mail из сессии
        $userModel = new User();
        $user = $userModel->getUserByEmail($email); // получаем массив со всеми данными конкретного юзера
//        echo '<pre>';
//        print_r($user);exit;
        $name = $user['name'];
        $lastname = $user['lastname'];
        if ($email) {
            echo 'Привет, ' . $name . ' ' . $lastname . '! Твой e-mail: ' . $email . '.';
        } else {
            header('location: index.php?r=user/login');
        }
    }

    protected function isValidName($name)
    {
        $nameLength = strlen($name);
        if ($nameLength < 2 || $nameLength > 50) {
            return false;
        }

        if (!preg_match('/[a-zA-Z]+$/', $name)) {
            return false;
        }

        return true;
    }

    protected function isValidLastname($lastname)
    {
        $lastnameLength = strlen($lastname);
        if ($lastnameLength < 2 || $lastnameLength > 50) {
            return false;
        }

        return true;
    }

    protected function isValidEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    protected function isValidPassword($password)
    {
        $passwordLength = strlen($password);
        if ($passwordLength < 8) {
            return false;
        }

        return true;
    }
}