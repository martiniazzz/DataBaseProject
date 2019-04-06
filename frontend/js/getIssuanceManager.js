$(document).ready(function() {
    update_content();
    set_searches();
});

$('#get-resp-s').click(function () {
    let v = document.getElementById("resp-s").value;
    if(v === "")
        return;
    $.ajax({
        url: "../../backend/php/getIssuanceManager.php",
        type: 'post',
        data: {action:"findResp",resp:v},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#get-dep-s').click(function () {
    let v = document.getElementById("deps-s").value;
    if(v === "")
        return;
    $.ajax({
        url: "../../backend/php/getIssuanceManager.php",
        type: 'post',
        data: {action:"findDep",dep:v},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#sort-date-i').click(function () {
    $.ajax({
        url: "../../backend/php/getIssuanceManager.php",
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
        url: "../../backend/php/getIssuanceManager.php",
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

$('#b-get-all').click(function () {
    $.ajax({
        url: "../../backend/php/getIssuanceManager.php",
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
        url: "../../backend/php/getIssuanceManager.php",
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
        url: "../../backend/php/getIssuanceManager.php",
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
        url: "../../backend/php/getIssuanceManager.php",
        type: 'post',
        data: {action:"getNew"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

function set_searches() {
    $.ajax({
        url: "../../backend/php/getIssuanceManager.php?getData=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showSearches(response);
        }
    });
}

function showSearches(data) {
    let box2 = document.getElementById("departs");
    box2.innerHTML = "";
    data["d"].forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e;
        opt.innerText = e;
        box2.appendChild(opt);
    });

    let box1 = document.getElementById("resppersons");
    box1.innerHTML = "";
    data["w"].forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e["id"];
        opt.value=e["id"];
        opt.innerText = e["name"];
        box1.appendChild(opt);
    });
}

function update_content(){
    $.ajax({
        url: "../../backend/php/getIssuanceManager.php",
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
            status.className = "btn btn-primary";
        else
            status.className = "btn btn-info";
        status.innerText = s;
        header.appendChild(status);

        if(e["status"]==="нове"){
            let o = document.createElement("button");
            o.className = "btn btn-warning";
            o.innerText = "Опрацювати";
            o.onclick = function(){
                proccessIssuance(e["id"]);
            };
            header.appendChild(o);
        }


        let info = document.createElement("div");
        info.className = "med-info";
        let prov = document.createElement("div");
        prov.innerText = "Для: "+e["resp"];
        let desc = document.createElement("div");
        desc.innerText = "На відділення: "+e["depart"];
        let sep = document.createElement("div");
        sep.className = "separator";
        let groups = document.createElement("div");
        groups.className = "med-info-row";
        groups.innerText = e["givens"];

        info.appendChild(prov);
        info.appendChild(desc);
        info.appendChild(sep);
        info.appendChild(groups);

        node.appendChild(header);
        node.appendChild(info);
        box.appendChild(node);
    });
}

function proccessIssuance(id) {
    $.ajax({
        url: "../../backend/php/getIssuanceManager.php",
        type: 'post',
        data: {action:"procIs",id:id},
        dataType: 'JSON',
        success: function(response){
            addAlert("Видачу №"+id+" успішно опрацьовано!");
            showContent(response);
        }
    });
}