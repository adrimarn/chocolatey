<?php

namespace App\Models;

/**
 * Class PhotoLike
 * @package App\Models
 */
class PhotoLike extends ChocolateyModel
{
    /**
     * Disable Timestamps
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'chocolatey_users_photos_likes';

    /**
     * Primary Key of the Table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Store a new Photo Data
     *
     * @param int $photoId
     * @param string $userName
     * @return $this
     */
    public function store($photoId, $userName)
    {
        $this->attributes['photo_id'] = $photoId;
        $this->attributes['username'] = $userName;

        return $this;
    }
}