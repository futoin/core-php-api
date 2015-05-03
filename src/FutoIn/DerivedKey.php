<?php
/**
 * FutoIn DerivedKey interface
 *
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn;

/**
 * Note: raw key should be hidden in implementation
 *   and/or even placed into special secure memory region
 *   and/or places in special security module like HSM or TPM
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.html
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
    public function baseID();
    
    /**
     * Get Derived key ID a.k.a. Sequence ID
     * @return string ID
     */
    public function sequenceID();
    
    /**
     * Encrypt data using the derived key
     * @param string $data Data to encrypt
     * @return void
     * @see SMALL_CHANK
     */
    public function encrypt( AsyncSteps $as, $data );
    
    /**
     * Decrypt data using the derived key
     * @param string $data Data to encrypt
     * @return void
     * @see SMALL_CHANK
     */
    public function decrypt( AsyncSteps $as, $data );
}
