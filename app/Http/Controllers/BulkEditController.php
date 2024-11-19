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
            [$containerHandle, $path] = explode('::', $filename, 2);
            return Asset::query()
                ->where('container', $containerHandle)
                ->where('path', $path)
                ->first();
        })->filter();

        return view('cp.bulk-edit-assets', [
            'assets' => $assets,
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->input('assets', []);

        foreach ($data as $path => $fields) {
            // Debug the $path value
            logger()->info("Processing path: {$path}");

            // Check if the path contains '::'
            if (!str_contains($path, '::')) {
                logger()->error("Invalid asset path format: {$path}");
                continue; // Skip invalid paths
            }

            [$containerHandle, $assetPath] = explode('::', $path, 2);

            $asset = Asset::query()
                ->where('container', $containerHandle)
                ->where('path', $assetPath)
                ->first();

            if ($asset) {
                foreach ($fields as $field => $value) {
                    $asset->set($field, $value); // Update metadata fields
                }
                $asset->save(); // Save changes to the asset
                logger()->info("Asset saved: {$assetPath}");
            } else {
                logger()->error("Asset not found: {$path}");
            }
        }

        return redirect()->back()->with('success', 'Assets updated successfully!');
    }
}
