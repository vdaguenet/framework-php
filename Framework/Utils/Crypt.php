<?php
 
namespace Framework\Utils;
 
use Framework\Configurator;
 
class Crypt
{
  public static function encrypt($data)
  {
    return base64_encode(openssl_digest($data, 'sha512'));
  }
 
  public static function encode($data, $secret = null)
  {
    if (null == $secret) {
      $secret = Configurator::getInstance()->get('secret');
    }
   
    $data = serialize($data);
    $td = mcrypt_module_open(MCRYPT_DES, "", MCRYPT_MODE_ECB, "");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$key,$iv);
    $data = base64_encode(mcrypt_generic($td, '!' . $data));
    mcrypt_generic_deinit($td);
   
    return $data;
  }
 
  public static function decode($data, $secret = null)
  {
    if (null == $secret) {
      $secret = Configurator::getInstance()->get('secret');
    }
   
    $td = mcrypt_module_open(MCRYPT_DES, "", MCRYPT_MODE_ECB, "");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td, $key, $iv);
    $data = mdecrypt_generic($td, base64_decode($data));
    mcrypt_generic_deinit($td);
 
    if (substr($data, 0, 1) != '!') {
      return false;
    }
 
    $data = substr($data, 1, strlen($data) - 1);
   
    return unserialize($data);
  }
}