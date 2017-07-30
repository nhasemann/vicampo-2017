<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <li><a href="#new" data-toggle="tab">New Customer</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="overview">
            <div class="container">
                <br/>
                <table class="table table-striped">
                    <tr>
                        <th>customerID</th>
                        <th>name</th>
                        <th>username</th>
                        <th>password</th>
                        <th></th>
                    </tr>
                    <?php
                    if(!empty($alluser)) {
                        foreach ($alluser as $user) {
                            ?>
                            <tr>
                                <td> <?php echo $user->customerID ?> </td>
                                <td> <?php echo $user->name ?> </td>
                                <td> <?php echo $user->username ?> </td>
                                <td> <?php echo $user->password ?> </td>
                                <td>
                                    <form class="form-horizontal" action="customers.php" method="post">
                                        <div>
                                            <button type="submit" class="btn btn-danger" aria-label="Left Align" name="deleteUser" value="<?php echo $user->customerID?>">
                                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                            </button>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    }?>
                </table>
            </div>
        </div>
        <div class="tab-pane" id="new">
            <div class="container">
                <br/>
                <form class="form-horizontal" action="customers.php" method="POST"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="importFile" class="control-label col-sm-2">XML - Customer-Import</label>
                        <div class="col-sm-4">
                            <input id="importFile" class="control-label col-sm-4" type="file"
                                   name="importFile"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="submitImport"
                               class="control-label col-sm-2"></label>

                        <div class="col-sm-2">
                            <input type="submit" id="submitImport" class="btn btn-primary"
                                   name="submitImport" value="import"/>
                        </div>
                    </div>
                </form>
                <?php
                    /*
                    if(!empty($customersXML)){
                        echo $customersXML->customer[0]->name;
                    }
                    */
                ?>
            </div>
        </div>
    </div>
</div>