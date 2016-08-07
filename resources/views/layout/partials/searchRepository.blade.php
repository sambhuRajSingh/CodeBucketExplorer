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
                <label for="HowMany"><small>Items</small></label>
                <br>
                <select id="HowMany" class="form-control" name="howMany">
                    <option value="10" {{ ($howMany == "10") ? 'selected' : ''}}>10</option>
                    <option value="20" {{ ($howMany == "20") ? 'selected' : ''}}>20</option>
                    <option value="50" {{ ($howMany == "50") ? 'selected' : ''}}>50</option>
                    <option value="100" {{ ($howMany == "100") ? 'selected' : ''}}>100</option>
                </select>
            </div>

            <div class="form-group">
                <label><small>&nbsp;</small></label>
                <br>
                <button type="submit" class="btn btn-default">
                    Browse
                </button>
            </div>
        </form>
    </div>
</div>