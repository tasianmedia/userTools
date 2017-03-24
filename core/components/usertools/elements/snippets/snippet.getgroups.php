<?php
/**
 * A simple user group Snippet for MODX Revolution.
 *
 * @author David Pede <dev@tasianmedia.com> <https://twitter.com/davepede>
 * @version 1.0.0-pl
 * @released February 27, 2017
 * @since February 27, 2017
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

/* set default properties */
$tpl = !empty($tpl) ? $tpl : 'groupTpl';
$output = '';

$usergroups = $modx->getCollection('modUserGroup');

if ($usergroups) {
  if ($tpl) {
    foreach ($usergroups as $usergroup) {
      $results .= $modx->getChunk($tpl,$usergroup->toArray());
    }
    //$results = $usergroup->toArray();
  }
} else {
  $modx->log(modX::LOG_LEVEL_ERROR, 'userTools() - No user groups found');
};

$output = $results;

//echo "<pre>";
//print_r ($results);
//echo "</pre>";

return $output;