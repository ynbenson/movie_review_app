@extends('layouts/app')
@section('content')
<style>
    .popular-user img {
        width: 20%;
    }

    .popular-user-description {
        float: right;
        width: 75%;
    }

</style>
<div class="recommend-user-list">
    @foreach ($recommend_users as $recommend_user)
        <div class="recommend-user">
            <div class="recommend-user-description">
                <table class="table table-striped">
                    <tbody>
                    <tr>
                        <td rowspan="5" align="center"><img src="img/himakuro.png" width="280px"><div class="recommend-user-name">{{$recommend_user["name"]}}</div></td>
                    </tr>
                    <tr>
                        <th>Total Movie Reviewed</th>
                        <td>123456<td>
                    </tr>
                    <tr>
                        <th>Following count</th>
                        <td>123456<td>
                    </tr>
                    <tr>
                        <th>Followed users count</th>
                        <td>123456<td>
                    </tr>
                    <tr>
                        <th>Follow/Unfollow</th>
                        {!! Form::open(['url' => '/follow', 'method' => 'post']) !!}
                        <input type="hidden" name="followee_user_id" value="{{$recommend_user["id"]}}">
                        @if ($recommend_user["is_followed"])
                            <td>{!! Form::submit('UnFollow', ['class' => 'btn btn-default']) !!}</td>
                        @else
                            <td>{!! Form::submit('Follow', ['class' => 'btn btn-default']) !!}</td>
                        @endif
                        {!! Form::close() !!}
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endforeach
</div>


@endsection