<script setup>
import { ref, onMounted } from 'vue';

const locationTitle = ref('');
const locationIntro = ref('');
const locationFeatures = ref([]);
const locationOutroduction = ref('');
const locationImage = ref('');

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();

    locationTitle.value = data.location_title;
    locationIntro.value = data.location_intro;
    locationFeatures.value = data.location_features;
    locationOutroduction.value = data.location_outroduction;

    if (data.location_image) {
      const fullPath = `http://localhost${data.location_image}`;
      locationImage.value = `url('${fullPath}')`;
    } else {
      locationImage.value = `url('/src/assets/V1_00.jpg')`;
    }
  } catch (error) {
    console.error('Fout bij laden:', error);
    locationImage.value = `url('/src/assets/V1_00.jpg')`;
  }
});
</script>

<template>
  <section id="locatie" class="location-section">
    <div
      class="uk-container uk-container-expand uk-flex uk-flex-right uk-flex-middle location-inner"
    >
      <div
        class="location-content"
        uk-scrollspy="cls: uk-animation-slide-right-medium; delay: 300"
      >
        <h2 class="location-title">
          {{ locationTitle }}
        </h2>

        <p class="location-intro">
          {{ locationIntro }}
        </p>

        <ul class="location-features">
          <li v-for="(item, index) in locationFeatures" :key="index">
            <strong>{{ item.titel }}:</strong> {{ item.tekst }}
          </li>
        </ul>

        <p class="location-footer">
          {{ locationOutroduction }}
        </p>

        <a href="#" class="uk-button uk-button-primary custom-btn">
          Bekijk bereikbaarheid
        </a>
      </div>
    </div>
  </section>
</template>

<style scoped>
.location-section {
  position: relative;
  background-image: v-bind(locationImage);
  background-size: cover;
  background-position: center 55%;
  width: 100%;
  min-height: 80vh;
  margin-top: 50px;
  overflow: visible;
  background-color: #f0f0f0;
}
.location-inner {
  min-height: 80vh;
  display: flex;
  justify-content: flex-end;
  align-items: flex-end;
  padding: 0 !important;
}

.location-content {
  background-color: rgba(198, 198, 145, 0.85);
  padding: 60px;
  max-width: 600px;
  width: 100%;
  height: 100%;
  margin-top: -50px;
  margin-bottom: 0;
  margin-right: 0;
  display: flex;
  flex-direction: column;
  justify-content: center;
  backdrop-filter: blur(5px);
}

.location-title {
  font-family: 'Poppins', sans-serif;
  font-weight: bold;
  font-size: 48px;
  color: #244e3a;
  margin-bottom: 30px;
  line-height: 1.2;
}

.location-intro,
.location-footer {
  font-family: 'Poppins', sans-serif;
  font-weight: bold;
  font-size: 16px;
  color: #244e3a;
  line-height: 1.6;
}

.location-features {
  list-style: none;
  padding: 0;
  margin: 25px 0;
}

.location-features li {
  font-family: 'Poppins', sans-serif;
  font-size: 16px;
  font-weight: light;
  color: #244e3a;
  margin-bottom: 12px;
  position: relative;
  padding-left: 20px;
}

.location-features li::before {
  content: '•';
  position: absolute;
  left: 0;
  color: #244e3a;
}

.custom-btn {
  background-color: #244e3a !important;
  color: #c6c691 !important;
  border: none;
  padding: 12px 30px;
  text-transform: none;
  font-weight: light;
  font-size: 24px;
  border-radius: 8px;
  margin-top: 20px;
  display: inline-block;
  transition: all 0.3s ease;
}

.custom-btn:hover {
  transform: translateY(-2px);
}

@media (max-width: 959px) {
  .location-section {
    min-height: auto;
  }

  .location-content {
    max-width: 100%;
    background-color: rgba(198, 198, 145, 0.9);
    padding: 40px 20px;
    backdrop-filter: blur(5px);
    margin-top: 0;
  }

  .location-title {
    font-size: 28px;
  }
}
</style>
