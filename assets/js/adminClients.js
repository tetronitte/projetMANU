var patients = document.querySelectorAll(".patient");

patients.forEach((elmt) => {
    elmt.addEventListener('dblclick',() => {
        window.location = "http://codeigniter/PatientController/profil_patient/"+elmt.id;  
    })
});

var currentPage = window.location.href.replace(/\/$/, "");
currentPage = currentPage.substring(currentPage.lastIndexOf( "/" )+1 );

var pagesButton = document.querySelectorAll(".page");
pagesButton.forEach(function(page){
    let id = page.getAttribute('id');
    let num = id.substring(id.length-1);
    if (num == currentPage) page.classList.add('active');
    else page.classList.remove('active');

    page.addEventListener("click", function(event) {
        let search = document.querySelector("#search").value;
        $.ajax({
            url : 'http://codeigniter/PatientController/list_patient/'+page.innerHTML,
            type : 'POST',
            dataType : 'json',
            data : {
                search: search,
                ajax: true
            },
            success : function(val){
                modifURL(page.innerHTML);
                cleanTable();
                createTable(val);
            }
        });       
    });
});

function modifURL(idPage) {
    history.pushState('','', 'http://codeigniter/PatientController/list_patient/'+idPage)
    var pagesButton = document.querySelectorAll(".page");
    pagesButton.forEach(function(page) {
        let id = page.getAttribute('id');
        let num = id.substring(id.length-1);
        if (num == idPage) page.classList.add('active');
        else page.classList.remove('active');
    });
}

function cleanTable() {
    let tbody = document.querySelector("#tbody");
    let columns = [];
    let rows = [];

    tbody.childNodes.forEach((tr) => {
        tr.childNodes.forEach((element) => {
            columns.push(element);
        });
        rows.push(tr);
    });
    rows.forEach((row) => {
        row.remove();
    });
    columns.forEach((column) => {
        column.remove();
    });
}
    

function createTable(val) {
    let tbody = document.querySelector("#tbody");

    for (var i = 0 ; i < val.length ; i++) {
        let row = document.createElement("tr");

        let cell = document.createElement("td");
        let cellText = document.createTextNode(val[i]['lastname']);
        cell.appendChild(cellText);
        row.appendChild(cell);

        cell = document.createElement("td");
        cellText = document.createTextNode(val[i]['firstname']);
        cell.appendChild(cellText);
        row.appendChild(cell);

        cell = document.createElement("td");
        cellText = document.createTextNode(val[i]['birthdate']);
        cell.appendChild(cellText);
        row.appendChild(cell);

        cell = document.createElement("td");
        cellText = document.createTextNode(val[i]['phone']);
        cell.appendChild(cellText);
        row.appendChild(cell);

        cell = document.createElement("td");
        cellText = document.createTextNode(val[i]['mail']);
        cell.appendChild(cellText);
        row.appendChild(cell);
        tbody.appendChild(row);
        row.setAttribute('id',val[i]['id']);
        row.setAttribute('class','patient');
    }
}