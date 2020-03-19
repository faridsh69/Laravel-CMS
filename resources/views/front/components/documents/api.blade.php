@extends('front.components.documents.index')
@section('document-data')
<h1>API Resources</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p></p><br>
<img src="{{ $page->image }}">
<h2 id="benefits">Benefits</h2>
<p>All apis is ready! There is a powefull baseApiController that needed to be extended and your api is fully ready.</p>
<h2 id="how-to-use">How to use</h2>
<p>You need to extend your controller from BaseApiController and the output of api is ready with authenticated by OAuth2 that is developed by laravel\Passport
</p>
<pre>
namespace App\Http\Controllers\Api\V1;
use App\Services\BaseApiController;

class ProductController extends BaseApiController
{
    public $model = 'Product';
}
</pre>
<h2 id="used-packages">Used Packages</h2>
<pre>
api authentication: "laravel/passport"
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Services/BaseApiController.php">Base API Controller</a><br>
<a target="blank" href="https://github.com/faridsh69/cms/blob/master/app/Http/Controllers/Api/V1/ProductController.php">Example: Product API</a><br>
@endsection