<?php
/**
 * FutoIn Executor User Info
 *
 * @package FutoIn\Core\PHP\API
 * @copyright 2014 FutoIn Project (http://futoin.org)
 * @author Andrey Galkin
 */

namespace FutoIn\Executor;

/**
 * FutoIn Executor User Info
 *
 * @see http://specs.futoin.org/final/preview/ftn6_iface_executor_concept-1.html
 * @api
 */
interface UserInfo {
    const INFO_FirstName = "FirstName";
    const INFO_FullName = "FullName";
    /** ISO "YYYY-MM-DD" format */
    const INFO_DateOfBirth = "DateOfBirth";
    /** ISO "HH:mm:ss" format, can be truncated to minutes */
    const INFO_TimeOfBirth = "TimeOfBirth";
    const INFO_ContactEmail = "ContactEmail";
    const INFO_ContactPhone = "ContactPhone";
    const INFO_HomeAddress = "HomeAddress";
    const INFO_WorkAddress = "WorkAddress";
    const INFO_Citizenship = "Citizenship";
    const INFO_GovernmentRegID = "GovernmentRegID";
    const INFO_AvatarURL = "AvatarURL";

    /**
     * @return user ID as seen by trusted AuthService (string)
     */
    public function localID();

    /**
     * @return globally unique user ID (string)
     */
    public function globalID();
    
    /**
     * Request user info details from AuthService.
     * Note: executor implementation should cache it at least in scope of current request processing
     */
    public function details( \FutoIn\Executor\AsyncCompletion $async_compl, array $info_fields );
}
