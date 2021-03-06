@extends('admin.layouts.app_admin')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
          <div class="jumbotron">
            <p>
              <span class="label label-primary">Категорий {{$count_categories}}</span>
            </p>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="jumbotron">
            <p>
              <span class="label label-primary">Материалов {{$count_articles}}</span>
            </p>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="jumbotron">
            <p>
              <span class="label label-primary">Посетителей 0</span>
            </p>
          </div>
      </div>
      <div class="col-sm-3">
          <div class="jumbotron">
            <p>
              <span class="label label-primary">Сегодня 0</span>
            </p>
          </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <a class="btn btn-block btn-default" href="{{route('admin.category.create')}}"> Создать категорию</a>
        <a class="list-group-item" href="#">
          <h4 class="list-group-item-heading">Категория первая</h4>
          <p class="list-group-item-text">
            Кол-во Материалов
          </p>
        </a>
      </div>
      <div class="col-sm-6">
        <a class="btn btn-block btn-default" href="{{route('admin.article.create')}}"> Создать материал</a>
        <a class="list-group-item" href="#">
          <h4 class="list-group-item-heading">Материал первая</h4>
          <p class="list-group-item-text">
            Категория
          </p>
        </a>
      </div>
    </div>
  </div>
@endsection
