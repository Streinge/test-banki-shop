@extends('layout')

@section('title')Информация об изображениях@endsection

@section('mainContent')
<table class="table">
    <thead>
        <tr>
            <th>Имя файла</th>
            <th>Дата создания</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)
        <tr>
            <td>{{ $item->filename }}</td>
            <td><img src="{{ asset(public/thumbnails/.$item->filename) }}"></td>
            <td>{{ $item->date }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
