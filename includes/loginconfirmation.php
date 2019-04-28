<?php

if (isset($_POST['login'])) {


$email = $_POST['emaillog'];
$password=md5($_POST['passworddb']);
include 'db.php';
$email=mysqli_real_escape_string($connection, $email);
$query = "SELECT * FROM utilisateurs WHERE email='{$email}' and password = '{$password}'";
$select_user_query = mysqli_query($connection, $query);


if (!$select_user_query) {
DIE("QUERY FAILED". mysqli_error($connection));
}
$row = mysqli_fetch_array($select_user_query);

$user_id = $row['id'];
$user_email = $row['email'];
$user_password = $row['password'];
$user_firstname= $row['firstname'];
$user_lastname= $row['lastname'];
$user_address= $row['address'];
$user_city= $row['city'];
$user_country= $row['country'];
$user_role = $row['role'];


if ($email !== $user_email && $password !== $user_password) {
echo "<div class='center-align meh'>
  <h5 class='red-text'>les informations ne sont pas correctes..</h5>
</div>";
}



else{
  if($user_role == 'admin'){

    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    $_SESSION['city'] = $user_city;
    $_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'admin';
    $_SESSION['logged_in']= 'True';
    echo "<meta http-equiv='refresh' content='0;url=http://localhost/Smarts/admin/index' />";
  }
  elseif($user_role == 'Superviseur') {
    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    $_SESSION['city'] = $user_city;
    $_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['role'] = 'Superviseur';
    $_SESSION['logged_in']= 'True';
    echo "<meta http-equiv='refresh' content='0;url=http://localhost/Smarts/Superviseur/index' />";
    }
    elseif($user_role == 'ResponsableClient') {
      $_SESSION['id'] = $user_id;
      $_SESSION['firstname'] = $user_firstname;
      $_SESSION['lastname'] = $user_lastname;
      $_SESSION['address'] = $user_address;
      $_SESSION['city'] = $user_city;
      $_SESSION['country'] = $user_country;
      $_SESSION['email'] = $user_email;
      $_SESSION['role'] = 'ResponsableClient';
      $_SESSION['logged_in']= 'True';
      echo "<meta http-equiv='refresh' content='0;url=http://localhost/Smarts/ResponsableClient/index' />";
      }
    else {
    $_SESSION['id'] = $user_id;
    $_SESSION['firstname'] = $user_firstname;
    $_SESSION['lastname'] = $user_lastname;
    $_SESSION['address'] = $user_address;
    $_SESSION['city'] = $user_city;
    $_SESSION['country'] = $user_country;
    $_SESSION['email'] = $user_email;
    $_SESSION['logged_in']= 'True';
    $back = $_SERVER['HTTP_REFERER'];
    echo '<meta http-equiv="refresh" content="0;url=' . $back . '">';
    }
 }
}

?>
