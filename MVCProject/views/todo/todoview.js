
// Click on a close button to delete item from the list
var close = document.getElementsByClassName("close");
var i;
for (i = 0; i < close.length; i++) {
    close[i].onclick = function () {//delete function 
        var div = this.parentElement;
        div.style.display = "none";
    }
}

// Mark the task as done, also in the database
function sendToDone(inputValue, ev) {
    var url1 = "http://localhost:81/MVCProject/todo/done/?text=";
    url1 = url1 + inputValue;
    if (ev.target.classList.contains('checked')) // mark as checked - update the db accordingly
        url1 = url1 + "&done=1";
    else
        url1 = url1 + "&done=0";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        cObj = JSON.parse(this.responseText);
    };
    xhttp.open("GET", url1, false);
    xhttp.send();
}

// Create a new list item when clicking on the "Add" button
function newElement() {
    var li = document.createElement("li");
    var inputValue = document.getElementById("myInput").value; //get the data from the html page
    var t = document.createTextNode(inputValue);
    li.appendChild(t);
    if (inputValue === '') { // user didn't insert string
        alert("You must write something!");
    } else {
        document.getElementById("myUL").appendChild(li);
    }
    document.getElementById("myInput").value = "";



    var cObj;
    var url = "http://localhost:81/MVCProject/todo/addTODO/?text=";
    url = url + inputValue;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        cObj = JSON.parse(this.responseText);
    };
    xhttp.open("GET", url, false);
    xhttp.send();


    // create "close" button
    var span = document.createElement("SPAN");
    var txt = document.createTextNode("\u00D7");
    span.className = "close";
    span.appendChild(txt);
    li.appendChild(span);

    //clicked section
    var list = document.querySelector('ul');
    list.addEventListener('click', function (ev) {
        if (ev.target.tagName === 'LI') {
            ev.target.classList.toggle('checked');
            sendToDone(inputValue, ev);
        }
    }, false);
    // delete selected task
    for (i = 0; i < close.length; i++) {
        close[i].onclick = function () {
            var div = this.parentElement;
            div.style.display = "none";
            deleteObj(inputValue);
        }
    }
}

//delete task
function deleteObj(inputValue) {
    var url1 = "http://localhost:81/MVCProject/todo/deleteTODO/?text=";
    url1 = url1 + inputValue;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        cObj = JSON.parse(this.responseText);
    };
    xhttp.open("GET", url1, false);
    xhttp.send();
    return;
}

//read from the db
function Read() {
    var cObj;
    var url1 = "http://localhost:81/MVCProject/todo/read/";
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        cObj = JSON.parse(this.responseText);
    };
    xhttp.open("GET", url1, false);
    xhttp.send();
    return cObj; //sends back as json

}


//initial make rows
window.onload = function () {
    cObj = Read();
    for (i = 0; i <= cObj.length; i++) {

        var li = document.createElement("li");
        var inputValue = cObj[i]['text'];
        var t = document.createTextNode(inputValue);
        li.appendChild(t);
        document.getElementById("myUL").appendChild(li);
        document.getElementById("myInput").value = "";
        var span = document.createElement("SPAN");
        var txt = document.createTextNode("\u00D7");
        span.className = "close";
        span.appendChild(txt);
        li.appendChild(span);

        //clicked section
        var list = document.querySelector('ul');
        list.addEventListener('click', function (ev) {
            if (ev.target.tagName === 'LI') {
                ev.target.classList.toggle('checked');
                sendToDone(inputValue, ev);

            }
        }, false);
        //mark as checked
        if (cObj[i]['done'] === '1')
            li.classList.toggle('checked');
        //call to delete function on this specific li
        for (j = 0; j < close.length; j++) {
            close[j].onclick = function () {
                var div = this.parentElement;
                div.style.display = "none";
                deleteObj(inputValue);
                window.location = "http://localhost:81/MVCProject/todo";

            };
        }
    }
}