{include "../../frontend/html/header.tpl"}
<div class="page-holder">
    <div class="header">
        <img id="logout-img" class="img-header" src="../../frontend/assets/images/exit.png">
        <div class="ver-separator"></div>
        <div class="account-name">
            {$managerName}
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
<script type="text/javascript" src="../../frontend/assets/libs/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
<script type="text/javascript" src="../../frontend/js/pages.js"></script>
<script type="text/javascript" src="../../frontend/js/managerHome.js"></script>
</body>
</html>