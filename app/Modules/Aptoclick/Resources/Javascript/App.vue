<template>
  <div
    id="app"
    style="padding-top:4.5rem;"
  >
    <PageHeader />
    <RouterView />
    <PageFooter v-if="false !== $route.meta.footer" />
    <PolicyOfPrivacyModal />
    <TermsAndConditionsModal />
  </div>
</template>

<script>
export default {
    name: "App",
}
</script>
