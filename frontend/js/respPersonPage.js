document.getElementById("giving-cont").innerText = "";
JSON.parse(sessionStorage.getItem("givingList") || "[]").forEach(function (elem){
    if(elem !== null && elem.c !== 0)
        document.getElementById("giving-cont").innerText += elem.n + "  " +elem.c + "\n";
});

function showInfo(text) {
    document.getElementById("info-holder").innerText = text;
}

function showInfo_G(text) {
    document.getElementById("info-holder").innerText = text;
}

function addItem(id, name, avalAmount) {
    if(avalAmount === 0)
        return;
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    if(givings[id] !== null && typeof givings[id] !== 'undefined'){
        givings[id]["c"]+= 1;
        if(givings[id]["c"] > avalAmount)
            givings[id]["c"]-=1;
    }
    else {
        givings[id] = {n:name,c:1};
    }
    toStorage(givings);
}

function removeItem(id, name) {
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    if(givings[id] !== null && typeof givings[id] !== 'undefined'){
        givings[id]["c"]-= 1;
        if(givings[id]["c"] < 0)
            givings[id]["c"] = 0;
    }
    else {

    }
    toStorage(givings);
}

function toStorage(array) {
    document.getElementById("giving-cont").innerText = "";
    array.forEach(function (elem){
        if(elem !== null && elem.c !== 0)
            document.getElementById("giving-cont").innerText += elem.n + "  " +elem.c + "\n";
    });
    sessionStorage.setItem('givingList', JSON.stringify(array));
}

function createGiving() {
    let givings = JSON.parse(sessionStorage.getItem("givingList") || "[]");
    let d = [];
    givings.forEach(function (elem,i) {
        if(elem !== null)
            if(elem.c !== 0)
                d.push({id:i,name:elem.n,amount:elem.c});
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