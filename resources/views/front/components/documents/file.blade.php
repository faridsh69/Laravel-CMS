@extends('front.components.documents.index')
@section('document-data')
<h1>File Uploading Service</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p></p><br>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>Uploading video, multiple files, validation on it, create thumbnail for images is ready now.</p>
<h2 id="how-to-use">How to use</h2>
<p>For save a file we need to run save function of file service, this function has 3 parameters: 1 file uploaded, 2 the model that is the owner of this file for example User model, the title of this file that is belongs to, for example profile_picture. </p>
<pre>
$file_service = new \App\Services\FileService();
$file_service->save($file, $model, $file_column);
</pre>
<p>The address that are files will save is storage/app/public/files/upload/{model_type}/{model_id}/file_name</p>

<pre>
class FileService extends BaseService
{
    public $upload_path_prefix = 'public/files/upload/';

    public $src_path_prefix = 'storage/files/upload/';

</pre>
<p> For images also saved a thumbnail of that image, Also a record on files table will created.<br> There are relations on BaseModel that is used for getting file address:</p>
<pre>
public function files_relation()
{
    return $this->morphMany('App\Models\File', 'fileable');
}

public function files($title)
{
    return $this->files_relation()->where('title', $title)->get();
}

public function files_src($title)
{
    return json_encode($this->files($title)->pluck('src'));
}
</pre>
<p>So dont worry about multiple file upload or save thumbnail and the address that file is saved in, every thing is ready and you need to read them all and use them.</p>
<h2 id="used-packages">Used Packages</h2>
<pre>
file manager: "unisharp/laravel-filemanager": "dev-master",
image: "unisharp/laravel-filemanager": "dev-master",
form builder: "kris/laravel-form-builder": "^1.20",
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Services/FileService.php">Base File Upload Service</a><br>
@endsection