<?php

namespace App\Http\Controllers;

use InfyOm\Generator\Utils\ResponseUtil;
use Response;
use Image;
/**
 * @SWG\Swagger(
 *   basePath="/api/v1",
 *   @SWG\Info(
 *     title="Laravel Generator APIs",
 *     version="1.0.0",
 *   )
 * )
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function updateImage($request,$key='image'){

        $request->validate([
            $key => 'required|image|mimes:jpeg,png,jpg',
        ]);

        $image = $request->file($key);
        $imageName= time().'.'.$image->extension();
       
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->path());
        $img->resize(338, 225.3, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$imageName);
   
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $imageName);


           return  $imageName;

    }
}
