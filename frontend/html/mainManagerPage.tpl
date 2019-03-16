{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    <div class="header">
        <div class="account">
            <div class="account-name">
                {$managerName}
            </div>
            <div>
                <a href="logout.php">Вийти</a>
            </div>
        </div>
    </div>
    <div class="container row">
        <a href="writeoffManagerPage.php" id="writeoff-div" class="entity col-md-2">Write Off</a>
        <a href="issuanceManagerPage.php" id="issuance-div" class="entity col-md-2">Issuance</a>
        <a href="medManagerPage.php" id="medicines-div" class="entity col-md-2">Medicines</a>
        <a href="deliveriesManagerPage.php" id="deliveries-div" class="entity col-md-2">Deliveries</a>
        <a href="providersManagerPage.php" id="providers-div" class="entity col-md-2">Providers</a>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}