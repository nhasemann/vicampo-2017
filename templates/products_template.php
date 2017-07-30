<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <li><a href="#new" data-toggle="tab">New Products</a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane active" id="overview">
            <div class="container">
                <br/>
                <table class="table table-striped">
                    <tr>


                        <th>ProductID</th>
                        <th>Id</th>
                        <th>Sku</th>
                        <th>Name</th>
                        <th>Wine Year</th>
                        <th>Manufacturer</th>
                        <th>Price (AVG-Rating)</th>
                        <th>Taste (AVG-Rating)</th>
                        <th></th>
                    </tr>
                    <?php
                    if(!empty($allProducts)) {
                        foreach ($allProducts as $product) {
                            ?>
                            <tr>
                                <td> <?php echo $product->productID ?> </td>
                                <td> <?php echo $product->id ?> </td>
                                <td> <?php echo $product->sku ?> </td>
                                <td> <?php echo $product->name ?> </td>
                                <td> <?php echo $product->wine_year ?> </td>
                                <td> <?php echo $product->manufacturer_name ?> </td>
                                <?php
                                    $stmt2 = $db->selectRating($product->productID);
                                    $ratings = $stmt2 ->fetchObject();
                                    if(!empty($ratings)){
                                    echo '<td>'.$ratings->avgpriceRating.'</td>';
                                        echo '<td>'.$ratings->avgtasteRating.'</td>';
                                    }?>
                                <td>
                                    <form class="form-horizontal" action="customers.php" method="post">
                                        <div>
                                            <button type="submit" class="btn btn-danger" aria-label="Left Align" name="deleteProduct" value="<?php echo $product->productID?>">
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
                <form class="form-horizontal" action="products.php" method="POST"
                      enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="importFile" class="control-label col-sm-2">XML - Products-Import</label>
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
            </div>
        </div>
    </div>
</div>