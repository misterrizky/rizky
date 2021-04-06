@extends('office.layouts.main',['title' => ' | Employee'])
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <!-- Following -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Employee
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                        <th>User</th>
                        <th> </th>
                        </thead>
                        <tbody>
                        @foreach ($employees as $user)
                            <tr>
                                <td clphpass="table-text"><div>{{ $user->name }}</div></td>
                                @if($user->isBanned())
                                <a href="{{ route('users.revokeuser',$user->id) }}" class="btn btn-success btn-sm"> Revoke</a>
                                @else
                                <a class="btn btn-success ban btn-sm" data-id="{{ $user->id }}" data-action="{{ URL::route('users.ban') }}"> Ban</a>
                                @endif
                                @if (auth()->user()->isFollowing($user->id_user))
                                    <td>
                                        <form action="{{route('unfollow', ['id_user' => $user->id_user])}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-follow-{{ $user->id_user }}" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Unfollow
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <form action="{{route('follow', ['id_user' => $user->id_user])}}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" id="follow-user-{{ $user->id_user }}" class="btn btn-success">
                                                <i class="fa fa-btn fa-user"></i>Follow
                                            </button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection