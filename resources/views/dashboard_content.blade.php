@extends('dashboard')

@section('dashboard-content')
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            
            <div class="card mb-4">
                <div class="card-header">
                <div class="row">
                        <div class="col-md-10">
                            <i class="fas fa-table me-1"></i>
                            List of Songs
                        </div>
                        <div class="col-md-2">
                            <button id="open-modal">asdfasdf</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Artist</th>
                                <th class="text-center">Lyrics</th>
                                <th class="text-center"><i class="fas fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($song_list))
                                @foreach ($song_list as $index => $value)
                                    <tr>
                                        <td class="text-center" style="vertical-align:middle">{{$value['title']}}</td>
                                        <td class="text-center" style="vertical-align:middle">{{$value['artist']}}</td>
                                        <td style="vertical-align:middle"><pre>{{$value['lyrics']}}</pre></td>
                                        <td class="text-center" style="vertical-align:middle">
                                            <a href="#" class="btn btn-edit"><i class="fas fa-edit fa-2x"></i></a><br/>
                                            <a href="#" class="btn btn-delete"><i class="fas fa-trash fa-2x "></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Title</th>
                                <th>Artist</th>
                                <th>Lyrics</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; 2021</div>
            </div>
        </div>
    </footer>
@stop