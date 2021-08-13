<template>
	<swiper
		:slides-per-view="1"
		:loop="true"
		navigation
		@swiper="onSwiper"
		@slideChange="onSlideChange"
	>
		<swiper-slide class="reviews-item" v-for="review in reviews" :key="review.id">
			<div class="reviews__text">{{ review.text }}</div>
			<div class="reviews__decor">...</div>
			<div class="reviews__name">{{ review.name }}</div>
		</swiper-slide>
	</swiper>
</template>

<script>
import SwiperCore, { Navigation } from 'swiper';
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/swiper.scss';
import 'swiper/components/navigation/navigation.scss';

SwiperCore.use([Navigation]);
export default {
	name: "ReviewsSlider",
	props: [
		'reviews'
	],
	components: {
		Swiper,
		SwiperSlide,
	},
	methods: {
		onSwiper(swiper) {
			// console.log(swiper);
		},
		onSlideChange() {
			// console.log('slide change');
		},
	},
}
</script>

<style scoped lang="scss">
.reviews {
	&__text {
		max-width: 80%;
		margin: 0 auto;
		text-align: center;
	}
	&__decor {
		font-size: 40px;
		letter-spacing: 5px;
		text-align: center;
	}
	&__name {
		text-align: center;
	}
}
</style>