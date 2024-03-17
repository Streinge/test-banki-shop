@extends('layout')

@section('title')Информация об изображениях@endsection

@section('mainContent')
<table class="table">
    <thead>
        <tr>
            <th>
                <p>Имя файла</p>
                <a href="{{ route('info', ['filename', 'asc']) }}"><img style="margin-left: 10px; margin-right: 10px" src="/icons/asc26.png"></a>
                <a href="{{ route('info', ['filename', 'desc']) }}"><img style="margin-left: 10px; margin-right: 10px" src="/icons/desc26.png"></a>
            </th>
            <th>
                <p>Дата создания</p>
                <a href="{{ route('info', ['date', 'asc']) }}"><img style="margin-left: 10px; margin-right: 10px" src="/icons/asc26.png"></a>
                <a href="{{ route('info', ['date', 'desc']) }}"><img style="margin-left: 10px; margin-right: 10px" src="/icons/desc26.png"></a>
            </th>
            <th>Превью</th>
            <th>Оригинал</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->filename }}</td>
            <td>{{ $item->date }}</td>
            <td><img src="{{ asset('/thumbnail/' . $item->filename) }}"></td>
            <td><a href="{{ asset('storage/pictures/' . $item->filename) }}"><input type="button" value="Просмотр"></td>
            <td><a href="{{ route('download', $item->filename) }}"><input type="button" value="Скачать в ZIP"></a></td>

        </tr>
        @endforeach
    </tbody>
</table>

@endsection
