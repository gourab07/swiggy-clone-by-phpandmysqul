<?php
session_start();
$conn = mysqli_connect("localhost","root","","swiggy");

if(!empty($_SESSION)){
  $is_logged_in = 1;
}else{
  $is_logged_in = 0;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>order now</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" rel="stylesheet" >
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  </head>
  <style type="text/css">
    .navbar{
    background-color: darkred;
    color: #fff;
  }
  .logo{
    margin-left: 30px;
    height: 40px;
  }
  .nav-link{
    color: #fff;
    font-weight: 500;
    font-size: 15px;
    margin-left: 20px;
  }
  .nav-link:hover{
    color: yellow;
  }
  .jumbotron{
     background-color: lightyellow;
     margin-bottom: 0;
   }
   .sub_text{
    font-family: popping;
    margin-top: 30px;
   }
   .pointer button{
    width: 25px;
    border: none;
    border-radius: 25px;
    text-align: center;
    background-color: #fff;

  }
  .pointer button:hover{
    background-color: yellow;
  }
  .pointer span{
    margin-left: 5px;
    margin-right: 5px;
  }


</style>
<body>
  <div class="navigation">
    <nav class="navbar navbar-expand-sm">
      <img src="https://upload.wikimedia.org/wikipedia/en/thumb/1/12/Swiggy_logo.svg/1200px-Swiggy_logo.svg.png" class="logo">
       <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
              <a class="nav-link" href="manage_category.php"><b>Category</b></a>
              
               <?php
                if($is_logged_in){
                  echo '<div class="dropdown ml-auto">
                                <button class="btn dropdown-toggle" style="background-color: #ddd; color: #000; border-radius: 20px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><b>
                                 '."Hi ".$_SESSION['name'].'</b>
                                </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="orders.php">My Oders</a>
                                       <a class="dropdown-item" href="order_list.php">Oderlist</a>
                                       <a class="dropdown-item" href="logout.php">Logout</a>
                                    </div>

                                ';
                }else{
                  echo '<button class="navbar-toggler" type="button" data-toggle="collapse"data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon" style="background-color: orange; border-radius: 50%;"></span>
                            </button>
                                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                    <div class="navbar-nav ml-auto">
                                        <a class="nav-link" href="login_form.php"><b>Login</b></a>
                                        <a class="nav-link" href="signup_form.php"><b>Signup</b></a>
                                    </div>
                                </div>';
                }

                ?>
          </div>
      </div>
    </nav>
  </div>

  <div class="container">
    <h3 class="mt-5">Order-list</h3>
    <div class="row">
      <div class="col-8">
        <?php
        $conn = mysqli_connect("localhost","root","","swiggy");

        $user_id = $_SESSION['user_id'];

        $query = "SELECT * FROM orderlist o JOIN food f  ON o.food_id = f.food_id WHERE o.user_id = $user_id";
        $result = mysqli_query($conn,$query);

        $query2 = "SELECT * FROM orderlist o JOIN category c  ON o.food_id = c.food_id WHERE o.user_id = $user_id";
         $result2 = mysqli_query($conn,$query2);


        $counter = 0; 
        $amount = 0;
        while($row = mysqli_fetch_assoc($result)){

          $amount = $amount + $row['price']*$row['quantity'];

          echo '<div class="card mt-3" id="food-card'.$row['food_id'].'">
                <div class="row">
                  <div class="col-3">
                    <img src="'.$row['img_path'].'" style="width: 100%; height: 130px">
                  </div>
                  <div class="col-7">
                    <h5 class="mt-3">'.$row['title'].'</h5>
                    <h5>Rs <span id="price'.$row['food_id'].'">'.$row['price'].'</span></h5>
                    <p><span id="category'.$row['food_id'].'">('.$row['category'].')</span></p> 
                  </div>
                  <div class="col-2">
                    <div class = "pointer mt-4">
                      <button data-id='.$row['food_id'].' class="btn btn-warning btn-sm text-dark plus-one">-</button>
                      <span id="quantity'.$row['food_id'].'" class="ml-1 mr-1"><b>'.$row['quantity'].'</b></span>
                      <button data-id='.$row['food_id'].' class="btn btn-warning btn-sm text-dark plus-one">+</button>
                    </div>
                  </div>
                </div>
                </div>';
                 $counter++;
              }
              if($counter == 0){
                echo '<h5 class="sub_text">Why you didnnot try our category section</h5>';
              }else{
                echo ' <hr>
                       <h5 style="display: inline;">Total Amount: Rs <span id ="total"> '.$amount.'</span></h5>
                       <a href="place_order.php" style="float: right; background-color:yellow;text-decoretion:none;width:65px;height:25px;border:1px solid black;border-radius:10px;color:black;">checkout</a>';
              }

               
                $counter = 0; 
                $amount = 0;
                 while($row = mysqli_fetch_assoc($result2)){

                  $amount = $amount + $row['price']*$row['quantity'];

                   echo '<div class="card mt-3" id="food-card'.$row['food_id'].'">
                          <div class="row">
                            <div class="col-3">
                              <img src="'.$row['img_path'].'" style="width: 100%; height: 130px">
                            </div>
                            <div class="col-7">
                              <h5 class="mt-3">'.$row['title'].'</h5>
                              <h5>Rs <span id="price'.$row['food_id'].'">'.$row['price'].'</span></h5>
                              <p><span id="category'.$row['food_id'].'">('.$row['category'].')</span></p> 
                            </div>
                            <div class="col-2">
                              <div class = "pointer mt-4">
                                <button data-id='.$row['food_id'].' class="btn btn-warning btn-sm text-dark plus-one2">-</button>
                                <span id="quantity'.$row['food_id'].'" class="ml-1 mr-1"><b>'.$row['quantity'].'</b></span>
                               <button data-id='.$row['food_id'].' class="btn btn-warning btn-sm text-dark plus-one2">+</button>
                              </div>
                            </div>
                          </div>
                        </div>';
                $counter++;
              }
              if($counter == 0){
                echo '<h5 class="sub_text">Why you didnnot try some deliocious fast food</h5>';
              }else{
                echo ' <hr>
                       <h5 style="display: inline;">Total Amount: Rs <span id ="total2"> '.$amount.'</span></h5>
                       <a href="place_order2.php" style="float: right; background-color:yellow;text-decoretion:none;width:65px;height:25px;border:1px solid black;border-radius:10px;color:black;">checkout</a>';
              }


             

        ?>
       
      </div>
    </div>
  </div>

 <script type="text/javascript">
  $('.plus-one').click(function(){
    var sign = $(this).text();
    var food_id = $(this).attr('data-id'); 
    var quantity = $('#quantity' + food_id).text();
    var price = Number($('#price'+ food_id).text());
    var total = Number($('#total').text());
    $.ajax({
      url:'update_product_quantity.php?food_id=' + food_id + '&quantity=' + quantity + '&sign=' + sign,
      method: 'GET',
      success: function(data){
        if(sign === '+'){
          $('#quantity' + food_id).text(Number(quantity)+1);
           $('#total').text(total + price);
         }else if (sign === '-'){
           $('#quantity' + food_id).text(Number(quantity)-1);
           $('#total').text(total - price);
             if(Number(quantity)-1 === 0){
             $.ajax({
               url:'remove_product_from_cart.php?food_id=' + food_id,
              method:'GET',
                success:function(data){
                  $('#food-card' + food_id).remove();

                  },
                  error:function(error){
              

               }
             })
          
           }

         }
        
         },
         error: function(error){
           console.log(error);
         }
       })
     })

    $('.plus-one2').click(function(){
    var sign = $(this).text();
    var food_id = $(this).attr('data-id');
    var quantity = $('#quantity' + food_id).text();
    var price = Number($('#price'+ food_id).text());
    var total2 = Number($('#total2').text());
    $.ajax({
      url:'update_product_quantity.php?food_id=' + food_id + '&quantity=' + quantity + '&sign=' + sign,
      method: 'GET',
      success: function(data){
        if(sign === '+'){
          $('#quantity' + food_id).text(Number(quantity)+1);
           $('#total2').text(total2 + price);
         }else if (sign === '-'){
           $('#quantity' + food_id).text(Number(quantity)-1);
           $('#total2').text(total2 - price);
             if(Number(quantity)-1 === 0){
             $.ajax({
               url:'remove_product_from_cart.php?food_id=' + food_id,
              method:'GET',
                success:function(data){
                  $('#food-card' + food_id).remove();

                  },
                  error:function(error){
              

               }
             })
          
           }

         }
        
         },
         error: function(error){
           console.log(error);
         }
       })
     })
</script>


</body>
</html>
