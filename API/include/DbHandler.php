<?php

define('CREATED_SUCCESSFULLY', 0);
define('CREATE_FAILED', 1);
define('ALREADY_EXISTED', 2);
 

class DbHandler {
 
    private $conn;
 
    function __construct() {
        require_once 'DbConnect.php';
        $db = new DbConnect();
        $this->conn = $db->connect();
    }
 
    public function createUser($name, $email, $password) {
        require_once 'PassHash.php';
        $response = array();
 
        if (!$this->isUserExists($email)) {
           
            $password_hash = PassHash::hash($password);
 
            $api_key = $this->generateApiKey();
 
            $stmt = $this->conn->prepare("INSERT INTO users(name, email, password_hash, api_key, status) values(:name, :email, :password_hash, :api_key, 1)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password_hash', $password_hash);
            $stmt->bindParam(':api_key', $api_key);
            $result = $stmt->execute();
 
            $stmt = null;
 
            if ($result) {

                return CREATED_SUCCESSFULLY;

            } else {

                return CREATE_FAILED;

            }
        } else {
           
            return ALREADY_EXISTED;
        }
 
        return $response;
    }
 
   
    public function checkLogin($email, $password) {
       
        $stmt = $this->conn->prepare("SELECT password_hash FROM users WHERE email = :email");
       
        $stmt->execute(array('email' => $email));
 
        if ($stmt->rowCount() > 0) {
           
            $row = $stmt->fetch();

            $password_hash = $row['password_hash'];
 
            $stmt = null;
 
            if (PassHash::check_password($password_hash, $password)) {
                
                return TRUE;
            } else {
                
                return FALSE;
            }
        } else {
            $stmt = null;
 
           
            return FALSE;
        }
    }
 
    private function isUserExists($email) {
        $stmt = $this->conn->prepare("SELECT id from users WHERE email = :email");
        $stmt->execute(array('email' => $email));
        $num_rows = $stmt->rowCount();
        $stmt = null;
        return $num_rows > 0;
    }

    private function isProductExists($user_id, $product_id) {
        $stmt = $this->conn->prepare("SELECT id from vendor_products WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->execute(array('user_id' => $user_id, 'product_id' => $product_id));
        $num_rows = $stmt->rowCount();
        $stmt = null;
        return $num_rows > 0;
    }
 
 
    
    public function getUserByEmail($email) {
        $stmt = $this->conn->prepare("SELECT name, email, api_key, status, created_at FROM users WHERE email = :email");
        $stmt->execute(array('email' => $email));
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            $user = $stmt->fetch();
            $stmt = null;
            return $user;
        } else {
            return NULL;
        }
    }

    public function getUserInfo($user_id) {
        $stmt = $this->conn->prepare("SELECT name, email, api_key, status, created_at FROM users WHERE id = :user_id");
        $stmt->execute(array('user_id' => $user_id));
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            $user = $stmt->fetch();
            $stmt = null;
            return $user;
        } else {
            return NULL;
        }
    }
 
    public function getApiKeyById($user_id) {
        $stmt = $this->conn->prepare("SELECT api_key FROM users WHERE id = :id");
        $stmt->bindParam(':id', $user_id);
        if ($stmt->execute()) {
            $api_key = $stmt->fetch();
            $stmt = null;
            return $api_key;
        } else {
            return NULL;
        }
    }
 
    
    public function getUserId($api_key) {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE api_key = :api_key");
        $stmt->bindParam(':api_key', $api_key);
        if ($stmt->execute()) {
            $user_id = $stmt->fetch();
            $stmt = null;
            return $user_id;
        } else {
            return NULL;
        }
    
    }
 
   
    public function isValidApiKey($api_key) {
        $stmt = $this->conn->prepare("SELECT id from users WHERE api_key = :api_key");
        $stmt->bindParam(':api_key', $api_key);
        $stmt->execute();
        $num_rows = $stmt->rowCount();
        $stmt = null;
        return $num_rows > 0;
    }
 
   
    private function generateApiKey() {
        return md5(uniqid(rand(), true));
    }
 
    
    public function getAllProducts() {
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        $products = $stmt->fetchAll();
        $stmt = null;
        return $products;
    }

