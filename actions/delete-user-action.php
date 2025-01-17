<?php
    include "../classes/User.php";

    #Create an instance of the class
    $user = new User;

    $user->delete();  //call the delete function