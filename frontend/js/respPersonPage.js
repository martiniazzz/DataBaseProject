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
    i.max = max;
    i.min = 1;
    i.value = val;
    i.name = name;
    i.onkeydown = function(){
        return false;
    };

    d.appendChild(t);
    d.appendChild(i);
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


function createGiving() {
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
    if (confirm("Підтвердіть створення видачі") === true) {
        document.getElementById("issue-data").value = JSON.stringify(d);
        sessionStorage.clear();
        return true;
    }
    return false;
}



