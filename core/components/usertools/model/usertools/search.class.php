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

class search {
  public function profiles($ids){
    global $modx;
    $ids = is_array($ids) ? $ids : explode(',',$ids);
    $query = $modx->newQuery('modUserProfile');
    $query->where(array(
      'internalKey:IN' => $ids,
    ));
    $profiles = $modx->getCollection('modUserProfile',$query);
    $array = array();
    if ($profiles != NULL) {
      foreach ($profiles as $profile) {
        $array[] = $profile->toArray();
      };
    }
    return $array;
  }
  public function users($id,$activeOnly,$profiles){
    global $modx;
    $query = $modx->newQuery('modUser');
    $query->select('id,username,active,primary_group,sudo,createdon');
    if($activeOnly == 1) {
      $query->where(array(
        'active' => $activeOnly,
      ));
    }
    if($id !== 0) {
      $ids = is_array($id) ? $id : explode(',',$id);
      $query->where(array(
        'id:IN' => $ids,
      ));
    }
    $users = $modx->getCollection('modUser',$query);
    $array = array();
    if ($users != NULL) {
      foreach ($users as $user) {
        if ($profiles == 1) {
          $profile = $user->getOne('Profile');
          $user->set('profile',$profile->toArray());
        }
        $array[] = $user->toArray('',false,true);
      };
    }
    return $array;
  }
}