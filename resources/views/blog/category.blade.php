@extends('layouts.app')

@section('title', $category->title . " - DKA-DEVELOP")


@section('content')
  <div class="container" style="padding-bottom: 100px;">
		@forelse ($articles as $article)
      @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
      <script>
      $(function() {
      $('#myModal').modal('show');
      });
      </script>
      @endif
      <!-- Button trigger modal -->
      <h2  data-toggle="modal" data-target="#{{$article->id}}">
      <a   href="#">{{$article->title}}</a>
    </h2>
    <p>{!!$article->description_short!!}</p>
    @if ($article->video === null)

    @else
        <iframe width="560" height="315" src="{{$article->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
    @endif


      <!-- Modal -->
      <div class="modal fade" id="{{$article->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">{{$article->title}}</h4>
        </div>
        <div class="modal-body">
          <p>{!!$article->description!!}</p>
          @if ($article->video === null)

          @else
              <iframe width="560" height="315" src="{{$article->video}}" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          @endif
          <hr />
          {{--Комментарии--}}
          @guest
            <li><a href="{{ route('login') }}">Оставить комментарий</a></li>
          @else
            <div class="dropdown">
    <button id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Оставить комментарий
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" aria-labelledby="dLabel" >
      <div class="card"  >
        <div class="card-block">
          <form method="POST" action="/blog/article/{{$article->id}}/comments">
            {{csrf_field()}}
            {{-- {{method_field('PATCH')}} --}}
            <div class="form-group">
              <textarea name="body" placeholder="Your comment" class="form-control"></textarea>
            </div>
            <div class="form-group">
              <button  type="submit" class="btn btn-primary">Добавить комментарий</button>
            </div>
          </form>
        </div>
      </div>
    </ul>
  </div>
@endguest

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
         {{-- add comments--}}
         <hr />

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
        </div>
      </div>
      </div>
      </div>
			{{-- <div class="row">
				<div class="col-sm-12">
					<h2><a   href="{{route('article', $article->slug)}}">{{$article->title}}</a></h2>
					<p>{!!$article->description_short!!}</p>
				</div>
			</div> --}}
		@empty
			<h2 class="text-center">Пусто</h2>
		@endforelse

		{{$articles->links()}}
</div>

@endsection
