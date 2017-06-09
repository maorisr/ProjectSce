function run1()
{
    var cObj;
    var url = "http://localhost:81/MVCProject/today/run";//gets the API
    var historycon = new XMLHttpRequest();
    historycon.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if(this.responseText === "Error"){
                alert("Error")
                return;
            }
            cObj = JSON.parse(this.responseText);
            //parses the json in to cObj
            document.getElementById('link').innerHTML = cObj.link;
            document.getElementById('date').innerHTML = cObj.date;
            document.getElementById('year').innerHTML = cObj.year;
            document.getElementById('text').innerHTML = cObj.text;
            document.getElementById("hideMe").style.display = "none";
            document.getElementById("today").style.display = '';
        }
    };
    historycon.open("GET", url, true);
    historycon.send();
}
 