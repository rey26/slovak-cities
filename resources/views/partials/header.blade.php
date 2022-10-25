<div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12">
            <a href="{{ url('/') }}">
                <img src="{{ url('images/logo.png') }}" alt="Page logo" class="img img-responsive">
            </a>
        </div>
        <div class="col-md-7 col-sm-12 mt-3">
            <div class="row">
                {{-- <div class="col-md-4 text-blue">
                    Kontakty a čísla na oddelenia
                </div> --}}
                <div class="col-md-2"></div>
                <form class="form-inline col-md-7">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-success my-2 my-sm-0" type="submit">Prihlásenie</button>
                </form>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">O nás</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('settlements') }}">Zoznam miest</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inšpekcia</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Kontakt</a>
                </li>
            </ul>
        </div>
    </nav>
</div>


