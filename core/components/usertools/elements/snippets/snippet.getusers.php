<?php
/**
 * A simple user Snippet for MODX Revolution.
 *
 * @author David Pede <dev@tasianmedia.com> <https://twitter.com/davepede>
 * @version 1.0.0-pl
 * @released March 24, 2017
 * @since March 24, 2017
 * @package userTools
 *
 * Copyright (C) 2017 David Pede. All rights reserved. <dev@tasianmedia.com>
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

$usertools = $modx->getService('usertools','userTools',$modx->getOption('usertools.core_path',null,$modx->getOption('core_path').'components/usertools/').'model/usertools/',$scriptProperties);

/* set default properties */
$id = !empty($id) ? $id : 0;
$tpl = !empty($tpl) ? $tpl : 'userTpl';
$activeOnly = ($activeOnly == '0') ? 0 : 1;
$profile = ($profile == '1') ? 1 : 0;
$output = '';

require_once ($usertools->config['modelPath'] . 'search.class.php');

$search = new search();
$users = $search->users($id,$activeOnly,$profile);

if ($users) {
  if ($tpl) {
    foreach ($users as $user) {
      $results .= $modx->getChunk($tpl,$user);
    }
    //$results = $users->toArray();
  }
} else {
  $modx->log(modX::LOG_LEVEL_ERROR, 'userTools(getUsers) - No users found');
};

$output = $results;

//echo "<pre>";
//print_r ($results);
//echo "</pre>";

return $output;