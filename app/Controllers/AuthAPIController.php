<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Shield\Authentication\JWTManager;
use \Firebase\JWT\JWT;
class AuthAPIController extends BaseController
{
    
    public function index()
    {
        // testing if API are working
        return $this->response->setStatusCode(200)->setJSON(["You have succesfully connected to endpoint, please read the github documentations of this projects"]);
    }

    // Generate Token
    private function JWT_Encode($data){

        $SECRET_KEY = getenv('JWT_SECRET');

        $payload = [
            "iss" => "github.com/Fsociety_Mrn",       // Issuer: the entity that issued the JWT
            "sub" => $data['Username'],               // Subject: the entity to which the JWT refers (e.g., user ID)
            "exp" => time() + 3600,                   // Expiration Time: the time after which the JWT expires at 1 hour(UNIX timestamp)
            "iat"=> time(),                           // Issued At: the time at which the JWT was issued (UNIX timestamp)
            "name"=> $data['FullName'],               // Custom claim: additional information about the user  
            "email"=> $data['Email']                  //               such as name and email
        ];
        
        return JWT::encode($payload, $SECRET_KEY,'HS256');
    }

    public function login()
    {
        try {
            
            // Load the database connection
            $db = db_connect();

            // Get JSON data from the request body
            $requestData = $this->request->getJSON();

            // Verify email or username and password
            $data = $db->table('auth_table')
                        ->where('Email',$requestData->email)
                        ->orWhere('Username',$requestData->email)
                        ->where('Password', base64_encode($requestData->password))->get();

            $result = $data->getResultArray();
            
            $result_message = empty($result) ? [
                "token" => "Invalid Credentials",
                "error" => boolval(True)
            ] : $this->JWT_Encode($result[0]);


            return $this->response->setStatusCode(200)->setJSON($result_message);
        } catch (\Exception $e){

            $db->close();
            return $this->response->setStatusCode($e->getCode())->setJSON(['success' => false, 'error' => $e->getMessage()]);
        }
        
    }
}
