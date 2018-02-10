<?php

 ob_start();

 session_start();

 require_once 'dbconnect.php';

 // if session is not set this will redirect to login page

 if( !isset($_SESSION['person']) ) {

  header("Location: index.php");
  exit;
 }

 // select logged-in users detail
 $res=mysqli_query($conn, "SELECT * FROM user WHERE `user_id`=".$_SESSION['person']);
 $userRow=mysqli_fetch_array($res, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome - <?php echo $userRow['email']; ?></title>
<link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script
    src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha256-k2WSCIexGzOj3Euiig+TlR8gA0EmPjuc79OEeY5L45g="
    crossorigin="anonymous"></script>   
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

  <nav class="navbar navbar-inverse navbar-fixed-top"><!--Here we make a navbar-->
      <div class="container-fluid">
        <div class="navbar-header"><!--Now we want the navbar to be like buttom when we let the width of our page small  -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="  #bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="glyphicon glyphicon-menu-hamburger"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="https://evergreen-ils.org/wp-content/uploads/2013/04/Nuvola_apps_bookcase.svg_.png" class="brand" width="60" height="35"></a>
        </div>
  
      <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <div class="col-lg-7" style="margin-top: 15px;">
            <div class="input-group">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
                </span>
                <input type="text" class="form-control" placeholder="Search for...">
            </div>
        </div>

          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="logout.php?logout">

<div class="btn btn-danger">Logout</div></a>
            </li>
          </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
           <?php

              $sql = "SELECT ISBN_code ,title , media_type,image,short_desciption,publish_date,status FROM media where media_type = 'CD'";
    
                $result = $conn->query($sql);//$result = mysqli_query($mysqli,$sql)
                if (!$result) {
                  echo "sql query failed";
              } 

              $rows=$result->fetch_all(MYSQLI_ASSOC);
              echo "<div class='container' style='margin-top:75px;'><h1>Media CD Info</h1><table class='table table-hover'><thead><tr><th>ISBN code</th><th>title</th><th>media_type</th><th>image</th><th>short_description</th><th>publish date</th><th>status</th></tr></thead><tbody>";
            foreach($rows as $row){
              echo "<tr><td>";
                echo $row['ISBN_code'];
                echo "</td><td>";
                echo $row['title'];
                echo "</td><td>";
                echo $row['media_type'];
                echo "</td><td>";
                echo "<img src='";
                echo $row['image'];
                echo "' width='75'></td>";
                echo "<td>";
                echo $row['short_desciption'];
                echo "</td><td>";
                echo $row['publish_date'];
                echo "</td><td>";
                echo $row['status'];
                echo "</td></tr>";

            }
              echo "</tbody></table></div>";
              ?>

              
              <?php
              $sql2 = "SELECT ISBN_code ,title , media_type,image,short_desciption,publish_date,status FROM media where media_type = 'DVD'";
    
                $result = $conn->query($sql2);//$result = mysqli_query($mysqli,$sql)
                if (!$result) {
                  echo "sql query failed";
              } 

              $rows=$result->fetch_all(MYSQLI_ASSOC);
              echo "<div class='container'><h1>Media DVD Info</h1><table class='table table-hover'><thead><tr><th>ISBN code</th><th>title</th><th>media_type</th><th>image</th><th>short_description</th><th>publish date</th><th>status</th></tr></thead><tbody>";
            foreach($rows as $row){
              echo "<tr><td>";
                echo $row['ISBN_code'];
                echo "</td><td>";
                echo $row['title'];
                echo "</td><td>";
                echo $row['media_type'];
                echo "</td><td>";
                echo "<img src='";
                echo $row['image'];
                echo "' width='75'></td>";
                echo "<td>";
                echo $row['short_desciption'];
                echo "</td><td>";
                echo $row['publish_date'];
                echo "</td><td>";
                echo $row['status'];
                echo "</td></tr>";

            }
              echo "</tbody></table></div>";
              ?>

              
              <?php

              $sql3 = "SELECT media.ISBN_code ,media.title , media.media_type,media.image,media.short_desciption,media.publish_date,media.status FROM media 
                 where media_type = 'book'";
                 /*
                 "SELECT media.ISBN_code ,media.title , media.media_type,media.image,media.short_desciption,media.publish_date,media.status,author.first_name,author.last_name,publisher.name FROM media INNER JOIN 
                author on media.fk_author = author.author_id
                INNER JOIN publisher on media.fk_publisher = publisher.publisher_id
                 where media_type = 'book'"
                 */
    
                $result = $conn->query($sql3);//$result = mysqli_query($conn,$sql)
                if (!$result) {
                  echo "sql query failed";
              } 

              $rows=$result->fetch_all(MYSQLI_ASSOC);
              echo "<div class='container'><h1>Media Books Info</h1><table class='table table-hover'><thead><tr><th>ISBN code</th><th>title</th><th>media_type</th><th>image</th><th>short_description</th><th>publish date</th><th>status</th></tr></thead><tbody>";
            foreach($rows as $row){
              echo "<tr><td>";
                echo $row['ISBN_code'];
                echo "</td><td>";
                echo $row['title'];
                echo "</td><td>";
                echo $row['media_type'];
                echo "</td><td>";
                echo "<img src='";
                echo $row['image'];
                echo "' width='75'></td>";
                echo "<td>";
                echo $row['short_desciption'];
                echo "</td><td>";
                echo $row['publish_date'];
                echo "</td><td>";
                echo $row['status'];
                echo "</td></tr>";

            }
              echo "</tbody></table></div>";

           ?>
</body>

</html>

<?php ob_end_flush(); ?>
Type a message...