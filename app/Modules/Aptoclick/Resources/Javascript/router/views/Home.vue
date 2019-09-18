<template>
  <div>
    <section
      style="background-image:url(/img/photo/home2-min.jpg);"
      class="d-flex align-items-center dark-overlay bg-cover"
    >
      <div class="container py-5 py-md-7 text-white overlay-content text-center"> 
        <div class="row">
          <div class="col-xl-10 mx-auto">
            <h1 class="display-4 font-weight-bold text-shadow">
              Compra tu Casa de forma inteligente. Mes tras Mes.
            </h1>
            <p class="lead text-shadow">
              Convierte tu alquiler mensual en un pago inicial para la compra de tu futura vivienda hoy mismo.
            </p>
          </div>
        </div>
      </div>
    </section>

    <div class="container">
      <div
        class="
        search-bar
        rounded
        p-3
        position-relative
        mt-n5
        z-index-20"
      >
        <form
          action="/properties"
          method="GET"
        >
          <div class="row">
            <div class="col d-flex align-items-center form-group">
              <div class="input-label-absolute input-label-absolute-right w-100">
                <label
                  for="locality"
                  class="label-absolute"
                ><i class="fa fa-crosshairs" /><span class="sr-only">Ciudad</span></label>
                <input
                  id="autocomplete"
                  type="text"
                  placeholder="Ciudad"
                  class="form-control border-0 shadow-0"
                  @change="geolocate"
                >
                <input
                  id="locality"
                  v-model="form.address.locality"
                  name="locality"
                  type="hidden"
                > 
                <input
                  id="sublocality_level_1"
                  v-model="form.address.sublocality"
                  name="sublocality"
                  type="hidden"
                >
              </div>
            </div>
            <div class="col d-flex align-items-center form-group no-divider">
              <select
                id="property_type_id" 
                title="Tipo"
                data-style="btn-form-control"
                class="selectpicker"
                name="property_type_id"
              >
                <option
                  v-for="item in propertyTypesMappedTags"
                  :key="item.id"
                  :value="item.id"
                >
                  {{ item.text }}
                </option>
              </select>
            </div>
            <div class="col-lg-2">
              <button
                type="submit"
                class="btn btn-primary btn-block h-100"
              >
                Buscar
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <section
      id="home"
      class="pb-4 pb-md-5 pt-6 pt-md-7 bg-gray-100"
      style="margin-top:-3.75rem;"
    >
      <div class="container">
        <div class="text-center pb-4 pb-md-5">
          <h2 class="mb-4 mb-md-5">
            ¿Qué es Aptoclick?
          </h2>
          <p class="lead mb-4 text-muted">
            Aptoclick es la formula para facilitar la compra de los inmuebles, a las personas que no pueden comprar de inmediato una vivienda o no consiguen un préstamos hipotecario y se quedan atorados en la mitad del camino. En Aptoclick facilitamos el proceso de compra a través de un programa de renta con opción a compra  en un periodo aproximado de 3 años. Trasformamos la renta en un pago recurrente para que puedas pagar poco a poco la vivienda. La misión de Aptoclick es democratizar la compra de la vivienda para que sea accesible a todos.
          </p>
        </div>

        <div
          id="accordion"
          role="tablist"
        >
          <div class="card border-0 shadow mb-3">
            <div
              id="headingOne"
              role="tab"
              class="card-header bg-primary-100 border-0 py-0"
            >
              <a
                data-toggle="collapse"
                href="#collapseOne"
                aria-expanded="false"
                aria-controls="collapseOne"
                class="accordion-link collapsed"
              >¿Cómo funciona para el arrendador?</a>
            </div>
            <div
              id="collapseOne"
              role="tabpanel"
              aria-labelledby="headingOne"
              data-parent="#accordion"
              class="collapse"
            >
              <div class="card-body py-5">
                <ol class="mb-5">
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
                <div class="text-center">
                  <RouterLink
                    :to="{ name: 'PropertiesCreate' }"
                    class="btn btn-primary mr-4 router-link-active"
                  >
                    Publica tu inmueble
                  </RouterLink>
                </div>
              </div>
            </div>
          </div>
          <div class="card border-0 shadow mb-3">
            <div
              id="headingTwo"
              role="tab"
              class="card-header bg-primary-100 border-0 py-0"
            >
              <a
                data-toggle="collapse"
                href="#collapseTwo"
                aria-expanded="false"
                aria-controls="collapseTwo"
                class="accordion-link collapsed"
              >¿Como funciona para el arrendatario?</a>
            </div>
            <div
              id="collapseTwo"
              role="tabpanel"
              aria-labelledby="headingTwo"
              data-parent="#accordion"
              class="collapse"
            >
              <div class="card-body py-5">
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
                <div class="text-center">
                  <RouterLink
                    :to="{ name: 'PropertiesIndex' }"
                    class="btn btn-primary mr-4 router-link-active"
                  >
                    Buscar inmuebles
                  </RouterLink>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="pb-4 pb-md-5 bg-gray-100">
      <div class="container">
        <div class="row mb-4 mb-md-5">
          <div class="col-md-8">
            <h2>Últimas publicaciones</h2>
          </div>
          <div class="col-md-4 d-lg-flex align-items-center justify-content-end">
            <RouterLink
              :to="{ name: 'PropertiesIndex' }"
              class="text-muted text-sm"
            >
              Ver todos los inmuebles <i class="fa fa-angle-double-right ml-2" />
            </RouterLink>
          </div>
        </div>
        <div
          class="row"
        >
          <!-- place item-->
          <div
            v-for="item in chunks"
            :data-marker-id="item.id"
            class="col-sm-6 col-xl-3 mb-5"
          >
            <div class="card h-100 border-0 shadow">
              <div class="card-img-top embed-responsive embed-responsive-4by3 overflow-hidden gradient-overlay">
                <img
                  :src="item.featured_photo.url"
                  alt="Modern, Well-Appointed Room"
                  class="w-100 embed-responsive-item"
                ><RouterLink
                  :to="{ name: 'PropertiesShow', params: { id: item.id }}"
                  class="tile-link"
                />
                <div
                  v-if="item.user"
                  class="card-img-overlay-bottom z-index-20"
                >
                  <div class="media text-white text-sm align-items-center">
                    <div
                      class="avatar avatar-border-white bg-primary mr-2"
                    />
                    <div class="media-body">
                      <strong>aptoclick</strong>
                    </div>
                  </div>
                </div>
                <div class="card-img-overlay-top text-right">
                  <a
                    href="javascript: void();"
                    class="card-fav-icon position-relative z-index-40"
                  >
                    <svg class="svg-icon text-white">
                      <use xlink:href="#heart-1" />
                    </svg></a>
                </div>
              </div>
              <div class="card-body d-flex align-items-center">
                <div class="w-100">
                  <h6 class="card-title">
                    <RouterLink
                      :to="{ name: 'PropertiesShow', params: { id: item.id }}"
                      class="text-decoration-none text-dark"
                    >
                      {{ item.title }}
                    </RouterLink>
                  </h6>
                  <div class="d-flex card-subtitle mb-3">
                    <p class="flex-grow-1 mb-0 text-muted text-sm">
                      {{ item.property_type.name }}
                    </p>
                    <!--<p class="flex-shrink-1 mb-0 card-stars text-xs text-right"><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i><i class="fa fa-star text-warning"></i>
                    </p>-->
                  </div>
                  <p class="card-text text-muted">
                    <span class="h4 text-primary">$ {{ item.sell_price }}</span>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5 py-md-7 position-relative dark-overlay">
      <img
        src="img/photo/photo-1488805990569-3c9e1d76d51c.jpg"
        alt=""
        class="bg-image"
      >
      <div class="container">
        <div class="overlay-content text-white">
          <h3 class="display-4 font-weight-bold text-serif text-shadow mb-0">
            El camino hacia la propiedad de vivienda puede estar lleno de baches
          </h3>
          <p class="lead mb-4 mb-md-5">
            Aptoclick está aquí para guiarte. Un contrato de arrendamiento que está de su lado.
          </p>
          <RouterLink
            :to="{ name: 'Register' }"
            class="btn btn-light"
          >
            Comienza ahora
          </RouterLink>
        </div>
      </div>
    </section>

    <section class="py-5 py-md-6">
      <div class="container">
        <div class="text-center position-relative">
          <h2 class="mb-4 mb-md-5">
            ¿Por qué Aptoclick?
          </h2>
          <p class="lead text-muted">
            En la última década, millones de mexicanos se han visto obligados a suspender sus sueños de propiedad de vivienda.
          </p><p class="lead text-muted">
            Los precios de las casas están aumentando más rápido que los salarios.
          </p><p class="lead text-muted">
            Los requisitos hipotecarios son cada vez más estrictos. Como resultado, los  arrendatario están perdiendo una oportunidad de ser propietario de un inmueble.
          </p>
          <p class="lead text-muted mb-5">
            En Aptoclick, creemos en el valor de ser propietario de una vivienda Comienza a construir tu futuro hoy con nosotros. Compra poco a poco tu vivienda de tus sueños a través de un programa de 3 años.
          </p>
          <div class="row px-4">
            <div class="offset-md-3 col-md-3 offset-lg-2 col-lg-4">
              <RouterLink
                :to="{ name: 'PropertiesCreate' }"
                class="btn btn-block btn-primary mb-3 mb-md-0 router-link-active"
              >
                Publica tu inmueble
              </RouterLink>
            </div>
            <div class="col-md-3 col-lg-4">
              <RouterLink
                :to="{ name: 'PropertiesIndex' }"
                class="btn btn-block btn-primary router-link-active"
              >
                Buscar inmuebles
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
import { chunk } from "lodash"
import { theme } from "@/utilities/mixins/theme"
import { gmaps } from "@/utilities/mixins/gmaps"
import { propertiesComputed, propertyTypesComputed } from "@aptoclick/store/helpers"

import Form from "@/utilities/Form"

export default {

    mixins: [gmaps, theme],

    data() {
        return {
            chunks: [],
            form: new Form(),
            locality: "",
            prepared: false,
            sublocality: ""
        }
    },

    computed: {
        ...propertiesComputed,
        ...propertyTypesComputed
    },

    watch: {
        "$route" (value) {
            if (value.name === "Home" && this.prepared) {
                this.prepare()
            }
        }
    },


    mounted() {
        return this.initAutocomplete("autocomplete", {types: ["(cities)"], componentRestrictions: {country: "mx"}})
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        prepare() {
            var propertyTypes = this.$store.dispatch("propertyTypes/fetchAllPropertyTypes")
            var properties = this.$store.dispatch("properties/fetchAllProperties")

            this.form.reset()
            this.form = new Form(this.oneProperty)

            window.$(()=> {
                propertyTypes.then(value => {
                    if (value.length > 0) {
                        window.$("#property_type_id").selectpicker()

                    }
                })
            })

            properties.then(value => {
                if (value.length > 0) {
                    this.setChunks(value)
                }
            })

            return Promise.all([properties, propertyTypes])
        },

        setChunks(items) {
            return this.chunks = chunk(items, 4)[0]
        },
    }
}
</script>
