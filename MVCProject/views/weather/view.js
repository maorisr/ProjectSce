function run()
{
    var cObj;
    var city = document.getElementById("city").value;
    if (city === "") {
        alert("Please insert a city.");
        return;
    }
    var url = "http://localhost:81/MVCProject/weather/run/?city=";
    url = url + city;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if(this.responseText === "Error"){
                alert("There is no such a city name.");
                return;
            }    
            cObj = JSON.parse(this.responseText);
            document.getElementById("left").style.display = '';
            document.getElementById('userCity').innerHTML = cObj.city;
            document.getElementById('region').innerHTML = cObj.region;
            document.getElementById('country').innerHTML = cObj.country;
            document.getElementById('temperature').innerHTML = cObj.temperature;
            document.getElementById('feelsLike').innerHTML = cObj.feelsLike;
            var imagePath = cObj.conditionImage;
            document.getElementById('conditionImage').src = imagePath;
            document.getElementById('conditionText').innerHTML = cObj.conditionText;
            document.getElementById('windMph').innerHTML = cObj.windMph;
            document.getElementById('windKph').innerHTML = cObj.windKph;
            document.getElementById('windDegree').innerHTML = cObj.windDegree;
            document.getElementById('updatedOn').innerHTML = cObj.updatedOn;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();

}
 