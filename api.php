<?php
class User {

    function getUsers() {
        $url = 'https://reqres.in/api/users';
        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        ));

        $response = curl_exec($curl);
        $response = json_decode($response);
        curl_close($curl);

        $temp = array();
        foreach ($response->data as $key => $val) {

            $temp[$key] = array(
                'name' => $val->first_name,
                'email' => $val->email  
            );
        }
        
        return $temp;


    }
}

$obj = new User();
$user = $obj->getUsers();
echo "<pre>";
print_r($user);
?>