<div class="container">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
        <li><a href="#new" data-toggle="tab">New Ratings</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="overview">
            <div class="container">
                <br/>
                <table class="table table-striped">
                    <tr>
                        <th>Product name</th>
                        <th>Customer name</th>
                        <th>Rating (Price)</th>
                        <th>Rating (Taste)</th>
                    </tr>
                    <?php
                    if(!empty($allProductsCustomerRatings)) {
                        foreach ($allProductsCustomerRatings as $object) {
                            ?>
                            <tr>
                                <td> <?php echo $object->pname ?></td>
                                <td> <?php echo $object->cname ?></td>
                                <td> <?php echo $object->priceRating ?></td>
                                <td> <?php echo $object->tasteRating ?></td>
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

                <table class="table table-striped">
                    <tr>


                        <th>Picture</th>
                        <th>Name</th>
                        <th>Wine Year</th>
                        <th>Given Rating (Price)</th>
                        <th>Given Rating (Taste)</th>
                        <th>New Rating (Price)</th>
                        <th>New Rating (Taste)</th>
                        <th></th>
                    </tr>
                    <?php
                    if (!empty($allProducts)) {
                        foreach ($allProducts as $product) {
                            ?>
                            <tr>
                                <td><img src="<?php echo $product->image_url_small ?>" alt="Wine" "></td>
                                <td> <?php echo $product->name ?> </td>
                                <td> <?php echo $product->wine_year ?> </td>
                                <?php
                                $id = $_SESSION['userid'];
                                $stmt2 = $db->selectRatingUser($id, $product->productID);
                                $allRatings = $stmt2->fetchAll(PDO::FETCH_OBJ);
                                if (!empty($allRatings)) {
                                    foreach ($allRatings as $rating) {
                                        ?>
                                        <td> <?php echo $rating->priceRating ?></td>
                                        <td> <?php echo $rating->tasteRating ?></td>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <td> Not rated yet.</td>
                                    <td> Not rated yet.</td>

                                <?php } ?>
                                <td>
                                    <form class="form-horizontal" action="ratings.php" method="post">
                                        <select class="form-control" name="ratingPrice">
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>

                                        </select>
                                </td>
                                <td><select class="form-control" name="ratingTaste">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </td>
                                <td>

                                    <div>

                                        <button type="submit" class="btn btn-success" aria-label="Left Align"
                                                name="rateProduct" value="<?php echo $product->productID ?>">
                                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                        </button>
                                    </div>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                    } ?>
                </table>
            </div>
        </div>
    </div>
</div>