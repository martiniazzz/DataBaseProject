$('#up_id').hide();
$('.del_id').hide();
//$('#alert-form').removeClass('hide').slideDown().show();
function pass_values(id,nm,co,ci,st,bu,ac,em) {
    document.getElementById("up_sub").name = "submit_update_prov";
    document.getElementById("up_sub").value = "Оновити";
    document.getElementById("up_id").value = id;
    document.getElementById("up_name").value = nm;
    document.getElementById("up_co").value = co;
    document.getElementById("up_ci").value = ci;
    document.getElementById("up_st").value = st;
    document.getElementById("up_bu").value = bu;
    document.getElementById("up_ac").value = ac;
    document.getElementById("up_em").value = em;
}

function deliv_pass_values(id,d,p) {
    document.getElementById("up_sub").name = "submit_update_del";
    document.getElementById("up_sub").innerText = "Оновити";
    document.getElementById("up_idp").value = id;
    document.getElementById("up_date").value = d;
    document.getElementById("up_prov").value = p;
}


function clear_btn() {
    document.getElementById("up_sub").name = "submit_add";
    document.getElementById("up_sub").value = "Додати";
    document.getElementById("up_sub").innerText = "Додати";
}

function sub_delete() {
    if (confirm("Підтвердіть видалення!") === true)
        return true;
    return false;
}

function showGroups(array) {
    document.getElementById("groups-holder").innerText = array;
}

function addWriteOff(){
    let input = $('#up_prov');
    let list = $('#groups');
    let med = input.val();
    let id = list.find('option[value="' +med + '"]').attr('name');
    input.value = id;

    return true;
}

function passForPhone(id) {
    document.getElementById("phone_add_pid").value = id;
}

function validatePhone() {
    let phone = document.getElementById("phone_holder").value;
    document.getElementById("phone_add_phone").value = phone;
    return !(phone.length === 0);
}

function validIt() {
    alert(document.getElementById("provs_list_inp").value);
}

function medPassVals(id,name,prod,desc,type,amount,temp,term) {
    document.getElementById("up_sub").name = "submit_update_med";
    document.getElementById("up_sub").value = "Оновити";
    document.getElementById("up_name").value = name;
    document.getElementById("up_prod").value = prod;
    document.getElementById("up_type").value = type;
    document.getElementById("up_am").value = amount;
    document.getElementById("up_term").value = term;
    document.getElementById("up_temp").value = temp;
    document.getElementById("up_desc").value = desc;
    document.getElementById("up_id").value = id;
}

function passGroupVals(id,shelf,rack,prodD,amount,price,med) {
    document.getElementById("up_sub").name = "submit_update_group";
    document.getElementById("up_sub").value = "Оновити";
    document.getElementById("up_sh").value = shelf;
    document.getElementById("up_ra").value = rack;
    document.getElementById("up_date").value = prodD;
    document.getElementById("up_am").value = amount;
    document.getElementById("up_pr").value = price;
    document.getElementById("up_med").value = med;
    document.getElementById("up_id").value = id;
}