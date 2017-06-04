var i = 0;

function run()
{
    var xhttp = new XMLHttpRequest();
    var category = document.getElementById("category").value;
    if (category === "") {
        alert("Please insert a category.");
        return;
    }
//    category = category.split(' ').join('+');
    var url = "http://localhost:81/MVCProject/gallery/run/?category=";
    url = url + category;
    xhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            if (this.responseText === "Error") {
                alert("There is no such a category, try again.");
                return;
            }
            cObj = JSON.parse(this.responseText);
            document.getElementById("space").style.display = "none";
            document.getElementById("left").style.display = '';
            var imagePath = cObj.images[i].image;
            document.getElementById('middleImg').src = imagePath;
            var tag = cObj.images[i].tag;
            document.getElementById('tag').innerHTML = tag;
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();

}

function loadImage()
{
    var imagePath = cObj.images[i].image;
    document.getElementById('middleImg').src = imagePath;
    var tag = cObj.images[i].tag;
    document.getElementById('tag').innerHTML = tag;
}

function previousImage()
{
    if (i === 0)
        alert("This is the first image.");
    else
    {
        i--;
        loadImage();
    }

}

function nextImage()
{
    if (i > 20)
        alert("There is no more images.");
    else
    {
        i++;
        loadImage();
    }
}

function newSearch()
{
    document.getElementById("space").style.display = '';
    document.getElementById("left").style.display = "none";
}