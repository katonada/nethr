<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Statamic\Facades\Asset;

class BulkEditController extends Controller
{
    public function index(Request $request)
{
    $filenames = $request->query('ids', []);

    $assets = collect($filenames)->map(function ($filename) {
        return Asset::query()
            ->where('container', 'your-container-handle') // Replace with your container handle
            ->where('path', $filename)
            ->first();
    })->filter();

    return view('cp.bulk-edit-assets', [
        'assets' => $assets,
    ]);
}


    public function update(Request $request)
    {
        $data = $request->input('assets', []);

        foreach ($data as $filename => $fields) {
            $asset = Asset::query()
                ->where('container', 'your-container-handle') // Replace with your container handle
                ->where('path', $filename)
                ->first();

            if ($asset) {
                foreach ($fields as $field => $value) {
                    $asset->set($field, $value);
                }
                $asset->save();
            }
        }

        return redirect()->back()->with('success', 'Assets updated successfully.');
    }
}
