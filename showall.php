<?php include "topbit.php";
    
$showall_sql="SELECT *
FROM `2020_L1_Asses_JamTas`
ORDER BY `2020_L1_asses_JamTas`.`Name` ASC";
$showall_query=mysqli_query($dbconnect, $showall_sql);
$showall_rs=mysqli_fetch_assoc($showall_query);
$count=mysqli_num_rows($showall_query); 
    
?>


        
        <div class="box main">
            
            <h2>All Items</h2>
            
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
                    $showall_rs['Name']; ?></span></p>

                    <p>Shop: <span class="sub_heading"><?php echo
                    $showall_rs['Shop']; ?></span></p>

                    <p>Meal: <span class="sub_heading"><?php echo
                    $showall_rs['Meal']; ?></span></p>
                    
                    <p>Vegetarian: <span class="sub_heading"><?php echo
                    $showall_rs['Vegetarian']; ?></span></p>

                    <p>Rating: <span class="sub_heading">
                        
                        <?php
                        for($x=0; $x < $showall_rs['Rating']; $x++)
                            
                        {
                            echo "&#9733;";
                        }
                    
                        ?>
                        
                        </span></p>

                    <p><span class="sub_heading">Reviw / Response</span></p>

                    <p>

                        <?php echo $showall_rs['Review']; ?>

                    </p>
                </div> <!-- / end restults -->
            
            <br /> 
            
            <?php
                    
                }// end of do
                
                while($showall_rs=mysqli_fetch_assoc($showall_query));
                    
                
            } // end else
            
            // if there are results , display them
            
            ?>
</div>
                        


            
            



<?php
    include "bottombit.php";
?>        