    public function getProductDetail($product_id) {
        $stmt = $this->conn->prepare("SELECT * from products WHERE id = :id");
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            $product = $stmt->fetch();
            $stmt = null;
            return $product;
        } else {
            return NULL;
        }
    }

    public function getProductImages($product_id) {
        $stmt = $this->conn->prepare("SELECT image_url from product_images WHERE product_id = :id");
        $stmt->bindParam(':id', $product_id);
        $stmt->execute();
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {

            $images = $stmt->fetchAll();

            $stmt = null;
            return $images;
        } else {
            return NULL;
        }
    }
    
    public function getProductbyCat($search) {

        $search = strtoupper($search);
        $search = strip_tags($search);
        $search = trim($search);
        $split_words = preg_split('/\s+/', $search);
        if(count($split_words) > 0) {

            $sql = "SELECT DISTINCT name,category FROM products WHERE";

            for($i=0 ; $i < count($split_words); $i++){
                $split_words[$i] = '%'.$split_words[$i].'%';

                $sql .= " name LIKE ? OR";
            }

            $sql = substr($sql , 0, -3); //Remove last 3 characters OR with space
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($split_words);
        }

        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            $products = $stmt->fetchAll();
            $stmt = null;
            return $products;
        } 
        else {
            $stmt = null;
            return null;
        }

    }


    public function searchProducts($search) {

        $search = strtoupper($search);
        $search = strip_tags($search);
        $search = trim($search);
        $split_words = preg_split('/\s+/', $search);
        if(count($split_words) > 0) {

            $sql = "SELECT * FROM products WHERE ";

            for($i=0 ; $i < count($split_words); $i++){
                $split_words[$i] = '%'.$split_words[$i].'%';

                $sql .= " name LIKE ? OR";
            }

            $sql = substr($sql , 0, -3); //Remove last 3 characters OR with space
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($split_words);
        }

        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            $products = $stmt->fetchAll();
            $stmt = null;
            return $products;
        } 
        else {
            $stmt = null;
            return null;
        }

    }
    
    public function searchByname($search) {

        $search = strtoupper($search);
        $search = strip_tags($search);
        $search = urldecode($search);
        $search = trim($search);
        $search = preg_replace('/\s+/', ' ', $search);
        $search = '%'.$search.'%';
        $sql = "SELECT * FROM products WHERE name lIKE ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array($search));
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            $products = $stmt->fetchAll();
            $stmt = null;
            return $products;
        } 
        else {
            $stmt = null;
            return null;
        }

    }

    

    public function getAllListedProducts($user_id) {
        $stmt = $this->conn->prepare("SELECT * FROM vendor_products WHERE user_id=:user_id ");
        $stmt->execute(array('user_id' => $user_id ));
        $products = $stmt->fetchAll();
        $stmt = null;
        return $products;
    }

     public function getListedProductDetail($user_id, $product_id) {
        $stmt = $this->conn->prepare("SELECT * from vendor_products WHERE user_id = :user_id AND product_id = :product_id ");
        $stmt->execute(array('user_id' => $user_id , 'product_id' => $product_id ));
        $num_rows = $stmt->rowCount();
        if ($num_rows > 0) {
            $product = $stmt->fetch();
            $stmt = null;
            return $product;
        } else {
            return NULL;
        }
    }

    public function addProducttoSell($user_id, $formvars){

        $keys = array_keys($formvars);
        $desired_keys = array('product_id', 'unit_price', 'stock', 'min_qty', 'status', 'shipping_time', 'remarks');

        foreach($desired_keys as $desired_key){
           if(in_array($desired_key, $keys)) continue;  
           $formvars[$desired_key] = null;
        }
        
        if (!$this->isProductExists($user_id, $formvars['product_id'])) {
           
            $stmt = $this->conn->prepare("INSERT INTO vendor_products(user_id, product_id , unit_price , stock ,  min_qty , status, shipping_time, remarks) VALUES(:user_id, :product_id , :unit_price ,:stock,  :min_qty ,:status, :shipping_time, :remarks) ");

            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':product_id', $formvars['product_id']);
            $stmt->bindParam(':unit_price', $formvars['unit_price']);
            $stmt->bindParam(':stock', $formvars['stock']);
            $stmt->bindParam(':min_qty', $formvars['min_qty']);
            $stmt->bindParam(':status', $formvars['status']);
            $stmt->bindParam(':shipping_time', $formvars['shipping_time']);
            $stmt->bindParam(':remarks', $formvars['remarks']);
            $result = $stmt->execute(); 
            $stmt = null;
 
            if ($result) {

                return CREATED_SUCCESSFULLY;

            } else {

                return CREATE_FAILED;

            }
        } else {
           
            return ALREADY_EXISTED;
        }
    }

    public function pdoSet($keys, $formvars) {
        
        $set = '';

        foreach ($keys as $key) {
        
                $set .= "$key = :$key,";
        }
      
        return rtrim($set, ',');
    }



    public function updateListedProduct($user_id, $product_id, $formvars) {

        $keys = array_keys($formvars);
        $set = $this->pdoSet($keys,$formvars);
        $sql = "UPDATE vendor_products SET $set WHERE user_id = :user_id AND product_id = :product_id";
        $stmt = $this->conn->prepare($sql);
        $formvars['user_id'] = $user_id;
        $formvars['product_id'] = $product_id;
        $stmt->execute($formvars); 
        $num_rows = $stmt->rowCount();
        $stmt = null;
        return $num_rows > 0;
    }


    public function deleteListedProduct($user_id, $product_id) {
        $stmt = $this->conn->prepare("DELETE FROM vendor_products WHERE user_id = :user_id AND product_id = :product_id");
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':product_id', $product_id);
        $stmt->execute();
        $num_rows = $stmt->rowCount();
        $stmt = null;
        return $num_rows > 0;
    }
 
}
 
?>