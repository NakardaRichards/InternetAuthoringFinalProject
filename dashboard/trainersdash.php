<?php include_once('header.php'); ?>
<?php include_once('trainerMenu.php'); ?>

<?php


// include 'members.php';
include '../trainers.php';

$membersObj = new Members();



$trainersObj = new Trainers();

if (!isset($_SESSION['id']) || $_SESSION['id'] != true) {
    header("location: LandingPage.html");
    exit;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer <?php echo $_SESSION['username']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
</head>

<body>


    <h1 style="text-align:center; color:green;">Your Details</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone Number</th>
                <th>Hourly Fee</th>
                <th>Email</th>
                <th>Gym Name</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php

            $trainers = $trainersObj->Trainers($_POST);
            foreach ($trainers as $trainer) {
            ?>
                <tr>
                    <td><?php echo $trainer['fname'] ?></td>
                    <td><?php echo $trainer['lname'] ?></td>
                    <td><?php echo $trainer['age'] ?></td>
                    <td><?php echo $trainer['phone'] ?></td>
                    <td><?php echo $trainer['hourly_fee'] ?></td>
                    <td><?php echo $trainer['email'] ?></td>
                    <td><?php echo $trainer['gym_name'] ?></td>
                    <td><?php echo $trainer['pass'] ?></td>
                    <td>
                        <a href="traineredit.php?editId=<?php echo $trainer['id'] ?>" style="color:black">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>



</body>

</html>

<?php include_once('footer.php'); ?>