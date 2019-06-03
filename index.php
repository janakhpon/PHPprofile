<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>profile</title>
</head>

<body>



    <div class="container">


        <form method="post" action="insert.php" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Your name here ">

            </div>


            <div class="input-group">
                <div class="custom-file">
                    <input type="File" name="Image" class="custom-file-input" id="inputGroupFile04" value="">
                    <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                </div>
            </div>
            <hr>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>



    <div class="container">

        <?php

        $conn = mysqli_connect("localhost", "root", "", "profile");
        $sql = "SELECT * FROM profile";
        if ($result = mysqli_query($conn, $sql)) {

            if (mysqli_num_rows($result) > 0) {

                while ($row = mysqli_fetch_array($result)) {
                    $id = $row['id'];
                    $username = $row['name'];
                    $Image = $row['image'];
                    $display = <<<DELIMITER

            <div class="card" style="width: 18rem;">
            
            <img src="Uploads/$Image" class="card-img-top" >
            <div class="card-body">
                <p class="card-text">$username</p>
                <h4>$id</h4>
            </div>
        </div>

DELIMITER;


                    echo $display;
                }
            } else {
                echo '<div class="alert alert-warning">nothing on list! Sorry</div>';
                exit;
            }
        } else {
            echo '<div class="alert alert-warning">An error occured!</div>';
            exit;
            //    echo "ERROR: Unable to excecute: $sql." . mysqli_error($link);
        }

        ?>




    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>