<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Filesystem\Filesystem;
use Linkthrow\Ffmpeg\Classes\FFMPEG;
use Folour\Flavy\Flavy;




class ImageController extends Controller
{
    /**
     * Create view file
     *
     * @return void
     *
     */
    public function imageUpload()
    {
        return view('image-upload');
    }

    /**
     * Manage Post Request
     *
     * @return void
     */
    public function imageUploadPost(Request $request)

    {
        $date = date('YmdHis');

        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $key = 'documents/' . $imageName;

        /*$client = new OpenStack('https://nova-qc.dair-atir.canarie.ca:8080/v1/AUTH_5d2d361962cc4ebca16dc7b0d9e6208f/envision', array(
            'username' => 'ThomasJelonek',
            'password' => '068047057a134d7e89feb65660ad21e3',
            'tenantId' => '5d2d361962cc4ebca16dc7b0d9e6208f',
        ));

        $service = $client->objectStoreService(null, 'quebec', 'publicURL');

        $container = $service->getContainer('envision');

        $container->uploadObject($key, fopen(public_path('images').'\\'.$imageName,'r+'));*/

        //$abc= new Flavy(array());




        /*$this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,.mp4|max:2048',
        ]);*/




        // Uploads image locally, we need to comment it afterwards
        $request->image->move(public_path('images'),$imageName);       // C:\Users\thomas\envisionApi\public\images




        mkdir(public_path('images').'\\'.$imageName.$date,null,true);














        //$abc->thumbnail(public_path('images').'\\'.$imageName, public_path('images').'\\'.$imageName.$date.'\\file_%d.jpeg',30); //Make  thumbnail with specified interval

        //echo public_path('images');
        //die();









        //echo 'abc';
        //die();


       //Storage::disk('s3')->put($key, file_get_contents(public_path('images').'\\'.$imageName));      // This is to upload small files

        // Storage::disk('s3')->put($key, fopen(public_path('images').'\\'.$imageName,'r+'));



        //die();


       return back()
            ->with('success','Video Uploaded successfully.')
            ->with('path',$imageName);
    }


}