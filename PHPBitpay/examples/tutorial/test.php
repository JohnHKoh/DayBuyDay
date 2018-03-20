<?php
/**
 * Start by creating a PrivateKey object:
 */

require __DIR__.'/../../vendor/autoload.php';

$privateKey = new \Bitpay\PrivateKey('/tmp/bitpay.pri');
$privateKey->generate();
/**
 * Once we have a private key, a public
 * key is created from it.
 */
$publicKey = new \Bitpay\PublicKey('/tmp/bitpay.pub');
$publicKey->setPrivateKey($privateKey);
$publicKey->generate();
/**
 * For security reasons it is recommended
 * that you use the EncryptedFilesystemStorage
 * engine to persist (save) your keys. You can,
 * of course, create your own storage engine to
 * suite your specific app's needs as long as it
 * implements the StorageInterface. In this
 * example, I'm using the regular unencrypted
 * FilesystemStorage engine so that you can
 * see what's inside the key files & for your
 * learning purposes.
 */
$storageEngine = new \Bitpay\Storage\FilesystemStorage();
$storageEngine->persist($privateKey);
$storageEngine->persist($publicKey);