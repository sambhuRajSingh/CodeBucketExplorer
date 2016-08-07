@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('partials.alerts.notify')

            <table class="table">
                <tbody>
                    @foreach($commits as $commit)
                        <tr class="hidden-xs">
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

                        <tr class="visible-xs">
                            <td width="85">
                                <img src="{{ Gravatar::src($commit->commit->author->email, 80) }}">
                            </td>
                            <td>
                                <strong>{{ str_limit($commit->commit->message, 30) }}</strong>
                                <br>
                                <a href="https://github.com/{{ $repositoryOwner }}/{{ $repositoryName }}/commit/{{ $commit->sha }}"
                                   title="View the Commit on the Git Hub Website">
                                    {{ str_limit($commit->sha, 10) }}
                                </a>

                                <br><br>

                                <em>by</em> {{ $commit->commit->author->name }}
                                -
                                <small><em>{{ \Carbon\Carbon::parse($commit->commit->author->date)->diffForHumans() }}</em></small>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection