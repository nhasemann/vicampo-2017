<?php
include_once './shared/isLoggedIn.php';
require_once('./database/CustomerDatabase.php');
$db = new CustomerDatabase();

if(isset($_POST['submitImport']) && $_FILES['importFile']['size'] >0) {
    $file = $_FILES['importFile']['tmp_name'];

    $customersXML = simplexml_load_file($file);
    try {
        foreach($customersXML->customer as $customer){
            $db->insertCustomers($customer->name,$customer->username, $customer->password);
        }

    } catch (Exception $exception) {
        echo $exception->getMessage();
    }

    //$customersXML->customer[0]->name;

}elseif(isset($_POST['deleteUser'])){
    try{
        $db->deleteUser($_POST['deleteUser']);
    }catch(Exception $exception){
        echo $exception->getMessage();
    }
}

try{
    $stmt = $db->selectallUser();
    $alluser = $stmt->fetchAll(PDO::FETCH_OBJ);

}catch (Exception $exception){
    echo $exception->getMessage();
}

$page = "./templates/customers_template.php";
include_once './shared/master.php';