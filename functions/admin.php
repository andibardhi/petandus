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

        if($_POST['action']=='delete-user'){
            $id = $_POST['id'];

            $con = mysqli_connect("localhost","root","","petus");
            $sql1 = "DELETE FROM PROFIL WHERE userId=$id";
            $sql2 = "DELETE FROM USER WHERE id=$id";
            if ($con->query($sql1) === TRUE && $con->query($sql2)=== TRUE) {
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