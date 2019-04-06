$('#logout-img').click(function () {
    window.location.href = "../../backend/php/logout.php"
});

$('#to-main-img').click(function () {
    window.location.href = "../../backend/php/mainManagerPage.php"
});

$('#to-dels-img').click(function () {
    window.location.href = "../../backend/php/deliveriesManagerPage.php"
});

$('#to-givs-img').click(function () {
    window.location.href = "../../backend/php/respPersonGivingsPage.php"
});

$('#to-meds-img').click(function () {
    window.location.href = "../../backend/php/respPersonPage.php"
});

$('#toggle-filters-btn').click(function () {
    $(this).parent().parent().find(".filters").slideToggle("fast");
});
