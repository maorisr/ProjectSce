function run()
{
    var cObj;
    var timezone = document.getElementById("timezone").value;
    if (timezone === "") {
        alert("Please insert a time zone");
        return;
    }
    var url = "http://localhost:81/MVCProject/worldclock/run/?timezone=";
    url = url + timezone;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "Error") {
                alert("There is no such a timezone");
                return;
            }
            cObj = JSON.parse(this.responseText);
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
