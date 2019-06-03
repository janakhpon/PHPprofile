<?php
if(isset($_POST["Submit"])){
  $name = $_POST["PostTitle"];
  $Image     = $_FILES["Image"]["name"];
  $Target    = "uploads/".basename($_FILES["Image"]["name"]);
  if(empty($name)){
    $_SESSION["ErrorMessage"]= "Title Cant be empty";
    Redirect_to("index.php");
  }else{
    // Query to insert Post in DB When everything is fine
    global $ConnectingDB;
    $sql = "INSERT INTO posts(datetime,title,category,author,image,post)";
    $sql .= "VALUES(:dateTime,:postTitle,:categoryName,:adminName,:imageName,:postDescription)";
    $stmt = $ConnectingDB->prepare($sql);
    $stmt->bindValue(':dateTime',$DateTime);
    $stmt->bindValue(':postTitle',$PostTitle);
    $stmt->bindValue(':categoryName',$Category);
    $stmt->bindValue(':adminName',$Admin);
    $stmt->bindValue(':imageName',$Image);
    $stmt->bindValue(':postDescription',$PostText);
    $Execute=$stmt->execute();
    move_uploaded_file($_FILES["Image"]["tmp_name"],$Target);
    if($Execute){
      $_SESSION["SuccessMessage"]="Post with id : " .$ConnectingDB->lastInsertId()." added Successfully";
      Redirect_to("AddNewPost.php");
    }else {
      $_SESSION["ErrorMessage"]= "Something went wrong. Try Again !";
      Redirect_to("AddNewPost.php");
    }
  }
} //Ending of Submit Button If-Condition
 ?>