<html>
<head>
    <META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <title>Менеджер</title>
    <link href="../../frontend/css/managerPageCSS.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="../../frontend/js/managerPage.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="page-holder">
    <div class="footer">
        <div class="account">
            <div class="account-name">
                {$managerName}
            </div>
            <div>
                <a href="logout.php">Вийти</a>
            </div>
            <div>
                <a href="mainManagerPage.php">На головну</a>
            </div>
        </div>
    </div>
    <div class="container row">
        <div class="content col-md-10">
            <div class="table-holder">
                <div class="row table-header border-shadow">
                    {foreach from=$header_vals item=h}
                        <div class="col-md-1">{$h}</div>
                    {/foreach}
                </div>
                <div class="table-content">
                    {foreach from=$del_vals item=v}
                        <div>{$v->toString()}</div>
                        {*<button id="update_prov" onclick="pass_values({$v->getId()},'{$v->getName()}','{$v->getCountry()}','{$v->getCity()}','{$v->getStreet()}','{$v->getBuildNo()}','{$v->getAccount()}','{$v->getEmail()}')">Update</button>*}
                        {*<form method="post" action="providersManagerPage.php" onsubmit="return sub_delete()">*}
                            {*<input class="del_id" type="number" name="id" value="{$v->getId()}">*}
                            {*<button type="submit" name="delete_prov">Delete</button>*}
                        {*</form>*}
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="navigator col-md-2">
            {*<div id="update_prov_div" class="center">*}
                {*<button id="close" style="float: right;">X</button>*}
                {*<form method="post" action="providersManagerPage.php">*}
                    {*<input id="up_name" type="text" name="name" placeholder="Company">*}
                    {*<input id="up_co" type="text" name="country" placeholder="Country">*}
                    {*<input id="up_ci" type="text" name="city" placeholder="City">*}
                    {*<input id="up_st" type="text" name="street" placeholder="Street">*}
                    {*<input id="up_bu" type="text" name="build" placeholder="Build">*}
                    {*<input id="up_ac" type="text" name="account" placeholder="Account">*}
                    {*<input id="up_em" type="text" name="email" placeholder="Email">*}
                    {*<input id="up_id" type="number" name="id" placeholder="id">*}
                    {*<input id="up_sub" type="submit" name="submit_add" value="Додати">*}
                {*</form>*}
            {*</div>*}
        </div>
    </div>
</div>
</body>
<script type="text/javascript" src="../../frontend/assets/libs/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../../frontend/js/managerPage.js"></script>
</html>