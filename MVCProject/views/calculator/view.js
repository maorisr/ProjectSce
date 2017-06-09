function run()
{
    //This function are work when the user click '=' button 
    //Check the text box value if it empty
    var cObj;
    var toCalc = document.getElementById("textbox").value;
    if (toCalc === "") {
        alert("Nothing to calc. try again.");
        frm.txt.value = "";
        return;
    }
    //Check the text box value if it division by 0
    var dividZero = toCalc.includes("/0");
    if (dividZero === true)
    {
        alert("Error- divide by zero.")
        frm.txt.value = "";
        return;
    }
    //Check if the textbox value include '+' and replace it
    toCalc = toCalc.split('+').join('%2B');
    //Add the url with the textbox value
    var url = "http://localhost:81/MVCProject/calculator/run/?toCalc=";
    url = url + toCalc;
    var xhttp = new XMLHttpRequest();  ///Requet to connect 
    xhttp.onreadystatechange = function () {  
        console.log(this.responseText);        ///Check what we get from the url
        if (this.responseText === "Error") {    
            alert("Warning: Division by zero.");
            ce();
            return;
        }
        //Check if the url return valid value
        if (this.readyState === 4 && this.status === 200) {
            cObj = JSON.parse(this.responseText);
            frm.txt.value = cObj.newValue;
        }
    };
    xhttp.open("GET", url, true);  ///open the request
    xhttp.send();
}
///Add the buttons value to the display
///And check the operators
function dis(x) {
    if (((x >= 0 && x <= 9) || x == ')' || x == '(')) {
        frm.txt.value = frm.txt.value + x;

    } else {
        if (frm.txt.value.charAt(frm.txt.value.length - 1) == x) {
        } else {
            if (frm.txt.value.charAt(frm.txt.value.length - 1) == '*' || frm.txt.value.charAt(frm.txt.value.length - 1) == '/' || frm.txt.value.charAt(frm.txt.value.length - 1) == '+' || frm.txt.value.charAt(frm.txt.value.length - 1) == '-' || frm.txt.value.charAt(frm.txt.value.length - 1) == '.') {
                frm.txt.value = frm.txt.value.slice(0, frm.txt.value.length - 1);
            }
            else
                frm.txt.value = frm.txt.value + x;
        }
    }
}


///Clear the display
function ce() {
    frm.txt.value = "";
}

///Delete the last token
function BS() {
    frm.txt.value = frm.txt.value.slice(0, frm.txt.value.length - 1);
}
