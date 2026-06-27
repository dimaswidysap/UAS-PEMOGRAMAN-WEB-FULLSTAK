<section class="container-profil">
    <figure></figure>
    <div>
         @if(Auth::check())
            <span>Welcome <p>{{ Auth::user()->name }}</p></span>
            <span>{{ Auth::user()->email }}</span>
        @else
            <span>Welcome <p>Guest</p></span>
            <span>Example@gmail.com</span>
        @endif
    </div>
</section>

