<?php

namespace App\Jobs;
use Spatie\Image\Image as SpatieImage;

use Spatie\Image\Image;
use Illuminate\Bus\Queueable;
use Spatie\Image\Manipulations;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ResizeImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $fileName;
    private $w;
    private $h;
    private $path;


    public function __construct($filePath, $w, $h)
    {

        $this->path = dirname($filePath);
        $this->fileName = basename($filePath);
        $this->w = $w;
        $this->h = $h;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $w = $this->w;
        $h = $this->h;
        $srcPath = storage_path().'/app/public/'.$this->path.'/'.$this->fileName;
        $destPath = storage_path().'/app/public/'.$this->path."/crop_{$w}x{$h}_".$this->fileName;

        $image = SpatieImage::load($srcPath);

        $image->watermark(base_path('public/image/logo_watermark.png'))
            ->watermarkOpacity(20)
            ->watermarkPosition(Manipulations::POSITION_CENTER)
         
            ->watermarkHeight(600)    
             ->watermarkWidth(600);   

            $image->save($srcPath);
        $croppedImage = Image::load($srcPath)
            
                            ->crop(Manipulations::CROP_CENTER, $w, $h)
                            ->save($destPath);
    }
}
