//strategy dp, each function you do in realtime uses different algorithms 

//add function 
function add()
{
    var cObj;
    //get the data from the html page
    var text = document.getElementById("textarea").value;
    var color = document.getElementById("memocolor").value;
    color = color.substring(1);//remove the # in the color

    if (text === "") {//if empty
        alert("Please insert a text.");
        return;
    }
    if (text.length > 75) {//if too long
        alert("maximum amount of characters is 75.");
        return;
    }
    //building the request url
    var url = "http://localhost:81/MVCProject/memo/add/?text=";
    url = url + text;
    url = url + "&color=" + color;
    //alert(url);
    //calling the request
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {//function that occures after the request
        cObj = JSON.parse(this.responseText);
        alert("upload to " + cObj['user'] + "'s memo list was " + cObj['upload']);//just alerting what just happend(json obj)
    };
    //try the request
    xhttp.open("GET", url, false);
    xhttp.send();
    window.location = "http://localhost:81/MVCProject/memo";//sends back to the memo page


}
//remove a memo 
function remove()
{
    var user = $('.active').data('userName');
    var text = $('.active').data('noteText');
    var color = $('.active').data('color');
    color = color.slice(1);
    console.log(user);
    console.log(text);
    console.log(color);
    // $('.active').remove();
    
    //build the url request
    var url = "http://localhost:81/MVCProject/memo/deleteMemo/?user=" + user + "&text=" + text + "&color=" + color;
    console.log(url);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {//no need for a function,just delete
//        //cObj = JSON.parse(this.responseText);
//        //alert("delete from " + cObj['user'] + "'s memo list was " + cObj['delete']);
//        alert(this.responseText);
    }
    xhttp.open("GET", url, false);
    xhttp.send();
    //sends back to the memo page (to reload)
    window.location = "http://localhost:81/MVCProject/memo";

}

//every time you open the main page, the memos load from the data base
window.onload = function () {
    //buildthe http request url
    var url = "http://localhost:81/MVCProject/memo/getUserMemo/"
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {//gets back a json object and then builds the list of memos
        cObj = JSON.parse(this.responseText);
        for (i = 0; i < cObj.length; i++) {
            var count = i + 1;

            var node = document.createElement("LI");//li object
            var link = document.createElement("a");

            link.setAttribute('href', "#" + count);
            link.style.background = cObj[i].color;//color

            var title = document.createElement("h2");//title
            var titleContent = document.createTextNode("Note #" + count);
            title.appendChild(titleContent);

            var note = document.createElement("p");//text
            var textnode = document.createTextNode(cObj[i].text);
            note.appendChild(textnode);

            link.appendChild(title);
            link.appendChild(note);
            node.appendChild(link);//put it all toa node

            $(document).ready(function () {//use some jquery to attach the data to the title, the background and the text it self
                                            // so when you press anything in the memo , it wouldbe "active"

                $(link).data('noteText', cObj[i].text);
                $(link).data('userName', cObj[i].user);
                $(link).data('color', cObj[i].color);
                $(node).data('noteText', cObj[i].text);
                $(node).data('userName', cObj[i].user);
                $(node).data('color', cObj[i].color);
                $(title).data('noteText', cObj[i].text);
                $(title).data('userName', cObj[i].user);
                $(title).data('color', cObj[i].color);
                $(note).data('noteText', cObj[i].text);
                $(note).data('userName', cObj[i].user);
                $(note).data('color', cObj[i].color);

                //set activeon click
                $(node).click(function (event) {
                    $('.active').removeClass('active');
                    $(event.target).addClass('active')

                })
                $(link).click(function (event) {
                    $('.active').removeClass('active');
                    $(event.target).addClass('active')

                })
                $(title).click(function (event) {
                    $('.active').removeClass('active');
                    $(event.target).addClass('active')

                })
                $(note).click(function (event) {
                    $('.active').removeClass('active');
                    $(event.target).addClass('active')

                })
            })
            document.getElementById("noteList").appendChild(node);//add the node to the page notelist
        }
    }
    xhttp.open("GET", url, false);
    xhttp.send();//call
}


