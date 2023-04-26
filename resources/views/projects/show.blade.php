@extends('layouts.app')


@section('content')
    
<div class="container">
    <div class="d-flex">
        <div >
            <h1 class="title">{{$project->title}}</h1>
            <p class="slug">{{$project->slug}}</p>
            <p class="description">{{$project->description}}</p>
            <p class="date">{{$project->date}}</p>
            <p class="url">{{$project->url}}</p>
            
        </div>
        <div>
            <a class="btn" href="{{route('projects.edit',$project)}}">MODIFICA</a>
            @if($project->trashed())
                    <form action="{{ route('projects.restore',$project) }}" method="POST">
                        @csrf
                        <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                    </form>
                @endif
        </div>

    </div>
    

</div>

@endsection