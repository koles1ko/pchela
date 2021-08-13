<template>
	<header-main :phone="phone" @swapSeason="rrrr"></header-main>
	<component :is="'main-page-' + season"></component>
	<footer-main :phone="phone"
				 :address="address"
				 :workTime="workTime" ></footer-main>
</template>

<script>
import HeaderMain from './components/HeaderMain.vue'
import MainPageSummer from "./components/MainPageSummer";
import MainPageWinter from "./components/MainPageWinter";
import FooterMain from "./components/FooterMain";

export default {
	name: 'App',
	components: {
		HeaderMain, MainPageSummer, MainPageWinter, FooterMain
	},
	data() {
		return {
			isSummer: true,
			season: 'winter',
			phone: '89094115001',
			address: 'г. Таганрог, ул.Дзержинского, 140',
			workTime: 'Работаем ежедневно с 9:00 до 20:00\n'
		}
	},
	methods: {
		rrrr(data) {
			this.season = data
			console.log(data)
		}
	}
}
</script>

<style lang="scss">

</style>
