$(document).ready(function() {
    update_content();
});

$('#input-btn').click(function () {
    let prefix = $('#search-input').val();
    prefix.toLowerCase();
    searchPrefix(prefix);
});

$('#search-input').keyup(function () {
    let prefix = $(this).val();
    prefix.toLowerCase();
    searchPrefix(prefix);
});

function searchPrefix(prefix){
    if(prefix !== ''){
        $.ajax({
            url: "../../backend/php/getMedicinesResp.php",
            type: 'POST',
            data:{query:prefix},
            dataType: 'JSON',
            success: function(response){
                showContent(response);
            },
            error:function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
    else
        update_content();
}

$('#sort-by-name-btn').click(function () {
    $.ajax({
        url: "../../backend/php/getMedicinesResp.php",
        type: 'post',
        data: {action:"sorted_name"},
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
        url: "../../backend/php/getMedicinesResp.php",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
}

function showContent(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";
    data.forEach(function (e) {
        if(e["amount"] > 0){
            let node = document.createElement("div");
            node.className = "med-holder";

            let header = document.createElement("div");
            header.className = "med-name";

            let title = document.createElement("div");
            title.className = "med-name-n";
            title.innerText = e["name"];
            title.onclick = function(){
                $(this).parent().parent().find(".med-info").slideToggle("fast");
            };

            let amount = document.createElement("div");
            amount.className = "btn btn-success";
            amount.innerText = "Кількість:"+e["amount"];

            header.appendChild(title);
            header.appendChild(amount);

            let info = document.createElement("div");
            info.className = "med-info";
            let prov = document.createElement("div");
            prov.innerText = "Виробник: "+e["producer"];
            let desc = document.createElement("div");
            desc.innerText = "Опис: "+e["desc"];
            let type = document.createElement("div");
            type.innerText = "Тип видачі: "+e["type"];

            info.appendChild(prov);
            info.appendChild(desc);
            info.appendChild(type);

            node.appendChild(header);
            node.appendChild(info);
            box.appendChild(node);
        }
    });
}

$('#giving-create').click(function () {
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    let d = [];
    givings.forEach(function (elem) {
        if(elem !== null)
            if(elem.amount !== 0)
                d.push({id:elem.name,amount:elem.amount});
    });
    if(d === undefined || d.length == 0){
        return false;
    }

    $("#mi-modal").modal('show');
    $("#modal-btn-si").click(function () {
        $("#mi-modal").modal('hide');
        $.ajax({
            url: "../../backend/php/getMedicinesResp.php",
            type: 'POST',
            data:{action:"createIssue",dataI:JSON.stringify(d)},
            dataType: 'JSON',
            success: function(response){
                addAlert("Видачу успішно створено!");
                showContent(response);
            }
        });
        sessionStorage.clear();
        return true;
    });
    $("#modal-btn-no").click(function () {
        $("#mi-modal").modal('hide');
    });
});