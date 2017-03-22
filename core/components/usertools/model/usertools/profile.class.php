<?php
/**
 * @package usertools
 *
 * Copyright (C) 2017 David Pede. All rights reserved. <dev@tasian.media>
 *
 * getYoutube is free software; you can redistribute it and/or modify it under the
 * terms of the GNU General Public License as published by the Free Software
 * Foundation; either version 2 of the License, or any later version.
 *
 * getYoutube is distributed in the hope that it will be useful, but WITHOUT ANY
 * WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR
 * A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along with
 * getYoutube; if not, write to the Free Software Foundation, Inc., 59 Temple
 * Place, Suite 330, Boston, MA 02111-1307 USA
 */

class search {
  public function profiles($ids){
    global $modx;
    $ids = is_array($ids) ? $ids : explode(',',$ids);
    $profiles = $modx->getCollection('modUserProfile', array(
      'internalKey:IN' => $ids,
    ));
    if ($profiles != NULL) {
      foreach ($profiles as $profile) {
        $array[] = $profile->toArray();
      };
    }
    return $array;
  }
  public function userIds($ids){
    global $modx;
    $output = '';
    return $output;
  }
}