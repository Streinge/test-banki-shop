<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactModel as ModelsContactModel;

class MainController extends Controller
{
    public function getHomePage()
    {
        return view(view: 'home');
    }

    public function storedFiles(Request $request)
    {
        $valid = $request->validate([
            'files' => 'required|array|between: 1, 5',
            'files.*' => 'mimes:jpg, jpeg, png'
        ]);

        $images = $request->file(key: 'files');
        $ex = [];
        foreach ($images as $image) {
            $oldName = mb_strtolower(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
            $ext = $image->getClientOriginalExtension();
            $originalName = str_slug($oldName);
            $newFilename = (preg_match("/[а-яё]/iu", $oldName)) ? $originalName : $oldName;
            $newName = "{$newFilename}.{$ext}";
            //$path = $image->storeAs('pictures', $newName, 'public');
            $ex[] = $newName;
            $newImage = new ModelsContactModel();
            $newImage->filename = $newName;

            $newImage->save();
        }
        //dd($ex);

        return redirect()->route('home');
    }
}
