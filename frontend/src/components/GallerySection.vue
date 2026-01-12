<script setup>
import { ref, onMounted } from 'vue';

const galleryItems = ref([]);

onMounted(async () => {
  try {
    const response = await fetch('http://localhost/nexus/instellingen/');
    const data = await response.json();

    if (data.gallery) {
      galleryItems.value = data.gallery;
    }
  } catch (error) {
    console.error('Fout bij laden gallery:', error);
  }
});
</script>

<template>
  <section
    id="gallerij"
    class="gallery-section uk-section uk-position-relative uk-overflow-hidden"
  >
    <div class="background-logo-wrapper">
      <img
        src="../assets/nexus-arrows.svg"
        alt="Nexus Logo Background"
        class="bg-logo-img"
      />
    </div>

    <div class="uk-container uk-container-expand">
      <div
        class="puzzle-grid"
        uk-scrollspy="target: > div; cls: uk-animation-fade; delay: 200"
      >
        <div
          v-for="(item, index) in galleryItems"
          :key="index"
          :class="['img-box', `item-${index + 1}`]"
        >
          <img
            v-if="item.img"
            :src="'http://localhost' + item.img"
            :alt="'Gallery image ' + (index + 1)"
            class="gallery-img"
          />
        </div>
      </div>
    </div>
  </section>
</template>

<style scoped>
.gallery-section {
  background-color: #f1e4d3;
  padding: 100px 0;
  min-height: 100vh;
  display: flex;
  align-items: center;
}

.background-logo-wrapper {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 100vw;
  z-index: 0;
}

.bg-logo-img {
  width: 100%;
  height: auto;
  opacity: 0.5;
}

.uk-container-expand {
  position: relative;
  z-index: 1;
  padding: 0 5vw;
}

.puzzle-grid {
  display: grid;
  grid-template-columns: repeat(10, 1fr);
  grid-auto-rows: 500px;
  gap: 30px;
  max-width: 1600px;
  margin: 0 auto;
}

.img-box {
  width: 100%;
  height: 100%;
  overflow: hidden;
  box-shadow: 0 20px 50px rgba(0, 0, 0, 0.1);
  transition: transform 0.5s ease;
}

.img-box:hover {
  transform: scale(1.02);
  z-index: 2;
}

.gallery-img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  transition: transform 0.8s ease;
}

.img-box:hover .gallery-img {
  transform: scale(1.1);
}

@media (min-width: 960px) {
  .item-1 {
    grid-column: 1 / 5;
    grid-row: 1;
  }
  .item-2 {
    grid-column: 5 / 11;
    grid-row: 1;
  }

  .item-3 {
    grid-column: 1 / 7;
    grid-row: 2;
  }
  .item-4 {
    grid-column: 7 / 11;
    grid-row: 2;
  }
}

@media (max-width: 959px) {
  .puzzle-grid {
    grid-template-columns: 1fr;
    grid-auto-rows: 400px;
  }
  .item-1,
  .item-2,
  .item-3,
  .item-4 {
    grid-column: span 1;
    grid-row: auto;
  }

  .background-logo-wrapper {
    display: none;
  }
}
</style>
