<?php include "topbit.php";

// if find button pushed...
if(isset($_POST['find_rating']))
    
{
    
// Retrieves author and sanitises it.
$amount=test_input(mysqli_real_escape_string($dbconnect,
$_POST['amount']));
$stars=test_input(mysqli_real_escape_string($dbconnect,
$_POST['stars']));
    
if ($amount=="exactly")
    
{
    $find_sql="SELECT *
    FROM `2020_L1_Asses_JamTas`
    WHERE `Rating` =$stars";
}

elseif ($amount=="less")
    
{
    $find_sql="SELECT *
    FROM `2020_L1_Asses_JamTas`
    WHERE `Rating` <=$stars";
}
    
else{
    $find_sql="SELECT *
    FROM `2020_L1_Asses_JamTas`
    WHERE `Rating` >=$stars";
}
$find_query=mysqli_query($dbconnect, $find_sql);
$find_rs=mysqli_fetch_assoc($find_query);
$count=mysqli_num_rows($find_query); 
    
    
?>


        
        <div class="box main">
            
            <h2>rating Search</h2>
            
            <?php
            
            // check if there are any results
            
            if ($count<1)
            
            {
            
            ?>
            
            <div class="error">
                Sorry! There are no results that match your search.
                Please use the search box in the sidebar to try again.
                
            </div>
                 
            <?php
            
            
            } // end count 'if'
                       
            // if there are not results, output an error
            else {
                
                do{
                    
                ?>
                <!-- Results go here -->
                <div class="results">

                    <p>Name: <span class="sub_heading"><?php echo
                    $find_rs['Name']; ?></span></p>

                    <p>Shop: <span class="sub_heading"><?php echo
                    $find_rs['Shop']; ?></span></p>
                    
                    <p>Meal: <span class="sub_heading"><?php echo
                    $find_rs['Meal']; ?></span></p>

                    <p>Vevetarian: <span class="sub_heading"><?php echo
                    $find_rs['Vegetarian']; ?></span></p>
                    
                    <p>Rating: <span class="sub_heading">
                        
                        <?php
                        for($x=0; $x < $find_rs['Rating']; $x++)
                            
                        {
                            echo "&#9733;";
                        }
                    
                        ?>
                        
                        </span></p>

                    <p><span class="sub_heading">Reviw / Response</span></p>

                    <p>

                        <?php echo $find_rs['Review']; ?>

                    </p>

                </div> <!-- / end restults -->
            
            <br /> 
            
            <?php
                    
                }// end of do
                
                while($find_rs=mysqli_fetch_assoc($find_query));
                    
                
            } // end else
            
            // if there are results , display them
            
            } // end isset
            ?>
        </div>
    
            
                        


            
            



<?php
    include "bottombit.php";
?>        