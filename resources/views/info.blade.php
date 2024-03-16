@extends('layout')

@section('title')Информация об изображениях@endsection

@section('mainContent')
<table class="table">
    <thead>
        <tr>
            <th>Имя файла</th>
            <th>Превью</th>
            <th>Оригинал</th>
            <th>Дата создания</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->filename }}</td>
            <td><img src="{{ asset('/thumbnail/' . $item->filename) }}"></td>
            <td><a href="{{ asset('storage/pictures/' . $item->filename) }}"><input type="button" value="Просмотр"></td>
            <td>{{ $item->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
