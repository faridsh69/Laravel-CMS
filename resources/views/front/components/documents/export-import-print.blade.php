@extends('front.components.documents.index')
@section('document-data')
<h1>Controllers</h1>
<ul class="service-guide">
	<li><a href="#benefits">Benefits</a></li>
	<li><a href="#how-to-use">How to use</a></li>
	<li><a href="#used-packages">Used Packages</a></li>
	<li><a href="#refrences">Refrences</a></li>
</ul>
<p></p><br>
<img src="{{ $page->avatar }}">
<h2 id="benefits">Benefits</h2>
<p>Admin panel contains three urls to import, export and print all the data in that table.</p>
<h2 id="how-to-use">How to use</h2>
<p>The aim of this BaseListController is to do every thing by defining $model<br>
Index, Create, Store, Edit, Update, Delete, Restore, Export to pdf, print, Datatable is its functions and in every function it will check the policy and will return appropriate notification.<br>
It will record user activity also and validations run completely. 
</p>
<pre>

</pre>
<h2 id="used-packages">Used Packages</h2>
<pre>
export excel: "Maatwebsite/Laravel-Excel"
import with csv: "Maatwebsite/Laravel-Excel"
pdf: "barryvdh/laravel-dompdf"
</pre>
<h2 id="refrences">Refrences</h2>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Services/BaseExport.php">Base Export Service</a><br>
<a target="blank" href="https://github.com/faridsh69/Laravel-CMS/blob/master/app/Services/BaseImport.php">Base Import Service</a><br>
@endsection