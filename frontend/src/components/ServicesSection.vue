<script setup>
import { ref, onMounted } from 'vue';

const services = ref([]);

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();
    services.value = data.services;
  } catch (error) {
    console.error('Fout bij laden:', error);
  }
});

const getBgClass = (index) => {
  const classes = ['light-row', 'dark-row', 'beige-row'];
  return classes[index % 3];
};
</script>

<template>
  <section id="services" class="services-section">
    <div
      v-for="(item, index) in services"
      :key="index"
      :class="[
        'service-row',
        getBgClass(index),
        'uk-grid-collapse uk-flex-middle',
      ]"
      uk-grid
      uk-scrollspy="target: > div; cls: uk-animation-slide-bottom-small; delay: 300"
    >
      <div
        class="uk-width-1-2@m service-image-col"
        :class="{ 'uk-flex-last@m': index % 2 === 1 }"
      >
        <div class="image-wrapper">
          <img
            v-if="item.i"
            :src="'http://localhost' + item.i"
            :alt="item.t"
            class="service-img"
          />
        </div>
      </div>

      <div class="uk-width-1-2@m service-text-col">
        <div class="text-container">
          <h3
            class="service-title"
            :class="{ 'light-text': getBgClass(index) === 'dark-row' }"
          >
            {{ item.t }}
          </h3>
          <p
            class="service-text"
            :class="{ 'light-text': getBgClass(index) === 'dark-row' }"
          >
            {{ item.d }}
          </p>
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.services-section {
  width: 100%;
  overflow-x: hidden;
}
.service-row {
  margin-left: 0 !important;
  margin-right: 0 !important;
  width: 100%;
}

.light-row {
  background-color: #c6c691;
}
.dark-row {
  background-color: #244e3a;
}
.beige-row {
  background-color: #f6e3cd;
}

.image-wrapper {
  border-radius: 15px;
  overflow: hidden;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
  line-height: 0;
}
.service-img {
  width: 100%;
  display: block;
  object-fit: cover;
  transition: transform 0.8s ease;
}

.image-wrapper:hover .service-img {
  transform: scale(1.05);
}

.service-image-col {
  padding: 80px 4% 80px 8% !important;
}
.service-text-col {
  padding: 80px 8% 80px 4% !important;
}

.uk-flex-last\@m {
  padding: 80px 8% 80px 4% !important;
}
.uk-flex-last\@m + .service-text-col {
  padding: 80px 4% 80px 8% !important;
}

.text-container {
  max-width: 480px;
}

.service-title {
  font-family: 'Poppins', sans-serif;
  font-weight: bold;
  font-size: 42px;
  color: #244e3a;
  margin-bottom: 20px;
}
.light-text {
  color: #c6c691 !important;
}

.service-text {
  font-family: 'Poppins', sans-serif;
  font-weight: light;
  font-size: 16px;
  line-height: 1.6;
  color: #244e3a;
}

@media (max-width: 959px) {
  .service-row {
    display: flex !important;
    flex-direction: column !important;
    padding: 40px 20px !important;
    box-sizing: border-box;
  }

  .service-image-col,
  .service-text-col {
    padding: 40px 4% !important;
  }

  .image-wrapper {
    max-width: 100%;
  }

  .text-container {
    max-width: 100%;
    margin: 0 auto;
  }

  .service-title {
    font-size: 26px;
    margin-bottom: 15px;
  }

  .service-text {
    font-size: 16px;
  }

  .dark-row {
    flex-direction: column !important;
  }
}
</style>
