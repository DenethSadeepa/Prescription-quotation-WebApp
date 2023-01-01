<?php

class User
{
    private $_db,
        $_data,
        $_sessionName,
        $_cookieName,
        $_isLoggedIn;

    public function __construct($user = null)
    {
        $this->_db = Database::getDbInstance();

        if (!$user) {
            if (isset($_SESSION['uid'])) {
                $user = $_SESSION['uid'];
                if ($this->find($user)) {
                    $this->_isLoggedIn = true;
                }
            } else {
                return false;
            }
        } else {
            $this->find($user);
        }
    }

    public function find($user = null)
    {
        if ($user) {

            // $data = $this->_db->get('users', array($field, '=', $user));
            $data = $this->_db->get("Select * from users where id = :user", [
                'user' => $user
            ]);


            if (count($data)) {
                $this->_data = $data;
                return true;
            }
        }
    }

    public function findByEmail($user = null)
    {
        if ($user) {

            // $data = $this->_db->get('users', array($field, '=', $user));
            $data = $this->_db->query("Select * from users where email = $user");

            if ($data->count()) {
                $this->_data = $data->first();
                return true;
            }
        }
    }

    public function isLoggedIn()
    {
        return $this->_isLoggedIn;
    }
}
