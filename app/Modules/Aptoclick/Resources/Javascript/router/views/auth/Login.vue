<template>
  <div class="container-fluid px-3">
    <div class="row min-vh-100">
      <div class="col-md-8 col-lg-6 col-xl-5 d-flex align-items-center">
        <div class="w-100 py-5 px-md-5 px-xl-6 position-relative">
          <div class="mb-4">
            <h2>Ingresa a tu cuenta</h2>
          </div>
          <LoginForm
            :action="'/login'"
            :method="'post'"
          />
          <RouterLink
            :to="{ name: 'Home' }"
            class="close-absolute mr-md-5 mr-xl-6 pt-5"
          >
            <svg class="svg-icon w-3rem h-3rem">
              <use xlink:href="#close-1" />
            </svg>
          </RouterLink>
        </div>
      </div>
      <div class="col-md-4 col-lg-6 col-xl-7 d-none d-md-block">
        <!-- Image-->
        <div
          style="background-image: url(img/photo/photo-1494526585095-c41746248156.jpg);"
          class="bg-cover h-100 mr-n3"
        />
      </div>
    </div>
  </div>
</template>
