@section('user')
<div>
    <p class="mt-5 text-center">Review your daily step totals for each week this month.</p>
</div>
<div class="col-6 offset-3">
    <select id="weekSelector" class="form-control mb-4">
        <?php
            date_default_timezone_set("America/Chicago");
            $currentWeekNumber = date('W');
            $firstWeekMonth = date('W',strtotime('first day of ' . date('F Y')));
            for($i = $currentWeekNumber; $i >= $firstWeekMonth; $i--){
                if ($i == $currentWeekNumber){
                    echo '<option value="0">Current Week</option>';
                }elseif($i == $firstWeekMonth){
                    echo '<option value="' . $i . '">First Week of Month</option>';
                }elseif ( $firstWeekMonth - $i == -1){
                    echo '<option value="' . $i . '">Last Week</option>';
                }elseif ( $firstWeekMonth - $i == -2){
                    echo '<option value="' . $i . '">2 Weeks ago</option>';
                }elseif ( $firstWeekMonth - $i == -3){
                    echo '<option value="' . $i . '">3 Weeks ago</option>';
                }
            }
        ?>
    </select>
</div>
<canvas id="myChart" class="col-11"></canvas>
<div id="noResults" class="mt-5"><p class="text-center"></p></div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        var dataLabels = new Array();
        var stepData = new Array();
        var ctx = $('#myChart');
        var myChart;
        $.get("/welcomedata",function( data ){
            console.log('ajax data loading...');
        }).done(function( data ){
            console.log( data );
            if(data.length == 0){
                ctx.css('display','none');
                $('#noResults p').html('There are no results to show');
            }else{
                $('#noResults p').html('');
                ctx.css('display','block');
                for (var i = 0; i < data.length; i++){
                    dataLabels.push(moment(data[i].stepTotalDate).format('MMMM D YYYY'));
                    stepData.push(data[i].stepTotal);
                    }
                    myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: dataLabels.reverse(),
                        datasets: [{
                            label: '# of Steps',
                            data: stepData.reverse(),
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)',
                                //'rgba(255, 206, 86, 0.2)',
                                'rgba(75, 192, 192, 0.2)',
                                'rgba(153, 102, 255, 0.2)',
                                'rgba(255, 159, 64, 0.2)',
                                'rgba(255, 99, 132, 0.2)',
                                'rgba(54, 162, 235, 0.2)'
                            ],
                            borderColor: [
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)',
                                //'rgba(255, 206, 86, 1)',
                                'rgba(75, 192, 192, 1)',
                                'rgba(153, 102, 255, 1)',
                                'rgba(255, 159, 64, 1)',
                                'rgba(255, 99, 132, 1)',
                                'rgba(54, 162, 235, 1)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            }        
        }).fail(function(){
            console.log('something went wrong');
        });
        
        $('#weekSelector').on('change', function(){
            if(myChart != undefined) myChart.destroy();
            var week = $('#weekSelector').val();
            $.get("/welcomedata?week=" + week, function( data ){
                console.log('ajax updating chart data...');
            }).done(function( data ){
                console.log( data );
                dataLabels = new Array();
                stepData = new Array(); 
                console.log(data.length);         
                if(data.length == 0){
                    ctx.css('display','none');
                    $('#noResults p').html('There are no results to show');
                }else{
                    $('#noResults p').html('');
                    ctx.css('display','block');
                    for (var i = 0; i < data.length; i++){
                        dataLabels.push(moment(data[i].stepTotalDate).format('MMMM D YYYY'));
                        stepData.push(data[i].stepTotal);
                        }
                        myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: dataLabels.reverse(),
                            datasets: [{
                                label: '# of Steps',
                                data: stepData.reverse(),
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    //'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)',
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    //'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)',
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)'
                                ],
                                borderWidth: 2
                            }]
                        },
                        options: {
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        beginAtZero: true
                                    }
                                }]
                            }
                        }
                    });
                }
            }).fail(function(){
                console.log('something went wrong');
            });
            
        });

    });

</script>
@endsection
