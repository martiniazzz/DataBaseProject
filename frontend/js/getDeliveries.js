$(document).ready(function() {
    update_content();
    add_searches();
});

$('#date-order').click(function () {
    $.ajax({
        url: "../../backend/php/getDeliveries.php",
        type: 'post',
        data:{action:"dateOrder"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function () {
            alert('f')
        }
    });
});

$('#pricesLimit').click(function () {
    let v1 = document.getElementById("pr-from").value;
    let v2 = document.getElementById("pr-to").value;
    if(v1 === "" && v2 === "")
        return;
    v1 = v1===""?0:v1;
    v2 = v2===""?0:v2;

    $.ajax({
        url: "../../backend/php/getDeliveries.php",
        type: 'post',
        data:{action:"pricesLimit",from:v1,to:v2},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function () {
            alert('f')
        }
    });
});

$('#datesLimit').click(function () {
    let v1 = document.getElementById("d-from").value;
    let v2 = document.getElementById("d-to").value;
    if(v1 === "" && v2 === "")
        return;

    $.ajax({
        url: "../../backend/php/getDeliveries.php",
        type: 'post',
        data:{action:"datesLimit",from:v1,to:v2},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

$('#s-prov').change(function () {
    let v1 = document.getElementById("s-prov").value;
    if(v1 === "")
        update_content();
    else {
        $.ajax({
            url: "../../backend/php/getDeliveries.php",
            type: 'post',
            data:{action:"provSearch",prov:v1},
            dataType: 'JSON',
            success: function(response){
                showContent(response);
            },
            error:function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }
});

$('#provSearch').click(function () {
    let v1 = document.getElementById("s-prov").value;
    if(v1 === "")
        return;

    $.ajax({
        url: "../../backend/php/getDeliveries.php",
        type: 'post',
        data:{action:"provSearch",prov:v1},
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
        url: "../../backend/php/getDeliveries.php",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function () {
            alert('f')
        }
    });
}

function add_searches() {
    $.ajax({
        url: "../../backend/php/getProviders.php?getData=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showSearches(response);
        },
        error:function () {
            alert('f')
        }
    });
}

function showSearches(data) {
    let box1 = document.getElementById("providers");
    let box2 = document.getElementById("provs");
    box1.innerHTML = "";
    box2.innerHTML = "";

    data.forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e["id"];
        opt.value=e["id"];
        opt.innerText=e["name"];
        box1.appendChild(opt);
    });

    data.forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e["id"];
        opt.value=e["id"];
        opt.innerText=e["name"];
        box2.appendChild(opt);
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
        title.innerText = "Поставка №"+e["id"]+" від "+e["date"];
        title.onclick = function(){
            $(this).parent().parent().find(".med-info").slideToggle("fast");
        };

        // let b3 = document.createElement("div");
        // b3.className = "prov-e";
        let edit = document.createElement("button");
        edit.id = "update_prov";
        edit.className = "btn btn-warning move-from-right";
        edit.innerText = "Редагувати";
        edit.onclick = function () {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            deliv_pass_values(e["id"],e["date"],e["prov"]);
        };
        // b3.appendChild(edit);

        let groups = document.createElement("button");
        groups.className = "btn btn-success";
        groups.innerText = "Групи";
        groups.onclick = (function() {
            redToGroups(e["id"])
           // window.location.href = "../../backend/php/addGroupsManagerPage.php?showGroups="+;
        });

        header.appendChild(title);
        header.appendChild(edit);
        header.appendChild(groups);

        let info = document.createElement("div");
        info.className = "med-info";
        let prov = document.createElement("div");
        prov.innerText = "Вартість: "+e["total"];
        let desc = document.createElement("div");
        desc.innerText = "Постачальник: "+e["provName"];
        let type = document.createElement("div");
        type.innerText = "Отримав: "+e["admin"];

        info.appendChild(prov);
        info.appendChild(desc);
        info.appendChild(type);

        node.appendChild(header);
        node.appendChild(info);
        box.appendChild(node);
    });
}

function redToGroups(id) {
    $.ajax({
        url: "../../backend/php/getDeliveries.php?showGroups="+id,
        type: 'get',
        success: function(){
            window.location.href = "../../backend/php/addGroupsManagerPage.php"
        },
        error:function () {

        }
    });
}

$('#up_sub').click(function () {
    let v1 = document.getElementById("up_idp").value;
    let v2 = document.getElementById("up_date").value;
    let v3 = document.getElementById("up_prov").value;

    if($(this).attr('name') === "submit_add"){
        $.ajax({
            url: "../../backend/php/getDeliveries.php",
            type: 'post',
            dataType: 'JSON',
            data: {delAction:"addDel",id:v1,date:v2,prov:v3},
            success: function(response){
                addAlert("Поставку №"+v1+" додано успішно!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }
    else if($(this).attr('name') === "submit_update_del"){
        $.ajax({
            url: "../../backend/php/getDeliveries.php",
            type: 'post',
            dataType: 'JSON',
            data: {delAction:"updateDel",id:v1,date:v2,prov:v3},
            success: function(response){
                addAlert("Поставку №"+v1+" успішно відредаговано!");
                showContent(response);
            },
            error:function(xhr, status, error) {
                alert(xhr.responseText);
            }
        });
    }

    document.getElementById("d-form").reset();
    clear_btn();
});