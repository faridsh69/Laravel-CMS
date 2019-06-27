<div class="get-start-area">
    <!-- Form Start -->
    <form action="{{ route('front.page.subscribe') }}" method="post" class="form-inline">
        @csrf
        <input type="email" class="form-control email" placeholder="Email" name="email">
        <input type="submit" class="submit" value="Go Solar Now">
    </form>
    <!-- Form End -->
</div>