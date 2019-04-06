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


function addAlert(message) {
    $('html, body').append("<div id=\"b-alert\" class=\"alert alert-success fixed-to-r-conner hide-it\">"+ message +"</div>");
    $("#b-alert").fadeTo(6000, 500).slideUp(500, function(){
        $("#b-alert").slideUp(500);
    });
}

