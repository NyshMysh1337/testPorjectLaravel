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
    <form action="{{ route('courses.update', $courses->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>update</h1>
        <div class="form-floating mb-4">
            <input type="text" name="title" class="form-control" placeholder="Название курса" value="{{$courses->title}}">
            <label for="floatingInput">Название курса</label>
        </div>
        @error('title')
        <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
        @enderror

        <div class="form-floating mb-4">
            <textarea name="description" class="form-control">{{ $courses->description }}</textarea>
            <label for="floatingPassword">Его описание</label>
        </div>
        @error('description')
        <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
        @enderror

        <div class="form-floating mb-4">
            <input value="{{$courses->duration_h}}" type="text" name="duration_h" class="form-control" placeholder="Количество часов">
            <label for="floatingPassword">Количество часов</label>
        </div>
        @error('duration_h')
        <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
        @enderror

        <div class="form-floating mb-4">
            <h4>Методические материалы</h4>
            <input type="file" name="materials[]" multiple class="form-control" placeholder="Название курса">
        </div>
        @error('materials')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <div class="form-floating mb-4">
            <input type="text" name="hyper_link" value="{{ $courses->hyper_link }}" class="form-control" placeholder="Ссылка на видеоматериалы">
            <label for="floatingPassword">Ссылка на видеоматериалы</label>
        </div>
        @error('hyper_link')
        <div class="text-danger">{{ $message }}</div>
        @enderror

        <button class="btn btn-primary" type="submit">
            Добавить
        </button>
    </form>


</body>
</html>
