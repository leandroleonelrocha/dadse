<?php namespace App\Providers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Routing\ResponseFactory;

class ResponseMacroServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot(ResponseFactory $factory)
    {
        $factory->macro('file', function ($content,$fileExtension,  $mime, array $userHeaders = []) use ($factory) {

            $fileContents = $content;
            $fileMimeType = $mime;
            $fileNameFromStorage = md5(Hash::make(time())).'.'.$fileExtension;

            $headers = array_merge([
                'Content-Disposition' => str_replace('%name', $fileNameFromStorage, "inline; filename=\"%name\"; filename*=utf-8''%name"),
                'Content-Length'      => strlen($fileContents), // mb_strlen() in some cases?
                'Content-Type'        => $fileMimeType,
            ], $userHeaders);

            return $factory->make($fileContents, 200, $headers);
        });
    }
}
