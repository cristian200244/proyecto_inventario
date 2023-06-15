<?php
include_once(__DIR__ . "/config/config.example.php");
?>




<form id="forgetForm" method="POST">
    <div id="errorMessge" class="alert hidden">
    </div>
    <div id="inputSection">
        <div class="form-group">
            <input type="text" name="userName" class="form-control" placeholder="Username..." />
        </div>
        <div class="form-group">
            OR
        </div>
        <div class="form-group">
            <input type="email" name="userEmail" class="form-control" placeholder="Email address..." />
        </div>
        <div class="form-group">
            <input type="hidden" name="action" value="forgetPassword" />
            <input type="submit" class="btnSubmit" value="Reset Password" />
        </div>
    </div>
</form>


