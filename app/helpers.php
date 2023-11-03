
<?php
// use Illuminate\Support\Facades\Auth;

if (! function_exists('test')) {
    function d($d) {
    	// $s = $d->toArry();
        dd($d->toArray());
    }
}


if (! function_exists('image_update')) {
    function image_resize($config) {
    		@unlink(public_path('upload/image/'.$config['editImage']));
    		$file = $config['img'];
            $filename =date('Ymd') .'_'.time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('upload/image'), $filename);
            $image=Image::make(public_path('upload/image/').$filename);

            if(!empty(@$config['width'] && !empty(@$config['height']))){
                $image->resize($config['width'],$config['height'])->save(public_path('upload/image/').$filename);
            }
            else
            {
                $image->resize(230,230)->save(public_path('upload/image/').$filename);
            }
            return $filename;
    }
}
?>

