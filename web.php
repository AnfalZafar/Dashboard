<?php
include("connection.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web</title>
    <!-- Font Awesome -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
  rel="stylesheet"
/>
<!-- Google Fonts -->
<link
  href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
  rel="stylesheet"
/>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
  rel="stylesheet"
/>
</head>
<body>
<table class="table align-middle bg-white m-auto">
                    <thead class="bg-light">
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
$select = "SELECT * FROM `store_tables`";
$got = mysqli_query($connect , $select);
while($data = mysqli_fetch_array($got)){
    if($data["corrector"] == "admin"){
    }elseif($data["corrector"] == "user"){

    }else{
    
    ?> 
                      
                         <tr>
                            <td>
                                <div class="d-flex align-items-center">
                                    <img src="<?php echo $data["img"]?>" alt=""
                                        style="width: 55px; height: 55px" class="rounded-circle" />
                                    <div class="ms-3">
                                        <p class="fw-bold mb-1"><?php echo $data["name"]?></p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <h5 class="fw-normal mb-1"><?php echo $data["corrector"]?></h5>
                            </td>
                            <td>
                                <h6 class="">800</h6>
                            </td>
</tr>
                       

<?php
}
}

?>
   
                    </tbody>
                </table>

                <!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"
></script>
</body>
</html>