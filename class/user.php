<?php
include_once './db/configClass.php';
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new DB();
        $this->db = $this->db->connect();
    }
    public function userdata() {
       
        $first_name = $_POST['first_name'];
            if ($_POST['first_name']) {
            $first_name = filter_input(INPUT_POST, 'first_name', FILTER_SANITIZE_STRING);
        }
        $last_name=$_POST['last_name'];
            if ($_POST['last_name']) {
            $last_name = filter_input(INPUT_POST, 'last_name', FILTER_SANITIZE_STRING);
        }
        $adress=$_POST['adress'];
            if ($_POST['adress']) {
            $adress = filter_input(INPUT_POST, 'adress', FILTER_SANITIZE_STRING);
        }
        $email= $_POST['email'];
            if ($_POST['email']) {
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
            }
        $zip_code = $_POST['post_code'];
            if ($_POST['post_code']) {
            $zip_code = filter_input(INPUT_POST, 'post_code', FILTER_SANITIZE_STRING);
        }
        $telephone=$_POST['phone'];
            if ($_POST['phone']) {
            $phone_num = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
        }

        $state= $_POST['state'];
            if ($_POST['state']) {
            $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
        }
        $country= $_POST['country'];
            if ($_POST['country']) {
            $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        }

        // query to insert data of users in database
        try {
            $sql = 'INSERT INTO users (first_name, last_name, email, adress, post_code, state, country, telephone) VALUES ("'.$first_name.'", "'.$last_name.'", "'.$email.'", "'.$adress.'", "'.$zip_code.'", "'.$state.'", "'.$country.'", "'.$telephone.'")';
            //insert data to database
            // echo $sql;
            $stmt = $this->db->prepare($sql);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        } finally {
            $this->db = null;
        }
        
    }

    
}

?>