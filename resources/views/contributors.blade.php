@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('partials.alerts.notify')

            <table class="table no-border">
                <tbody>
                    @foreach($contributors as $contributor)
                        <tr>
                            <td>
                                <a href="{{ $contributor->html_url }}">
                                    <img src="{{ $contributor->avatar_url }}" width="45">
                                </a>
                            </td>
                            <td>
                                <a href="{{ $contributor->html_url }}">
                                    {{ $contributor->login }}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection