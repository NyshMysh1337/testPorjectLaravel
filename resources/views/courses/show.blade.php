@extends('layouts.main')
@section('content')

    <div class="container">
        <a class="btn btn-primary mt-4" href="{{ route('courses.index') }}">
            Главная
        </a>
        <header class="m-4 d-flex justify-content-center">
            <h3>{{ $courses->title }}</h3>
        </header>

        <div>
            <h2>Описание</h2>
            <p class="mt-3">
                {{ $courses->description }}
            </p>
        </div>
        <div class="d-flex">
            @foreach($courses->material as $material)
                <div>
                    <img class="w-25 m-4" src="{{ url('storage/' . $material->material) }}">
                    <a href={{ url('storage/' . $material->material) }} download="">скачать</a>
                </div>
            @endforeach
        </div>
        <div class="mt-3">
            Ссылка на <a href="{{ $courses->hyper_link }}">видео материалы</a>
        </div>
    </div>



@endsection
