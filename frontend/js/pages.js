$(".med-name").click(function (){
    $(this).parent().find(".med-info").slideToggle("fast");
});

function handleClick(myRadio) {
    if(myRadio.value === "manager")
        document.getElementById("depart").style.display = "none";
    else
        document.getElementById("depart").style.display = "block";
}

function confirmDelete() {
    if (confirm("Підтвердіть видалення!") === true)
        return false;
    return false;
}

