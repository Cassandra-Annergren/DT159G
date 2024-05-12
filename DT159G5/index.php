<?php 
include("includes/header.php"); // Include the config.php file
?>

<!-- The main content of the website -->
<section class="maincontent">
    <div class="startpage">
        <h2>Om oss:</h2>
        <p>
        <span style='color: grey;'><em>"Vi värnar om en jämlik arbetsmarknad speciellt för ingenjörer".</em></span><br>
        <br>På denna sida är det möjligt att se olika trender på 
        arbetsmarknaden för olika ingengörsyrken. Det går att filtrera 
        statistik mellan olika ingenjörsyrken och det går att 
        filterara data mellan könen samt att visulisera data med hjälp av olika grafer. Datavisualiseringarna gör det möjligt
        att se trender och jämföra data mellan olika kategorier.   
        </p>
        <img src="images/equalityinstem.jpg" alt="Stem" id="stemImage">
            <div class="button-container">
                <a href="testStat.php" class="button">Se statistik</a> <!-- Button to the statistics page -->
            </div>
    </div>
</section>





<?php
 include("includes/footer.php"); // Include the footer.php file
?>