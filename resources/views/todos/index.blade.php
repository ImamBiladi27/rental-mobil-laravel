@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>
                <div class="panel-body">
                    @if(auth()->user()->role==1)
                    <div class="col-auto">
                        <a href="{{ url('todo/create') }}" class="btn btn-primary">Tambah Pesan</a>
                        <a href="/exportexcel" class="btn btn-info">Export Excel</a>
                    </div>



                    <br>

                    @endif
                    @if(auth()->user()->role==2)
                    <h2>Halaman Approval</h2>
                    @endif
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name Driver</th>
                                <th>Name Merk Mobil</th>

                                <th>Is Done</th>
                                <th>Action</th>
                                </th>

                                @if(! count($todos))
                            <tr>
                                <td colspan="3">No todo</td>
                            </tr>
                            @endif
                            @foreach($todos as $todo)
                            <tr>
                                <td>{{ $todo->name }}</td>
                                <td>{{ $todo->name_mobil }}</td>
                                <td>{{ $todo->is_done }}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{ url('todo/'.$todo->id.'/edit') }}">Edit</a>
                                    @if(auth()->user()->role==1)
                                    <a class="btn btn-danger" href="{{ url('todo/'.$todo->id.'/delete') }}">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </table>

                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i> {{Auth::user()->email}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a>Level: {{Auth::user()->role}}</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="{{route('actionlogout')}}"><i class="fa fa-power-off"></i> Log Out</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection