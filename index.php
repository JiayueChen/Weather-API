

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
		
		<div style="margin-top: 2em">
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
				<tbody class="content">
					

					
					
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
					
					// 	var j = 0;
					
					for (var i=4; i < data.list.length;i=i+8) {
						var date = data.list[i].dt_txt.substr(0,10);
						var weather = data.list[i].weather[0].main;
						var temp = data.list[i].main.temp;
						var humidity = data.list[i].main.humidity;
						var wind = data.list[i].wind.speed;

						var html = 
						`
						<tr>
							<th scope="row">` +date+ `</th>
							<td>` +weather+ `</td>
							<td>` +temp+ `</td>
							<td>` +humidity+ `</td>
							<td>` +wind+ `</td>
						</tr>
						`;

						$(".content").append(html);


					}
					

					

				}

				);
			


			
		}
	</script>
</body>
</html>