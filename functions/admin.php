<?php

    if(isset($_POST['action'])){


        if($_POST['action']=='delete-post'){
            $id = $_POST['id'];

            $con = mysqli_connect("localhost","root","","petus");
            $sql = "DELETE FROM POST WHERE id=$id";
            if ($con->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Ndodhi nje problem: " . $con->error;
            }
        }

        if($_POST['action']=='delete-blog'){
            $id = $_POST['id'];

            $con = mysqli_connect("localhost","root","","petus");
            $sql = "DELETE FROM BLOG WHERE id=$id";
            if ($con->query($sql) === TRUE) {
                echo "success";
            } else {
                echo "Ndodhi nje problem: " . $con->error;
            }
        }

        if($_POST['action']=='deactivate-user'){
            $id = $_POST['id'];

            $con = mysqli_connect("localhost","","","petus");
            $sql = "UPDATE USER SET ROLE = 'F' WHERE id = $id";
            if ($con->query($sql) === TRUE ) {
                    echo "success";      
            } else {
                echo "Ndodhi nje problem: " . $con->error;
            }
        }
        
        if($_POST['action']=='activate-user'){
            $id = $_POST['id'];

            $con = mysqli_connect("localhost","root","","petus");
            $sql = "UPDATE USER SET ROLE = 'U' WHERE id = $id";
            if ($con->query($sql) === TRUE ) {
                    echo "success";      
            } else {
                echo "Ndodhi nje problem: " . $con->error;
            }
        }

        if($_POST['action']=='make-admin'){
            $id = $_POST['id'];

            $con = mysqli_connect("localhost","root","","petus");
            $sql = "UPDATE USER SET ROLE = 'A' WHERE id = $id";
            if ($con->query($sql) === TRUE ) {
                    echo "success";      
            } else {
                echo "Ndodhi nje problem: " . $con->error;
            }
        }

        if($_POST['action']=='remove-admin'){
            $id = $_POST['id'];

            $con = mysqli_connect("localhost","root","","petus");
            $sql = "UPDATE USER SET ROLE = 'U' WHERE id = $id";
            if ($con->query($sql) === TRUE ) {
                    echo "success";      
            } else {
                echo "Ndodhi nje problem: " . $con->error;
            }
        }


    }
?>