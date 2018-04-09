

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Weather</title>
</head>
<body>
	<div class="container">
		<h1>Weather Report</h1>

		<div class="form-group">
			<label for="city">City</label>
			<input type="text" class="form-control" id="city" placeholder="Enter City">

		</div>
		<button type="submit" class="btn btn-primary btn-block" onclick="searchWeather()">Submit</button>
		<!-- Render weather info here -->
		<h3>Weather of Today</h3>
		<ul class="list-group ">
			<li class="list-group-item first">Weather: <span></span></li>
			<li class="list-group-item second">Tempurture: <span></span></li>
			<li class="list-group-item third">Humidity: <span></span></li>
			<li class="list-group-item fourth">Wind speed: <span></span></li>
		</ul>
		<div id="info">
			<h3>Temp :<span></span></h3>
		</div>
		<div>
			<h3>Forecast for five days</h3>

			<table class="table">
				<thead>
					<tr>
						<th scope="col">Date</th>
						<th scope="col">Weather</th>
						<th scope="col">Temp</th>
						<th scope="col">humidity</th>
						<th scope="col">Wind speed</th>
					</tr>
				</thead>
				<tbody>
					<?php for($i=0;$i<5;$i++) {?>
					<tr>
						<th scope="row" id="<?php echo"$i" ?>"></th>
						<td class="<?php echo"$i" ?>"></td>
						<td class="<?php echo"$i" ?>"></td>
						<td class="<?php echo"$i" ?>"></td>
						<td class="<?php echo"$i" ?>"></td>
					</tr>

					<?php } ?>
					
				</tbody>
			</table>



			



		</div>
	</div>

	<!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	
	<script type="text/javascript">
		function searchWeather() {
			var search = $('#city').val();
			var APIkey = "e0966d9179f54a61535459a026ada621";
			$.get(
				"http://api.openweathermap.org/data/2.5/weather?q="+ search +"&appid="+ APIkey,
				function(data) {
					// 调用APYI里的json数据main.temp
					$('.first span').text(data.weather[0].main);
					$('.second span').text(data.main.temp);
					$('.third span').text(data.main.humidity);
					$('.fourth span').text(data.wind.speed);

				}
				);

			$.get(

				"http://api.openweathermap.org/data/2.5/forecast?q="+ search +"&appid="+ APIkey,
				function(data) {
					// 调用APYI里的json数据main.temp
					for (var i=4; i < data.list.length;i=i+8) {
						var j = 0;
						$('th:first-child').text(data.list[i].dt_txt);
						console.log(data.list[i].weather[0].main);
						console.log(data.list[i].main.temp);
						console.log(data.list[i].main.humidity);
						console.log(data.list[i].wind.speed);
						j++;
						
					}
					

				}

				);
			


			
		}
	</script>
</body>
</html>