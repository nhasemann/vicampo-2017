<div class="container">
        <br/>
        <form class="form-horizontal" action="login.php" method="post">
            <div class="form-group">
                <label for="userLogin"
                       class="control-label col-sm-2">Username:</label>
                <div class="col-sm-4">
                    <input id="userLogin" type="text" name="userLogin"
                           class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="passwordLogin"
                       class="control-label col-sm-2">Password:</label>
                <div class="col-sm-4">
                    <input id="passwordLogin" type="password"
                           name="passwordLogin"
                           class="form-control" required/>
                </div>
            </div>
            <div class="form-group">
                <label for="login"
                       class="control-label col-sm-2"></label>
                <div class="col-sm-6">
                    <input type="submit" id="login" class="btn btn-primary" value="login"
                           name="login">
                </div>
            </div>
        </form>
    </div>