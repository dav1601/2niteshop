<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tên</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Avatar</th>
            <th scope="col">Provider</th>
            <th scope="col">Provider ID</th>
            <th scope="col">Role</th>
            <th scope="col">Ngày Gia Nhập</th>
            <th scope="col">Edit</th>
            <th scope="col">Profile</th>
            <th scope="col">Ban</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user )
        <tr>
            <td>{{ $user-> id }}</td>
            <td>{{ $user -> name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone }}</td>
            <td>
                <img src="{{ $daviUser->getAvatarUser($user->id) }}" width="80" alt="" style="border-radius: 5px;">
            </td>
            <td>
                @if ($user->provider != NULL)
                {{ $user->provider }}
                @else
                Trống
                @endif
            </td>
            <td>
                @if ($user->provider_id != NULL)
                {{ $user->provider_id }}
                @else
                Trống
                @endif

            </td>
            <td>
                {{ App\Models\Role::where('id' , '=' , $user->role_id) -> first()->name }}
            </td>
            <td>
                {{ $carbon -> create($user->created_at) ->diffForHumans($carbon->now()) }}
            </td>
            <td>
                <a href="{{ route('edit_user', ['id'=>$user->id]) }}">
                    <i class="fa-solid fa-user-pen"></i>
                </a>
            </td>
            <td class="d-flex justify-content-center align-items-center">
                @if ($user->role_id <= 3 ) <a href="{{ route('admin_profile', ['id'=>$user->id]) }}" class="d-block">
                    <i class="fa-solid fa-id-card-clip"></i>
                    </a>
                    @else
                    User
                    @endif
            </td>
            <td>
                @if ($user->ban == 1)
                <a href="{{ route('handle_delete_user' ,['id'=> $user->id , 'action' => " unban"]) }}"
                    class="unban__user" data-id="{{ $user->id }}">
                    <i class="fa-solid fa-user-slash"></i>
                </a>
                @else
                <a href="{{ route('handle_delete_user' ,['id'=> $user->id , 'action' => " ban"]) }}" class="ban__user"
                    data-id="{{ $user->id }}">
                    <i class="fa-solid fa-ban"></i>
                </a>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer p-0" id="orders_show--page">
    @if ($number > 1)
    {!! navi_ajax_page($number , $page , "","justify-content-center" , "mt-2") !!}
    @endif
</div>
