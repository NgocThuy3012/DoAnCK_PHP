<?php
    include('./conndb.php');
    $user = (isset($_SESSION['user']))?$_SESSION['user']:[];
	if(isset($user['name'])){
    if(isset($_POST['id'])){
        $id_sp = $_POST['id'];
        $email = $_POST['email'];
        $review = $_POST['review'];
        $rating = $_POST['rating'];        
        $sql2 = "INSERT INTO `rating` (`book_id`, `email`, `star`, `review`) VALUES ('$id_sp', '$email', '$rating', '$review')";
        echo $id_sp;
        var_dump($id_sp);
        var_dump($sql2);
		$query2 = mysqli_query($conn,$sql2);
        // header('location: home.php');
    }
}else{
    header('location: login.php');
}
    
?>