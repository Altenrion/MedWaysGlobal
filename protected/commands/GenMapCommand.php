<?php

class GenMapCommand extends CConsoleCommand
{
    public function run()
    {
        $model= new Users();
        $dest_folder = Yii::getPathOfAlias('webroot.images.art').DIRECTORY_SEPARATOR;
        $overlay = Yii::getPathOfAlias('webroot.images.art').DIRECTORY_SEPARATOR.'m_overlay_p.png';

        $map= new MapStat($model,$dest_folder,$overlay);
        $map->getProjectsPointsData();
        $map->generateMapPoints();

        $map->getUniversPointsData();
        $map->generateMapPoints();
    }
}