@extends('layouts.main')
@section('content')
<div class="container">
    <div class="sidebar">
        <a class="btn btn-primary mt-4" href="{{ route('courses.create') }}">
            Создать
        </a>
    </div>
    <div class="mt-4 d-flex justify-content-center">
            <select class="form-select w-50" id='per' name="per">
                <option >Количество записей на странице</option>
                @foreach($perPageArr as $per)
                    <option value="{{ $per }}">{{$per}}</option>
                @endforeach
{{--                <option value="10" >10</option>--}}
{{--                <option selected value="20">20</option>--}}
{{--                <option value="50">50</option>--}}
{{--                <option value="100">100</option>--}}
            </select>
    </div>
    <div class="m-5">
        <button onclick='sortListDir()'>По названию</button>
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody id="id01">
            @foreach($coursesAll as $courses)
                <tr data-sort='{{ $courses->title }}' class='mt-3'>
                    <td>{{ $courses->id }}</td>
                    <td>{{ $courses->title }}</td>
                    <td><a role="button" class="btn btn-outline-success" href="{{ route('courses.show', $courses->id) }}">Посмотреть</a></td>
                    <td><a role="button" class="btn btn-outline-secondary" href="{{ route('courses.edit', $courses->id) }}">Изменить</a></td>
                    <td>
                        <form action="{{ route('courses.delete', $courses->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-outline-danger delete_button" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>{{ $coursesAll->withQueryString()->links() }}</div>
    </div>
</div>
<script>
   let btnDel = document.querySelectorAll('.delete_button');

   btnDel.forEach((btn) => {
       btn.addEventListener('click', (e) => {
           let result = confirm("Вы точно хотите удалить?");
           if(!result) {
               e.preventDefault();
           }
       });
   })

</script>

<script src="{{ asset('js/sort.js') }}"></script>
@endsection
