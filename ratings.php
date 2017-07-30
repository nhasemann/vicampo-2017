<?php
include_once './shared/isLoggedIn.php';
require_once('./database/ProductDatabase.php');
$db = new ProductDatabase();

if (isset($_POST['rateProduct'])) {
    try {
        $id = $_SESSION['userid'];
        $stmt2 = $db->selectRatingUser($id, $_POST['rateProduct']);
        $rated = $stmt2->fetchAll(PDO::FETCH_OBJ);
        if(empty($rated)){
            $db->insertRating($id, $_POST['rateProduct'], $_POST['ratingPrice'], $_POST['ratingTaste']);
        }else{
            $db->updateRating($_POST['ratingPrice'], $_POST['ratingTaste'], $id, $_POST['rateProduct']);
        }
        /*
         * public function insertRating($customerID, $productID, $priceRating, $tasteRating){
         */
    } catch (Exception $exception) {
        echo $exception->getMessage();
    }
}

try {
    $stmt = $db->selectAllProducts();
    $allProducts = $stmt->fetchAll(PDO::FETCH_OBJ);

    $stmt3 = $db->selectAllProductsRatings();
    $allProductsCustomerRatings = $stmt3->fetchAll(PDO::FETCH_OBJ);


} catch (Exception $exception) {
    echo $exception->getMessage();
}

$page = "./templates/ratings_template.php";
include_once './shared/master.php';