@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="font-italic d-flex justify-content-between"><span class="font-weight-bold d-inline">Мои рецепты</span>
                <a class="btn btn-success" href="{{ url('/recipe/formCreate') }}" role="button">Добамить рецепт</a>
            </p>
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Рецепт</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Действия</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recipes as $recipe)
                        <tr>
                            <th scope="row">{{ $recipe->name }}</th>
                            <td>{{ $recipe->description }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="{{ url('/preview') }}" role="button">Просмотр</a>
                                <a class="btn btn-success btn-sm" href="{{ url('/edit') }}" role="button">Редактировать</a>
                                <a class="btn btn-danger btn-sm" href="{{ url('/recipe/delete?id=') . $recipe->id}}" role="button">Удалить</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
