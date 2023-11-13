<?php

	include_once(__DIR__.'/../../vendor/autoload.php');
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../..');
	$dotenv->load();

	class API {

    private $baseUrl;

		public function __construct() {
      date_default_timezone_set('America/Sao_Paulo');
      $this->baseUrl = $_ENV["API_BASE_URL"];
    }

		public function login($email, $senha) {
      $headers = [
        "Content-Type: application/json"
      ];

      $url = $this->baseUrl . '/users/auth';

      $body = json_encode([
        "email" => $email,
        "senha" => $senha
      ]);

      
      $req = $this->post($url, $headers, $body);

      if(isset($req->token))
        return $req;
      return $req->message;
		}

		public function getLoggedUser($token) {
      $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer ".$token
      ];

      $url = $this->baseUrl . '/users/logged';

      $req = $this->get($url, $headers);

      if(!isset($req->errorCode))
       
        return $req;
      return $req->message;
		}

    public function listUsers($token, $data) {
      $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer ".$token
      ];

      $url = $this->baseUrl . '/reports/users?';

      $url .= "di=".$data["di"]."&";
      $url .= "df=".$data["df"]."&";
      $url .= "nome=".urlencode($data["nome"])."&";
      $url .= "documento=".$data["documento"];

      $req = $this->get($url, $headers);

      if(!isset($req->errorCode))
       
        return $req;
      return $req->message;
		}

    public function getUserById($token, $id) {
      $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer ".$token
      ];

      $url = $this->baseUrl . '/reports/users?';

      $url .= "idUsuario=".$id;

      $req = $this->get($url, $headers);

      if(!isset($req->errorCode))
        return $req[0];
      return $req->message;
		}

    public function createUser($token, $data) {
      $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer ".$token
      ];

      $url = $this->baseUrl . '/users/create';

      $req = $this->post($url, $headers, json_encode($data));

      if(!isset($req->errorCode))
        return $req;
      return $req->message;
		}

		public function getCEP($cep) {
			$url = 'https://viacep.com.br/ws/'.$cep.'/json/';
			return $this->get($url, []);
		}

		private function post($url, $header, $body) {
      $req = curl_init();

      if ($req === false) {
        throw new Exception('failed to initialize');
      }

      curl_setopt($req, CURLOPT_URL, $url);
      curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($req, CURLOPT_POST, true);
      curl_setopt($req, CURLOPT_POSTFIELDS, $body);
      curl_setopt($req, CURLOPT_HTTPHEADER, $header);
      curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);

      $response = curl_exec($req);

      
      if ($response === false) {
       throw new Exception(curl_error($req), curl_errno($req));
      }

      curl_close($req);

      return json_decode($response);
    }

		private function patch($url, $header, $body) {
      $req = curl_init();

      if ($req === false) {
        throw new Exception('failed to initialize');
      }

      curl_setopt($req, CURLOPT_URL, $url);
      curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($req, CURLOPT_CUSTOMREQUEST, 'PATCH');
      curl_setopt($req, CURLOPT_POSTFIELDS, $body);
      curl_setopt($req, CURLOPT_ENCODING, '');
      curl_setopt($req, CURLOPT_HTTPHEADER, $header);
      curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);

      $response = curl_exec($req);

      if ($response === false) {
       throw new Exception(curl_error($req), curl_errno($req));
      }

      curl_close($req);

      return json_decode($response);
    }

    private function get($url, $header) {
      $req = curl_init();

      if ($req === false) {
        throw new Exception('failed to initialize');
      }

      curl_setopt($req, CURLOPT_URL, $url);
      curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($req, CURLOPT_HTTPHEADER, $header);
      curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($req, CURLOPT_TIMEOUT, 60000);

      $response = curl_exec($req);

      if ($response === false) {
        throw new Exception(curl_error($req), curl_errno($req));
      }

      curl_close($req);

      return json_decode($response);
    }

		private function delete($url, $header) {
      $req = curl_init();

      if ($req === false) {
        throw new Exception('failed to initialize');
      }

      curl_setopt($req, CURLOPT_URL, $url);
      curl_setopt($req, CURLOPT_CUSTOMREQUEST, "DELETE");
      curl_setopt($req, CURLOPT_HTTPHEADER, $header);
      curl_setopt($req, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($req, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($req, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($req, CURLOPT_TIMEOUT, 4000);

      $response = curl_exec($req);
            
      if ($response === false) {
        throw new Exception(curl_error($req), curl_errno($req));
      }

      curl_close($req);

      return json_decode($response);
    }
	}