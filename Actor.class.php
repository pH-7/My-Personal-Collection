<?php
/**
 * @author           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 * @copyright        (c) 2015, Pierre-Henry Soria. All Rights Reserved.
 * @license          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * @link             http://github.com/pH-7/
 */

require_once 'Base.class.php';

class Actor extends Base
{
    private $_sName, $_sBirthDate;


    /***** Setters *****/

    public function setName($sName)
    {
        if (!empty($sName) && is_string($sName) && strlen($sName) >= 3 && strlen($sName) <=
            30)
            $this->_sName = $sName;
        else
            throw new Exception('Invalid Actor Name Format');

        return $this;
    }

    public function setBirthDate($sBirthDate)
    {
        if ($this->checkDate($sBirthDate))
            $this->_sBirthDate = $sBirthDate;
        else
            throw new Exception('Invalid Birth Date Format');

        return $this;
    }


    /***** Getters *****/

    public function getName()
    {
        return $this->_sName;
    }

    public function getBirthDate()
    {
        return $this->_sBirthDate;
    }
}
