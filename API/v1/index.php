<?php
 
require_once '../include/DbHandler.php';
require_once '../include/PassHash.php';
require '.././libs/Slim/Slim.php';
 
\Slim\Slim::registerAutoloader();
 
$app = new \Slim\Slim();

$app->get(
    '/',
    function () {
        $template = <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title>REST API for Vendor</title>
            <style>
                html,body,div,span,object,iframe,
                h1,h2,h3,h4,h5,h6,p,blockquote,pre,
                abbr,address,cite,code,
                del,dfn,em,img,ins,kbd,q,samp,
                small,strong,sub,sup,var,
                b,i,
                dl,dt,dd,ol,ul,li,
                fieldset,form,label,legend,
                table,caption,tbody,tfoot,thead,tr,th,td,
                article,aside,canvas,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section,summary,
                time,mark,audio,video{margin:0;padding:0;border:0;outline:0;font-size:100%;vertical-align:baseline;background:transparent;}
                body{line-height:1;}
                article,aside,details,figcaption,figure,
                footer,header,hgroup,menu,nav,section{display:block;}
                nav ul{list-style:none;}
                blockquote,q{quotes:none;}
                blockquote:before,blockquote:after,
                q:before,q:after{content:'';content:none;}
                a{margin:0;padding:0;font-size:100%;vertical-align:baseline;background:transparent;}
                ins{background-color:#ff9;color:#000;text-decoration:none;}
                mark{background-color:#ff9;color:#000;font-style:italic;font-weight:bold;}
                del{text-decoration:line-through;}
                abbr[title],dfn[title]{border-bottom:1px dotted;cursor:help;}
                table{border-collapse:collapse;border-spacing:0;}
                hr{display:block;height:1px;border:0;border-top:1px solid #cccccc;margin:1em 0;padding:0;}
                input,select{vertical-align:middle;}
                html{ background: #EDEDED; height: 100%; }
                body{background:#FFF;margin:0 auto;min-height:100%;padding:0 30px;width:800px;color:#666;font:14px/23px Arial,Verdana,sans-serif;}
                h1,h2,h3,p,ul,ol,form,section{margin:0 0 20px 0;}
                h1{color:#333;font-size:20px;}
                h2,h3{color:#333;font-size:14px;}
                h3{margin:0;font-size:12px;font-weight:bold;}
                ul,ol{list-style-position:inside;color:#999;}
                ul{list-style-type:square;}
                code,kbd{background:#EEE;border:1px solid #DDD;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:0 4px;color:#666;font-size:12px;}
                pre{background:#EEE;border:1px solid #DDD;border-radius:4px;-moz-border-radius:4px;-webkit-border-radius:4px;padding:5px 10px;color:#666;font-size:12px;}
                pre code{background:transparent;border:none;padding:0;}
                a{color:#70a23e;}
                table{border:1px solid #e5e5e5}
                header{padding: 30px 0;text-align:center;}
            </style>
        </head>
        <body>

            <header>
                <a href="http://www.slimframework.com"><img src="http://www.adurcup.com/img/home/logo.png" alt="adurcup logo"/></a>
            </header>
            
            <h1>Welcome to Adurcup API for vendors!</h1>
            <p>
                This documentation will help you understand all the API calls required for communication with the server.
            </p>
            <p>
                Use Base URL : <code>http://api.adurcup.com/v1</code>
            </p>
         
            <section>
                <h2>Get Started</h2>
                <ol>
                    <li>Currently <code>signup</code> and <code>Login</code> are working.</li>
                    <li><code>GET</code>To fetch a resource</li>
                    <li><code>POST</code>To create a new resource</li>
                
                
                </ol>
                <table border="0" width="100%">
                    <tbody>
                        <tr>
                            <td><strong>URL</strong></td>
                            <td><strong>Method</strong></td>
                            <td><strong>Headers</strong></td>
                            <td><strong>Parameters</strong></td>
                            <td><strong>Description</strong></td>
                        </tr>
                        <tr>
                            <td>/register</td>
                            <td>POST</td>
                            <td></td>
                            <td>name, email, password</td>
                            <td>User registration</td>
                        </tr>
                        <tr>
                            <td>/login</td>
                            <td>POST</td>
                            <td></td>
                            <td>email, password</td>
                            <td>User login</td>
                        </tr>
                        <tr>
                            <td>/products</td>
                            <td>GET</td>
                            <td></td>
                            <td></td>
                            <td>Get all Products</td>
                        </tr>
                        <tr>
                            <td>/products/12</td>
                            <td>GET</td>
                            <td></td>
                            <td></td>
                            <td>Get Product Detail</td>
                        </tr>
                        <tr>
                            <td>/me</td>
                            <td>GET</td>
                            <td>Authorization : api_key</td>
                            <td></td>
                            <td>Get User Details</td>
                        </tr>
                        <tr>
                            <td>/me/products</td>
                            <td>POST</td>
                            <td>Authorization : api_key</td>
                            <td>product_id, unit_price, qty, status, shipping_time, mrp(optional), shipping_fee_local(optional), shipping_fee_zonal(optional), shipping_fee_national(optional), extra_info(optional)</td>
                            <td>Add Product to Sell</td>
                        </tr>
                        <tr>
                            <td>/me/products</td>
                            <td>GET</td>
                            <td>Authorization : api_key</td>
                            <td></td>
                            <td>Get All Listed Products</td>
                        </tr>
                        <tr>
                            <td>/me/products/12</td>
                            <td>GET</td>
                            <td>Authorization : api_key</td>
                            <td></td>
                            <td>Get Listed Product detail</td>
                        </tr>
                        <tr>
                            <td>/me/products/12</td>
                            <td>PUT</td>
                            <td>Authorization : api_key</td>
                            <td></td>
                            <td>Get User Details</td>
                        </tr>
                        <tr>
                            <td>/me</td>
                            <td>GET</td>
                            <td>Authorization : api_key</td>
                            <td></td>
                            <td>Get User Details</td>
                        </tr>

</tbody>
</table>
            </section>
            <section>
                <h2>In development</h2>
                <ol>
                    <li>Product search Listing</li>
                    <li>Updating pricing and quantity</li>
                    <li>Accepted orders</li>
                    <li>Forgot password</li>
                </ol>
            </section>
            <h2>Thankyou for your time. Now you can go fuck yourself :P</h2>
        </body>
    </html>
EOT;
        echo $template;
    }
);
 

$user_id = NULL;
 

function verifyRequiredParams($required_fields) {
    $error = false;
    $error_fields = "";
    $request_params = array();
    $request_params = $_REQUEST;

    if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
        $app = \Slim\Slim::getInstance();
        parse_str($app->request()->getBody(), $request_params);
    }
    foreach ($required_fields as $field) {
        if (!isset($request_params[$field]) || strlen(trim($request_params[$field])) <= 0) {
            $error = true;
            $error_fields .= $field . ', ';
        }
    }
 
    if ($error) {

        $response = array();
        $app = \Slim\Slim::getInstance();
        $response["error"] = true;
        $response["message"] = 'Required field(s) ' . substr($error_fields, 0, -2) . ' is missing or empty';
        echoRespnse(400, $response);
        $app->stop();
    }
}
 

function validateEmail($email) {
    $app = \Slim\Slim::getInstance();
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response["error"] = true;
        $response["message"] = 'Email address is not valid';
        echoRespnse(400, $response);
        $app->stop();
    }
}


function authenticate(\Slim\Route $route) {

    $headers = apache_request_headers();
    $response = array();
    $app = \Slim\Slim::getInstance();
 
    if (isset($headers['Authorization'])) {
        $db = new DbHandler();
 
        $api_key = $headers['Authorization'];

        if (!$db->isValidApiKey($api_key)) {

            $response["error"] = true;
            $response["message"] = "Access Denied. Invalid Api key";
            echoRespnse(401, $response);
            $app->stop();
        } else {
            global $user_id;

            $user = $db->getUserId($api_key);
            if ($user != NULL)
                $user_id = $user["id"];
        }
    } else {

        $response["error"] = true;
        $response["message"] = "Api key is misssing";
        echoRespnse(400, $response);
        $app->stop();
    }
}
 
function echoRespnse($status_code, $response) {
    $app = \Slim\Slim::getInstance();

    $app->status($status_code);
 
    $app->contentType('application/json');
 
    echo json_encode($response);
}



$app->post('/register', function() use ($app) {
           
            verifyRequiredParams(array('name', 'email', 'password'));
 
            $response = array();
 
            $name = $app->request->post('name');
            $email = $app->request->post('email');
            $password = $app->request->post('password');
 
            validateEmail($email);
 
            $db = new DbHandler();
            $res = $db->createUser($name, $email, $password);
 
            if ($res == USER_CREATED_SUCCESSFULLY) {
                $response["error"] = false;
                $response["message"] = "You are successfully registered";
                echoRespnse(201, $response);
            } else if ($res == USER_CREATE_FAILED) {
                $response["error"] = true;
                $response["message"] = "Oops! An error occurred while registereing";
                echoRespnse(200, $response);
            } else if ($res == USER_ALREADY_EXISTED) {
                $response["error"] = true;
                $response["message"] = "Sorry, this email already existed";
                echoRespnse(200, $response);
            }
        });



$app->post('/login', function() use ($app) {
    
            verifyRequiredParams(array('email', 'password'));

            $email = $app->request()->post('email');
            $password = $app->request()->post('password');
            $response = array();
 
            $db = new DbHandler();
 
            if ($db->checkLogin($email, $password)) {

                $user = $db->getUserByEmail($email);
                if ($user != NULL) {
                    $response["error"] = false;
                    $response['user'] = array();
                    $tmp = array();
                    $tmp['name'] = $user['name'];
                    $tmp['email'] = $user['email'];
                    $tmp['apiKey'] = $user['api_key'];
                    $tmp['status'] = $user['status'];
                    $tmp['createdAt'] = $user['created_at'];
                    array_push($response["user"], $tmp);
                } else {
         
                    $response['error'] = true;
                    $response['message'] = "An error occurred. Please try again";
                }
            } else {
 
                $response['error'] = true;
                $response['message'] = 'Login failed. Incorrect credentials';
            }
 
            echoRespnse(200, $response);
        });


$app->get('/products' , function() {

            $response = array();
            $db = new DbHandler();
 

            $result = $db->getAllProducts();
 
            $response["error"] = false;
            $response["products"] = array();
 
            foreach ($result as $product) {
                $tmp = array();
                $tmp["id"] = $product["id"];
                $tmp["name"] = $product["name"];
                $tmp["category"] = $product["category"];
                $tmp["description"] = $product["description"];
                $tmp["min_quantity"] = $product["min_quantity"];
                $tmp["initial_cost"] = $product["initial_cost"];
                $tmp["price_per_unit"] = $product["price_per_unit"];
                $tmp["customizable"] = $product["customizable"];
                $tmp["color"] = $product["color"];
                $tmp["image_src"] = $product["image_src"];
                $tmp["types"] = $product["types"];
                $tmp["sizes"] = $product["sizes"];
                $tmp["delivery"] = $product["delivery"];
                $tmp["unit_description"] = $product["unit_description"];
                $tmp["advertisement"] = $product["advertisement"];
                array_push($response["products"], $tmp);
            }
 
            echoRespnse(200, $response);
        });

$app->get('/products/:id' , function($product_id) {

            $response = array();
            $db = new DbHandler();
 
            $response["error"] = false;
            
             $result = $db->getProductDetail($product_id);
 
            if ($result != NULL) {
                $response["product"] = array();
                $tmp["id"] = $result["id"];
                $tmp["name"] = $result["name"];
                $tmp["category"] = $result["category"];
                $tmp["description"] = $result["description"];
                $tmp["min_quantity"] = $result["min_quantity"];
                $tmp["initial_cost"] = $result["initial_cost"];
                $tmp["price_per_unit"] = $result["price_per_unit"];
                $tmp["customizable"] = $result["customizable"];
                $tmp["color"] = $result["color"];
                $tmp["image_src"] = $result["image_src"];
                $tmp["types"] = $result["types"];
                $tmp["sizes"] = $result["sizes"];
                $tmp["delivery"] = $result["delivery"];
                $tmp["unit_description"] = $result["unit_description"];
                $tmp["advertisement"] = $result["advertisement"];
                array_push($response["product"], $tmp);
                echoRespnse(200, $response);
            } else {
                $response["error"] = true;
                $response["message"] = "The requested resource doesn't exists";
                echoRespnse(404, $response);
            }

        });

$app->get('/products/search' , function() use ($app) {

            $response = array();
            $db = new DbHandler();
            
            $keyword = $app->request->get('query');
            $count = $app->request->get('count');
            // fetching all user tasks
            $result = $db->searchProducts($keyword);
            
            if($result == null){
                $response["error"] = false;
                $response["message"] = "No result found. Try different keywords";
                echoRespnse(200, $response);
            }
            else{

                $response["error"] = false;
                $response["products"] = array();
                 // looping through result and preparing tasks array
                foreach ($result as $product) {
                    $tmp = array();
                    $tmp["id"] = $product["id"];
                    $tmp["name"] = $product["name"];
                    $tmp["category"] = $product["category"];
                    $tmp["description"] = $product["description"];
                    $tmp["min_quantity"] = $product["min_quantity"];
                    $tmp["initial_cost"] = $product["initial_cost"];
                    $tmp["price_per_unit"] = $product["price_per_unit"];
                    $tmp["customizable"] = $product["customizable"];
                    $tmp["color"] = $product["color"];
                    $tmp["image_src"] = $product["image_src"];
                    $tmp["types"] = $product["types"];
                    $tmp["sizes"] = $product["sizes"];
                    $tmp["delivery"] = $product["delivery"];
                    $tmp["unit_description"] = $product["unit_description"];
                    $tmp["advertisement"] = $product["advertisement"];
                    array_push($response["products"], $tmp);
                }

                 echoRespnse(200, $response);
            }

        });



$app->get('/me', 'authenticate', function() {

            global $user_id;
            $response = array();
            $db = new DbHandler();
            
            $result = $db->getUserInfo($user_id);
 
            if ($result != NULL) {
                $response["error"] = false;
                $response["user"] = array();
                $tmp["name"] = $result["name"];
                $tmp["api_key"] = $result["api_key"];
                $tmp["email"] = $result["email"];
                $tmp["status"] = $result["status"];
                $tmp["created_at"] = $result["created_at"];           

                array_push($response["user"], $tmp);
                echoRespnse(200, $response);
            } else {
                $response["error"] = true;
                $response["message"] = "Could not fetch user details";
                echoRespnse(404, $response);
            }

        });


$app->post('/me/products', 'authenticate', function() use ($app) {

            verifyRequiredParams(array('product_id', 'unit_price', 'qty', 'status', 'shipping_time'));
            $response = array();
            $formvars = $app->request->post();
 
            global $user_id;
            $db = new DbHandler();
 
            $res = $db->addProducttoSell($user_id, $formvars);

            if ($res == CREATED_SUCCESSFULLY) {
                $response["error"] = false;
                $response["message"] = "Success! Product add to your listing.";
                echoRespnse(201, $response);
            } else if ($res == CREATE_FAILED) {
                $response["error"] = true;
                $response["message"] = "Failed to add item. Please try again";
                echoRespnse(200, $response);
            } else if ($res == ALREADY_EXISTED) {
                $response["error"] = true;
                $response["message"] = "Sorry, this item is already in your listing";
                echoRespnse(200, $response);
            }

    });

$app->get('/me/products', 'authenticate', function() {

            global $user_id;
            $response = array();
            $db = new DbHandler();
 
            
            $result = $db->getAllListedProducts($user_id);
 
            $response["error"] = false;
            $response["products"] = array();
 
            foreach ($result as $product) {
                $tmp = array();
                $tmp["product_id"] = $product["product_id"];
                $tmp["unit_price"] = $product["unit_price"];
                $tmp["mrp"] = $product["mrp"];
                $tmp["qty"] = $product["qty"];
                $tmp["extra_info"] = $product["extra_info"];
                $tmp["status"] = $product["status"];
                $tmp["shipping_fee_local"] = $product["shipping_fee_local"];
                $tmp["shipping_fee_zonal"] = $product["shipping_fee_zonal"];
                $tmp["shipping_fee_national"] = $product["shipping_fee_national"];
                $tmp["updated_at"] = $product["updated_at"];
                array_push($response["products"], $tmp);
            }
 
            echoRespnse(200, $response);
        });

$app->get('/me/products/:id', 'authenticate', function($product_id) {

            global $user_id;
            $response = array();
            $db = new DbHandler();
 
            
            $product = $db->getListedProductDetail($user_id, $product_id );


            $response["error"] = false;
 
            if ($product != NULL) {
                $response["product"] = array();

                $tmp["product_id"] = $product["product_id"];
                $tmp["unit_price"] = $product["unit_price"];
                $tmp["mrp"] = $product["mrp"];
                $tmp["qty"] = $product["qty"];
                $tmp["extra_info"] = $product["extra_info"];
                $tmp["status"] = $product["status"];
                $tmp["shipping_fee_local"] = $product["shipping_fee_local"];
                $tmp["shipping_fee_zonal"] = $product["shipping_fee_zonal"];
                $tmp["shipping_fee_national"] = $product["shipping_fee_national"];
                $tmp["updated_at"] = $product["updated_at"];

                array_push($response["product"], $tmp);
                echoRespnse(200, $response);
            } else {
                $response["error"] = true;
                $response["message"] = "The requested resource doesn't exists";
                echoRespnse(404, $response);
            }
 
        });



$app->put('/me/products/:id', 'authenticate', function($product_id) use($app) {
  

            global $user_id;            
            $formvars = $app->request->put();     //  use x-www-form-urlencoded

            $db = new DbHandler();
            $response = array();

            $result = $db->updateListedProduct($user_id, $product_id, $formvars);
            if ($result) {

                $response["error"] = false;
                $response["message"] = "Product updated successfully";
            } else {
    
                $response["error"] = true;
                $response["message"] = "Product failed to update. Please try again!";
            }
            echoRespnse(200, $response);
        });



$app->delete('/me/products/:id', 'authenticate', function($product_id) use($app) {
            global $user_id;
 
            $db = new DbHandler();
            $response = array();
            $result = $db->deleteListedProduct($user_id, $product_id);
            if ($result) {

                $response["error"] = false;
                $response["message"] = "Product deleted succesfully";
            } else {
            
                $response["error"] = true;
                $response["message"] = "Product failed to delete. Please try again!";
            }
            echoRespnse(200, $response);
        });


 
$app->run();
?>