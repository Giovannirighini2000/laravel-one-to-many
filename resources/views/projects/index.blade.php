@extends('layouts.app')


@section('content')
    <div class="container">
        <div>
            <h1>
                I tuoi progetti
            </h1>
            <div>
                <a class="btn" href="{{route('projects.create')}}">Nuovo progetto</a>
            </div>
        </div>
        <div class="container">
            <table class="table ">
                <thead>
                    <tr>
                        <th>ID </th>
                        <th>TITOLO</th>
                        <th>SLUG</th>
                        <th>DESCRIZIONE</th>
                        <th>DATE</th>
                        <th>URL</th>
                        <th>DATA ELIMINAZIONE</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($projects as $project)
                    <tr>
                        <td>{{$project->id}}</td>
                        <td><a href="{{route('projects.show',$project)}}">{{$project->title}}</a></td>
                        <td>{{$project->slug}}</td>
                        <td>{{$project->description}}</td>
                        <td>{{$project->date}}</td>
                        <td>{{$project->url}}</td>
                        <td>
                            {{ $project->trashed() ? $project->deleted_at : '' }}
                        </td>
                        <td>
                            <a class="btn " href="{{route('projects.edit',$project)}}">MODIFICA</a>
                            
                        </td>
                        <td>
                            <form action="{{ route('projects.destroy', $project) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input class="btn" type="submit" value="ELIMINA">
                            </form>
                            
                        </td>
                        <td>
                            @if($project->trashed())
                                <form action="{{ route('projects.restore',$project) }}" method="POST">
                                    @csrf
                                    <input class="btn btn-sm btn-success" type="submit" value="Ripristina">
                                </form>
                            @endif
                        </td>
                    </tr>
                    @empty 
                    <tr>
                        <td>Vuoto</td>
                    </tr>
                    @endforelse
                </tbody>

            </table>

        </div>

    </div>


@endsection