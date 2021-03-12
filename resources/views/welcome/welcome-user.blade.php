@section('user')
<div>
    <p class="mt-5 text-center">Review your daily step totals for each week this month.</p>
</div>
<div class="col-6 offset-3">
    <select id="weekSelector" class="form-control mb-4">
        @php
            $currentWeek = date('W');
            $label = array(
                'Current Week',
                'Last Week',
                '2 Weeks Ago',
                '3 Weeks Ago',
                '4 Weeks Ago'
            );
        @endphp
        @for ($i = 0; $i < 5; $i++)
            <option value="{{ ( $currentWeek - $i ) }}">{{$label[$i]}}</option>            
        @endfor

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
        
        getWeekData();

        $('#weekSelector').on('change', function(){
            
            getWeekData();
                        
        });

    });

    function createChart( chartData ){
        var ctx = $('#myChart');
        if(myChart != undefined) myChart.destroy();
        let labels = chartData.map(a => moment(a.stepTotalDate).format('MMM D, YYYY'));
        let stepTotals = chartData.map(a => a.stepTotal);

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: '# of Steps',
                    data: stepTotals,
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
            options: { scales: { yAxes: [{ ticks: { beginAtZero: true } }] } }
        });
        
    }

    function getWeekData(){
        var week = $('#weekSelector').val();
        $.get("/welcomedata?week=" + week, function( data ){
            console.log('ajax updating chart data...');
        }).done(function(data){
            console.log(data);
            createChart(data);
        });
    }

</script>
@endsection
