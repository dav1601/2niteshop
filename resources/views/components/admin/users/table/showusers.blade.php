<table class="table-borderless table">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col" class="char__255">Tên</th>
            <th scope="col" class="char__255">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Avatar</th>
            <th scope="col">Provider</th>
            <th scope="col">Role</th>
            <th scope="col">Ngày Gia Nhập</th>
            <th scope="col">Edit</th>
            <th scope="col">Profile</th>
            @can('Ban User')
                <th scope="col">Ban</th>
            @endcan

        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td class="char__255">{{ $user->name }}</td>
                <td class="char__255">{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>
                    <img src="{{ urlImg(Auth::user()->avatar) }}" width="80" alt=""
                        style="border-radius: 5px;">
                </td>
                <td>
                    {{ $user->provider ?? 'No' }}
                </td>

                <td>
                    {!! renderROP($user->roles) !!}
                </td>
                <td>
                    {{ $carbon->create($user->created_at)->diffForHumans($carbon->now()) }}
                </td>
                <td>
                    <a href="{{ route('edit_user', ['id' => $user->id]) }}">
                        <i class="fa-solid fa-user-pen"></i>
                    </a>
                </td>
                <td class="d-flex justify-content-center align-items-center">
                    @if ($user->hasPermissionTo('Manager'))
                        <a href="{{ route('admin_profile', ['id' => $user->id]) }}" class="d-block">
                            <i class="fa-solid fa-id-card-clip"></i>
                        </a>
                    @else
                        User
                    @endif

                </td>
                @can('Ban User')
                    <td>
                        @if ($user->ban == 1)
                            <a href="{{ route('handle_delete_user', ['id' => $user->id, 'action' => ' unban']) }}"
                                class="unban__user" data-id="{{ $user->id }}">
                                <i class="fa-solid fa-user-slash"></i>
                            </a>
                        @else
                            <a href="{{ route('handle_delete_user', ['id' => $user->id, 'action' => ' ban']) }}"
                                class="ban__user" data-id="{{ $user->id }}">
                                <i class="fa-solid fa-ban"></i>
                            </a>
                        @endif
                    </td>
                @endcan

            </tr>
        @endforeach
    </tbody>
</table>
<div class="card-footer p-0" id="orders_show--page">
    @if ($number > 1)
        {!! navi_ajax_page($number, $page, '', 'justify-content-center', 'mt-2') !!}
    @endif
</div>
