<?php

require_once 'DatabaseAbstract.php';

class ProductDatabase extends DatabaseAbstract
{
    private static $selectAllProducts = "SELECT * FROM products";
    private static $insertProducts = "INSERT INTO products (id, sku, name, image_url_small, image_url,
                                      wine_year, manufacturer_name) VALUES (?,?,?,?,?,?,?)";
    private static $deleteProduct = "DELETE FROM products WHERE productID = ?";
    private static $insertRating = "INSERT INTO ratings(customerID, productID, priceRating, tasteRating) 
                                    VALUES (?,?,?,?)";
    private static $updateRating = "UPDATE ratings SET priceRating = ?, tasteRating = ? WHERE customerID = ? AND 
                                    productID = ?";

    private static $selectRating = "SELECT *, avg(r.priceRating) as avgpriceRating, avg(r.tasteRating) as avgtasteRating FROM products p, ratings r WHERE p.productID = ? and 
                                    p.productID = r.productID";

    private static $selectRatingUser = "SELECT * FROM customers c, ratings r, products p WHERE c.customerID = ? AND
                                        p.productID = ? AND c.customerID = r.customerID and r.productID = 
                                        p.productID";

    private static $selectAllProductsRatings = "SELECT *, p.name as pname, c.name as cname
                                                FROM products p, ratings r, customers c 
                                                WHERE
                                                c.customerID = r.customerID and r.productID = p.productID";

    public function __construct()
    {
        parent::__construct();
    }

    public function selectAllProductsRatings()
    {
        return $this->doStatement(self::$selectAllProductsRatings);

    }

    public function updateRating($priceRating, $tasteRating, $customerID, $productID){
        $values = array($priceRating, $tasteRating, $customerID, $productID);
        return $this->doStatement(self::$updateRating, $values);
    }

    public function selectRatingUser($customerID, $productID){
        $values = array($customerID, $productID);
        return $this->doStatement(self::$selectRatingUser, $values);
    }

    public function selectRating($productID)
    {
        $values = array($productID);
        return $this->doStatement(self::$selectRating, $values);
    }

    public function insertRating($customerID, $productID, $priceRating, $tasteRating){
        $values = array($customerID, $productID, $priceRating, $tasteRating);
        return $this->doStatement(self::$insertRating, $values);
    }
    public function deleteProduct($productID)
    {
        $values = array($productID);
        return $this->doStatement(self::$deleteProduct, $values);
    }

    public function insertProducts($id, $sku, $name, $image_url_small, $image_url,
                                      $wine_year, $manufacturer_name)
    {
        $values = array($id, $sku, $name, $image_url_small, $image_url,
            $wine_year, $manufacturer_name);
        return $this->doStatement(self::$insertProducts, $values);
    }

    public function selectAllProducts()
    {
        return $this->doStatement(self::$selectAllProducts);

    }

}