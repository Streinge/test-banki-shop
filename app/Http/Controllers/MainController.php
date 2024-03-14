<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\ContactModel as ModelsContactModel;

class MainController extends Controller
{
    public function submit($request)
    {

    }

    public function getHomePage()
    {
        return view(view: 'home');
    }

    public function getUploadPage()
    {
        return view(view: 'upload');
    }

    public function storedFiles(Request $request)
    {
        # метод контролера сохраняет файлы в папку
        # и записывает инфу о них в БД

        # валидация данных из формы
        $valid = $request->validate([
            'files' => 'required|array|between: 1, 5',
            'files.*' => 'mimes:jpg, jpeg, png'
        ]);

        # получаю массив с именами файлов из БД
        $data = new ModelsContactModel();
        $records = $data->all()->toArray();
        $listFileNames = [];
        foreach ($records as $record) {
            $listFileNames[] = $record['filename'];
        }

        # получаю информацию о загружаемых фалах из запроса
        $images = $request->file(key: 'files');

        # для каждого загружаемого файла
        foreach ($images as $image) {
            # привожу имя без расширения к нижнему регистру
            $oldName = mb_strtolower(pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME));
            # сохраняю оригинальное расширение
            $ext = $image->getClientOriginalExtension();
            # делаю слаг для транслитерации оригинального имени
            $originalName = str_slug($oldName);
            #создаю новое имя файла если в названии есть кирилица, или оставляю старое
            $newFilename = (preg_match("/[а-яё]/iu", $oldName)) ? $originalName : $oldName;
            $newName = "{$newFilename}.{$ext}";

            # если имя не уникальное прибавляю цифры в окончание названия
            while (in_array($newName, $listFileNames, true)) {
                $ending = (string) rand(0, 999);
                $filename = pathinfo($newName, PATHINFO_FILENAME);
                $exten = pathinfo($newName, PATHINFO_EXTENSION);
                $newName = "{$filename}{$ending}.{$exten}";
            }
            # добавляю в проверочный массив новое имя
            $listFileNames[] = $newName;

            # загружаю файл в папку
            $path = $image->storeAs('pictures', $newName, 'public');

            # делаю запись в БД
            $image = new ModelsContactModel();
            $image->filename = $newName;
            $image->save();
        }
        # возвращаюсь на стартовую страницу
        return redirect()->route('home')->with('success', 'Файлы успешно загружены');
    }

    public function displaysInfo()
    {
        return view('info', ['data' => ModelsContactModel::all()]);
    }
}