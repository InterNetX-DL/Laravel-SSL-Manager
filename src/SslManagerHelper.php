<?php

namespace Ephenodrom;

/**
 * Providing some helper functions.
 */
class SslManagerHelper extends ServiceProvider {

	/**
	 *
	 */
	public function orderSmime($product, $email, $password, $adminId){

	}

	/**
	 *
	 */
	public function orderBasicSsl($name, $csr, $adminId, $authMethod){
		return [
			'product' => 'BASIC_SSL',
			'name' => $name,
			'admin' => $adminId,
			'csr' => $csr,
			'authentication' => [
				'method' => $authMethod
			],
			'lifetime' => 12,
		];
	}

	/**
	 *
	 */
	public function orderDvCertificate($name, $product, $csr, $adminId, $technicalId, $authMethod, $lifetime){
		if($product == "BASIC_SSL"){
			return $this->orderBasicSsl($name, $csr, $adminId, $authMethod);
		}
		return [
			'product' => $product,
			'name' => $name,
			'admin' => $adminId,
			'technical' => $technicalId
			'csr' => $csr,
			'authentication' => [
				'method' => $authMethod
			],
			'lifetime' => $lifetime,
		];
	}

	/**
	 * Generate a simple private key with open ssl. The private key is NOT protected by a password. The default keyType is RSA (0).
	 * Possible keyTypes: RSA (0), DSA (1), DH (2), EC (3)
	 */
	public function generatePrivateKey($size=2048, $keyType=0, $plain=false){
		$privKey = openssl_pkey_new(array(
		    "private_key_bits" => $size,
		    "private_key_type" => $keyType,
		));
		if($plain){
			$out = null;
			openssl_pkey_export($privkey, $out);
			return $out;
		}else{
			return $privKey;
		}
	}

	/**
	 * Generate a simple csr with open ssl
	 */
	public function generateCsr($cn, $size=2048, $privKey, $plain=false){
		$dn = array(
		    "commonName" => $cn,
		);
		$csr = openssl_csr_new($dn, $privKey, array('digest_alg' => 'sha256'));
		if($plain){
			$out = null;
			openssl_csr_export($csr, $out);
			return $out;
		}else{
			return $csr;
		}
	}

	/**
	 * Generates a private key and a csr key and returns both within a associative array with the keys 'priv' and 'csr'.
	 * The default keyType is RSA (0). The default size is 2048.
	 * Possible keyTypes: RSA (0), DSA (1), DH (2), EC (3). The private key is NOT protected by a password.
	 */
	public function generatePrivateAndPublic($cn, $size=2048, $keyType=0){
		$privKey = openssl_pkey_new(array(
		    "private_key_bits" => $size,
		    "private_key_type" => $keyType,
		));
		$dn = array(
		    "commonName" => $cn,
		);
		$csr = openssl_csr_new($dn, $privKey, array('digest_alg' => 'sha256'));

		$priv = null;
		openssl_pkey_export($privkey, $priv);
		$csr = null;
		openssl_csr_export($csr, $csr);
		return [ 'priv' => $priv, 'csr' => $csr];
	}



}
