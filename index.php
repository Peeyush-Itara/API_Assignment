<html>   
  <head>   
    <title>Registred User</title>   
    <link rel="stylesheet"  
    href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">   
    <style>   
    table {  
        border-collapse: collapse;  
    }  
        .inline{   
            display: inline-block;   
            float: right;   
            margin: 20px 0px;   
        }   
         
        input, button{   
            height: 34px;   
        }   
  
    .pagination {   
        display: inline-block;   
    }   
    .pagination a {   
        font-weight:bold;   
        font-size:18px;   
        color: black;   
        float: left;   
        padding: 8px 16px;   
        text-decoration: none;   
        border:1px solid black;   
    }   
    .pagination a.active {   
            background-color: pink;   
    }   
    .pagination a:hover:not(.active) {   
        background-color: skyblue;   
    }   
        </style>   
  </head>   
  <body>   
  <center>  
    <?php  
      
    // Import the file where we defined the connection to Database.     
        $conn=mysqli_connect("localhost","root","root","api");   
        
        $page=$_GET["page"];
        if ($page="" || $page="1") {
        	$page1=0;
        }
        else{
        	$page1=($page*3)-3;
        }

        $query = "SELECT * FROM signup LIMIT $page1,3";     
        $res = mysqli_query ($conn, $query);    
    ?>    
  
    <div class="container">   
      <br>   
      <div>   
        <h1>Registered Users</h1>   
        
        <table class="table table-striped table-condensed    
                                          table-bordered">   
          <thead>   
            <tr>     
              <th>Name</th>   
              <th>Email</th>   
              <th>Mobile No</th>
              <th>Password</th>   
            </tr>   
          </thead>   
          <tbody>   
    <?php     
            while ($row = mysqli_fetch_array($res)) {    
                  // Display each field of the records.    
            ?>     
            <tr>     
             <td><?php echo $row["name"]; ?></td>     
            <td><?php echo $row["email"]; ?></td>   
            <td><?php echo $row["mobile_no"]; ?></td>   
            <td><?php echo $row["password"]; ?></td>                                           
            </tr>     
            <?php     
                };    
            ?>     
          </tbody>   
        </table>   
  
     <div class="pagination">    
      <?php  
       $res1=mysqli_query($conn,"select * from signup");
       $cou=mysqli_num_rows($res1);

       $a=$cou/3;
       $a=ceil($a);
    echo "</br>";     
        // Number of pages required.   
         for ($b=0; $b < $a; $b++) { 
         	?><a href="index.php?page=<?php echo $b; ?>" style="text-decoration: none;"><?php echo $b." "; ?></a><?php
         }
  
      ?>    
      </div>  
  
  
          
    </div>   
  </div>  
</center>     
  </body>   
</html>  