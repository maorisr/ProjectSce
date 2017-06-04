function run()
{
    var cObj;
    var toCalc = document.getElementById("textbox").value;
    if (toCalc === "") {
        alert("Nothing to calc. try again.");
        frm.txt.value = "";
        return;
    }
    var dividZero = toCalc.includes("/0");
    if (dividZero === true)
    {
        alert("Error- divide by zero.")
        frm.txt.value = "";
        return;
    }
    toCalc = toCalc.split('+').join('%2B');
    
    var url = "http://localhost:81/MVCProject/calculator/run/?toCalc=";
    url = url + toCalc;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        console.log(this.responseText);
        if (this.responseText === "Error") {
            alert("Warning: Division by zero.");
            ce();
            return;
        }
        if (this.readyState === 4 && this.status === 200) {
            cObj = JSON.parse(this.responseText);
            frm.txt.value = cObj.newValue;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}

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



function ce() {
    frm.txt.value = "";
}

function BS() {
    frm.txt.value = frm.txt.value.slice(0, frm.txt.value.length - 1);
}
