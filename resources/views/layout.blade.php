<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div style="display:flex; justify-content:center; align-items:center; height:10vh;">
        <h4>Тест banki.shop (прототип хостинга изображений)</h4>
    </div>
    <div style="display:flex; justify-content:center; align-items:center; height:1vh;">
      <nav class="my-2 my-md-0 mr-md-3">
          <a class="p-2 text-dark" style="font-size: 20px;" href="{{ route('upload') }}"><input type="button" value="Загрузить файлы"></a>
          <a class="p-2 text-dark" style="font-size: 20px;" href="{{ route('info') }}"><input type="button" value="Информация о файлах"></a>
      </nav>
    </div>
    <section>
        <hr class="hr-horizontal-gradient">
    </section>
    <style>
        .hr-horizontal-gradient {
	    margin: 50px 0;
	    padding: 0;
	    height: 4px;
	    border: none;
	    background: linear-gradient(45deg, #333, #ddd);
        }
    </style>
@include('inc.messages')
@yield('mainContent')

</body>
</html>
