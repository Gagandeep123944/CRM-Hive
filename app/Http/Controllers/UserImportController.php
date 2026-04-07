<?php

namespace App\Http\Controllers;
use App\Jobs\ImportUsersJob;

use Illuminate\Http\Request;



class UserImportController extends Controller
{
    public function uploadForm()
    {
        return view('upload');
    }

    public function handleUpload(Request $request)
    {
        set_time_limit(300);

        $file = $request->file('file');
        $path = $file->getRealPath();

        $handle = fopen($path, 'r');

        $users = [];
        $header = true;

        $hashedPassword = bcrypt('123456');

        while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {

            if ($header) {
                $header = false;
                continue;
            }

            $users[] = [
                'name' => $row[0],
                'email' => $row[1],
                'password' => $hashedPassword
            ];

            if (count($users) == 200) {

                ImportUsersJob::dispatch($users);
                $users = [];

                // 🔥 prevent Redis overload
                usleep(50000); // 0.05 sec
            }
        }

        if (!empty($users)) {
            ImportUsersJob::dispatch($users);
        }

        fclose($handle);

        return "File uploaded & users are being processed!";
    }
}
