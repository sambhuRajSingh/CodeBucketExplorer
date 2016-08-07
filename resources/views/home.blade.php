@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('partials.alerts.notify')

            @if($commits)
                <table class="table table-striped" >
                    <tbody>
                        @foreach($commits as $commit)
                            <tr>
                                <td width="85">
                                    <a href="https://github.com/{{ $repositoryOwner }}"
                                       title="View {{ $commit->commit->author->name }} profile on Git Hub Website.">
                                        <img src="{{ Gravatar::src($commit->commit->author->email, 79) }}">
                                    </a>
                                </td>
                                <td class="hidden-xs"><!-- hidden on Mobile -->
                                    <strong>{{ str_limit($commit->commit->message, 150) }}</strong>
                                    <br>
                                    <a href="{{ $commit->html_url }}"
                                       title="View the Commit on the Git Hub Website">
                                        {{ str_limit($commit->sha, 10) }}
                                    </a>
                                </td>
                                <td class="visible-xs"><!-- For Mobile View -->
                                    <strong>{{ str_limit($commit->commit->message, 30) }}</strong>
                                    <br>
                                    <a href="{{ $commit->html_url }}"
                                       title="View the Commit on the Git Hub Website">
                                        {{ str_limit($commit->sha, 10) }}
                                    </a>

                                    <br><br>

                                    <em>by</em>
                                    <a href="https://github.com/{{ $repositoryOwner }}"
                                       title="View {{ $commit->commit->author->name }} profile on Git Hub Website.">
                                       {{ $commit->commit->author->name }}
                                    </a>
                                    -
                                    <small><em>{{ \Carbon\Carbon::parse($commit->commit->author->date)->diffForHumans() }}</em></small>
                                </td>
                                <td class="hidden-xs" width="150px">
                                    <em>by</em>
                                    <a href="https://github.com/{{ $repositoryOwner }}"
                                       title="View {{ $commit->commit->author->name }} profile on Git Hub Website.">
                                       {{ $commit->commit->author->name }}
                                    </a>
                                    <br>
                                    <small><em>{{ \Carbon\Carbon::parse($commit->commit->author->date)->diffForHumans() }}</em></small>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="alert alert-danger">
                    <strong>No Commits</strong> have been made on this repository.
                </div>
            @endif
        </div>
    </div>
@endsection
