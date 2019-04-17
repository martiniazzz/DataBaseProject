$(document).ready(function() {
    update_content();
    add_searches();
});

function update_content(){
    $.ajax({
        url: "../../backend/php/getGroups.php",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function () {
            //alert('f1')
        }
    });
}

function add_searches() {
    $.ajax({
        url: "../../backend/php/getGroups.php?getCC=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showSearches(response);
        },
        error:function () {
            //alert('f')
        }
    });
}

function showContent(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";
    data.forEach(function (e) {
        let node = document.createElement("div");
        node.className = "deliv_inner";

        let v1 = document.createElement("div");
        v1.className = "deliv_inner-inner";
        v1.innerText = "Номер групи: "+e["id"]+" ("+e["medName"]+")";

        let v2 = document.createElement("div");
        v2.className = "deliv_inner-inner";
        v2.innerText = "Полиця: "+e["shelf"];

        let v3 = document.createElement("div");
        v3.className = "deliv_inner-inner";
        v3.innerText = "Стелаж: "+e["rack"];

        let v4 = document.createElement("div");
        v4.className = "deliv_inner-inner";
        v4.innerText = "Дата виготовлення: "+e["pdate"];

        let v5 = document.createElement("div");
        v5.className = "deliv_inner-inner";
        v5.innerText = "Термін придатності: "+e["due"];

        let v6 = document.createElement("div");
        v6.className = "deliv_inner-inner";
        v6.innerText = "Кількість упаковок в поставці: "+e["delam"];

        let v7 = document.createElement("div");
        v7.className = "deliv_inner-inner";
        v7.innerText = "Кількість одиниць на складі: "+e["storam"];

        let v8 = document.createElement("div");
        v8.className = "deliv_inner-inner";
        v8.innerText = "Ціна за упаковку: "+e["price"];

        let v9 = document.createElement("div");
        v9.className = "deliv_inner-inner";
        v9.innerText = "Загальна вартість: "+e["total"];

        let b = document.createElement("button");
        b.className = "btn btn-warning edit-groupr";
        b.innerText = "Редагувати";
        b.onclick = function () {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            passGroupVals(e["id"],e["shelf"],e["rack"],e["pdate"],e["delam"],e["price"],e["med"]);
        };

        node.appendChild(v1);
        node.appendChild(v2);
        node.appendChild(v3);
        node.appendChild(v4);
        node.appendChild(v5);
        node.appendChild(v6);
        node.appendChild(v7);
        node.appendChild(v8);
        node.appendChild(v9);
        node.appendChild(b);
        box.appendChild(node);
    });
}

function showSearches(data) {
    let box1 = document.getElementById("meds");
    box1.innerHTML = "";

    data.forEach(function (e) {
        let opt = document.createElement("option");
        opt.name=e["id"];
        opt.value=e["id"];
        opt.innerText = e["name"];
        box1.appendChild(opt);
    });
}

$('#up_sub').click(function () {
    let v1 = document.getElementById("up_id").value;
    let v2 = document.getElementById("up_sh").value;
    let v3 = document.getElementById("up_ra").value;
    let v4 = document.getElementById("up_date").value;
    let v5 = document.getElementById("up_am").value;
    let v6 = document.getElementById("up_pr").value;
    let v7 = document.getElementById("up_med").value;

    //alert(v1+" "+v2+" "+v3+" "+v4+" "+v5+" "+v6+" "+v7)

    if($(this).attr('name') === "submit_add"){
        $.ajax({
            url: "../../backend/php/getGroups.php",
            type: 'post',
            dataType: 'JSON',
            data: {groupAction:"addGroup",s:v2,r:v3,pd:v4,am:v5,pr:v6,med:v7},
            success: function(response){
                addAlert("Гурупу №"+v1+" додано успішно!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }
    else if($(this).attr('name') === "submit_update_group"){
        $.ajax({
            url: "../../backend/php/getGroups.php",
            type: 'post',
            dataType: 'JSON',
            data: {groupAction:"updateGroup",id:v1,s:v2,r:v3,pd:v4,am:v5,pr:v6,med:v7},
            success: function(response){
                addAlert("Групу №"+v1+" успішно відредаговано!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }

    //document.getElementById("g-form").reset();
    //clear_btn();
});