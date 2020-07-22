<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Video;
use FFMpeg\Filters\Video\VideoFilters;
use FFMpeg;
use Carbon\Carbon;
use Artisan;
use Illuminate\Support\Facades\File;

class CompressUploadedVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $video;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($video)
    {
        $this->video = $video;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        set_time_limit(0);
        
        $converted_name = $this->video->path;
        
        // open the uploaded video from the right disk...
        FFMpeg::fromDisk('original_path')
            ->open($this->video->path)
            // add the 'resize' filter...
            ->addFilter(function (VideoFilters $filters) {
                $filters->resize(new \FFMpeg\Coordinate\Dimension(960, 540));
            })
            ->export() // call the 'export' method...
            ->onProgress(function ($percentage){
                echo "{$percentage}% transcoded";
            })
            ->inFormat(new \FFMpeg\Format\Video\X264('libmp3lame','libx264')) // tell the MediaExporter to which disk and in which format we want to export...
            ->toDisk('streaming_path')
            ->save($converted_name); // call the 'save' method with a filename...
        
        $img_ext = pathinfo($this->video->path, PATHINFO_EXTENSION);
        $img_name = basename($this->video->path, ".".$img_ext).".jpg";
        FFMpeg::fromDisk('original_path')
            ->open($this->video->path)
            ->getFrameFromSeconds(5)
            ->export()
            ->toDisk('thumb_path')
            ->save($img_name);
        
        echo "\n Encoding complete!";

        //update the database so we know the convertion is done!
        $this->video->update([
            'converted_for_streaming_at' => Carbon::now(),
            'processed' => true,
            'stream_path' => $converted_name,
            'thumbnails' => $img_name
        ]);

        echo "\nThumbnail Created";

        $delete_path = ('original_path').'/'.$this->video->path;
        
        echo "\n $delete_path";

        if(File::exists($delete_path)){
            File::delete($delete_path);
        }

        echo "\n File Deleted";

    }
} 
