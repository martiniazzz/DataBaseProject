{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    <div class="header">
        <div class="account">
            <div class="account-name">
                {$managerName}
            </div>
            <div class="account-exit">
                <a href="logout.php">Вийти</a>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="manager-main-holder col-md-12">
                <a href="providersManagerPage.php" id="providers-div" class="entity">Постачальники</a>
                <a href="deliveriesManagerPage.php" id="deliveries-div" class="entity">Поставки</a>
                <a href="medManagerPage.php" id="medicines-div" class="entity">Медикаменти</a>
                <a href="issuanceManagerPage.php" id="issuance-div" class="entity">Видачі</a>
                <a href="writeoffManagerPage.php" id="writeoff-div" class="entity">Списання</a>
                <a href="infoManagerPage.php" id="analits-div" class="entity">Аналітика</a>
            </div>
        </div>
    </div>
</div>
{include "../../frontend/html/footer.tpl"}