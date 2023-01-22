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
<div class="card-body table-responsive p-0 w-50 display-flex justify-content-center">


    <div class="sidebar">
        <nav class="nav nav-pills nav-sidebar flex-column">
            <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                <li class="nav-item">
                    <a class="btn btn-primary" href="{{ route('courses.create') }}">
                        Создать
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    <div class="m-5">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>id</th>
                <th>Название</th>
                <th>Действие</th>
            </tr>
            </thead>
            <tbody>
            @foreach($coursesAll as $courses)
                <tr>
                    <td>{{ $courses->id }}</td>
                    <td>{{ $courses->title }}</td>
                    <td><a href="{{ route('courses.show', $courses->id) }}">Посмотреть</a></td>
                    <td><a href="#">Изменить</a></td>
                    <td>
                        <form action="{{ route('courses.delete', $courses->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="delete_button" type="submit">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<script>
   let btnDel = document.querySelector('.delete_button');

   btnDel.addEventListener('click', (e) => {
        let result = confirm("Вы точно хотите удалить?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>
</body>
</html>
