@extends('statamic::layout')

@section('content')
    <div class="card">
        <h1 class="mb-4 text-lg font-bold">Bulk Edit Assets</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('cp.bulk.edit.update') }}">
            @csrf
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="checkbox-column border border-gray-300 p-2">
                            <input type="checkbox" id="select-all">
                        </th>
                        <th class="border border-gray-300 p-2">Image</th>
                        <th class="border border-gray-300 p-2">Alt Text</th>
                        <th class="border border-gray-300 p-2">Description</th>
                        <th class="border border-gray-300 p-2">Size</th>
                        <th class="border border-gray-300 p-2">Last Modified</th>
                        <th class="actions-column border border-gray-300 p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($assets as $asset)
                        <tr class="sortable-row outline-none hover:bg-gray-50" tabindex="0">
                            <!-- Checkbox -->
                            <th class="checkbox-column border border-gray-300 p-2">
                                <input type="checkbox" name="selected_assets[]" value="{{ $asset->container()->handle() . '::' . $asset->path() }}">
                            </th>

                            <!-- Image Thumbnail -->
                            <td class="border border-gray-300 p-2">
                                <div class="flex items-center w-fit-content group">
                                    <div class="w-16 h-16 rtl:ml-2 ltr:mr-2 cursor-pointer">
                                        <img src="{{ $asset->url() }}"
                                             alt="{{ $asset->get('alt') }}"
                                             loading="lazy"
                                             class="asset-thumbnail w-16 h-16 object-cover rounded">
                                    </div>
                                    <label for="checkbox-{{ $asset->container()->handle() . '::' . $asset->path() }}"
                                           class="cursor-pointer select-none group-hover:text-blue normal-nums">
                                        {{ $asset->basename() }}
                                    </label>
                                </div>
                            </td>

                            <!-- Alt Text -->
                            <td class="border border-gray-300 p-2">
                                <input type="text" name="assets[{{ $asset->container()->handle() . '::' . $asset->path() }}][alt]" value="{{ $asset->get('alt') }}" class="form-input w-full">
                            </td>

                            <!-- Description -->
                            <td class="border border-gray-300 p-2">
                                <input type="text" name="assets[{{ $asset->container()->handle() . '::' . $asset->path() }}][description]" value="{{ $asset->get('description') }}" class="form-input w-full">
                            </td>

                            <!-- Size -->
                            <td class="border border-gray-300 p-2">
                                {{ number_format($asset->size() / 1024, 2) }} KB
                            </td>

                            <!-- Last Modified -->
                            <td class="border border-gray-300 p-2">
                                {{ $asset->lastModified()->diffForHumans() }}
                            </td>

                            <!-- Actions -->
                            <th class="actions-column border border-gray-300 p-2">
                                <button class="btn btn-sm">Edit</button>
                            </th>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn-primary mt-4">Save Changes</button>
        </form>
    </div>
@endsection
