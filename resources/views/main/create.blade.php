<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Document</title>
</head>
<body>

    <a class="btn btn-primary" href="{{ route('courses.index') }}">
        Главная
    </a>
    <form action="{{ route('courses.store') }}" method="post">
        @csrf
        <div class="form-floating mb-4">
            <input type="text" name="title" class="form-control" placeholder="Название курса">
            <label for="floatingInput">Название курса</label>
        </div>
        <div class="form-floating mb-4">
            <textarea name="description" class="form-control"></textarea>
            <label for="floatingPassword">Его описание</label>
        </div>
        <div class="form-floating mb-4">
            <input type="text" name="duration_h" class="form-control" placeholder="Количество часов">
            <label for="floatingPassword">Количество часов</label>
        </div>
{{--        <div class="form-floating mb-4">--}}
{{--            <h4>Методические материалы</h4>--}}
{{--            <input type="file" name="file" class="form-control" placeholder="Название курса">--}}
{{--        </div>--}}
        <button class="btn btn-primary" type="submit">
            Добавить
        </button>
    </form>


</body>
</html>
