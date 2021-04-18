<?php

    // put this file inside the server dir of the project

    $pass="2021"; # enter the desired password here

              # eg $pass="1234";

    echo password_hash($pass,PASSWORD_DEFAULT);

    // run this file 
    // localhost/path_to_the_file/pass_gen.php 
    // copy the out put and replce the password hash in the db that is you have a new password