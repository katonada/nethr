@extends('statamic::layout')

@section('content')
    <div class="card">
        <h1>Bulk Edit Assets</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('cp.bulk.edit.update') }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Alt Text</th>
                        <th>Description</th>
                        <th>Authors</th>
                        <th>Tags</th>
                        <th>Copyright</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr>
                            <td>
                                <img src="{{ $asset->url() }}" alt="{{ $asset->get('alt') }}" width="50">
                            </td>
                            <td>
                                <input type="text" name="assets[{{ $asset->path() }}][alt]" value="{{ $asset->get('alt') }}">
                            </td>
                            <td>
                                <input type="text" name="assets[{{ $asset->path() }}][description]" value="{{ $asset->get('description') }}">
                            </td>
                            <td>
                                <input type="text" name="assets[{{ $asset->path() }}][authors]" value="{{ $asset->get('authors') }}">
                            </td>
                            <td>
                                <input type="text" name="assets[{{ $asset->path() }}][tags]" value="{{ $asset->get('tags') }}">
                            </td>
                            <td>
                                <input type="text" name="assets[{{ $asset->path() }}][copyright]" value="{{ $asset->get('copyright') }}">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn-primary mt-4">Save Changes</button>
        </form>
    </div>
@endsection
