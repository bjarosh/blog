@extends('layouts.app')

@section('title', $article->meta_title)
@section('meta_keyword', $article->meta_keyword)
@section('meta_description', $article->meta_description)

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h1>{{$article->title}}</h1>
				<p>{!!$article->description!!}</p>
			</div>
		</div>
	</div>
	<hr />
	<div class="comments">
		<ul class="list-group">


		@foreach ($article->comments as $comment)
			<li class="list-group-item">
				<strong>{{$comment->created_at->diffForHumans()}}</strong>:
					{{$comment->body}}
			</li>

		@endforeach
		</ul>
	</div>
	<hr />
	<div class="card">
		<div class="card-block">
			<form method="POST" action="/blog/article/{{$article->id}}/comments">
				{{csrf_field()}}
				{{-- {{method_field('PATCH')}} --}}
				{{$article->id}}
				<div class="form-group">
					<textarea name="body" placeholder="Your comment" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<button  type="submit" class="btn btn-primary">Добавить комментарий</button>
				</div>
			</form>
		</div>
	</div>
@endsection
