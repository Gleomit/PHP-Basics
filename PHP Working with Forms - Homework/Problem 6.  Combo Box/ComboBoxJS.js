window.onload = function () {
    updateContent();
    document.getElementById("continents").onchange = updateContent;
};
function updateContent() {
    var xmlhttp;
    if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    }
    xmlhttp.onreadystatechange = function()
    {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
        {
            var temp = xmlhttp.responseText.split(",");
            var theList = document.getElementById("countries");
            while(theList.hasChildNodes())
                theList.removeChild(theList.firstChild);
            for(var i = 0; i < temp.length;i++) {
                var option = document.createElement("option");
                option.innerHTML = temp[i];
                theList.appendChild(option);
            }
        }
    }
    xmlhttp.open("GET","ajaxRequest.php?continents=" + document.getElementById("continents").value,true);
    xmlhttp.send();
}