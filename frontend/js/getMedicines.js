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
            url: "../../backend/php/getMedicines.php",
            type: 'POST',
            data:{query:prefix},
            dataType: 'JSON',
            success: function(response){
                showContent(response);
            }
        });
    }
    else
        update_content();
}

$('#sort-by-name-btn').click(function () {
    $.ajax({
        url: "../../backend/php/getMedicines.php?sorted_name=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#sort-by-prod-btn').click(function () {
    $.ajax({
        url: "../../backend/php/getMedicines.php?sorted_prod=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        }
    });
});

$('#show-with-finish-btn').click(function () {
    $.ajax({
        url: "../../backend/php/getMedicines.php?withFin=",
        type: 'get',
        dataType : 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

$('#show-finished-btn').click(function () {
    $.ajax({
        url: "../../backend/php/getMedicines.php?finished=",
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

$('#get-less-N').change(function () {
    let v = $(this).val();
    if(v === '' || v === 0) {
        update_content();
        return;
    }
    $.ajax({
        url: "../../backend/php/getMedicines.php",
        type: 'post',
        data:{action:"getLessN",n:v},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

$('#show-with-out').click(function () {
    $.ajax({
        url: "../../backend/php/getMedicines.php",
        type: 'post',
        data:{action:"getOut"},
        dataType: 'JSON',
        success: function(response){
            showContent(response);
        },
        error:function(xhr, status, error) {
            alert(xhr.responseText);
        }
    });
});

$('#show-with-soon-out').click(function () {
    $.ajax({
        url: "../../backend/php/getMedicines.php",
        type: 'post',
        data:{action:"getSoonOut"},
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
        url: "../../backend/php/getMedicines.php",
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
        title.innerText = e["name"];
        title.onclick = function(){
            $(this).parent().parent().find(".med-info").slideToggle("fast");
        };

        let amount = document.createElement("div");
        amount.className = "btn btn-success move-from-right";
        amount.innerText = "Кількість:"+e["amount"];

        let edit = document.createElement("button");
        edit.id = "update_prov";
        edit.className = "btn btn-warning";
        edit.innerText = "Редагувати";
        edit.onclick = function () {
            $("html, body").animate({ scrollTop: 0 }, "slow");
            medPassVals(e["id"],e["name"],e["producer"],e["desc"],e["type"],e["unitAmount"],e["temp"],e["term"]);
        };

        // let b2 = document.createElement("form");
        // b2.className = "prov-d";
        // b2.method = "post";
        // b2.action="medManagerPage.php";
        // b2.onsubmit = function () {
        //     return sub_delete();
        // };
        // let b2input = document.createElement("input");
        // b2input.className = "del_id";
        // b2input.type="number";
        // b2input.name="id";
        // b2input.value = e["id"];
        // let del = document.createElement("button");
        // del.className = "delete-btn form-down";
        // del.type="submit";
        // del.name="delete_med";
        // del.innerText = "Видалити";

        // b2.appendChild(b2input);
        // b2.appendChild(del);

        header.appendChild(title);
        header.appendChild(amount);
        header.appendChild(edit);
        //header.appendChild(b2);

        let info = document.createElement("div");
        info.className = "med-info";
        let prov = document.createElement("div");
        prov.innerText = "Виробник: "+e["producer"];
        let desc = document.createElement("div");
        desc.innerText = "Опис: "+e["desc"];
        let temp = document.createElement("div");
        temp.innerText = "Температура зберігання: "+e["temp"];
        let type = document.createElement("div");
        type.innerText = "Тип видачі: "+e["type"];
        let sep = document.createElement("div");
        sep.className = "separator";
        let t = document.createElement("div");
        t.innerText = "Групи:";
        let groups = document.createElement("div");
        groups.className = "med-info-row";
        groups.innerText = e["groups"]===""?"Груп немає":e["groups"];

        info.appendChild(prov);
        info.appendChild(desc);
        info.appendChild(temp);
        info.appendChild(type);
        info.appendChild(sep);
        info.appendChild(t);
        info.appendChild(groups);

        node.appendChild(header);
        node.appendChild(info);
        box.appendChild(node);
    });
}

$('#up_sub').click(function () {
    let v1 = document.getElementById("up_id").value;
    let v2 = document.getElementById("up_name").value;
    let v3 = document.getElementById("up_prod").value;
    let v4 = document.getElementById("up_type").value;
    let v5 = document.getElementById("up_am").value;
    let v6 = document.getElementById("up_term").value;
    let v7 = document.getElementById("up_temp").value;
    let v8 = document.getElementById("up_desc").value;

    //alert(v1+" "+v2+" "+v3+" "+v4+" "+v5+" "+v6+" "+v7)

    if($(this).attr('name') === "submit_add"){
        $.ajax({
            url: "../../backend/php/getMedicines.php",
            type: 'post',
            dataType: 'JSON',
            data: {action:"addMed",name:v2,prod:v3,type:v4,am:v5,term:v6,temp:v7,desc:v8},
            success: function(response){
                addAlert("Медикамент "+v2+" додано успішно!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }
    else if($(this).attr('name') === "submit_update_med"){
        $.ajax({
            url: "../../backend/php/getMedicines.php",
            type: 'post',
            dataType: 'JSON',
            data: {action:"updateMed",id:v1,name:v2,prod:v3,type:v4,am:v5,term:v6,temp:v7,desc:v8},
            success: function(response){
                addAlert("Медикамент "+v2+" успішно відредаговано!");
                showContent(response);
            },
            error:function () {
                alert('f')
            }
        });
    }

    document.getElementById("m-form").reset();
    clear_btn();
});
