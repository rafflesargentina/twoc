<template>
  <div>
    <div
      style="height: 8px; top: 71px;"
      class="progress rounded-0 sticky-top"
    >
      <div
        role="progressbar"
        :style="'width: ' + Math.imul(20, step) + '%'"
        :aria-valuenow="Math.imul(20, step)"
        aria-valuemin="0"
        aria-valuemax="100"
        class="progress-bar"
      />
    </div>
    <form
      :class="[validated ? 'needs-validation' : 'needs-validation']"
      action="/api/properties"
      method="post"
      class="form"
      novalidate
      @submit.prevent="handleSubmitForm"
      @keydown="form.errors.clear($event.target.name)"
    >
      <section
        v-show="step === 1"
        class="py-5"
      >
        <div class="container">
          <p class="subtitle text-primary">
            Publica tu Inmueble
          </p>
          <h1 class="h2 mb-5">
            Información básica <span class="text-muted float-right">Paso 1</span>
          </h1>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Información básica</h4>
              <p class="text-muted text-sm">
                Complete el título con el que se mostrará tu publicación, indicando el tipo adecuado.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group" />
              <div class="form-group">
                <label
                  for="name"
                  class="form-label"
                >Título de la publicación *</label>
                <input
                  id="title"
                  v-model="form.title"
                  v-validate.disabled="'required'"
                  :class="{ 'is-invalid': errors.first('title') || form.errors.has('title') }"
                  :disabled="submitted"
                  name="title"
                  class="form-control"
                >
                <span
                  v-if="errors.first('title') || form.errors.has('title')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('title') || form.errors.get('title')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="property_type_id"
                  class="form-label"
                >Tipo de inmueble *</label>
                <select
                  id="property_type_id"
                  v-model="form.property_type_id"
                  v-validate.disabled="'required'"
                  :class="{ 'is-invalid': errors.first('property_type_id') || form.errors.has('property_type_id') }"
                  :disabled="submitted"
                  name="property_type_id"
                  data-style="btn-selectpicker"
                  class="selectpicker form-control"
                >
                  <option value="">
                    Tipo de inmueble
                  </option>
                  <option
                    v-for="item in propertyTypesMappedTags"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.text }}
                  </option>
                </select>
                <span
                  v-if="errors.first('property_type_id') || form.errors.has('property_type_id')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('property_type_id') || form.errors.get('property_type_id')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="floors"
                  class="form-label"
                >Cantidad de pisos o plantas *</label>
                <input
                  v-model="form.floors"
                  v-validate.disabled="'required'"
                  :class="{ 'is-invalid': errors.first('floors') || form.errors.has('floors') }"
                  :disabled="submitted"
                  name="floors"
                  class="form-control"
                  type="number"
                >
                <span
                  v-if="errors.first('floors') || form.errors.has('floors')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('floors') || form.errors.get('floors')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="sell_price"
                  class="form-label"
                >Precio de venta *</label>
                <input
                  id="sell_price"
                  v-model="form.sell_price"
                  v-validate.disabled="'required|min_value:600000|max_value:60000000'"
                  :class="{ 'is-invalid': errors.first('sell_price') || form.errors.has('sell_price') }"
                  :disabled="submitted"
                  name="sell_price"
                  class="form-control"
                  type="number"
                >
                <span
                  v-if="errors.first('sell_price') || form.errors.has('sell_price')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('sell_price') || form.errors.has('sell_price')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="rental_price"
                  class="form-label"
                >Precio de renta *</label>
                <input
                  id="rental_price"
                  v-model="form.rental_price"
                  v-validate.disabled="'required'"
                  :class="{ 'is-invalid': errors.first('rental_price') || form.errors.has('rental_price') }"
                  :disabled="submitted"
                  name="rental_price"
                  class="form-control"
                  type="number"
                >
                <span
                  v-if="errors.first('rental_price') || form.errors.has('rental_price')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('rental_price') || form.errors.has('rental_price')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="maintenance_expenses"
                  class="form-label"
                >Costos de mantenimiento (expensas) *</label>
                <input
                  id="maintenance_expenses"
                  v-model="form.maintenance_expenses"
                  name="maintenance_expenses"
                  class="form-control"
                  :disabled="submitted"
                  type="number"
                >
                <span
                  v-if="errors.first('maintenance_expenses') || form.errors.has('maintenance_expenses')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('maintenance_expenses') || form.errors.has('maintenance_expenses')" />
                </span>
              </div>
            </div>
          </div>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Ubicación</h4>
              <p class="text-muted text-sm">
                Ingresa la dirección del inmueble en el campo autocompletar para precisar su ubicación  y automatizar el rellenado del formulario.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <!-- Country-->
              <div class="form-group">
                <label
                  for="autocomplete"
                  class="form-label"
                >Ingrese una dirección *</label>
                <input
                  id="autocomplete"
                  name="autocomplete"
                  class="form-control"
                  @input="geolocate"
                >
                <span
                  v-if="errors.first('autocomplete')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('autocomplete')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="address.country"
                  class="form-label"
                >País</label>
                <input
                  id="country"
                  v-model="form.address.country"
                  :class="{ 'is-invalid': errors.first('address.country') || form.errors.has('address.country') }"
                  :disabled="submitted"
                  name="address.country"
                  class="form-control"
                >
                <span
                  v-if="errors.first('address.country') || form.errors.has('address.country')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('address.country') || form.errors.get('address.country')" />
                </span>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <!-- Street-->
                  <div class="form-group">
                    <label
                      for="address.street_name"
                      class="form-label"
                    >Calle</label>
                    <input
                      id="route"
                      v-model="form.address.street_name"
                      :class="{ 'is-invalid': errors.first('address.street_name') || form.errors.has('address.street_name') }"
                      :disabled="submitted"
                      name="address.street_name"
                      class="form-control"
                    >
                    <span
                      v-if="errors.first('address.street_name') || form.errors.has('address.street_name')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="errors.first('address.street_name') || form.errors.get('address.street_name')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-4">
                  <!-- Street number-->
                  <div class="form-group">
                    <label
                      for="address.street_number"
                      class="form-label"
                    >Número</label>
                    <input
                      id="street_number"
                      v-model="form.address.street_number"
                      :class="{ 'is-invalid': errors.first('address.street_number') || form.errors.has('address.street_number') }"
                      :disabled="submitted"
                      name="address.street_number"
                      class="form-control"
                    >
                    <span
                      v-if="errors.first('address.street_number') || form.errors.has('address.street_number')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="errors.first('address.street_number') || form.errors.get('address.street_number')" />
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <!-- Floor number -->
                  <div class="form-group">
                    <label
                      for="address.floor_number"
                      class="form-label"
                    >Nº de piso o planta</label>
                    <input
                      id="floor_number"
                      v-model="form.address.floor_number"
                      :class="{ 'is-invalid': errors.first('address.floor_number') || form.errors.has('address.floor_number') }"
                      :disabled="submitted"
                      name="address.floor_number"
                      class="form-control"
                    >
                    <span
                      v-if="errors.first('address.floor_number') || form.errors.has('address.floor_number')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="errors.first('address.floor_number') || form.errors.get('address.floor_number')" />
                    </span>
                  </div>
                </div>
              </div>
              <!-- City + State-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.locality"
                      class="form-label"
                    >Ciudad</label>
                    <input
                      id="locality"
                      v-model="form.address.locality"
                      :class="{ 'is-invalid': errors.first('address.locality') || form.errors.has('address.locality') }"
                      :disabled="submitted"
                      name="address.locality"
                      class="form-control"
                    >
                    <span
                      v-if="errors.first('address.locality') || form.errors.has('address.locality')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="errors.first('address.locality') || form.errors.get('address.locality')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.state"
                      class="form-label"
                    >Estado / Provincia</label>
                    <input
                      id="administrative_area_level_1"
                      v-model="form.address.state"
                      :class="{ 'is-invalid': errors.first('address.state') || form.errors.has('address.state') }"
                      :disabled="submitted"
                      name="address.state"
                      class="form-control"
                    >
                    <span
                      v-if="errors.first('address.state') || form.errors.has('address.state')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="errors.first('address.state') || form.errors.get('address.state')" />
                    </span>
                  </div>
                </div>
              </div>
              <!-- ZIP Code-->
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.zip"
                      class="form-label"
                    >Código postal</label>
                    <input
                      id="postal_code"
                      v-model="form.address.zip"
                      :class="{ 'is-invalid': errors.first('address.zip') }"
                      :disabled="submitted"
                      name="address.zip"
                      class="form-control"
                    >
                    <span
                      v-if="errors.first('address.zip') || form.errors.has('address.zip')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="errors.first('address.zip') || form.errors.get('address.zip')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="address.sublocality"
                      class="form-label"
                    >Localidad / Municipio</label>
                    <input
                      id="sublocality_level_1"
                      v-model="form.address.sublocality"
                      :class="{ 'is-invalid': errors.first('address.sublocality') }"
                      :disabled="submitted"
                      name="address.sublocality"
                      class="form-control"
                    >
                    <span
                      v-if="errors.first('address.sublocality') || form.errors.has('address.sublocality')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="errors.first('address.sublocality') || form.errors.has('address.sublocality')" />
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Contacto</h4>
              <p class="text-muted text-sm">
                Ingresa la información de contacto para este inmueble.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group">
                <div class="custom-control custom-switch mb-2">
                  <input
                    id="contact-information"
                    v-model="contactInformationFromUser"
                    type="checkbox"
                    name="elevator"
                    class="custom-control-input"
                  >
                  <label
                    for="contact-information"
                    class="custom-control-label"
                  ><span class="text-sm">Utilizar información de contacto de mi usuario</span></label>
                </div>
              </div>
              <div class="form-group">
                <label
                  for="contact.email"
                  class="form-label"
                >Email *</label>
                <input
                  v-model="form.contact.email"
                  v-validate.disabled="'required'"
                  :class="{ 'is-invalid': errors.first('contact.email') }"
                  :disabled="submitted"
                  name="contact.email"
                  class="form-control"
                >
                <span
                  v-if="errors.first('contact.email')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('contact.email')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="contact.phone"
                  class="form-label"
                >Teléfono de línea *</label>
                <input
                  v-model="form.contact.phone"
                  v-validate.disabled="'required'"
                  :class="{ 'is-invalid': errors.first('contact.phone') }"
                  :disabled="submitted"
                  name="contact.phone"
                  class="form-control"
                >
                <span
                  v-if="errors.first('contact.phone')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('contact.phone')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="contact.mobile"
                  class="form-label"
                >Teléfono móvil</label>
                <input
                  v-model="form.contact.mobile"
                  :class="{ 'is-invalid': errors.first('contact.mobile') }"
                  :disabled="submitted"
                  name="contact.mobile"
                  class="form-control"
                >
                <span
                  v-if="errors.first('contact.mobile')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('contact.mobile')" />
                </span>
              </div>
              <div class="form-group">
                <label
                  for="contact.fax"
                  class="form-label"
                >Teléfono alternativo</label>
                <input
                  v-model="form.contact.fax"
                  :class="{ 'is-invalid': errors.first('contact.fax') }"
                  :disabled="submitted"
                  name="contact.fax"
                  class="form-control"
                >
                <span
                  v-if="errors.first('contact.fax')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('contact.fax')" />
                </span>
              </div>
            </div>
          </div>
          <div class="row form-block flex-column flex-sm-row">
            <div class="col text-center text-sm-left" />
            <div class="col text-center text-sm-right">
              <a
                href="#"
                class="btn btn-primary px-3"
                :disabled="submitted"
                @click="handleNextStep"
              >

                Siguiente paso<i class="fa-chevron-right fa ml-2" /></a>
            </div>
          </div>
        </div>
      </section>

      <section
        v-show="step === 2"
        class="py-5"
      >
        <div class="container">
          <p class="subtitle text-primary">
            Publica tu inmueble
          </p>
          <h1 class="h2 mb-5">
            Descripción<span class="text-muted float-right">Paso 2</span>
          </h1>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Descripción</h4>
              <p class="text-muted text-sm">
                Ingresa una breve descripción del inmueble.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group mb-5">
                <label
                  for="description"
                  class="form-label"
                >Describe tu inmueble</label>
                <textarea
                  id="description"
                  v-model="form.description"
                  v-validate.disable="'required'"
                  name="description"
                  rows="5"
                  aria-describedby="descriptionHelp"
                  class="form-control"
                  :disabled="submitted"
                /><small
                  id="descriptionHelp"
                  class="form-text text-muted mt-2"
                >Por ej.: este inmueble tiene espacios muy amplios y luminosos.</small>
                <span
                  v-if="errors.first('description') || form.errors.has('description')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('descripion') || form.errors.has('description')" />
                </span>
              </div>

              <div class="row">
                <div class="col-md-6 form-group">
                  <label
                    for="days_available"
                    class="form-label"
                  >Días disponible</label>
                  <v-date-picker
                    v-model="form.days_available"
                    :disabled="submitted"
                    mode="multiple"
                  >
                    <div slot-scope="props">
                      <input
                        type="text"
                        class="form-control"
                        :value="props.inputValue"
                        expanded
                        @change.native="props.updateValue($event.target.value)"
                      >
                    </div>
                  </v-date-picker>
                  <span
                    v-if="errors.first('days_available') || form.errors.has('days_available')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="errors.first('days_available') || form.errors.has('days_available')" />
                  </span>
                </div>

                <div class="col-md-6 form-group">
                  <label
                    for="hours_available"
                    class="form-label"
                  >Horarios disponible</label>
                  <input
                    v-model="form.hours_available"
                    :disabled="submitted"
                    type="text"
                    class="form-control"
                    placeholder="Horarios disponible"
                  >
                  <span
                    v-if="errors.first('hours_available') || form.errors.has('hours_available')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="errors.first('hours_available') || form.errors.has('hours_available')" />
                  </span>
                </div>
              </div>

              <div class="form-group mb-5">
                <label
                  for="property_conditions"
                  class="form-label"
                >Estado de la propiedad</label>
                <select
                  id="property_condition_id"
                  v-model="form.property_condition_id"
                  :disabled="submitted"
                  data-style="btn-selectpicker"
                  name="property_condition_id"
                  class="form-control selectpicker"
                >
                  <option value="">
                    Estado de la propiedad
                  </option>
                  <option
                    v-for="item in propertyConditionsMappedTags"
                    :key="item.id"
                    :value="item.id"
                  >
                    {{ item.text }}
                  </option>
                </select>
                <span
                  v-if="errors.first('address.property_condition_id') || form.errors.has('address.property_condition_id')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('address.property_condition_id') || form.errors.has('address.property_condition_id')" />
                </span>
              </div>
              <div class="form-group mb-5">
                <label
                  for="years"
                  class="form-label"
                >Antigüedad de la propiedad</label>
                <input
                  id="years"
                  v-model="form.years"
                  :disabled="submitted"
                  type="number"
                  name="years"
                  class="form-control"
                >
                <small class="form-text text-muted mt-2">(En años)</small>
                <span
                  v-if="errors.first('years') || form.errors.has('years')"
                  class="invalid-feedback"
                  role="alert"
                >
                  <strong v-text="errors.first('years') || form.errors.has('years')" />
                </span>
              </div>
            </div>
          </div>
          <div class="row form-block flex-column flex-sm-row">
            <div class="col text-center text-sm-left">
              <a
                href="#"
                class="btn btn-link text-muted"
                :disabled="submitted"
                @click="handlePreviousStep"
              > <i class="fa-chevron-left fa mr-2" />Paso anterior</a>
            </div>
            <div class="col text-center text-sm-right">
              <a
                href="#"
                class="btn btn-primary px-3"
                @click="handleNextStep"
              >

                Siguiente paso<i class="fa-chevron-right fa ml-2" /></a>
            </div>
          </div>
        </div>
      </section>

      <section
        v-show="step === 3"
        class="py-5"
      >
        <div class="container">
          <p class="subtitle text-primary">
            Publica una propiedad
          </p>
          <h1 class="h2 mb-5">
            Disposición y Características <span class="text-muted float-right">Paso 3</span>
          </h1>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Disposición del espacio</h4>
              <p class="text-muted text-sm">
                La cantidad de recámaras que tiene su propiedad.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="ground_surface"
                      class="form-label"
                    >Sup. terreno</label>
                    <input
                      v-model="form.ground_surface"
                      :class="{ 'is-invalid': form.errors.has('ground_surface') }"
                      :disabled="submitted"
                      min="0"
                      name="ground_surface"
                      type="number"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('ground_surface')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('ground_surface')" />
                    </span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label
                      for="covered_surface"
                      class="form-label"
                    >Sup. construida</label>
                    <input
                      v-model="form.covered_surface"
                      :class="{ 'is-invalid': form.errors.has('covered_surface') }"
                      :disabled="submitted"
                      name="covered_surface"
                      min="0"
                      type="number"
                      class="form-control"
                    >
                    <span
                      v-if="form.errors.has('covered_surface')"
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong v-text="form.errors.get('covered_surface')" />
                    </span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <label class="form-label">Habitaciones</label>
                  <div class="d-flex align-items-center">
                    <div
                      class="btn btn-items btn-items-decrease"
                      @click="decreaseRooms"
                    >
                      -
                    </div>
                    <input
                      v-model="form.rooms"
                      :disabled="submitted"
                      type="text"
                      name="rooms"
                      value="1"
                      disabled
                      class="form-control input-items"
                    >
                    <div
                      class="btn btn-items btn-items-increase"
                      @click="increaseRooms"
                    >
                      +
                    </div>
                  </div>
                  <span
                    v-if="errors.first('rooms') || form.errors.has('rooms')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="errors.first('rooms') || form.errors.has('rooms')" />
                  </span>
                </div>
                <div class="col-lg-4">
                  <label class="form-label">Baños</label>
                  <div class="d-flex align-items-center">
                    <div
                      class="btn btn-items btn-items-decrease"
                      @click="decreaseBathrooms"
                    >
                      -
                    </div>

                    <input
                      v-model="form.bathrooms"
                      :disabled="submitted"
                      type="text"
                      name="bathrooms"
                      value="1"
                      disabled
                      class="form-control input-items"
                    >
                    <div
                      class="btn btn-items btn-items-increase"
                      @click="increaseBathrooms"
                    >
                      +
                    </div>
                  </div>
                  <span
                    v-if="errors.first('bathrooms') || form.errors.has('bathrooms')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="errors.first('bathrooms') || form.errors.has('bathrooms')" />
                  </span>
                </div>
                <div class="col-lg-4">
                  <label class="form-label">Cocheras</label>
                  <div class="d-flex align-items-center">
                    <div
                      class="btn btn-items btn-items-decrease"
                      @click="decreaseParking"
                    >
                      -
                    </div>
                    <input
                      v-model="form.parking"
                      :disabled="submitted"
                      type="text"
                      name="parking"
                      value="1"
                      disabled
                      class="form-control input-items"
                    >
                    <div
                      class="btn btn-items btn-items-increase"
                      @click="increaseParking"
                    >
                      +
                    </div>
                  </div>
                  <span
                    v-if="errors.first('parking') || form.errors.has('parking')"
                    class="invalid-feedback"
                    role="alert"
                  >
                    <strong v-text="errors.first('parking') || form.errors.has('parking')" />
                  </span>
                </div>
              </div>
              <div class="filter-block">
                <h6 class="mb-3">
                  Elevador
                </h6>
                <div class="form-group mb-0">
                  <div class="custom-control custom-switch mb-2">
                    <input
                      id="elevator"
                      v-model="form.elevator"
                      :disabled="submitted"
                      type="checkbox"
                      name="elevator"
                      class="custom-control-input"
                    >
                    <label
                      for="elevator"
                      class="custom-control-label"
                    ><span class="text-sm">Tiene ascensor</span></label>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Amenities</h4>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group">
                <label class="form-label">Amenities disponibles</label>
                <ul class="list-inline mb-0">
                  <li
                    v-for="item in allAmenities"
                    class="list-inline-item"
                  >
                    <div class="custom-control custom-checkbox">
                      <input
                        :id="'amenities_' + item.id"
                        v-model="pickedAmenities"
                        :checked="hasAmenity(item.id)"
                        :value="item.id"
                        type="checkbox"
                        :name="'amenities.' + item.id"
                        class="custom-control-input"
                      >
                      <label
                        :for="'amenities_' + item.id"
                        class="custom-control-label text-muted"
                      >{{ item.name }}</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Facilities</h4>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group">
                <label class="form-label">Facilities disponibles</label>
                <ul class="list-inline mb-0">
                  <li
                    v-for="item in allFacilities"
                    class="list-inline-item"
                  >
                    <div class="custom-control custom-checkbox">
                      <input
                        :id="'facilities_' + item.id"
                        v-model="pickedFacilities"
                        :checked="hasFacility(item.id)"
                        :value="item.id"
                        type="checkbox"
                        :name="'facilities.' + item.id"
                        class="custom-control-input"
                      >
                      <label
                        :for="'facilities_' + item.id"
                        class="custom-control-label text-muted"
                      >{{ item.name }}</label>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="row form-block flex-column flex-sm-row">
            <div class="col text-center text-sm-left">
              <a
                href="#"
                class="btn btn-link text-muted"
                @click="handlePreviousStep"
              > <i class="fa-chevron-left fa mr-2" />Paso anterior</a>
            </div>
            <div class="col text-center text-sm-right">
              <a
                href="#"
                class="btn btn-primary px-3"
                @click="handleNextStep"
              >

                Siguiente paso<i class="fa-chevron-right fa ml-2" /></a>
            </div>
          </div>
        </div>
      </section>

      <section
        v-show="step === 4"
        class="py-5"
      >
        <div class="container">
          <p class="subtitle text-primary">
            Publica tu propiedad
          </p>
          <h1 class="h2 mb-5">
            Fotos <span class="text-muted float-right">Paso 4</span>
          </h1>
          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Foto destacada</h4>
              <p class="text-muted text-sm">
                Las fotos no deben pesar más de 1Mb.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group">
                <VueDropzone
                  id="dzFeaturedPhoto"
                  ref="dzFeaturedPhoto"
                  :options="dzFeaturedPhotoOptions"
                  @vdropzone-error="dzFeaturedPhotoError"
                  @vdropzone-removed-file="dzFeaturedPhotoRemovedFile"
                  @vdropzone-processing="dzFeaturedPhotoProcessing"
                  @vdropzone-success-multiple="dzFeaturedPhotoSuccess"
                  @vdropzone-upload-progress="dzFeaturedPhotoUploadProgress"
                />
              </div>
            </div>
          </div>

          <div class="row form-block">
            <div class="col-lg-4">
              <h4>Galería de fotos</h4>
              <p class="text-muted text-sm">
                Las fotos no deben pesar más de un 1Mb.
              </p>
            </div>
            <div class="col-lg-7 ml-auto">
              <div class="form-group">
                <VueDropzone
                  id="dzUnfeaturedPhotos"
                  ref="dzUnfeaturedPhotos"
                  :options="dzUnfeaturedPhotosOptions"
                  @vdropzone-error="dzUnfeaturedPhotosError"
                  @vdropzone-removed-file="dzUnfeaturedPhotosRemovedFile"
                  @vdropzone-processing="dzUnfeaturedPhotosProcessing"
                  @vdropzone-success-multiple="dzUnfeaturedPhotosSuccess"
                  @vdropzone-upload-progress="dzUnfeaturedPhotosUploadProgress"
                />
              </div>
            </div>
          </div>

          <div class="row form-block flex-column flex-sm-row">
            <div class="col text-center text-sm-left">
              <a
                href="#"
                class="btn btn-link text-muted"
                @click="handlePreviousStep"
              > <i class="fa-chevron-left fa mr-2" />Paso anterior</a>
            </div>
            <div class="col text-center text-sm-right">
              <a
                href="#"
                class="btn btn-primary px-3"
                :disabled="submitted"
                @click="handleSubmitForm"
              >

                Finalizar<i class="fa-chevron-right fa ml-2" /></a>
            </div>
          </div>
        </div>
      </section>

      <section
        v-show="step === 5"
        class="py-5 py-lg-6"
      >
        <div class="container text-center">
          <p class="subtitle text-primary">
            Publica tu propiedad
          </p>
          <h1 class="h2 mb-5">
            Tu propiedad fue publicada
          </h1>
          <p class="mb-5">
            <img
              src="/img/illustration/undraw_celebration_0jvk.svg"
              alt=""
              style="width: 400px;"
              class="img-fluid"
            >
          </p>
          <p class="text-muted mb-5">
            Muchas gracias por publicar tu vivienda. Recibirás un correo electrónico con el contrato de servicio de mediación inmobiliaria y te llamaremos para concretar una cita un avaluador de Aptoclick para realizar el avaluo certificado y retirar el contrato firmado.
          </p>
          <p class="mb-5">
            <a
              href="/properties/create"
              class="btn btn-primary mr-2 mb-2"
            >Publica otra propiedad</a>
            <RouterLink
              :to="{ name: 'Account' }"
              class="btn btn-outline-muted mb-2"
            >
              Ir a Cuenta
            </RouterLink>
          </p>
        </div>
      </section>
    </form>
  </div>
