@section('user')
<div>
    <p>Logged in user dashboard placeholder here.</p>
</div>
<canvas id="myChart" class="col-8 offset-2"></canvas>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" integrity="sha256-Uv9BNBucvCPipKQ2NS9wYpJmi8DTOEfTA/nH2aoJALw=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $.get("/welcomedata",function( data ){
            console.log('ajax data loading...');
        }).done(function( data ){
            console.log( data );
            var dateLabels = new Array();
            var stepData = new Array();
            for (var i = 0; i < data.length; i++){
                dateLabels.push(moment(data[i].stepTotalDate).format('MMMM D YYYY'));
                stepData.push(data[i].stepTotal);
            }
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: dateLabels,
                    datasets: [{
                        label: '# of Steps',
                        data: stepData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            //'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            //'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
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
        }).fail(function(){
            console.log('something went wrong');
        });
        
    });
</script>
@endsection
