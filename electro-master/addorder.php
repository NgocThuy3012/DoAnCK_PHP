<?php
    session_start();
    include('./conndb.php');
    include('./lienhe.php');
    if(isset($_POST['order'])&&($_POST['order'])){
        //lay du lieu tu form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $tel = $_POST['tel'];
       
        $sql='SELECT count(`order_id`) as so FROM `order`';
		$result=mysqli_query($conn,$sql);
        // var_dump($result);
		while($row=mysqli_fetch_assoc($result)){
            $n=$row['so'];
        };
       
        $id_ord = "d".$n;
        //insert vao table
        $sqlord = "INSERT INTO `order` (`order_id`, `email`, `consignee_name`, `consignee_add`, `consignee_phone`, `status`) VALUES ('$id_ord', '$email', '$name', '$address', '$tel', '0');";
		$queryord = mysqli_query($conn,$sqlord);
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){                                 
            for($i = 0; $i < sizeof($_SESSION['giohang']); $i++){
                $thanhtien = $_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                $book_id = $_SESSION['giohang'][$i][4];
                $quantity = $_SESSION['giohang'][$i][3];
                $price = $_SESSION['giohang'][$i][2];
                $sql1 = "INSERT INTO `order_detail` (`order_id`, `book_id`, `quantity`, `price`) VALUES ('$id_ord', '$book_id', '$quantity', '$price')";
		        $query1 = mysqli_query($conn,$sql1);
            }
        }
        GuiMail($email,$name);
        unset($_SESSION['giohang']);
        header('location: home.php');   
    }
?>