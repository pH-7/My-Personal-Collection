<?php
/**
 * @author           Pierre-Henry Soria <pierrehenrysoria@gmail.com>
 * @copyright        (c) 2015, Pierre-Henry Soria. All Rights Reserved.
 * @license          MIT License <http://www.opensource.org/licenses/mit-license.php>
 * @link             http://github.com/pH-7/
 */

require 'Movie.class.php';
require 'Actor.class.php';

try
{
    $oMovie = new Movie;
    $oActor = new Actor;

    $aMovies = include 'movies.data.php'; // Get Actors & Movies
    $oMovie->setData($aMovies);

    foreach ($oMovie->getData() as $aMovie)
    {
        echo '----- Movie Name -----<br />';

        $oMovie->setTitle($aMovie['title'])->setRelease($aMovie['release'])->setRuntime($aMovie['runtime']);

        echo 'Title: ' . $oMovie->getTitle() . '<br />';
        echo 'Release: ' . $oMovie->getRelease() . '<br />';
        echo 'Runtime: ' . $oMovie->getRuntime() . '<br />';

        echo '----- Actors -----<br />';
        $aActors = $oMovie->getActorsOrderedByAge($aMovie['actors']);
        foreach ($aActors as $aActor)
        {
            $oActor->setName($aActor['name'])->setBirthDate($aActor['dob']);

            echo 'Name: ' . $oActor->getName() . '<br />';
            echo 'Date of Birth: ' . $oActor->getBirthDate() . '<br />';
            echo '---<br />';
        }
        echo '<br /><br />';
    }

    /**
      // Get result in JSON
      echo $oMovie->getJsonData();
      echo $oActor->getJsonData();
    **/

}
catch (exception $oE)
{
    echo $oE->getMessage();
}
