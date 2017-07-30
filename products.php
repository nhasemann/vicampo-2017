<?php
include_once './shared/isLoggedIn.php';
require_once('./database/ProductDatabase.php');
$db = new ProductDatabase();

if(isset($_POST['submitImport']) && $_FILES['importFile']['size'] >0) {
    $file = $_FILES['importFile']['tmp_name'];

    $productsXML = simplexml_load_file($file);
    try {
        foreach($productsXML->product as $product){
            $db->insertProducts($product->id, $product->sku, $product->name, $product->image_url_small,
                $product->image_url, $product->wine_year, $product->manufacturer_name);
        }

    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

    //$customersXML->customer[0]->name;

}elseif(isset($_POST['deleteProduct'])){
    try{
        $db->deleteProduct($_POST['deleteProduct']);
    }catch(Exception $exception){
        echo $exception->getMessage();
    }
}

try{
    $stmt = $db->selectAllProducts();
    $allProducts = $stmt->fetchAll(PDO::FETCH_OBJ);


}catch (Exception $exception){
    echo $exception->getMessage();
}



$page = "./templates/products_template.php";
include_once './shared/master.php';