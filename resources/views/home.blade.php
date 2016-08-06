@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <table class="table">
                <tbody>
                    @foreach($commits as $commit)
                        <tr>
                            <td>
                                <img src="{{ Gravatar::src($commit->commit->author->email, 45) }}">
                            </td>
                            <td>
                                <p class="lead">{{ $commit->commit->message }}</p>
                                {{ $commit->sha }}
                            </td>
                            <td>
                                <em>by</em> {{ $commit->commit->author->name }}
                                <br>
                                <small><em>on</em> {{ $commit->commit->author->date }}</small>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection