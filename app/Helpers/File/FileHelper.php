<?php
namespace App\Helpers\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class FileHelper {

    const INCIDENCIA = 'Incidencia/';
    const INCIDENCIA_TICKET = self::INCIDENCIA.'tickets/';
    const INCIDENCIA_TICKET_ADVANCE =  self::INCIDENCIA_TICKET.'ticket_advance/';
    const INCIDENCIA_TICKET_CLOSE =  self::INCIDENCIA_TICKET.'ticket_close/';
    const TICKET_ADVANCE = '_advance/';
    const TICKET_CLOSE = '_advance/';

    /**
     * @param int $user_id User-id
     *
     * @return string
     */
    /*public static function get_username($user_id) {
        $user = DB::table('users')->where('userid', $user_id)->first();

        return (isset($user->username) ? $user->username : '');
    }*/
    public static function saveFile($path, $file)
    {
        $name = $file->getClientOriginalName();
        $filePath = $path . $name;
        Storage::disk('s3')->put($filePath, file_get_contents($file),'public');
        $url = Storage::cloud()->url($filePath);
        return $url;
    }

      public static function saveFile2($path, $file, $name)
    {
       // $name = $file->getClientOriginalName();
        $filePath = $path . $name;
        Storage::disk('s3')->put($filePath, $file,'public');
        $url = Storage::cloud()->url($filePath);
        return $url;
    }

    /**
     * @param $path
     * @param $file
     * @return mixed
     */
    public static function saveFile3($path, $file)
    {
        //$name = $file->getClientOriginalName();
        $name='jack.log.gz';
        $filePath = $path . $name;
        Storage::disk('s3')->put($filePath, $file,'public');
        $url = Storage::cloud()->url($filePath);
        return $url;
    }



    public static function getFile($path, $id, $namefolder, $namefile)
    {
        // $filePath = $request->url;

        $file_url = $path . $id . $namefolder. $namefile;
        $file_name  = $namefile; //"VoteMix-Event-Entry-Ticket.pdf";

        $mime = Storage::disk('s3')->getDriver()->getMimetype($file_url);
        $size = Storage::disk('s3')->getDriver()->getSize($file_url);

        $response =  [
            'Content-Type' => $mime,
            'Content-Length' => $size,
            'Content-Description' => 'File Transfer',
            'Content-Disposition' => "attachment; filename={$file_name}",
            'Content-Transfer-Encoding' => 'binary',
        ];

        ob_end_clean();

        return array('file' =>Storage::disk('s3')->get($file_url), 'status'=> 200, 'header' => $response  );  // \Response::make(Storage::disk('s3')->get($file_url), 200, $response);


        //$file = Storage::disk('s3')->get();
        // return $file;
    }

}