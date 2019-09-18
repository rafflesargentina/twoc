@component('mail::message')
# Estimado {{ $user->first_name }}

Dentro de las próximas 24 horas,Te llamaremos para concretar una cita con nuestra avaluador para determinar el precio de venta y de renta de tu inmueble. El precio determinado por nuestro avaluado será el que publicaremos en la plataforma. En caso que tenga un avalúo con vigencia no mayor a 6 meses, utilizaremos su avalúo como referencia. También tienes la opción de concretar una cita directamente por acá <a href="https://calendly.com/cita_avaluo_inmobiliario/60min?back=1&month={{ $date }}">https://calendly.com/cita_avaluo_inmobiliario/60min?back=1&month={{ $date }}</a>.

Confirmado eso, el inmueble se publicará en Aptoclick.com y se promocionará en nuestros canales de marketing. Se agendarán citas y programaremos las citas para la visita al inmueble.

Tras las visitas comenzaremos a recibir aplicaciones de posibles inquilinos. Una vez revisado atentamente calculado el riesgo de cada candidato, tomando en cuenta variables como capacidad económica, historial crediticio, recordó policivo, perfil socioeconómico, se firmará el contrato de arrendamiento y se hará la entrega de llaves.

En Aptoclick nuestros arrendatarios no ponen deposito. ¡Despréocupate de solicitarlo! garantizamos la cobranza mensual y ofrecemos completa cobertura jurídica.

Gracias por confiar en nuestro servicio.

El equipo de {{ config('app.name') }}
@endcomponent
