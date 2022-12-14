<?php
function upload_img($model, $request): void
{
        $image = $request->file('path_image');
        $imgName = time() . $image->getClientOriginalName();
        $image->move(public_path('uploads/' . $model), $imgName);
        $request->merge([
            'path_image'=>'uploads/'.$model.'/'.$imgName
        ]);
}

function upload_product_image($model,$image): string
{
    $imgName = time() . $image->getClientOriginalName();
    $image->move(public_path('uploads/' . $model), $imgName);
    return 'uploads/'.$model.'/'.$imgName;
}
