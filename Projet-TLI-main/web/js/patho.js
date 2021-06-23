window.addEventListener('DOMContentLoaded', (event) => {
    console.log('Toto');
});

fetch("http://localhost/Projet-TLI-main/ctr/patho.php?id=22")
.then(Response => Response.json())
.then(data => 
{
    console.log(data);
})

fetch("http://localhost/Projet-TLI-main/ctr/patho.php?id=22")
.then(Response => Response.json())
.then(data =>
{
    var container = document.getElementById("infos");
    for (var i = 0; i < data.length; i++)
    {
        var newDiv = document.createElement("div");
        newDiv.innerHTML = "ID: " + data[i].idp + ' // Description Pathologie: ' + data[i].desc;
        container.appendChild(newDiv);
    }
    console.log(data[0]);
});