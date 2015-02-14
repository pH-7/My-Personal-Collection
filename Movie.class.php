<?php
/**
 * @author           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 * @copyright        (c) 2015, Pierre-Henry Soria. All Rights Reserved.
 * @license          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * @link             http://github.com/pH-7/
 */

require_once 'Base.class.php';

class Movie extends Base
{
    private $_sTitle, $_sRelease, $_aData, $_iRuntime;


    /***** Setters *****/

    public function setData(array $aData)
    {
        $this->_aData = $aData;
    }

    public function setTitle($sTitle)
    {
        if (!empty($sTitle) && is_string($sTitle) && strlen($sTitle) >= 2 && strlen($sTitle) <=
            50)
            $this->_sTitle = $sTitle;
        else
            throw new Exception('Invalid Movie Title Format');

        return $this;
    }

    public function setRelease($sRelease)
    {
        if ($this->checkDate($sRelease))
            $this->_sRelease = $sRelease;
        else
            throw new Exception('Invalid Birth Date Format');

        return $this;
    }

    /**
     * @param integer $iRuntime The running time in minutes.
     * @return object $this
     */
    public function setRuntime($iRuntime)
    {
        if (!empty($iRuntime) && is_int($iRuntime))
            $this->_iRuntime = $iRuntime;
        else
            throw new Exception('Invalid Run Time');

        return $this;
    }


    /***** Getters *****/

    /**
     * @param array $aActors The Actors data.
     * @return array Actors data ordered by the descending age.
     */
    public function getActorsOrderedByAge(array $aActors)
    {
        uasort($aActors, function ($aA, $aB)
        {
            return - 1 * (strtotime($aA['dob']) - strtotime($aB['dob'])); }
        ); // PHP 5.3 anonymous function

        return $aActors;
    }

    public function getTitle()
    {
        return $this->_sTitle;
    }

    public function getRelease()
    {
        return $this->_sRelease;
    }

    public function getRuntime()
    {
        return $this->_iRuntime;
    }

    public function getData()
    {
        return $this->_aData;
    }
}
