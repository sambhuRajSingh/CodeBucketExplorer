@extends('layout.site')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            @include('partials.alerts.notify')

            @if($branches)
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
            @else
                <div class="alert alert-danger">
                    <strong>No branches</strong> found for this repository.
                </div>
            @endif
        </div>
    </div>
@endsection