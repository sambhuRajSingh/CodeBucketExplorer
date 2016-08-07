<div class="container-fluid browse-section">
    <div class="container browse-form">
        <form class="form-inline" action="/" method="POST">
            {!! csrf_field() !!}
            <div class="form-group">
                <label for="RepositoryOwner"><small>Owner</small></label>
                <br>
                <input
                    type="text"
                    class="form-control"
                    id="RepositoryOwner"
                    name="repositoryOwner"
                    value="{{ $repositoryOwner }}"
                >
            </div>

            <div class="form-group">
                <label for="RepositoryName"><small>Repository Name</small></label>
                <br>
                <input
                    type="text"
                    class="form-control"
                    id="RepositoryName"
                    name="repositoryName"
                    value="{{ $repositoryName }}"
                >
            </div>

            <div class="form-group">
                <label><small>&nbsp;</small></label>
                <br>
                <button type="submit" class="btn btn-default">View Commits</button>
            </div>
        </form>
    </div>
</div>