@extends('front-end.layouts.app')
@section('title')
    Empresa - Giltec
@endsection
@section('main-content')
    <style>
        .direccion_menu {
            margin-bottom: 75px;
        }
    </style>
    <section class="business-container">
        <article class="section-primary">
            <div class="parraf-business">
                <h3>Giltec Arquitectos técnicos</h3>
                <p>
                    Giltec fué creada con una idea clara. Tras la experiencia adquirida en varios ámbitos de la
                    construcción, se vió la necesidad de aportar un servicio especializado y de detalle a las obras de
                    reforma en Vitoria- Gasteiz. Tratar las reformas con mimo y dedicarles los conocimientos y estudios
                    adquiridos para que el resultado fuera el óptimo.
                </p>
            </div>
            <div class="image-business">
                <img src="{{ asset('images/images/empresa.jpg') }}" alt="">
            </div>
        </article>
        <article class="section-last">
            <div class="image-business">
                <img src="{{ asset('images/images/obra-1.jpg') }}" alt="">
            </div>
            <div class="parraf-business">
                <h3>Forma de trabajo</h3>
                <p>
                    Nuestra forma de trabajo tiene un solo objetivo: “hacer bonita la experiencia de tu obra”
                    Para ello seguimos un riguroso proceso.
                    <br>
                    1º_ Realizamos una toma de datos y mediciones.
                    <br>
                    2º_ Proporcionamos un detallado presupuesto sin coste, así como diferentes soluciones adaptadas a tus
                    necesidades.
                    <br>
                    3º_ En caso de aceptación nos encargamos de los trámites de licencia, contenedores, etc.
                    <br>
                    4º_ Asesoramos a la hora de elegir materiales y soluciones durante toda la obra mediante una
                    comunicación continua.
                    <br>
                    5º_ Entregamos la obra perfectamente limpia y lista para su utilización.
                </p>
            </div>
        </article>
        <article class="section-primary">
            <div class="parraf-business">
                <h3>Equipo</h3>
                <p>
                    El equipo de Giltec, actualmente, está formado por 5 técnicos titulados en construcción y diseño. Dicho
                    equipo ha ido creciendo a lo largo del tiempo. Nació con un solo miembro y paulatinamente se ha ido
                    incrementando hasta llegar a la actual plantilla. El equipo goza con miembros de más de 25 años de
                    experiencia y con la frescura de gente joven con ideas muy actuales especializadas en diseño. De esta
                    “mezcla” se obtienen los resultados que nos han hecho llegar hasta aquí.
                </p>
            </div>
            <div class="image-business">
                <img src="{{ asset('images/images/empresa.jpg') }}" alt="">
            </div>
        </article>

    </section>

    <footer class="footer-business">
        <div class="list-politics">
            <a href="{{ route('politicaPrivacidad') }}">Politica de Privacidad</a>
            <a href="{{ route('terminos-legales-tecnicos') }}">Términos legales y técnicos</a>
        </div>
        <div class="address-business">
            <p>Foru Kalea, 1, 01001 Gasteiz, Araba</p>
        </div>
    </footer>
@endsection
