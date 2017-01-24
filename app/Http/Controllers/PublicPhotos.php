<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\PhotoLike;
use Illuminate\Http\Response;
use Laravel\Lumen\Routing\Controller as BaseController;

/**
 * Class PublicPhotos
 * @package App\Http\Controllers
 */
class PublicPhotos extends BaseController
{
    /**
     * Render a set of Public HabboWEB Photos
     *
     * @return Response
     */
    public function show()
    {
        $habboWebPhotos = Photo::all();

        foreach ($habboWebPhotos as $photo):
            $likes = [];

            foreach (PhotoLike::query()->select('username')->where('photo_id', $photo->id)->get() as $like)
                $likes[] = $like->username;

            $photo->likes = $likes;
        endforeach;

        return response()->json($habboWebPhotos, 200, array(), JSON_UNESCAPED_SLASHES);
    }
}
