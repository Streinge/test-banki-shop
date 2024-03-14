@extends('layout')

@section('title')Загрузка файлов@endsection

@section('mainContent')
    <div style="display:flex; justify-content:center; align-items:center; height:20vh;">
        <h6>Выберите файлы для загрузки на сервер</h6>
    </div>
    <div style="display:flex; justify-content:center; align-items:center; height:5vh;">
        <form enctype="multipart/form-data" method="post"  action="/upload">
        {{ csrf_field() }}
            <div class="input-file-row">
                <label class="input-file">
                    <input type="file" name="files[]" id="files[]" multiple accept="image/*,image/jpeg">
                </label>
                <div class="input-file-list"></div>
            </div>
            <button type="submit" name="upload" class="btn btn-primary" style="margin: 10px auto;">Загрузить</button>
        </form>
    </div>

@endsection
