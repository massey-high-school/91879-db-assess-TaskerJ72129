<?php include "topbit.php";

// if find button pushed...
if(isset($_POST['find_meal']))
    
{
    
// Retrieves author and sanitises it.
$meal=test_input(mysqli_real_escape_string($dbconnect,
$_POST['meal']));
    
$find_sql="SELECT *
FROM `2020_L1_Asses_JamTas`
WHERE `Meal` LIKE '%$meal%'";
$find_query=mysqli_query($dbconnect, $find_sql);
$find_rs=mysqli_fetch_assoc($find_query);
$count=mysqli_num_rows($find_query); 
    
    
?>


        
        <div class="box main">
            
            <h2>Meal Search</h2>
            
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
                    
                    <p>Vegetarian: <span class="sub_heading"><?php echo
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