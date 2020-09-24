<!DOCTYPE HTML>

<html lang="en">
    
<?php
    
    session_start();
    include("config.php");
    include("functions.php"); // iclude data sanitising...
    
    // Connect to database
    
    $dbconnect=mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    if (mysqli_connect_errno())
        
    {
        echo "Connection failed:".mysqli_connect_error();
         exit;
    }

?>
    
<head>
    <meta charset="UTF-8">
    <meta name="description" content="FOOD REVIEW">
    <meta name="keywords" content="food, reviews">
    <meta name="shop" content="James Tasker">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>FOOD REVIEW</title>
    
    <!-- Edit the link below / replace with your chosen google font -->
    <link href="https://fonts.googleapis.com/css?family=Lato%7cUbuntu" rel="stylesheet"> 
    
    <!-- Edit the name of your style sheet - 'foo' is not a valid name!! -->
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/food.css"> 
    
</head>
    
<body>
    
    <div class="wrapper">
    

        
        <div class="box banner">
            
        <!-- logo image linking to home page goes here -->
        <a href="index.php">
            <div class="box logo"  name="Logo - Click here to go to the Home Page">
            <img class="img-circle" src="Images/cook_smol.png" width="150" height="150" alt="cook" />
            
            </div>    <!-- / logo -->
        </a>    
            
            <h1>FOOD REVIEW</h1>
        </div>    <!-- / banner -->
            
            <!-- side bar -->
    <div class ="box side">
        <h2>Search | <a class="side" href="showall.php">Show All</a></h2>
        <i>Type part of the name / shop name if desired</i>

        <hr />
        <!-- Start of Name Search -->

        <form method="post" action="name_search.php"
        enctype="multipart/form-data" >
            

            <input class="search" trpe="text" name="name" size="40" value=""
            required placeholder="Name..." />
            
            <input class="submit" type="submit" name="find_name"
                   value="&#xf002;" />

        </form>
                  
            <!-- End of Name Search -->
        
            <!-- Start of Shop Search -->

        <form method="post" action="shop_search.php"
        enctype="multipart/form-data" >
            

            <input class="search" type="text" name="shop" size="40" value=""
            required placeholder="Shop..." />
            
            <input class="submit" type="submit" name="find_shop"
                   value="&#xf002;" />

        </form>
                  
        <!-- End of Shop Search -->
   
        <!-- Start of Meal Search -->
        <form method="post" action="meal_search.php"
        enctype="multipart/form-data" >
            
            <select class="search" name="meal" required>
                <option value="" disabled selected>Meal...</option>

                <?php
                // retrieve unique values in meal column...
                $meal_sql="SELECT DISTINCT `Meal`
                FROM `2020_L1_Asses_JamTas`
                ORDER BY `Meal` ASC";
                $meal_query=mysqli_query($dbconnect, $meal_sql);
                $meal_rs=mysqli_fetch_assoc($meal_query);
                
                do{
                    
                    ?>
                
                <option value="<?php echo $meal_rs['Meal']; ?>"><?php echo $meal_rs['Meal']; ?></option>
                
                <?php
                
                } // end of meal option retrieval
                
                while($meal_rs=mysqli_fetch_assoc($meal_query));
                
                ?>
                
            </select>
            
            <input class="submit" type="submit" name="find_meal"
                   value="&#xf002;" />
        </form>
        <!-- End of meal Search -->   
        
        <!-- Start of Vegetarian Search -->
        <form method="post" action="vegetarian_search.php"
        enctype="multipart/form-data" >
            
            <select class="search" name="vegetarian" required>
                <option value="" disabled selected>Vegetarian?...</option>

                <?php
                // retrieve unique values in meal column...
                $vegetarian_sql="SELECT DISTINCT `Vegetarian`
                FROM `2020_L1_Asses_JamTas`
                ORDER BY `Vegetarian` ASC";
                $vegetarian_query=mysqli_query($dbconnect, $vegetarian_sql);
                $vegetarian_rs=mysqli_fetch_assoc($vegetarian_query);
                
                do{
                    
                    ?>
                
                <option value="<?php echo $vegetarian_rs['Vegetarian']; ?>"><?php echo $vegetarian_rs['Vegetarian']; ?></option>
                
                <?php
                
                } // end of meal option retrieval
                
                while($vegetarian_rs=mysqli_fetch_assoc($vegetarian_query));
                
                ?>
                
            </select>
            
            <input class="submit" type="submit" name="find_vegetarian"
                   value="&#xf002;" />
        </form>
        <!-- End of meal Search -->   
        
        <!-- Start of Rating Search -->
        
        <form method="post" action="rating_search.php" enctype="multipart/form-data">
            
            <select class="half_width" name="amount">
                <option value="exactly">Exactly...</option>
                <option value="more" selected>At Least...</option>
                <option value="less">At Most...</option>
            </select>
        
            <select class="half_width" name="stars">
                <option value=1>&#9733;</option>
                <option value=2>&#9733;&#9733;</option>
                <option value=3 selected>&#9733;&#9733;&#9733;</option>
                <option value=4>&#9733;&#9733;&#9733;&#9733;</option>
                <option value=5>&#9733;&#9733;&#9733;&#9733;&#9733;
                </option>
                
            </select>
        
                <input type="submit" class="submit" name="find_rating"
                       value="&#xf002;" />
        
        </form>

            <hr />

        </div> <!-- / side bar -->
