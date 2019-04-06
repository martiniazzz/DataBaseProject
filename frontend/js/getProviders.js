$(document).ready(function() {
    update_content();
    add_searches();
});

$('#sort_name').click(function () {
    $.ajax({
        url: "../../backend/php/getProviders.php?sort_name=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function () {
            alert('f')
        }
    });
});

$('#sort_address').click(function () {
    $.ajax({
        url: "../../backend/php/getProviders.php?sort_address=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function () {
            alert('f')
        }
    });
});

$('#c_search').click(function () {
    let v1 = document.getElementById("c_val").value;
    let v2 = document.getElementById("cc_val").value;
    if(v1 === "" && v2 === "")
        return;
    $.ajax({
        url: "../../backend/php/getProviders.php?findC=&city="+v2+"&country="+v1,
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function () {
            alert('f')
        }
    });
});

function update_content(){
    $.ajax({
        url: "../../backend/php/getProviders.php",
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
        url: "../../backend/php/getProviders.php?getCC=",
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

$('#up_sub').click(function () {
    let v1 = document.getElementById("up_id").value;
    let v2 = document.getElementById("up_name").value;
    let v3 = document.getElementById("up_co").value;
    let v4 = document.getElementById("up_ci").value;
    let v5 = document.getElementById("up_st").value;
    let v6 = document.getElementById("up_bu").value;
    let v7 = document.getElementById("up_ac").value;
    let v8 =  document.getElementById("up_em").value;

    if($(this).attr('name') === "submit_add"){
        $.ajax({
            url: "../../backend/php/getProviders.php",
            type: 'post',
            dataType: 'JSON',
            data: {provAction:"addProvider",name:v2,country:v3,city:v4,street:v5,build:v6,account:v7,email:v8},
            success: function(response){
                addAlert("Постачальк "+v2+" успішно доданий!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }
    else if($(this).attr('name') === "submit_update_prov"){
        $.ajax({
            url: "../../backend/php/getProviders.php",
            type: 'post',
            dataType: 'JSON',
            data: {provAction:"updateProvider",id:v1,name:v2,country:v3,city:v4,street:v5,build:v6,account:v7,email:v8},
            success: function(response){
                addAlert("Дані постачалька "+v2+" відредаговано успішно!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }

    document.getElementById("p-form").reset();
    clear_btn();
});

$('#add_phone_p').click(function () {
    let id = document.getElementById("phone_add_pid").value;
    let phone = document.getElementById("phone_holder").value;
    if(phone.length === 0)
        return;
    $.ajax({
        url: "../../backend/php/getProviders.php?addPhone=&id="+id+"&phone="+phone,
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            addAlert("Телефон успішно додано!");
            showContent(response);
        },
        error:function () {
            update_content();
        }
    });
    $('#addPhoneM').hide();
});

function showSearches(data) {
    let box1 = document.getElementById("countries");
    let box2 = document.getElementById("cities");
    box1.innerHTML = "";
    box2.innerHTML = "";

    data["countries"].forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e;
        opt.value=e;
        box1.appendChild(opt);
    });

    data["cities"].forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e;
        opt.value=e;
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
        title.className = "prov-n";
        title.innerText = e["name"];
        title.onclick = function(){
            $(this).parent().parent().find(".med-info").slideToggle("fast");
        };

        let phones = document.createElement("button");
        phones.id = "add_phone";
        phones.className = "btn btn-success move-from-right";
        phones.setAttribute("data-toggle","modal");
        phones.setAttribute("data-target","#addPhoneM");
        phones.innerText = "Додати телефон";
        phones.onclick = function () {
            passForPhone(e["id"]);
        };

        let edit = document.createElement("button");
        edit.id = "update_prov";
        edit.className = "btn btn-warning move-from-right";
        edit.innerText = "Редагувати";
        edit.onclick = function () {
            //window.animate({ scrollTop: 0 }, "slow");
            $("html, body").animate({ scrollTop: 0 }, "slow");
            pass_values(e["id"],e["name"],e["country"],e["city"],e["street"],e["build"],e["account"],e["email"]);
        };

        let del = document.createElement("button");
        del.className = "btn btn-danger";
        del.type="submit";
        del.name="delete_prov";
        del.innerText = "Видалити";
        del.onclick = function(){
            deleteProvider(e["id"],e["name"]);
        };

        header.appendChild(title);
        header.appendChild(phones);
        header.appendChild(edit);
        header.appendChild(del);

        let info = document.createElement("div");
        info.className = "med-info";
        let prov = document.createElement("div");
        prov.innerText = "Країна: "+e["country"];
        let desc = document.createElement("div");
        desc.innerText = "Місто: "+e["city"];
        let type = document.createElement("div");
        type.innerText = "Адреса: "+e["street"]+","+e["build"];
        let account = document.createElement("div");
        account.innerText = "Номер рахунку: "+e["account"];
        let email = document.createElement("div");
        email.innerText = "Email: "+e["email"];

        let t = document.createElement("div");
        t.innerText = "Телефони:";
        let groups = document.createElement("div");
        let gs = e["phones"];
        gs.forEach(function (p) {
           let ph =  document.createElement("div");
           ph.className = "phone_holder";
           let phi =  document.createElement("div");
           phi.className = "phone_holder_inner";
           phi.innerText = p;
           let bb = document.createElement("button");
           bb.type="submit";
           bb.name="del_phone";
           bb.className = "btn btn-danger";
           bb.innerText = "Видалити";
           bb.onclick = function(){
               deletePhone(p,e["name"]);
           };
           ph.appendChild(phi);
           ph.appendChild(bb);
            groups.appendChild(ph);
        });

        info.appendChild(prov);
        info.appendChild(desc);
        info.appendChild(type);
        info.appendChild(account);
        info.appendChild(email);

        info.appendChild(t);
        info.appendChild(groups);

        node.appendChild(header);
        node.appendChild(info);
        box.appendChild(node);
    });
}

function deletePhone(data, name) {
    $("#mi-modal").modal('show');
    $("#modal-btn-si").click(function () {
        $("#mi-modal").modal('hide');
        $.ajax({
            url: "../../backend/php/getProviders.php?delPhone="+data,
            type: 'get',
            dataType: 'JSON',
            success: function(response){
                addAlert("Телефон "+data+" постачальника "+name+" було видалено!");
                showContent(response);
            },
            error:function () {
                update_content();
            }
        });
    });
    $("#modal-btn-no").click(function () {
        $("#mi-modal").modal('hide');
    });
}

function deleteProvider(id,name) {
    $("#mi-modal").modal('show');
    $("#modal-btn-si").click(function () {
        $("#mi-modal").modal('hide');
        $.ajax({
            url: "../../backend/php/getProviders.php",
            type: 'post',
            data:{action:"deleteProv",id:id},
            dataType: 'JSON',
            success: function(response){
                addAlert("Постачальника "+name+" було видалено!");
                showContent(response);
            },
            error:function () {
                update_content();
            }
        });
    });
    $("#modal-btn-no").click(function () {
        $("#mi-modal").modal('hide');
    });
}
