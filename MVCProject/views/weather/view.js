/*jslint browser:true */
'use strict';

var weather = new XMLHttpRequest();
var cObj;
alert("Hi");
weather.open('POST', 'http://localhost:81/MVCProject/weather_model.php', true);
weather.responseType = 'text';
weather.send(null);
weather.onload = function() {
    if (weather.status === 200)
    {
       
        cObj = JSON.parse(weather.responseText); 
        console.log(cObj);
    } 
    
    document.getElementById('userCity').innerHTML=cObj.weather.city;
    document.getElementById('region').innerHTML=cObj.weather.region;
    document.getElementById('country').innerHTML=cObj.weather.country;
    document.getElementById('temperature').innerHTML=cObj.weather.temperature;
    document.getElementById('feelsLike').innerHTML=cObj.weather.feelsLike;
    var imagePath = cObj.weather.image;
    document.getElementById('conditionImage').src = imagePath;    
    document.getElementById('conditionText').innerHTML=cObj.weather.conditionText;
    document.getElementById('windMph').innerHTML=cObj.weather.windMph;
    document.getElementById('windKph').innerHTML=cObj.weather.windKph;
    document.getElementById('windDegree').innerHTML=cObj.weather.windDegree;
    document.getElementById('updatedOn').innerHTML=cObj.weather.updatedOn;
}
