@extends('layouts.main')
@section('content')

    <a class="btn btn-primary" href="{{ route('courses.index') }}">
        Главная
    </a>
    <form action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        @error('title')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" placeholder="Название курса">
            <label for="floatingInput">Название курса</label>
        </div>


        @error('description')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            <label for="floatingPassword">Его описание</label>
        </div>


        @error('duration_h')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <input type="text" name="duration_h" value="{{ old('duration_h') }}" class="form-control" placeholder="Количество часов">
            <label for="floatingPassword">Количество часов</label>
        </div>


        @error('materials')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <h4>Методические материалы</h4>
            <input type="file" name="materials[]" multiple value="{{ old('materials') }}" class="form-control" placeholder="Название курса">
        </div>


        @error('hyper_link')
        <div class="text-danger">{{ $message }}</div>
        @enderror
        <div class="form-floating mb-4">
            <input type="text" name="hyper_link" value="{{ old('hyper_link') }}" class="form-control" placeholder="Ссылка на видеоматериалы">
            <label for="floatingPassword">Ссылка на видеоматериалы</label>
        </div>
        <button class="btn btn-primary" type="submit">
            Добавить
        </button>
    </form>


</body>
</html>
@endsection
