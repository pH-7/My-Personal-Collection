<?php
/**
 * @author           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 * @copyright        (c) 2015, Pierre-Henry Soria. All Rights Reserved.
 * @license          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * @link             http://github.com/pH-7/
 */

abstract class Base
{
    public function getJsonData()
    {
        return json_encode((array )$this);
    }

    /**
     * @param string $sFullDate Full US date format "mm/dd/yyyy"
     * @return boolean
     */
    public function checkDate($sFullDate)
    {
        if (!empty($sFullDate) && preg_match('#^\d\d/\d\d/\d\d\d\d$#', $sFullDate))
        {
            $aFullDate = explode('/', $sFullDate); // Format: "mm/dd/yyyy"
            if (checkdate($aFullDate[0], $aFullDate[1], $aFullDate[2]))
                return true;
        }
        return false;
    }
}
