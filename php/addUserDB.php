<?php
include "header.php";
        if (isset($_POST['submit'])) {
            $kaydet = $conn2->prepare("INSERT into user set
            password=:password,
            birthDate=:birthDate,
            gender=:gender,
            isAdmin=:isAdmin,
            userName =:userName,
            userSurname =:userSurname,
            userGSM =:userGSM,
            userGSM_2 =:userGSM_2,
            userEmail =:userEmail
            ");

            $insert = $kaydet->execute(array(
                'password' => $_POST['password'],
                'birthDate' => $_POST['birthDate'],
                'gender' => $_POST['gender'],
                'isAdmin' => $_POST['isAdmin'],
                'userName' => $_POST['userName'],
                'userSurname' => $_POST['userSurname'],
                'userGSM' => $_POST['userGSM'],
                'userGSM_2' => $_POST['userGSM_2'],
                'userEmail' => $_POST['userEmail']
                // 'userEmail' => htmlspecialchars($_POST['userEmail']),

            ));
            if ($insert) {
                Header("Location:addUser.php?userSign=Successfull");
                exit;
            } else {
                Header("Location:addUser.php?userSign=Fail");
                exit;
            }
        }
        ?>