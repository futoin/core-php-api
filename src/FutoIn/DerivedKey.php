<?php
/**
 * FutoIn DerivedKey interface
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn;

/**
 * Note: raw key should be hidden in implementation
 *   and/or even placed into special secure memory region
 *   and/or places in special security module like HSM or TPM
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.0.html
 * @api
 */
interface DerivedKey
{
    /** Minimal guaranteed to be supported data size for encrypt()/decrypt() */
    const SMALL_CHANK = 8192;

    /**
     * Get Unique ID or master secret
     * @return string ID
     */
    public function getBaseID();
    
    /**
     * Get Derived key ID a.k.a. Sequence ID
     * @return string ID
     */
    public function getSequenceID();
    
    /**
     * Encrypt small chunk of data using the derived key
     * @param string $data Data to encrypt
     * @return encrypted string
     * @see SMALL_CHANK
     */
    public function encrypt( $data );
    
    /**
     * Decrypt small chunk of data using the derived key
     * @param string $data Data to encrypt
     * @return void
     * @see SMALL_CHANK
     */
    public function decrypt( $data );
    
    /**
     * Encrypt data using the derived key
     * @param string $data Data to encrypt
     * @return void
     * @see SMALL_CHANK
     */
    public function encryptAsync( AsyncSteps $as, $data );
    
    /**
     * Decrypt data using the derived key
     * @param string $data Data to encrypt
     * @return void
     * @see SMALL_CHANK
     */
    public function decryptAsync( AsyncSteps $as, $data );
}
