<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chart</title>
</head>
<body>

          <?php
          exit();
            require("mysql.php");
            $stmt = $mysql->prepare('SELECT COUNT(*) as i, MONTH(time) as t FROM urlshortener_api GROUP BY 2');
            $stmt->execute();
            $count = $stmt->rowCount();
            $January=0;$February=0;$March=0;$April=0;$May=0;$June=0;$July=0;$August=0;$September=0;$October=0;$November=0;$December=0;
            if ($count !== 0){
              while($row = $stmt->fetch()){
                if($row["t"] == "1"){ $January=$row["i"]; }
                else if($row["t"] == "2"){ $February=$row["i"]; }
                else if($row["t"] == "3"){ $March=$row["i"]; }
                else if($row["t"] == "4"){ $April=$row["i"]; }
                else if($row["t"] == "5"){ $May=$row["i"]; }
                else if($row["t"] == "6"){ $June=$row["i"]; }
                else if($row["t"] == "7"){ $July=$row["i"]; }
                else if($row["t"] == "8"){ $August=$row["i"]; }
                else if($row["t"] == "9"){ $September=$row["i"]; }
                else if($row["t"] == "10"){ $October=$row["i"]; }
                else if($row["t"] == "11"){ $November=$row["i"]; }
                else if($row["t"] == "12"){ $December=$row["i"]; }
              }
            }

          ?>

          
      <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js'></script>
        <canvas id="buyers" width="600" height="400"></canvas>
        <script>
            var buyerData = {
                labels : ["January","February","March","April","May","June", "July", "August", "September", "October", "November", "December"],
                datasets : [
                {
                    fillColor : "rgba(172,194,132,0.4)",
                    strokeColor : "#ACC26D",
                    pointColor : "#fff",
                    pointStrokeColor : "#9DB86D",
                    data : [
                      <?php
                      echo $January.",";
                      echo $February.",";
                      echo $March.",";
                      echo $April.",";
                      echo $May.",";
                      echo $June.",";
                      echo $July.",";
                      echo $August.",";
                      echo $September.",";
                      echo $October.",";
                      echo $November.",";
                      echo $December;
                      ?>
                    ]
                }
            ]
            }
            // get line chart canvas
            var buyers = document.getElementById('buyers').getContext('2d');
            // draw line chart
            new Chart(buyers).Line(buyerData);
            
        </script>
    
      
</body>
</html>