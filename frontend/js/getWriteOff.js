$(document).ready(function() {
    update_content();
    set_searches();
});

$('#sortDate').click(function () {
    $.ajax({
        url: "../../backend/php/getWriteOff.php",
        type: 'post',
        data:{action:"dateSort"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

$('#b-s-date').click(function () {
    let v1 = document.getElementById("d-from").value;
    let v2 = document.getElementById("d-to").value;
    if(v1 === "" && v2 === "")
        return;
    $.ajax({
        url: "../../backend/php/getWriteOff.php",
        type: 'post',
        data:{action:"dateLimit",from:v1,to:v2},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

function set_searches() {
    $.ajax({
        url: "../../backend/php/getWriteOff.php?getData=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showSearches(response);
        }
    });
}

function showSearches(data) {
    let box = document.getElementById("groups");
    box.innerHTML = "";
    data.forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e["id"];
        opt.value=e["id"];
        opt.innerText = e["name"]+"(Макс.:"+e["max"]+")";
        box.appendChild(opt);
    });
}

function update_content(){
    $.ajax({
        url: "../../backend/php/getWriteOff.php",
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
        header.onclick = function(){
            $(this).parent().find(".med-info").slideToggle("fast");
        };

        let title = document.createElement("div");
        title.className = "med-name-n";
        title.innerText = "Списання №"+e["id"]+" від "+e["date"];
        header.appendChild(title);

        let info = document.createElement("div");
        info.className = "med-info";
        let prov = document.createElement("div");
        prov.innerText = "Номер групи: "+e["group"];
        let desc = document.createElement("div");
        desc.innerText = "Кількість: "+e["amount"];
        let groups = document.createElement("div");
        groups.innerText = "Причина: "+e["reason"];
        let save = document.createElement("div");
        save.innerText = "Місце тимачсового зберігання: стелаж - "+e["rack"]+", полиця - "+e["shelf"];

        info.appendChild(prov);
        info.appendChild(desc);
        info.appendChild(groups);
        info.appendChild(save);

        node.appendChild(header);
        node.appendChild(info);
        box.appendChild(node);
    });
}

$('#up_sub').click(function () {
    let v2 = document.getElementById("up_prov").value;
    let v3 = document.getElementById("up_date").value;
    let v4 = document.getElementById("up_am").value;
    let v5 = document.getElementById("up_re").value;
    let v6 = document.getElementById("up_sh").value;
    let v7 = document.getElementById("up_ra").value;

    if($(this).attr('name') === "submit_add"){
        $.ajax({
            url: "../../backend/php/getWriteOff.php",
            type: 'post',
            dataType: 'JSON',
            data: {action:"addOff",group:v2,date:v3,amount:v4,reason:v5,shelf:v6,rack:v7},
            success: function(response){
                addAlert("Списання додано успішно!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }

    document.getElementById("w-form").reset();
    clear_btn();
});