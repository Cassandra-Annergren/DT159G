<!-- Including the correct files-->
<?php
include("includes/header.php"); 
include("includes/array_data.php");
?>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>

<section class="stats">
   <div class="filterData">
       <h2>Filtrera data</h2>

<!-- Gets the values from the array "yrken" and puts it in a dropdown meny, when changed the function "Fetchdata"  -->
       <select id= "jobType" onchange="FetchData()">
       <option value="" disabled selected> Välj yrke </option>
       <?php foreach ($jobs as $job) : ?>
           
           <option value="<?php echo $job; ?>" label="<?php echo $job; ?>"></option>
           
       <?php endforeach; ?>
       </select>

<!-- You can choose either bar och line diagram and when you change the function FetchDat-->
       <select id="chartType" onchange="FetchData()">
       <option value="" disabled selected> Välj diagram typ </option>
           <option value="bar">Stapeldiagram</option>
           <option value="line">Linjediagram</option>
       </select>

<!-- Buttons for the functions below to run-->
       <button onclick="HideMen()">Se bara kvinnornas löner</button>
       <button onclick="ShowOnlyMen()">Se bara mäns löner</button>
       <button onclick="ShowMen()">Visa både män och kvinnors lön</button>
   </div>
</section>

<div class="graphs">
   <div id="graf"></div>
   <div class="ourData">
       <p> Statistiken är hämtad ifrån SCB, Sveriges officiella statistikmyndighet, och visar grundlönen på varje yrke.  </p>
       <a href="https://www.statistikdatabasen.scb.se/pxweb/sv/ssd/START__AM__AM0110__AM0110A/LonYrkeUtbildning4A/?loadedQueryId=89830&timeType=top&timeValue=1" target="_blank" class="SCB">Till SCB:s statistikdatabas</a>
   </div>
</div>


<script>
   function FetchData() {
// fetches the jobType and chatType the user has chosen and stores in the variables jobType and chartType
       let jobType = document.getElementById('jobType').value;
       let chartType = document.getElementById('chartType').value;

// Fetches the data for year and salaries from the file "array_data" and encodes to json so that it can be used in plotly
       let SalariesData = <?php echo json_encode($salaries_per_job); ?>; 
       let yearArr = <?php echo json_encode($yearArr); ?>;

// Fetches the salary from the jobType the user chose from the dropdown meny and stores it in a variable which later get plotted in a graph
       let SalaryArrMen = SalariesData[jobType]['män']; 
       let SalaryArrKvinnor = SalariesData[jobType]['kvinnor']; 


       
// Structures the data so that the graph has years on the x-axis and salary on they-axis
       let data = [
           {
               x: yearArr,
               y: SalaryArrMen,
               type: chartType,
               name: 'Män' 
           },
           {
               x: yearArr,
               y: SalaryArrKvinnor,
               type: chartType,
               name: 'Kvinnor' 
           }
       ];


// Adding the title to be the chosen job and grouping the bar for men and woman
       let layout = {
           title: 'Löner för ' + jobType, 
           barmode: 'group' 
       };

// Plots the graph in the dedicated area "graph"
       Plotly.newPlot('graf', data, layout);
   }

// Function that hides the salary statistics for men and then another function to show it again by restyling the graph. The function runs when a button above is pushed
function HideMen() {
   Plotly.restyle('graf', {
       visible: ['legendonly', true] 
   });
}

// Show both men and womens salaries
function ShowMen() {
   Plotly.restyle('graf', {
       visible: [true, true] 
   });
}

//Shows only mens salaries
function ShowOnlyMen() {
   Plotly.restyle('graf', {
       visible: [true, 'legendonly'] 
   });
}

window.onload = function() {
   document.getElementById('jobType').selectedIndex = 0;
   document.getElementById('chartType').selectedIndex = 0;
};


   
</script>
<?php include("includes/footer.php"); ?>