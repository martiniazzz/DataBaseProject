$(document).ready(function() {
    //update_content();
    //add_searches();
});

$('#meds-stat').click(function(){
    $.ajax({
        url: "../../backend/php/getInfoManager.php",
        type: 'post',
        data:{action:"medicineInfo"},
        dataType: 'JSON',
        success: function(response){
            showStatMed(response);
        },
        error:function(xhr) {
            alert(xhr.responseText);
        }
    });
});

$('#groups-stat').click(function () {
    $.ajax({
        url: "../../backend/php/getInfoManager.php",
        type: 'post',
        data:{action:"groupsInfo"},
        dataType: 'JSON',
        success: function(response){
            showStat(response);
        },
        error:function(xhr) {
            alert(xhr.responseText);
        }
    });
});

$('#provs-stat').click(function () {
    $.ajax({
        url: "../../backend/php/getInfoManager.php",
        type: 'post',
        data:{action:"provsStat"},
        dataType: 'JSON',
        success: function(response){
            showStatProv(response);
        },
        error:function(xhr) {
            alert(xhr.responseText);
        }
    });
});

$('#giv-stat').click(function () {
    $.ajax({
        url: "../../backend/php/getInfoManager.php",
        type: 'post',
        data:{action:"givStat"},
        dataType: 'JSON',
        success: function(response){
            showStatIs(response);
        },
        error:function(xhr) {
            alert(xhr.responseText);
        }
    });
});

$('#del-stat').click(function () {
    $.ajax({
        url: "../../backend/php/getInfoManager.php",
        type: 'post',
        data:{action:"delStat"},
        dataType: 'JSON',
        success: function(response){
            showStatAm(response);
        },
        error:function(xhr) {
            alert(xhr.responseText);
        }
    });
});

function showStatAm(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";

    let titles = ["Загальна кількість: ", "За останні півроку: ", "За останні три місяці: ", "За останній місяць: "];
    let i = 0;

    let node1 = document.createElement("div");
    node1.className = "stat-holder col-md-12";
    let v1 = document.createElement("div");
    v1.className = "stat-header";
    v1.innerText = "Поставки";
    node1.appendChild(v1);
    let b1 = document.createElement("div");
    b1.className = "stat-inner";
    node1.appendChild(b1);
    data["dels"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = titles[i++]+e;

        b1.appendChild(q);
    });

    i = 0;
    let node2 = document.createElement("div");
    node2.className = "stat-holder col-md-12";
    let v2 = document.createElement("div");
    v2.className = "stat-header";
    v2.innerText = "Видачі";
    node2.appendChild(v2);
    let b2 = document.createElement("div");
    b2.className = "stat-inner";
    node2.appendChild(b2);
    data["givs"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = titles[i++]+e;

        b2.appendChild(q);

    });

    i = 0;
    let node3 = document.createElement("div");
    node3.className = "stat-holder col-md-12";
    let v3 = document.createElement("div");
    v3.className = "stat-header";
    v3.innerText = "Списання";
    node3.appendChild(v3);
    let b3 = document.createElement("div");
    b3.className = "stat-inner";
    node3.appendChild(b3);
    data["offs"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = titles[i++]+e;

        b3.appendChild(q);
    });

    box.appendChild(node1);
    box.appendChild(node2);
    box.appendChild(node3);
}

function showStatIs(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";

    let node1 = document.createElement("div");
    node1.className = "stat-holder col-md-12";
    let v1 = document.createElement("div");
    v1.className = "stat-header";
    v1.innerText = "Відповідальні особи, що отримували найбільше видач";
    node1.appendChild(v1);
    let b1 = document.createElement("div");
    b1.className = "stat-inner";
    node1.appendChild(b1);
    data["maxr"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b1.appendChild(q);
    });

    let node2 = document.createElement("div");
    node2.className = "stat-holder col-md-12";
    let v2 = document.createElement("div");
    v2.className = "stat-header";
    v2.innerText = "Відповідальні особи, що отримували найменше видач";
    node2.appendChild(v2);
    let b2 = document.createElement("div");
    b2.className = "stat-inner";
    node2.appendChild(b2);
    data["minr"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b2.appendChild(q);

    });

    box.appendChild(node1);
    box.appendChild(node2);

    let node3 = document.createElement("div");
    node3.className = "stat-holder col-md-12";
    let v3 = document.createElement("div");
    v3.className = "stat-header";
    v3.innerText = "Відділи, на які видавалося найбільше видач";
    node3.appendChild(v3);
    let b3 = document.createElement("div");
    b3.className = "stat-inner";
    node3.appendChild(b3);
    data["maxd"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b3.appendChild(q);
    });

    let node4 = document.createElement("div");
    node4.className = "stat-holder col-md-12";
    let v4 = document.createElement("div");
    v4.className = "stat-header";
    v4.innerText = "Відділи, на які видавалося найменше видач";
    node4.appendChild(v4);
    let b4 = document.createElement("div");
    b4.className = "stat-inner";
    node4.appendChild(b4);
    data["mind"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b4.appendChild(q);

    });

    box.appendChild(node3);
    box.appendChild(node4);
}

