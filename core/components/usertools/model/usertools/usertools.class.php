<?php
/**
 * @package userTools
 *
 * Copyright (C) 2017 David Pede. All rights reserved. <dev@tasian.media>
 *
 * userTools is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or any later version.
 *
 * userTools is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * userTools; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 */

class userTools {
  public $modx;
  public $config = array();
  function __construct(modX &$modx,array $config = array()) {
    $this->modx =& $modx;
    $corePath = $this->modx->getOption('usertools.core_path',$config,$this->modx->getOption('core_path').'components/usertools/');
    $this->config = array_merge(array(
      'basePath' => $corePath,
      'corePath' => $corePath,
      'modelPath' => $corePath.'model/usertools/',
      //'processorsPath' => $corePath.'processors/',
      //'templatesPath' => $corePath.'templates/',
      'chunksPath' => $corePath.'elements/chunks/',
      //'jsUrl' => $assetsUrl.'js/',
      //'cssUrl' => $assetsUrl.'css/',
      //'assetsUrl' => $assetsUrl,
      //'connectorUrl' => $assetsUrl.'connector.php',
    ),$config);
  }
}