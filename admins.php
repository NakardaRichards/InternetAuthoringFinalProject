<?php

if (!isset($_SESSION)) {
    session_start();
}






class Admins
{

    private $servername = "localhost";
    private $username   = "root";
    private $password   = "";
    private $database   = "content";
    public  $con;


    public function
    __construct()
    {


        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_errno());
        } else {

            return $this->con;
        }
    }
    public function adminSignup($post)
    {



        $fname = $this->con->real_escape_string($_POST['fname']);
        $lname = $this->con->real_escape_string($_POST['lname']);
        $password = $this->con->real_escape_string($_POST['pass']);
        $email = $this->con->real_escape_string($_POST['email']);
        $location = $this->con->real_escape_string($_POST['location']);
        $time_slot = $this->con->real_escape_string($_POST['time_slot']);
        $cost_per_month = $this->con->real_escape_string($_POST['cost_per_month']);
        $gym_name = $this->con->real_escape_string($_POST['gym_name']);
        $message = $this->con->real_escape_string($_POST['message']);





        $query = "INSERT INTO admins(fname,lname,email,gym_name,pass,location,time_slot,cost_per_month,message) VALUES('$fname','$lname','$email','$gym_name','$password','$location', '$time_slot', '$cost_per_month','$message')";
        $sql = $this->con->query($query);

        if ($sql == true) {
            $_SESSION['username'] = $fname;
            $_SESSION['gym_name'] = $gym_name;

            header("Location:adminlogin.php");
        } else {
            echo "Failed to signup gym!";
        }
    }
    public function updateData($postData)
    {

        $fname = $this->con->real_escape_string($_POST['ufname']);
        $lname = $this->con->real_escape_string($_POST['ulname']);
        $email = $this->con->real_escape_string($_POST['uemail']);
        $location = $this->con->real_escape_string($_POST['ulocation']);
        $time_slot = $this->con->real_escape_string($_POST['utime_slot']);
        $gym_name = $this->con->real_escape_string($_POST['ugym_name']);
        $cost_per_month = $this->con->real_escape_string($_POST['ucost_per_month']);
        $id = $this->con->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE admins SET fname = '$fname', lname = '$lname', email = '$email',location = '$location', time_slot = '$time_slot', gym_name = '$gym_name', cost_per_month = '$cost_per_month' WHERE id = '{$_SESSION['id']}' ";
            $sql = $this->con->query($query);
            if ($sql == true) {
                header("Location:index.php");
            } else {
                echo "Data update failed try again!";
            }
        }
    }



    public function adminloginData($post)
    {
        $email = $this->con->real_escape_string($_POST['email']);

        $password = $this->con->real_escape_string($_POST['pass']);

        $query = "SELECT * FROM admins WHERE email ='$email' && pass ='$password'";


        $result = $this->con->query($query);
        $row = $result->fetch_assoc();

        if ($result->num_rows > 0) {

            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $row['fname'];
            $_SESSION['gym_name'] = $row['gym_name'];
            $_SESSION['class'] = $row['class'];

            header("Location:dashboard/index.php");
            // header("Location:admin.php");


        } else {
            echo "Login failed!";
        }
    }


    public function displayGymDetails($post)
    {


        $query = "SELECT * FROM admins WHERE id = '{$_SESSION['id']}'";
        $result = $this->con->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No Data found";
        }
    }





    public function addTrainer($post)
    {
        $fname = $this->con->real_escape_string($_POST['fname']);
        $lname = $this->con->real_escape_string($_POST['lname']);
        $age = $this->con->real_escape_string($_POST['age']);
        $phone = $this->con->real_escape_string($_POST['phone']);
        $hourly_fee = $this->con->real_escape_string($_POST['hourly_fee']);
        $email = $this->con->real_escape_string($_POST['email']);
        $password = $this->con->real_escape_string($_POST['pass']);
        $gym_name = $this->con->real_escape_string($_POST['gym_name']);
        $query = "INSERT INTO trainers(fname,lname,age,phone,hourly_fee,email,pass,gym_name) VALUES('$fname','$lname','$age','$phone','$hourly_fee','$email','$password','$gym_name')";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:alltrainers.php");
        } else {
            echo "Trainer was not assigned, try again!";
        }
    }

    public function deleteTrainer($id)
    {
        $query = "DELETE FROM trainers WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:dashboard/alltrainers.php");
        } else {
            echo "The trainer was not deleted try again";
        }
    }

    public function deleteMessage($id)
    {
        $query = "DELETE FROM message WHERE id = '$id'";
        $sql = $this->con->query($query);
        if ($sql == true) {
            header("Location:dashboard/gymEnquires.php");
        } else {
            echo "The message was not deleted try again";
        }
    }


    public function Trainers($post)
    {
        $query = "SELECT * FROM trainers WHERE gym_name = '{$_SESSION['gym_name']}'";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {

            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No Data found";
        }
    }


    public function postMessage($post)
    {

        $gym_name = $this->con->real_escape_string($_POST['gym_name']);

        $message = $this->con->real_escape_string($_POST['message']);
        $query = "UPDATE admins SET message = '$message' WHERE id = '{$_SESSION['id']}' ";
        $sql = $this->con->query($query);

        if ($sql == true) {
            header("Location:dashboard/index.php");
        } else {
            echo "Failed to post message. Try again";
        }
    }



    public function displayMessage($post)
    {
        $query = "SELECT message FROM admins WHERE gym_name = '{$_SESSION['gym_name']}'";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {

            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No Message found";
        }
    }

    public function adminDetails($post)
    {
        $query = "SELECT * FROM admins WHERE gym_name = '{$_SESSION['gym_name']}'";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {

            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No Data found";
        }
    }
    public function viewMessage($post)
    {
        $query = "SELECT * FROM message WHERE gym_name = '{$_SESSION['gym_name']}'";
        $result = $this->con->query($query);

        if ($result->num_rows > 0) {

            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "No Message found";
        }
    }
}