function showStatMed(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";

    let node1 = document.createElement("div");
    node1.className = "stat-holder col-md-12";
    let v1 = document.createElement("div");
    v1.className = "stat-header";
    v1.innerText = "Медикаменти, що постачалися найбільше";
    node1.appendChild(v1);
    let b1 = document.createElement("div");
    b1.className = "stat-inner";
    node1.appendChild(b1);
    data["maxd"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b1.appendChild(q);
    });

    let node2 = document.createElement("div");
    node2.className = "stat-holder col-md-12";
    let v2 = document.createElement("div");
    v2.className = "stat-header";
    v2.innerText = "Медикаменти, що постачалися найменше";
    node2.appendChild(v2);
    let b2 = document.createElement("div");
    b2.className = "stat-inner";
    node2.appendChild(b2);
    data["mind"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b2.appendChild(q);

    });

    box.appendChild(node1);
    box.appendChild(node2);

    let node3 = document.createElement("div");
    node3.className = "stat-holder col-md-12";
    let v3 = document.createElement("div");
    v3.className = "stat-header";
    v3.innerText = "Медикаменти, що видавалися найбільше";
    node3.appendChild(v3);
    let b3 = document.createElement("div");
    b3.className = "stat-inner";
    node3.appendChild(b3);
    data["maxg"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b3.appendChild(q);
    });

    let node4 = document.createElement("div");
    node4.className = "stat-holder col-md-12";
    let v4 = document.createElement("div");
    v4.className = "stat-header";
    v4.innerText = "Медикаменти, що видавалися найменше";
    node4.appendChild(v4);
    let b4 = document.createElement("div");
    b4.className = "stat-inner";
    node4.appendChild(b4);
    data["ming"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b4.appendChild(q);

    });

    box.appendChild(node3);
    box.appendChild(node4);

    let node5 = document.createElement("div");
    node5.className = "stat-holder col-md-12";
    let v5 = document.createElement("div");
    v5.className = "stat-header";
    v5.innerText = "Медикаменти, що списувалися найбільше";
    node5.appendChild(v5);
    let b5 = document.createElement("div");
    b5.className = "stat-inner";
    node5.appendChild(b5);
    data["maxw"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b5.appendChild(q);
    });

    let node6 = document.createElement("div");
    node6.className = "stat-holder col-md-12";
    let v6 = document.createElement("div");
    v6.className = "stat-header";
    v6.innerText = "Медикаменти, що списувалися найменше";
    node6.appendChild(v6);
    let b6 = document.createElement("div");
    b6.className = "stat-inner";
    node6.appendChild(b6);
    data["minw"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b6.appendChild(q);

    });

    box.appendChild(node5);
    box.appendChild(node6);

    data["stat"].forEach(function (e) {
        let node = document.createElement("div");
        node.className = "stat-holder col-md-6";

        let v1 = document.createElement("div");
        v1.className = "stat-header";
        v1.innerText = e["name"];

        let b = document.createElement("div");
        b.className = "stat-inner";

        let v2 = document.createElement("div");
        v2.className = "stat-in";
        v2.innerText = "Прихід: "+e["arr"];
        let v3 = document.createElement("div");
        v3.className = "stat-in";
        v3.innerText = "Залишок: "+e["left"];
        let v4 = document.createElement("div");
        v4.className = "stat-in";
        v4.innerText = "Видано: "+e["givs"];
        let v5 = document.createElement("div");
        v5.className = "stat-in";
        v5.innerText = "Списано: "+e["offs"];

        b.appendChild(v2);
        b.appendChild(v3);
        b.appendChild(v4);
        b.appendChild(v5);

        node.appendChild(v1);
        node.appendChild(b);

        box.appendChild(node);
    });
}

function showStat(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";
    data.forEach(function (e) {
        let node = document.createElement("div");
        node.className = "stat-holder col-md-6";

        let v1 = document.createElement("div");
        v1.className = "stat-header";
        v1.innerText = "Група №"+e["id"]+" ("+e["name"]+")";

        let b = document.createElement("div");
        b.className = "stat-inner-g";

        let v2 = document.createElement("div");
        v2.className = "stat-in";
        v2.innerText = "Прихід: "+e["arr"];
        let v3 = document.createElement("div");
        v3.className = "stat-in";
        v3.innerText = "Залишок: "+e["left"];
        let v4 = document.createElement("div");
        v4.className = "stat-in";
        v4.innerText = "Видано: "+e["givs"];
        let v5 = document.createElement("div");
        v5.className = "stat-in";
        v5.innerText = "Списано: "+e["offs"];

        let v6 = document.createElement("div");
        v6.className = "stat-in-button";
        let but = document.createElement("button");
        but.className = "btn btn-primary";
        but.innerText = "Надрукувати детальний звіт";
        but.onclick = function(){
            $.ajax({
                url: "../../backend/php/getInfoManager.php",
                type: 'post',
                data:{action:"getGroupInfo",id:e["id"]},
                dataType: 'JSON',
                success: function(response){
                    printReport(response);
                },
                error:function(xhr) {
                    alert(xhr.responseText);
                }
            });
        };
        v6.appendChild(but);

        b.appendChild(v2);
        b.appendChild(v3);
        b.appendChild(v4);
        b.appendChild(v5);
        b.appendChild(v6);

        node.appendChild(v1);
        node.appendChild(b);

        box.appendChild(node);
    });
}

function showStatProv(data) {
    let box = document.getElementById("container-box");
    box.innerHTML = "";

    let node1 = document.createElement("div");
    node1.className = "stat-holder col-md-12";
    let v1 = document.createElement("div");
    v1.className = "stat-header";
    v1.innerText = "Постачальники, що постачали найбільше поставок";
    node1.appendChild(v1);
    let b1 = document.createElement("div");
    b1.className = "stat-inner";
    node1.appendChild(b1);
    data["max"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b1.appendChild(q);

    });

    let node2 = document.createElement("div");
    node2.className = "stat-holder col-md-12";
    let v2 = document.createElement("div");
    v2.className = "stat-header";
    v2.innerText = "Постачальники, що постачали найменше поставок";
    node2.appendChild(v2);
    let b2 = document.createElement("div");
    b2.className = "stat-inner";
    node2.appendChild(b2);
    data["min"].forEach(function (e) {
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = e;

        b2.appendChild(q);

    });

    box.appendChild(node1);
    box.appendChild(node2);

    data["stat"].forEach(function (e) {
        let node3 = document.createElement("div");
        node3.className = "stat-holder col-md-6";
        let v3 = document.createElement("div");
        v3.className = "stat-header";
        v3.innerText = e["name"];
        node3.appendChild(v3);
        let b3 = document.createElement("div");
        b3.className = "stat-inner";
        node3.appendChild(b3);
        let q = document.createElement("div");
        q.className = "stat-in";
        q.innerText = "Кількість поставок - "+e["amount"]+" - загальною вартістю - "+e["total"]+"грн.";

        b3.appendChild(q);
        box.appendChild(node3);
    });
}

function printReport(data) {
    let html = $("#print-content");
    html.removeClass("display-none");
    $('#underline-t', html).text(data["info"]["name"]);
    $('#info', html).text(data["info"]["info"]);
    $('#groupNO', html).text(data["info"]["id"]);
    $('#rack', html).text(data["info"]["rack"]);
    $('#shelf', html).text(data["info"]["shelf"]);
    $('#type', html).text(data["info"]["type"]);
    $('#delAmount', html).text(data["info"]["delAmount"]);
    $('#amount', html).text(data["info"]["amount"]);
    $('#price', html).text(data["info"]["price"]);
    $('#total', html).text(data["info"]["total"]);

    let delivs = data["del"];
    let originContent = $('#cont-table', html).html();
    delivs.forEach(function (e) {
        let tr = document.createElement("tr");
        let td1 = document.createElement("td");
        td1.innerText = e["date"];
        let td2 = document.createElement("td");
        td2.innerText = e["doc"];
        let td3 = document.createElement("td");
        td3.innerText = e["name"];
        let td4 = document.createElement("td");
        td4.innerText = e["amount"];
        let td5 = document.createElement("td");
        tr.appendChild(td1);
        tr.appendChild(td2);
        tr.appendChild(td3);
        tr.appendChild(td4);
        tr.appendChild(td5);
        $('#cont-table', html).append(tr);
    });

    $(html).print({
        globalStyles: true,
        mediaPrint: true,
        stylesheet: null,
        noPrintSelector: ".no-print",
        iframe: true,
        append: null,
        prepend: null,
        manuallyCopyFormValues: true,
        timeout: 500,
        title: "Карточка складського обліку матеріалів",
        doctype: '<!doctype html>'
    });

    $('#cont-table', html).html(originContent);
}