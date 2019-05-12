<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <form action="/" method="post">
            {{ csrf_field() }}
            <input name="title" placeholder="title">
            <input name="content" placeholder="content">
            <button> Submit </button>
        </form>
        <table>
            @foreach(App\Models\Blog::orderBy('id', 'desc')->get() as $blog)
            <tr>
                <td> {{ $blog->id }} </td>
                <td style="font-weight: bold;"> {{ $blog->title }} </td>
                <td> {{ $blog->content }} </td>
            </tr>
            @endforeach
        </table>
    </body>
</html>
