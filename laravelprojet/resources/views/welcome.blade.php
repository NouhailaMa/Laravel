
<?php
	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = '';
	$db = 'laravelprojet';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	$data1 = '';
	$data2 = '';

	//query to get data from the table
	$sql = "SELECT count(*) as nombre ,filieres.code as filiere FROM `classses` INNER JOIN filieres on classses.filiere=filieres.code GROUP by filieres.libelle ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
	while ($row = mysqli_fetch_array($result)) {

		$data1 = $data1 . '"'. $row['nombre'].'",';
		$data2 = $data2 . '"'. $row['filiere'] .'",';
	}

	$data1 = trim($data1,",");
	$data2 = trim($data2,",");
?>

@extends('voyager::master')
@section('content')


<!DOCTYPE html>
<html>
	<head>
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.0.2/chart.min.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('css/style2.css') }}">
        <title> CHART </title>
	</head>

	<body>	   
        <div class="content">
            <div class="row header-container justify-content-center">
               
            </div>
            <canvas id="myChart"></canvas>
            <script>
                var ctx = document.getElementById('myChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [<?php echo $data2; ?>],
                        datasets: [{
                                data: [<?php echo $data1; ?>],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                    'rgba(153, 102, 255, 0.2)',
                                    'rgba(255, 159, 64, 0.2)'
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
                                    'rgba(153, 102, 255, 1)',
                                    'rgba(255, 159, 64, 1)'
                                ],
                                borderWidth: 1
                            }]
                    },
                    options: {
                        plugins: {
                            title: {
                                display: true,
                                text: 'Nombre de classes par filiere'
                            }
                        },
                        scales: {
                            x: {
                                tittle:{
                                display: true,
                                text: 'Filieres'
                            }
                            },
                            y: {
                                title:{
                                display: true,
                                text: 'Classes'
                            }
                        }
                        }
                    }
                });
            </script>
        </div>
    </body>
</html>
@stop

