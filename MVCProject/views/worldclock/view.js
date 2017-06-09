//The function is triggered after the user click on the button in the main screen is responsible for the processing of the information
function run()
{
    var cObj;
    //returns the element that has the ID attribute with the specified value
    var timezone = document.getElementById("timezone").value;
    //If the user do not entered anything sent error screen
    if (timezone === "") {
        alert("Please insert a time zone");
        return;
    }
    var url = "http://localhost:81/MVCProject/worldclock/run/?timezone=";
    //Concatenates to the url the time zone that was chosen by the user
    url = url + timezone;
    //request data from a web server
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "Error") {
                alert("There is no such a timezone");
                return;
            }
            //Parse the data with JSON.parse(), and the data becomes a JavaScript object.
            cObj = JSON.parse(this.responseText);
            //read the date from the JSON
            document.getElementById("space").style.display = "none";
            document.getElementById("left").style.display = '';
            document.getElementById('country').innerHTML = cObj.country;
            document.getElementById('zone').innerHTML = cObj.zone;
            document.getElementById('time').innerHTML = cObj.time;
        }
        ;
    }
    xhttp.open("GET", url, true);
    xhttp.send();


}
