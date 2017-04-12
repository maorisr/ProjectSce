<!DOCTYPE HTML>
	<html>
		<head>
			<meta charset="UTF-8">
			<title>Weather App</title>
			<style>
				body{
					width: 960px;
					margin: 0 auto;
				}
				.userForm{
					padding-top:50px;
				}
			</style>
		</head>
		<body>
		
			<!--submit this form to form_processing.php-->
			<form class ="userForm" name="weatherForm" action="index.php" method="GET">
				
				City: <input type="text" name="city" placeholder="city"/><br />
				Country: <input type="text" name="country" placeholder="country"/><br />
				<input type="submit" name="submit" value="Submit" />
			</form>
				<br />
				<hr />
<?php
	if(isset($_GET)){
		$user_city = $_GET['city'];
		$user_country = $_GET['country'];
		
		
		
		$api_url = "http://api.openweathermap.org/data/2.5/find?q=Palo+Alto&units=imperial&type=accurate&mode=xml&APPID=671d9aea9495ba900875eb42b4d2a338" . $user_city . "," . $user_country;
		//$weather_data = file_get_contents($api_url);
		//$getweather = simplexml_load_file($api_url);
		//$gethumidity = $getweather->list->item->humidity['value'];
		//$gettemp = $getweather->list->item->temperature['value'];
		
		function file_get_contents_curl($api_url) {
			$curl = curl_init();
			curl_setopt($curl, CURLOPT_URL, $api_url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)');
			curl_setopt($curl, CURLOPT_ENCODING ,"");
			$data = curl_exec($curl);
			curl_close($curl);
			return $data;
		}
	
		
		$weather_data = file_get_contents_curl('myUrl/json/file.json?jsonp=');
		
		$json = json_decode($weather_data, TRUE);
		
		
		$user_temp = $json['main']['temp'];
		$user_humidity = $json['main']['humidity'];
		$user_conditions = $json['weather'][0]['main'];
		$user_wind = $json['wind']['speed'];
		$user_wind_direction = $json['wind']['deg'];
		
		echo($user_conditions);
		
		
		echo "<strong> City: </strong>" . $user_city . "<br />";
		echo "<strong> Country: </strong>" . $user_country . "<br />";
		echo "<strong> Humidity: </strong>" . $user_humidity . "<br />";
		echo "<strong> Current Conditions: </strong>" . $user_conditions . "<br />";
		echo "<strong> Wind Speed: </strong>" . $user_wind . "<br />";
		echo "<strong> Wind Direction: </strong>" . $user_wind_direction . "<br />";
		echo "<strong> Current Temperature: </strong>" . $user_temp . "<br />";
		
		
		
		
	};
?>

<?php

	if(isset($_GET['submit'])){
		$data = "data.json";
		$json_string = json_encode($_GET, JSON_PRETTY_PRINT);
		file_put_contents($data, $json_string, FILE_APPEND);
	};
?>
	</body>