</template>

<script>
import { alertErrorMessage, alertSuccessMessage } from "@/utilities/helpers"
import { amenitiesComputed, amenitiesMethods, facilitiesComputed, facilitiesMethods, propertiesComputed, propertiesMethods, propertyConditionsComputed, propertyConditionsMethods, propertyTypesComputed, propertyTypesMethods } from "@aptoclick/store/helpers"
import { authComputed, photosMethods } from "@/store/helpers"
import { dz } from "@/utilities/mixins/dz"
import { gmaps } from "@/utilities/mixins/gmaps"
import { getSavedState } from "@/utilities/helpers"

import vue2Dropzone from "vue2-dropzone"
import "vue2-dropzone/dist/vue2Dropzone.min.css"

import store from "@/store"
import Form from "@/utilities/Form"

const token = getSavedState("auth.token")
const csrfToken = document.head.querySelector("meta[name=\"csrf-token\"]").content

var fields = JSON.parse(JSON.stringify(store.state.properties.initialState.one))

export default {
    components: {
        VueDropzone: vue2Dropzone
    },

    mixins: [dz, gmaps],

    data() {
        return {
            amenities: [],
            contactInformationFromUser: 0,
            dzFeaturedPhotoOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 1,
                maxFilesize: 1,
                method: "put",
                paramName: "featured_photo",
                uploadMultiple: true,
                url: "/api/projects",
            },
            dzUnfeaturedPhotosOptions: {
                addRemoveLinks: true,
                autoProcessQueue: false,
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i><br/>Hacé click o arrastrá una foto hacía acá",
                headers: {
                    "X-CSRF-TOKEN": csrfToken,
                    "Authorization": "Bearer " + token
                },
                maxFiles: 10,
                maxFilesize: 1,
                method: "put",
                paramName: "unfeatured_photos",
                uploadMultiple: true,
                url: "/api/projects",
            },
            facilities: [],
            form: new Form(fields),
            isDestroying: false,
            pickedAmenities: [],
            pickedFacilities: [],
            prepared: false,
            property: {},
            propertyConditions: [],
            propertyTypes: [],
            step: 1,
            submitted: false,
        }
    },

    computed: {
        ...amenitiesComputed,
        ...authComputed,
        ...facilitiesComputed,
        ...propertiesComputed,
        ...propertyConditionsComputed,
        ...propertyTypesComputed,

        dzFeaturedPhoto() {
            return this.$refs.dzFeaturedPhoto
        },

        dzUnfeaturedPhotos() {
            return this.$refs.dzUnfeaturedPhotos
        },

        validated() {
            return this.$validator.errors.any()
        }
    },

    watch: {
        "$route" (value) {
            if (value.name === "PropertiesEdit" && this.prepared) {
                this.prepare()
            }
        },

        contactInformationFromUser(value) {
            if (value) {
                this.form.contact.email = this.user.email
                this.form.contact.phone = this.user.contact.phone
                this.form.contact.mobile = this.user.contact.mobile
                this.form.contact.fax = this.user.contact.fax
            }
        }
    },

    beforeDestroy() {
        return this.isDestroying = true
    },

    mounted() {
        return this.initAutocomplete("autocomplete", {types: ["geocode"], componentRestrictions: {country: "mx"}})
    },

    created() {
        return this.prepare().then(this.prepared = true)
    },

    methods: {
        ...amenitiesMethods,
        ...facilitiesMethods,
        ...photosMethods,
        ...propertiesMethods,
        ...propertyConditionsMethods,
        ...propertyTypesMethods,

        dzFeaturedPhotoSuccess() {
            return this.dzUnfeaturedPhotosProcessQueue()
        },

        dzUnfeaturedPhotosSuccess() {
            this.submitted = false

            this.step = 5
        },

        decreaseBathrooms() {
            if (this.form.bathrooms > 0) {
                this.form.bathrooms--
            }
        },

        increaseBathrooms() {
            if (this.form.bathrooms < 10) {
                this.form.bathrooms++
            }
        },

        decreaseParking() {
            if (this.form.parking > 0) {
                this.form.parking--
            }
        },

        increaseParking() {
            if (this.form.parking < 10) {
                this.form.parking++
            }
        },

        decreaseRooms() {
            if (this.form.rooms > 0) {
                this.form.rooms--
            }
        },

        increaseRooms() {
            if (this.form.rooms < 10) {
                this.form.rooms++
            }
        },

        hasAmenity(id) {
            return this.amenities.includes(id)
        },

        hasFacility(id) {
            return this.facilities.includes(id)
        },

        prepare() {
            var property = this.fetchOneProperty(this.$route.params.id)
                .then(value => {
                    if (value) {
                        this.property = value

                        this.pickedAmenities = value.amenities.map(item => item.id)
                        this.pickedFacilities = value.facilities.map(item => item.id)

                        this.form = new Form(value)

                        var daysAvailable = value.days_available
                        if ("" !== daysAvailable) {
                            var dates = JSON.parse(daysAvailable)
                            dates.forEach((item, index) => dates[index] = new Date(item))
                            this.form.days_available = dates
                        }

                        this.dzFeaturedPhotoMounted(value.featured_photo)
                        this.dzUnfeaturedPhotosMounted(value.unfeatured_photos)
                    }

                    return value
                })

            var amenities = this.fetchAllAmenities()
                .then(value => {
                    if (value) {
                        this.amenities = value
                    }

                    return value
                })

            var facilities = this.fetchAllFacilities()
                .then(value => {
                    if (value) {
                        this.facilities = value
                    }

                    return value
                })

            var propertyConditions = this.fetchAllPropertyConditions()
                .then(value => {
                    if (value) {
                        this.propertyConditions = value

                        window.$(()=> {
                            return window.$("#property_condition_id").selectpicker()
                        })
                    }

                    return value
                })

            var propertyTypes = this.fetchAllPropertyTypes()
                .then(value => {
                    if (value) {
                        this.propertyTypes = value

                        window.$(()=> {
                            return window.$("#property_type_id").selectpicker()
                        })
                    }

                    return value
                })

            return Promise.all([property, amenities, facilities, propertyConditions, propertyTypes])
        },

        handleSubmitForm() {
            this.submitted = true

            this.form.amenities = this.pickedAmenities.map(item => { return { id: item }})
            this.form.facilities = this.pickedFacilities.map(item => { return { id: item }})
            this.form.featured_photo = {}
            this.form.unfeatured_photos = []

            var id = this.$route.params.id
            this.url = "/api/properties/" + id

            this.form.put(this.url)
                .then(response => {
                    return this.dzFeaturedPhotoProcessQueue()
                }).catch(error => {
                    if (error.status > 422) {
                        alertErrorMessage("Publica tu inmueble", error.data.message)
                    }

                    return this.submitted = false
                })
        },

        handleNextStep() {
            return this.$validator.validateAll().then(success => {
                if (success !== false) {
                    return this.step++
                }
            })
        },

        handlePreviousStep() {
            return this.$validator.validateAll().then(success => {
                if (success !== false) {
                    return this.step--
                }
            })
        },
    }
}
</script>
