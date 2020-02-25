@extends('layouts.app')

@section('content')
<div class="container">
    @if(count($errors) > 0)
		<div class="alert alert-danger">
			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error}}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="/recipe/create" method="POST">
                @csrf
                <h5>Добавление рецепта</h5>
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Название</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputName" name="name">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputDescription" class="col-sm-2 col-form-label">Описание</label>
                    <div class="col-sm-10">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="exampleFormControlSelect1">Ингридиент</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="ingredient">
                        ingredient
                            @foreach ($ingredients as $ingredient)
                                <option value="{{ $ingredient->id }}">{{$ingredient->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col">
                        <label for="form-control">Количество</label>
                        <input type="text" class="form-control" name="quantity">
                    </div>
                    <div class="col">
                        <label for="exampleFormControlSelect2">Единица измерения</label>
                        <select class="form-control" id="exampleFormControlSelect2" name="unit">
                        ingredient
                            @foreach ($units as $key => $unit)
                                <option value="{{ $key }}">{{ $unit }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="my-3 d-flex justify-content-between">
                    <button type="button" class="btn btn-primary" id="ingredientAdd">Добавить</button>
                    <div>
                        <span>Нет в списке?</span>
                        <button type="submit" class="btn btn-primary">Создать новый ингридиент</button>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success">Сохранить рецепт</button>
                </div>
                <!-- <div class="form-group">
                    <

                        <input type="text" class="form-control" id="inputName">

                </div> -->


            </form>
        </div>
    </div>
</div>

@endsection
