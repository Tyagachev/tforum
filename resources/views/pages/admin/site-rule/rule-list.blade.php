<div class="p-0 mt-5">
    @foreach($ruleList as $rule)
        <div class="d-flex  align-items-sm-start">
            <div class="list-group-item pb-2">
                <p style="padding: 0 5px 0 0">{{ $rule->paragraph }}.</p>
            </div>
            <div>
                <p>{!! $rule->rule !!}</p>
            </div>
            <div>
                <form action="{{ route('admin.rule.delete') }}" method="POST">
                    @csrf
                    @method('delete')
                    <input name="id" type="hidden" value="{{ $rule->id }}">
                    <button class="btn btn-link p-0" style="margin: 0 0 0 5px" type="submit">Удалить</button>
                </form>
            </div>
        </div>
    @endforeach
</div>
