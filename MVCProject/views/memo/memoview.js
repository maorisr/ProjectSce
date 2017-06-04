function add()
{
    var cObj;
    var text = document.getElementById("textarea").value;
    var color = document.getElementById("memocolor").value;
    color = color.substring(1);

    if (text === "") {
        alert("Please insert a text.");
        return;
    }
    if (text.length > 75) {
        alert("maximum amount of characters is 75.");
        return;
    }

    var url = "http://localhost:81/MVCProject/memo/add/?text=";
    url = url + text;
    url = url + "&color=" + color;
    //alert(url);

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        cObj = JSON.parse(this.responseText);
        alert("upload to " + cObj['user'] + "'s memo list was " + cObj['upload']);
    };
    xhttp.open("GET", url, false);
    xhttp.send();
    window.location = "http://localhost:81/MVCProject/memo";


}
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
    var url = "http://localhost:81/MVCProject/memo/deleteMemo/?user=" + user + "&text=" + text + "&color=" + color;
    console.log(url);
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
//        //cObj = JSON.parse(this.responseText);
//        //alert("delete from " + cObj['user'] + "'s memo list was " + cObj['delete']);
//        alert(this.responseText);
    }
    xhttp.open("GET", url, false);
    xhttp.send();
    window.location = "http://localhost:81/MVCProject/memo";

}


window.onload = function () {
    var url = "http://localhost:81/MVCProject/memo/getUserMemo/"
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        cObj = JSON.parse(this.responseText);
        for (i = 0; i < cObj.length; i++) {
            var count = i + 1;

            var node = document.createElement("LI");
            var link = document.createElement("a");

            link.setAttribute('href', "#" + count);
            link.style.background = cObj[i].color;

            var title = document.createElement("h2");
            var titleContent = document.createTextNode("Note #" + count);
            title.appendChild(titleContent);

            var note = document.createElement("p");
            var textnode = document.createTextNode(cObj[i].text);
            note.appendChild(textnode);

            link.appendChild(title);
            link.appendChild(note);
            node.appendChild(link);

            $(document).ready(function () {

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
            document.getElementById("noteList").appendChild(node);
        }
    }
    xhttp.open("GET", url, false);
    xhttp.send();
}


