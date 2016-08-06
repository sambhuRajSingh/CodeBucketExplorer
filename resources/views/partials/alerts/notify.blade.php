@if (notify()->ready())
    @if(notify()->type() != 'errorOnCheckbox')
        <div class="alert alert-{{ notify()->type() }}">
            @if(notify()->option('icon'))
                <i class="fa fa-{{ notify()->option('icon') }}"></i>&nbsp;
            @endif

            <!-- Dont display error if the notification type is error on checkbox -->
            {{ notify()->message() }}
        </div>
    @endif
@endif