<?php

include '<config/db_connect.php';

class User
{

    public $username = 'mike';
    private $email = 'ironmike@gmail.com';

    public function __construct($username, $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public function addFriend()
    {
        return "$this->email added a new friend";
    }

    // getters
    public function getEmail()
    {
        return $this->email;
    }


    // setters
    public function setEmail($email)
    {
        if (strpos($email, '@') > -1)
            $this->email = $email;
    }
}

// extends is used to inherit from the class User
class AdminUser extends User
{

    public $level;

    public function __construct($username, $email, $level)
    {
        $this->level = $level;
        parent::__construct($username, $email);
    }
}

$userOne = new User('tyson', 'ironmike@gmail.com');
$userTwo = new User('ferari', 'speed@rari.com');
$userThree = new AdminUser('jane', 'janedee@sanbox.com', 5);

$userOne->setEmail('tron.ton.com');

echo $userThree->username . '<br>';
echo $userThree->getEmail() . '<br>';
echo $userThree->level;
