window.onload = init;
function init()
{
    document.getElementById("add").onclick = onClickAdd;
    onClickAdd();
}

function onClickRemove()
{
    if(document.getElementsByTagName("tr").length > 2)
        this.parentNode.parentNode.removeChild(this.parentNode);
}

function onClickAdd()
{
    var theRow = document.createElement("tr");
    var firstNameCell = document.createElement("td");
    var secondNameCell = document.createElement("td");
    var emailCell = document.createElement("td");
    var examScoreCell = document.createElement("td");
    var theRemoveButton = document.createElement("td");
    firstNameCell.appendChild(createInputElement("firstName[]", "text"));
    secondNameCell.appendChild(createInputElement("lastName[]", "text"));
    emailCell.appendChild(createInputElement("email[]", "text"));
    examScoreCell.appendChild(createInputElement("scores[]", "number"));
    theRemoveButton.appendChild(createRemoveButton());
    theRemoveButton.onclick = onClickRemove;
    theRow.appendChild(firstNameCell);
    theRow.appendChild(secondNameCell);
    theRow.appendChild(emailCell);
    theRow.appendChild(examScoreCell);
    theRow.appendChild(theRemoveButton);
    document.getElementById("theTable").appendChild(theRow);
}

function createRemoveButton()
{
    var temp = document.createElement("a");
    temp.classList.add("addRemove");
    temp.classList.add("remove");
    temp.innerHTML = "-";
    return temp;
}

function createInputElement(theName, theType)
{
    var temp = document.createElement("input");
    temp.name = theName;
    temp.type = theType;
    return temp;
}