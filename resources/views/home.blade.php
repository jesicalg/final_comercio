@extends('layouts.main')

@section('title','Sobre Nosotros')

@section('main')
    <div class="md:flex items-center">
        <h1 class="font-bold text-center md:text-left mb-6 md:mb-0 text-3xl md:text-4xl md:w-1/2">
            SuperServer, el hosting que impulsa tu éxito: velocidad, seguridad y soporte.
        </h1>
        <img src="/imgs/bg-home.png" class="w-full md:w-1/2 max-w-2xl" />
    </div>
    <div class="my-20 px-3 md:px-0">
        <h2 class="text-center font-bold text-2xl mb-8">Las características que te mereces</h2>
        <ul class="md:flex md:flex-wrap items-center justify-center text-center">
            <li class=" py-6 md:px-6 md:w-1/2">
                <img src="/imgs/speed.svg" class=" invert m-auto pb-2"/>
                <h3 class=" text-xl font-bold pb-5">Alta velocidad de carga</h3>
                <p class=" text-sm">Nuestro servicio de hosting en Argentina utiliza servidores de última generación y una infraestructura optimizada para ofrecerte una velocidad de carga rápida. Esto garantiza que tus visitantes experimenten un tiempo de carga mínimo, lo que mejora la experiencia de usuario y ayuda a aumentar la retención y las conversiones.</p>
            </li>
            <li class="py-6 md:px-6 md:w-1/2" >
                <img src="/imgs/security.svg" class=" invert m-auto pb-2" />
                <h3 class="text-xl font-bold pb-5">Seguridad sólida</h3>
                <p class=" text-sm">Nos tomamos en serio la seguridad de tu sitio web. Implementamos medidas avanzadas de seguridad, como cortafuegos, protección contra ataques DDoS y monitoreo constante, para proteger tus datos y salvaguardar tu sitio contra amenazas cibernéticas. Puedes tener la tranquilidad de que tu información estará protegida y segura.</p>
            </li>
            <li class="py-6 md:px-6 md:w-1/2">
                <img src="/imgs/support.svg" class=" invert m-auto pb-2" />
                <h3 class="text-xl font-bold pb-5">Soporte técnico en español las 24 horas</h3>
                <p class=" text-sm">Nuestro equipo de soporte técnico altamente capacitado está disponible las 24 horas del día, los 7 días de la semana, para brindarte asistencia inmediata en caso de cualquier consulta o problema. Ya sea que necesites ayuda con la configuración inicial, la resolución de problemas técnicos o simplemente tengas una pregunta, estamos aquí para ayudarte en todo momento.</p>
            </li>
            <li class="py-6 md:px-6 md:w-1/2">
                <img src="imgs/safety-time.svg" class=" invert m-auto pb-2" />
                <h3 class="text-xl font-bold pb-5">Tiempo de actividad garantizado</h3>
                <p class=" text-sm">Entendemos la importancia de que tu sitio web esté en línea de manera constante. Por eso, ofrecemos un tiempo de actividad garantizado, lo que significa que tu sitio estará disponible para tus visitantes en todo momento. Minimizamos cualquier interrupción del servicio para garantizar que tu negocio en línea funcione sin problemas.</p>
            </li>
        </ul>
    </div>
@endsection
