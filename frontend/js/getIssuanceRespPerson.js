$(document).ready(function() {
    update_content();
});

$('#b-get-all').click(function () {
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'post',
        data: {action:"getAll"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#b-get-get').click(function () {
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'post',
        data: {action:"getGet"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#b-get-proc').click(function () {
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'post',
        data: {action:"getProc"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#b-get-new').click(function () {
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'post',
        data: {action:"getNew"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#sort-date-i').click(function () {
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'post',
        data: {action:"sortDate"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#btn-date-i').click(function () {
    let v1 = document.getElementById("di-from").value;
    let v2 = document.getElementById("di-to").value;
    if(v1 === "" && v2 === "")
        return;
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'post',
        data: {action:"dateLimit",from:v1,to:v2},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

function update_content(){
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
}

function showContent(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";
    data.forEach(function (e) {
        let node = document.createElement("div");
        node.className = "med-holder";

        let header = document.createElement("div");
        header.className = "med-name";

        let title = document.createElement("div");
        title.className = "med-name-n";
        title.innerText = "Видача №"+e["id"]+" від "+e["date"];
        title.onclick = function(){
            $(this).parent().parent().find(".med-info").slideToggle("fast");
        };
        header.appendChild(title);

        let status = document.createElement("div");
        let s = e["status"];
        if(s === 'нове')
            status.className = "btn btn-success move-from-right";
        else if(s === 'опрацьовано')
            status.className = "btn btn-primary move-from-right";
        else
            status.className = "btn btn-info";
        status.innerText = e["status"];
        header.appendChild(status);

        if(e["status"]==="опрацьовано"){
            let o = document.createElement("button");
            o.className = "btn btn-warning";
            o.innerText = "Забрати";
            o.onclick = function(){
                proccessIssuance(e["id"]);
            };
            header.appendChild(o);
        }

        let info = document.createElement("div");
        info.className = "med-info";
        let groups = document.createElement("div");
        groups.className = "med-info-row";
        groups.innerText = e["givens"];

        info.appendChild(groups);

        node.appendChild(header);
        node.appendChild(info);
        box.appendChild(node);
    });
}

function proccessIssuance(id) {
    $.ajax({
        url: "../../backend/php/getIssuanceRespPerson.php",
        type: 'post',
        data: {action:"changeStat",id:id},
        dataType: 'JSON',
        success: function(response){
            addAlert("Видача успішно опрацьована!");
            showContent(response);
        }
    });
}