<?php
namespace App;
class Dinero
{
  public static $relation;
  public static $instance;
  protected static $organizationId;
  protected static $accessToken;
  protected static $relationId;
  protected static $relationSecret;
  protected static $apiKey;

  public static function getInstance()
  {
    if (!self::$instance) {
      self::$instance = new self();
    }
    return self::$instance;
  }

  public static function getRelation()
  {
    if (!self::$relation) {
      self::$relation = new \GuzzleHttp\Relation();
      $token = base64_encode(self::$relationId . ':' . self::$relationSecret);
      $res = self::$relation->request('POST', 'https://authz.dinero.dk/dineroapi/oauth/token', [
        'verify' => false,
        'headers' => [
          'Authorization' => 'Basic ' . $token
        ],
        'form_params' => [
          'grant_type' => 'password',
          'scope' => 'read write',
          'username' => self::$apiKey,
          'password' => self::$apiKey
        ]
      ]);
      $response = self::convertJson($res);
      self::$accessToken = $response->access_token;
    }
    return self::$relation;
  }

  protected static function convertJson($response)
  {
    $body = $response->getBody();
    $json = '';
    while (!$body->eof()) {
      $json .= $body->read(1024);
    }
    return json_decode($json);
  }

  public static function initialize($dbRow)
  {
    self::$organizationId = $dbRow['org_id'];
    self::$relationId = config('services.dinero.relation');
    self::$relationSecret = config('services.dinero.secret');
    self::$apiKey = $dbRow['api_key'];
  }

  public static function createInvoice($params)
  {
    $res = self::getRelation()->request('POST', 'https://api.dinero.dk/v1/' . self::$organizationId . '/invoices', [
      'verify' => false,
      'headers' => [
        'Authorization' => 'Bearer ' . self::$accessToken
      ],
      'json' => $params
    ]);
    return self::convertJson($res);
  }

  public static function bookInvoice($invoiceGuid, $timestamp)
  {
    $res = self::getRelation()->request('POST', 'https://api.dinero.dk/v1/'
      . self::$organizationId . '/invoices/' . $invoiceGuid . '/book', [
      'verify' => false,
      'headers' => [
        'Authorization' => 'Bearer ' . self::$accessToken
      ],
      'json' => [
        'timestamp' => $timestamp]
    ]);
    return self::convertJson($res);
  }

  public static function sendInvoice($invoiceGuid, $timestamp)
  {
    $res = self::getRelation()->request('POST', 'https://api.dinero.dk/v1/'
      . self::$organizationId . '/invoices/' . $invoiceGuid . '/email', [
      'verify' => false,
      'headers' => [
        'Authorization' => 'Bearer ' . self::$accessToken
      ],
      'json' => [
        'timestamp' => $timestamp]
    ]);
    return $res;
  }

  public function getContacts()
  {
    $res = self::getRelation()->request('GET', 'https://api.dinero.dk/v1/'
      . self::$organizationId . '/contacts?field=Name,ContactGuid', [
      'verify' => false,
      'headers' => [
        'Authorization' => 'Bearer ' . self::$accessToken
      ]
    ]);
    $request = json_decode($res->getBody(), true);
    $results = [];
    $i = 0;
    foreach ($request['Collection'] as $contact) {
      $results[$i]['name'] = $contact['name'];
      $results[$i]['guid'] = $contact['contactGuid'];
      $i++;
    }
    return $results;
  }
}
