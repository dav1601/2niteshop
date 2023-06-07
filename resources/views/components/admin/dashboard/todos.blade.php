<div id="todos_content">
    @if ($tasks->count > 0)
        @foreach ($tasks->data as $task)
            @php
                $status = '';
                $text = '';
                if ($task->done === 1) {
                    $status = 'done';
                    $text = 'Hoàn thành';
                } else {
                    if (strtotime($carbon->now()) < strtotime($task->deadline)) {
                        $status = 'doing';
                    } else {
                        $status = 'failed';
                        $text = 'Chưa hoàn thành';
                    }
                }
            @endphp
            <div
                class="task__item task-{{ $task->id }} @if ($status === 'done') task__item--done  @elseif ($status === 'failed') task__item--fail @endif">
                <div class="va-checkbox">
                    <input type="checkbox" name="" id="tk-{{ $task->id }}" class="task__item--check"
                        data-id="{{ $task->id }}" @if ($status === 'done') checked disabled @endif
                        @if ($status === 'failed') disabled @endif>
                    <label for="tk-{{ $task->id }}">{{ $task->name }}
                        @switch($status)
                            @case('done')
                                <span class="badge badge-success">Hoàn Thành</span>
                            @break

                            @case('failed')
                                <span class="badge badge-danger">Chưa Hoàn Thành</span>
                            @break

                            @case('doing')
                                <span class="badge badge-warning task-countdown" id="task-countdown-{{ $task->id }}"
                                    data-task="{{ json_encode($task) }}">
                                </span>
                            @break

                            @default
                        @endswitch

                    </label>
                </div>
            </div>
        @endforeach
    @else
        <span>Chưa Có Task Nào!</span>
    @endif
</div>
<div class="task-pages">
    <x-pagination :number_page='$tasks->number_page' :page="$tasks->page" classWp="pagination-sm mt-4 justify-content-center" />
</div>
