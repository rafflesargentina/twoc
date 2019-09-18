<template>
  <div>
    <!-- Hero Section-->
    <section class="hero py-5">
      <div class="container position-relative">
        <!-- Breadcrumbs -->
        <ol class="breadcrumb pl-0  justify-content-center">
          <li class="breadcrumb-item">
            <RouterLink :to="{ name: 'Home' }">
              Home
            </RouterLink>
          </li>
          <li class="breadcrumb-item active">
            Preguntas frecuentes
          </li>
        </ol>
        <h1 class="hero-heading mb-5">
          Preguntas frecuentes
        </h1>
      </div>
    </section>
    <!-- FAQ-->
    <section class="py-5">
      <div class="container">
        <div class="py-4">
          <h2 class="mb-4 text-primary">
            Acerca de Aptoclick
          </h2>
          <div class="row">
            <div class="col-12">
              <h5>¿Cómo funciona Aptoclick?</h5>
              <p class="text-muted mb-4">
                Aptoclick es la formula para facilitar la compra de los inmuebles, a las personas que no pueden comprar de inmediato una vivienda o no consiguen un préstamos hipotecario y se quedan atorados en la mitad del camino.<br>En Aptoclick facilitamos el proceso de compra a través de un programa de renta con opción a compra en un periodo aproximado de 3 años. Trasformamos la renta en un pago recurrente para que puedas pagar poco a poco la vivienda. La misión de Aptoclick es democratizar la compra de la vivienda para que sea accesible a todos.
              </p>
              <h5>¿Cómo funciona para el arrendador?</h5>
              <ol>
                <li class="text-muted">
                  Date de alta tu inmueble en Aptoclick llenando el formulario.
                </li>
                <li class="text-muted">
                  Después del registrado recibirás, por correo electrónico, el la estimación de tu inmueble. Te llamaremos para concretar una cita con nuestra avaluador para determinar el precio de venta y de renta de tu inmueble. El precio determinado por nuestro avaluado será el que publicaremos en la plataforma. En caso que tenga un avalúo con vigencia no mayor a 6 meses, utilizaremos su avalúo como referencia.
                </li>
                <li class="text-muted">
                  Confirmado eso, el inmueble se publicará en Aptoclick.com y se promocionará en nuestros canales de marketing. Se agendarán citas y programaremos las citas para la visita al inmueble.
                </li>
                <li class="text-muted">
                  Tras las visitas comenzaremos a recibir aplicaciones de posibles inquilinos. Una vez revisado atentamente calculado el riesgo de cada candidato, tomando en cuenta variables como capacidad económica, historial crediticio, recordó policivo, perfil socioeconómico, se firmará el contrato de arrendamiento y se hará la entrega de llaves.
                </li>
                <li class="text-muted">
                  En Aptoclick nuestros arrendatarios no ponen deposito. ¡Despréocupate de solicitarlo! garantizamos la cobranza mensual y ofrecemos completa cobertura jurídica.
                </li>
                <li class="text-muted">
                  Cobramos 2 comisiones al Propietario: 1) Cuota de éxito de arrendamiento que corresponde a 2 meses de  Esta comisión se cobra en una sola exhibición el primer mes de renta por concepto de caso de éxito al conseguir al inquilino para el inmueble. Este se descuenta automáticamente del pago de renta del inquilino. 2) Comisión de Servicios de Arrendadores: 5% (cinco por ciento) del monto de la Renta Mensual. Esta comisión se cobra mensualmente por concepto de servicios de cobranza.
                </li>
              </ol>
              <h5>¿Cómo funciona para el arrendatario?</h5>
              <ol class="mb-5">
                <li class="text-muted">
                  Visita nuestro sitio aptoclick.com y entra en la sección buscar inmuebles.
                </li>
                <li class="text-muted">
                  Encuentra el inmueble de tus sueños.
                </li>
                <li class="text-muted">
                  Con un solo click puedes agendar una cita para ver tu inmueble favorito.
                </li>
                <li class="text-muted">
                  Si ya estás convencido, puedes llenar directamente una solicitud de aplicación y comenzar tu proceso de renta.
                </li>
                <li class="text-muted">
                  Aptoclick analizará tu solicitud y  si cumples con los requisitos en un par de semana podrás mudarte en el apartamento.
                </li>
                <li class="text-muted">
                  Una vez aprobada tu solicitud, sólo faltará que pagues una póliza jurídica y un seguro de fianza, la renta del mes corriente para coordinar la firma de contrato y la entrega de llaves. Aptoclick no pide depósito.
                </li>
                <li class="text-muted">
                  Paga poco a poco tu vivienda a través de nuestro exclusivo plan de 3 años.
                </li>
                <li class="text-muted">
                  Si después de 3 años decides comprar la vivienda, el saldo restante, que puede oscilar entre un 50 y 60% de la vivienda, te asistimos a encontrar las tasas de hipotecarios más rentables lo cual es un beneficio porque la tasa será sobre el valor restante.
                </li>
              </ol>
            </div>
          </div>
        </div>
        <hr>
        <div class="py-4">
          <div class="row">
            <div class="col-md-6">
              <h5>¿En qué áreas opera Aptoclick</h5>
              <p class="text-muted mb-4">
                Por ahora, Aptoclick opera en las áreas Ciudad de México, Estado de Mexico, Queretaro, Guadalajara y Puebla.
              </p>
              <h5>¿Cómo se compara Aptoclick con una hipoteca?</h5>
              <p class="text-muted mb-4">
                Aptoclick no es una hipoteca. Aptoclick es un programa a corto plazo que le ofrece más flexibilidad y puede ser un gran paso para obtener una hipoteca a una tasa mucho menor.
              </p>
              <h5>¿Cómo se compara Aptoclick con una hipoteca?</h5>
              <p class="text-muted mb-4">
                Aptoclick no es una hipoteca. Aptoclick es un programa a corto plazo que le ofrece más flexibilidad y puede ser un gran paso para obtener una hipoteca a una tasa mucho menor.
              </p>
              <h5>¿Cómo se compara Aptoclick con un alquiler?</h5>
              <p class="text-muted mb-4">
                Aptoclick es un contrato de arrendamiento, pero a diferencia de un contrato normal, Aptoclick está diseñado para acercar a sus clientes a la propiedad de vivienda. Si está listo para permanencer en un lugar por hasta 3 años y puede cuidar bien su propiedad, Aptoclick le ofrece varias ventajas:
              </p>
              <ul class="mb-4">
                <li class="text-muted">
                  Derecho exclusivo a comprar la vivienda.
                </li>
                <li class="text-muted">
                  El único programa en Mexico donde puedes pagar poco a poco tu inmuebles.
                </li>
              </ul>
              <h5>No estoy seguro si Aptoclick opera en mi área</h5>
              <p class="text-muted mb-4">
                Si se encuentra a aproximadamente a una hora en automóvil de los centros de la Ciudad de México, Monterrey, Guadalajara, Puebla, Queretaro, ¡es probable que lo hagamos! Envíe un correo electrónico a aptoclick@gmail.com si no puede encontrar sus áreas preferidos en nuestro sitio. Si se encuentra en una una ciudad diferente, Aptoclick se está expandiendo rápidamente y esperamos servirle pronto.
              </p>
            </div>
            <div class="col-md-6">
              <h5>¿Cuánto dura este programa?</h5>
              <p class="text-muted mb-4">
                Aptoclick es un programa de arrendamiento de 3 años, a menos que decida comprar la casa antes, en cuyo caso el programa termina. De lo contrario, su obligación de arrendamiento es de 3 años.
              </p>
              <h5>¿Cuánto cobra Aptoclick al propietario?</h5>
              <p class="text-muted mb-4">
                Cobramos 2 comisiones al Propietario: 1) Cuota de éxito de arrendamiento que corresponde a 2 meses de  Esta comisión se cobra en una sola exhibición el primer mes de renta por concepto de caso de éxito al conseguir al inquilino para el inmueble. Este se descuenta automáticamente del pago de renta del inquilino. 2) Comisión de Servicios de Arrendadores: 5% (cinco por ciento) del monto de la Renta Mensual. Esta comisión se cobra mensualmente por concepto de servicios de cobranza.
              </p>
            </div>
          </div>
        </div>
        <hr>
        <div class="py-4">
          <h2 class="mb-5 text-primary">
            Su proceso de aprobación
          </h2>
          <div class="row">
            <div class="col-md-6">
              <h5>¿Cuáles son los requisitos para participar en este programa?</h5>
              <p class="text-muted mb-4">
                Estos son los principales requisitos del proceso de aprobación de Aptoclick:
              </p>
              <ul class="mb-4">
                <li class="text-muted">
                  Los solicitantes deben ser empleados actualmente.
                </li>
                <li class="text-muted">
                  Los solicitantes deben haber estado empleados durante los últimos 12 meses (múltiples trabajos están bien).
                </li>
                <li class="text-muted">
                  Alta ante Hacienda
                </li>
                <li class="text-muted">
                  Cédula de R.F.C.
                </li>
                <li class="text-muted">
                  Identificación Oficial Vigente
                </li>
                <li class="text-muted">
                  (IFE o Pasaporte)
                </li>
                <li class="text-muted">
                  Comprobante de Domicilio (Antigüedad no mayor a 3 meses).
                </li>
                <li class="text-muted">
                  Comprobante de Ingresos(Últimos 4 recibos de nómina) y/o Ultima Declaración Anual de Impuesto.
                </li>
                <li class="text-muted">
                  Estados Financieros Parciales Antigüedad no mayor a 3 meses, Firmados por el Contador y Representante Legal.
                </li>
              </ul>
            </div>
            <div class="col-md-6">
              <h5>¿Cuánto tiempo toma todo esto?</h5>
              <p class="text-muted mb-4">
                Nuestro proceso de aprobación es extremadamente rápido. Una vez que haya terminado d enviar nuestros documentos requeridos, ¡podemos aprobarlo previamente al día siguiente!<br>Cerrar una casa, una vez que haya elegido, toma entre 42 y 72 horas semana, nuevamente dependiendo a sus preferencias, así como las del vendedor.
              </p>
              <p class="text-muted mb-4">
                En general, le recomendamos que presente su solicitud con Aptoclick  1 o 2 meses antes de que planee mudarse.. Esto le da tiempo para abordar cualquier problema que surja durante el proceso de aprobación, por si acaso. Pero si te mudas pronto, no te preocupes, ¡Aptoclick puede moverse tan rápido como puedas!
              </p>
              <h5>¿Por cuánto tiempo son válidas las aprobaciones?</h5>
              <p class="text-muted mb-4">
                Las cartas de aprobación de Aptoclick son válidas por 2 meses, aunque nos reservamos el derecho de pedirle que vuelva a enviar la documentación seleccionada. Entonces, si no está seguro de cuánto le gustaría mudarse, ¡adelante y presente su solicitud hoy!
              </p>
            </div>
          </div>
        </div>
        <hr>
        <div class="py-4">
          <h2 class="mb-5 text-primary">
            Eligiendo tu casa
          </h2>
          <div class="row">
            <div class="col-md-6">
              <h5>¿Qué casas están disponibles para alquilar con Aptoclick?</h5>
              <p class="text-muted mb-4">
                ¡Casi todas las casas en el mercado! Aptoclick le permite elegir entre las casa actualmente en venta en su área. Aptoclick NO trabajo con las siguientes tipología de inmuebles
              </p>
              <p class="text-muted mb-4">
                Aptoclick NO puede comprar y arrendar lo siguiente:
              </p>
              <ul class="mb-4">
                <li class="text-muted">
                  Ejecuciones hipotecarias
                </li>
                <li class="text-muted">
                  Remates bancarios
                </li>
                <li class="text-muted">
                  Ventas cortas no aprobadas por el banco
                </li>
                <li class="text-muted">
                  Hogares con serios problemas de mantenimento
                </li>
                <li class="text-muted">
                  Casas prefabricadas o móviles
                </li>
                <li class="text-muted">
                  Lotes subdesarrollados y casas antes o media de construcción
                </li>
              </ul>
              <h5>¿Puedo usar un corredor?</h5>
              <p class="text-muted mb-4">
                Todos los clientes de Aptoclick reciben la ayuda de nuestros agentes asociados experimentados durante el proceso de compra en el hogar. Una vez que esté precalificado, lo pondremos en contacto con el agente adecuado para sus necesidades.
              </p>
            </div>
            <div class="col-md-6">
              <h5>¿Puedo dirigir un negocio fuera de mi casa Aptoclick?</h5>
              <p class="text-muted mb-4">
                No, no permitimos que nuestros inquilinos manejen o mantengan negocios fuera de sus Aptoclick.
              </p>
              <h5>¿Qué sucede si quiero comprar una casa que no puedo encontrar en su sitio web?</h5>
              <p class="text-muted mb-4">
                Envíe un correo electrónico a nuestro equipo y revisaremos la casa y veremos si es elegible. Tenga en cuenta que la mayoría de los hogares que no se muestran en nuestro sitio no son elegibles.
              </p>
              <h5>¿Puede ayudarme Aptoclick a mejorar mi crédito?</h5>
              <p class="text-muted mb-4">
                Aptoclick se complace en informar sus pagos mensuales a las agencias de crédito, para ayudar a establecer un patrón de pagos oportunos. ¡Esto puede tener un efecto positivo en su crédito!
              </p>
            </div>
          </div>
        </div>
        <hr>
        <div class="py-4">
          <h2 class="mb-5 text-primary">
            Sus pagos mensuales Aptoclick
          </h2>
          <div class="row">
            <div class="col-md-6">
              <h5>¿Quién es el responsable del mantenimiento del hogar?</h5>
              <p class="text-muted mb-4">
                Como futuro propietario de la casa, usted será responsable de cuidar bien esta casa. Usted no tendrá un propietario típico. Aptoclick solo aprueba hogares que están en buenas condiciones sin ningún problema de mantenimiento serio, por lo que no se espera que realice proyectos importantes.
              </p>
              <h5>¿Quién es el responsable del mantenimiento del hogar?</h5>
              <p class="text-muted mb-4">
                Como futuro propietario de la casa, usted será responsable de cuidar bien esta casa. Usted no tendrá un propietario típico. Aptoclick solo aprueba hogares que están en buenas condiciones sin ningún problema de mantenimiento serio, por lo que no se espera que realice proyectos importantes.
              </p>
              <h5>¿Se me permite arreglar o alterar la casa?</h5>
              <p class="text-muted mb-4">
                Usted es libre de emprender proyectos menores de mejoras para el hogar a su propio cargo (es decir, repintado, alfombras nuevas, cambio de jardinería, etc.) siempre y cuando sean comunicados con antelación al propietario del inmueble.
              </p>
              <h5>¿Tengo que esperar hasta el final de los 3 años para comprar mi casa Aptoclick?</h5>
              <p class="text-muted mb-4">
                ¡Absolutamente no! Usted tiene el derecho de comprar la casa en cualquier momento sin penalizaciones ni tarifas especiaes.
              </p>
              <h5>¿Cuánto cuesta comprar mi casa Aptoclick?</h5>
              <p class="text-muted mb-4">
                Cada vivienda tiene un precio de recompra predeterminado. Aptoclick establece este precio según nuestra proyección del valor de mercado de esa casa en 3 años. Puede ver este precio de recompra por cada vivienda en su página de listado, y no cambiará en ningún momento durante los 3 años.
              </p>
            </div>
            <div class="col-md-6">
              <h5>¿Qué pasa si necesito irme durante el contrato de arrendamiento de 3 años?</h5>
              <p class="text-muted mb-4">
                Puede terminar su contrato de Aptoclick comprando la casa en cualquier momento. Si no compra la casa, está obligado a arrendarla por 3 años completos. Si deja de hacer los pagos, Aptoclick considerará que su contrato de arrendamiento está roto.
              </p>
              <h5>¿Puede Aptoclick ayudarme a obtener una hipoteca?</h5>
              <p class="text-muted mb-4">
                Absolutamente, todo esto está bien! Si su ciudad, condado o estado ofrecen programas de asistencia, a Aptoclick también le complace trabajar con ellos, aunque la eligibilidad variará y Aptoclick no puede garantizar que usted sea elegible.
              </p>
              <h5>¿Qué honorarios o costos de cierre debo esperar cuando compro mi casa Aptoclick?</h5>
              <p class="text-muted mb-4">
                Eso es lo mejor de comprar casas a la manera Aptoclick, ¡sin costos de cierre para usted! Usted solo será responsable de los costos asociados con su propia hipoteca. Aptoclick se enorgullece de servicios simples y transparentes.
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>
