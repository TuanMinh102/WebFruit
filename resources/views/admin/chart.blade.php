<div style="width:500px;height:500px">
    <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
let arr = [1, 2, 3];
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [
            <?php  
            if($tmp==0)
            {
                foreach($dulieu as $row)
                {
                    $date=new DateTime($row->NgayLapHD);
                    echo(($date)->format('m').',');
                }
            }
            else{
                for($i=1;$i<=12;$i++)
                {
                    echo($i.',');
                }
            }
             ?>
        ],
        datasets: [{
            label: 'My Cool Chart',
            data: [<?php  
            if($tmp==0)
            {
                 foreach($dulieu as $row2)
                echo($row2->DonGia.',');
            }
          else{
            for($i=1;$i<count($dulieu);$i++)
            echo($dulieu[$i].',');
          }
                ?>],
        }]
    }
});
</script>