<?php

namespace App\Models;

class Listing
{
  public static function getAll()
  {
    return [

      [
        'id' => 1,
        'title' => 'Listing One',
        'description' => 'Lorem ipsum dolor amet elit.'
      ],
      [
        'id' => 2,
        'title' => 'Listing Two',
        'description' => 'Lorem ipsum dolor amet elit.'
      ],
      [
        'id' => 3,
        'title' => 'Listing Three',
        'description' => 'Lorem ipsum dolor amet elit.'
      ],
    ];
  }

  public static function getOne($id)
  {
    $listings = self::getAll();

    foreach ($listings as $listing) {
      if ($listing['id'] == $id) {
        return $listing;
      }
    }
  }
}
