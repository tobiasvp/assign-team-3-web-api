@extends('layouts.app')

@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center">
                <div class="col-lg-12 margin-tb">
                    {{-- <div class="pull-left">
                        List Product
                    </div> --}}
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                    <a class="btn btn-danger" href="{{ route('admin.home') }}"> Back</a>
                </div>
            </div>

            <br>
            <div class="card">
                <div class="card-header">
                    List User

                </div>


                <div class="card-body">

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Nama </th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>Foto KTP </th>
                            <th>Email</th>

                            <th>Type</th>

                            <th width="200px">Action</th>
                        </tr>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->tempat_tl }}</td>

                                <td>{{ $user->alamat }}</td>
                                {{-- <td>{{ $user->foto_ktp }}</td> --}}
                                @if ($user->foto_ktp)
                                    <td>
                                        <img style="height: 100px; width: 150px;"
                                            src="{{ Storage::url($user->foto_ktp) }}   ">
                                    </td>
                                @else
                                    <td> <span>No image found!</span></td>
                                @endif
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->type }}</td>



                                <td>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                        {{-- <a class="btn btn-info" href="{{ route('users.show', $user->id) }}">Show</a> --}}
                                        <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">Edit</a>


                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
