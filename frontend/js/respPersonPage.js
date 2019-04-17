$(function () {
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    showGivings(givings);
});

//elem - med, max, name, amount
function showGivings(givings){
    let container = document.getElementById("giving-inner");
    while (container.hasChildNodes())
        container.removeChild(container.lastChild);
    givings.forEach(function (elem){
        if(elem !== null && elem.c !== 0) {
            createRow(container,elem.med,elem.max,elem.name,elem.amount);
        }
    });
}

$('#giving-add').click(function () {
    let input = $('#giving-search');
    let list = $('#medicines');
    let med = input.val();
    let max = list.find('option[value="' +med + '"]').attr('data-max');
    let name = list.find('option[value="' +med + '"]').attr('name');

    if(name === undefined)
        return;

    let b = addToJSON(med,max,name,1);
    if(b === true)
        createRow(document.getElementById("giving-inner"),med,max,name,1);

    input.val('');
    showGivings(JSON.parse(sessionStorage.getItem("givingList") || "[]"));
});

function createRow(container,med,max,name,val) {
    let d = document.createElement("div");
    d.className = "giving-row";
    let t = document.createElement("div");
    t.className = "giving-row-title";
    t.innerText = med;
    let i = document.createElement("input");
    i.className = "giving-row-input";
    i.type = "number";
    i.id = "inp-"+name;
    i.max = max;
    i.min = 1;
    i.value = val;
    i.name = name;
    i.onkeydown = function(){
        return false;
    };
    $(document).on("change", "#inp-"+name, function(){
        let val = document.getElementById("inp-"+name).value;
        changeVal(med,max,name,val);
        showGivings(JSON.parse(sessionStorage.getItem("givingList") || "[]"));
    });
    let b = document.createElement("button");
    b.innerText = "x";
    b.className = "giving-row-delete btn btn-danger";
    b.onclick = function(){
        removeItem(name);
    };

    d.appendChild(t);
    d.appendChild(i);
    d.appendChild(b);
    container.appendChild(d);
}
//elem - med, max, name, amount
function addToJSON(med,max,name,v) {
    let b = false;
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    if(givings[name] !== null && typeof givings[name] !== 'undefined'){
        givings[name]["amount"]+= 1;
        if(givings[name]["amount"] > max)
            givings[name]["amount"]-=1;
    }
    else {
        givings[name] = {med:med,max:max,name:name,amount:v};
        b = true;
    }
    sessionStorage.setItem('givingList', JSON.stringify(givings));
    //showGivings(givings);
    return b;
}

function changeVal(med,max,name,v) {
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    if(givings[name] !== null && typeof givings[name] !== 'undefined'){
        givings[name]["amount"]= parseInt(v);
        if(givings[name]["amount"] > parseInt(max))
            givings[name]["amount"]=max;
    }
    sessionStorage.setItem('givingList', JSON.stringify(givings));
}

function removeItem(id) {
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    givings[id] = null;
    sessionStorage.setItem('givingList', JSON.stringify(givings));

    showGivings(JSON.parse(sessionStorage.getItem("givingList") || "[]"));
}


