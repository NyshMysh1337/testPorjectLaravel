@extends('layouts.main')
@section('content')
    <div class="container">
        <a class="btn btn-primary mt-4" href="{{ route('courses.index') }}">
            Главная
        </a>
        <div class="row align-items-center">
<div class="col">
    <form class="m-4" action="{{ route('courses.update', $courses->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <h1>Обновление</h1>
        @error('title')
        <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <input type="text" name="title" class="form-control" placeholder="Название курса" value="{{$courses->title}}">
            <label for="floatingInput">Название курса</label>
        </div>

        @error('description')
        <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <textarea name="description" class="form-control">{{ $courses->description }}</textarea>
            <label for="floatingPassword">Его описание</label>
        </div>

        @error('duration_h')
        <div class="text-danger">Это поле необходимо для заполнения {{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <input value="{{$courses->duration_h}}" type="text" name="duration_h" class="form-control" placeholder="Количество часов">
            <label for="floatingPassword">Количество часов</label>
        </div>

        @error('materials')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <h4>Методические материалы</h4>
            <input type="file" name="materials[]" multiple class="form-control" placeholder="Название курса">
        </div>

        @error('hyper_link')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <input type="text" name="hyper_link" value="{{ $courses->hyper_link }}" class="form-control" placeholder="Ссылка на видеоматериалы">
            <label for="floatingPassword">Ссылка на видеоматериалы</label>
        </div>


        <button class="btn btn-primary" type="submit">
            Изменить
        </button>
    </form>
</div>
            <div class="col">
                @foreach($courses->material as $file)
                        <img class="w-25 m-4" src="{{ url('storage/' . $file->material) }}">
                        <form action={{route('delete.file', $file->id)}} method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection

