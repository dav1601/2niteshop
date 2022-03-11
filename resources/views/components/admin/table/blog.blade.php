<table class="table table-borderless">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Img</th>
            <th scope="col">Title</th>
            <th scope="col">Danh Mục 1</th>
            <th scope="col">Danh Mục 2</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Tác Giả</th>
            <th scope="col">Ngày Đăng</th>
            <th scope="col">Sửa</th>
            <th scope="col">Xoá</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($blogs as $blog)
        <tr>
          <td>{{ $blog->id }}</td>
          <td>
              <img src="{{ $file->ver_img($blog->img) }}" width="100" alt="">
          </td>
          <td style="max-width: 300px;">
              {{ $blog->title }}
          </td>
          <td style="max-width: 200px;">
              {{ App\Models\CatBlog::where('id', '=' , $blog->cat_id)->first()->name }}
          </td>
          <td style="max-width: 200px;">
              @if ($blog -> cat_sub_id != NULL)
              {{ App\Models\CatBlog::where('id', '=' , $blog->cat_sub_id)->first()->name }}
                  @else
                  Không có
              @endif
          </td>
          <td>
                  <select class="custom-select update__active" name=""  data-id="{{ $blog->id }}">
                      <option value="{{ $blog->active }}">{{ config('navi.active_blog.'.$blog->active) }}</option>
                      @foreach (config('navi.active_blog') as $key => $active )
                           @if ($key != $blog->active)
                          <option value="{{ $key }}">{{ $active }}</option>
                           @endif
                      @endforeach
                  </select>
          </td>
          <td>
              {{ $daviUser->getUser($blog->users_id)->name }}
          </td>
          <td>
              {{ $carbon -> parse($blog->created_at) -> diffForHumans() }}
          </td>
          <td>
            <a href="{{ route('edit_blog', ['id'=>$blog->id]) }}">
                <i class="fas fa-eye"></i>
            </a>
          </td>
          <td>
            <a class="delete__blog" data-id="{{ $blog->id }}">
                <i class="fas fa-trash"></i>
            </a>
          </td>

        </tr>
        @endforeach
    </tbody>

</table>
<div class="card-footer p-0" id="orders_show--page">
    {!! navi_ajax_page($number , $page , "pagination-sm","justify-content-center" , "mt-2") !!}
</div>
