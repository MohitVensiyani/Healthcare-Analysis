<?php

$dbhandle = new mysqli('localhost','root','','mhtour');
echo $dbhandle->connect_error;
$query = "SELECT Region, count(*) as Patient FROM Sample1 where Disease='Dengue' group by Region";
$res = $dbhandle->query($query);

 ?>
 <html>
   <head>
     <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
     <script type="text/javascript">
       google.charts.load('current', {'packages':['bar']});
       google.charts.setOnLoadCallback(drawChart);

       function drawChart() {
         var data = google.visualization.arrayToDataTable([
         ['Region', 'Patient'],
         <?php
         while($row=$res->fetch_assoc())
         {
             # code...
             echo "['".$row['Region']."',".$row['Patient']."],";
           }

          ?>  ['Region', 'Patient'],
            <?php
            while($row=$res->fetch_assoc())
            {
                # code...
                echo "['".$row['Region']."',".$row['Patient']."],";
              }

             ?>
         ]);

         var options = {
           chart: {
             title: 'Company Performance',
             subtitle: 'Sales, Expenses, and Profit: 2014-2017',
           }
         };

         var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

         chart.draw(data, google.charts.Bar.convertOptions(options));
       }
     </script>
   </head>
   <body>
     <form action="#">
       <select name="Select Disease">
         <option value="a">Select Disease</option>
         <option value="Maleria">Maleria</option>
         <option value="Q Fever">Q Fever</option>
         <option value="Dengue">Dengue</option>
         <option value="Tuberculosis">Tuberculosis</option>

       </select>
       <select name="Select Attributes1">
         <option value="a">Select Attributes</option>
         <option value="Age">Age</option>
         <option value="Gender">Gender</option>
         <option value="Disease">Disease</option>
         <option value="Region">Region</option>
         <option value="Medicines">Medicines</option>

       </select>
       <input type="submit" name="submit" value="Get Selected Values" />


     </form>
     <div id="columnchart_material" style="width: 800px; height: 500px;"></div>
   </body>
 </html>
 <?php
 if(isset($_POST['submit'])){
$selected_val = $_POST['Select Disease'];  // Storing Selected Value In Variable
echo "You have selected :" .$selected_val;  // Displaying Selected Value
}
?>
