@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('partials.alerts.notify')

            @if($contributors)
                <table class="table no-border">
                    <tbody>
                        @foreach($contributors as $contributor)
                            <tr>
                                <td width="50px">
                                    <a href="{{ $contributor->html_url }}">
                                        <img src="{{ $contributor->avatar_url }}" width="45px">
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ $contributor->html_url }}" class="lead">
                                        {{ $contributor->login }}
                                    </a>

                                    <span class="label label-success"
                                          title="{{ $contributor->login }} made {{ $contributor->contributions }} contributions."
                                    >
                                        {{ $contributor->contributions }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">
                    <strong>No one</strong> has yet <strong>made a contribution</strong> on this repository.
                </div>
            @endif
        </div>
    </div>
@endsection