@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('partials.alerts.notify')

            <table class="table">
                <tbody>
                    @foreach($branches as $branch)
                        <tr>
                            <td>
                                <p class="lead">
                                    <a href="https://github.com/{{ $repositoryOwner}}/{{ $repositoryName }}/tree/{{ $branch->name }}"
                                       title="Browse the branch on the Git Hub"
                                    >
                                        {{ $branch->name}}
                                    </a>
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection