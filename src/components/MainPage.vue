<template>
	<div class="modal" v-if="modalOpen" @click="hideModal">
		<div class="modal__inner flex-body">
			<div class="modal__body" @click.stop="">
				<div class="modal__title">
					Оставьте свой телефон,
					мы перезвоним Вам
					и назначим замер на удобное для Вас время
				</div>
				<div class="modal__input">
					<input type="text" name="name" v-model="formName">
				</div>
				<div class="modal__input">
					<input type="text" name="phone" v-model="formPhone">
				</div>
				<div class="modal__button" @click="sumbit">
					<span>Отправить</span>
				</div>
				<div class="modal__police">
					Нажимая на кнопку «Отправить»,
					Вы соглашаетесь на обработку персональных данных.
				</div>
				<div class="modal__close">
					<span></span><span></span>
				</div>

			</div>
		</div>
	</div>
	<div class="intro">
		<div class="intro__picture">
			<img src="../assets/images/intro.jpg" alt="intro">
		</div>
		<div class="intro__content">
			<div class="container">
				<div class="intro__content-inner">
					<div class="intro__text">
						Ремонт и обслуживание холодильников от
						<span class="old-price"> 1000 </span>
						<span class="color-danger"> 500₽</span>
						<div class="intro__today"> В день обращения, любые производители, запчасти в наличии</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="about">
			<div class="about__body flex-body">
				<div class="about__picture">
					<div class="about__picture-decor"></div>
					<img src="../assets/images/about.jpg" alt="about">
				</div>
				<div class="about__description">
					<div class="about__text">
						<p>
							Сервисный центр «Морозная пчела» предлагает весь спектр услуг <span
							class="text-bold">по ремонту и сервисному
							обслуживанию кондиционеров и систем вентиляции в Таганроге. </span>«Морозная пчела» — это
							команда
							профессионалов, которые обладают большим опытом работы с климатической техникой и применяют
							в своей деятельности новейшие технологии. Качественно проведенный ремонт увеличивает срок
							службы вашего кондиционера, а правильно выполненная диагностика, позволяет предотвратить
							серьезные поломки.
						</p>
					</div>
					<div class="about__list">
						<ul>
							<li v-for="item in aboutList" :key="item.value">
								<span class="circle-check circle-check--dark-blue">
									<span></span>
								</span>
								<div class="about__item-text">
									{{ item.value }} <span v-if="item.bold">&nbsp{{ item.bold }}</span>
								</div>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="services">
			<div class="services__title section-title">
				<h4>Наши услуги</h4>
				<div class="title-decor"></div>
			</div>
			<div class="services__items flex-body">
				<div class="services__item" v-for="item in servicesList">
					<div class="services__picture">
						<img :src="item.picturePath" :alt="item.name">
					</div>
					<div class="services__info flex-body">
						<div class="services__text">
							<div class="services__name">{{ item.name }}</div>
							<div class="services__price">от {{ item.minPrice }} руб.</div>
							<div class="services__description">{{ item.description }}</div>
						</div>

						<div class="services__button" @click="showModal($event)">Подробнее</div>
					</div>
				</div>
			</div>
		</div>

		<div class="reasons">
			<div class="reasons__title section-title">
				<h4>{{ reasonsTitle }}</h4>
				<div class="title-decor"></div>
			</div>
			<div class="reasons__content">
				<div class="reasons__list">
					<ul class="flex-body">
						<li v-for="item in reasons" :key="item.id">
							<span class="reasons-decor"></span>
							{{ item.name }}
						</li>
					</ul>
				</div>
				<div class="reasons__description">
					<img src="../assets/icons/warning.svg" alt="">
					{{ reasonsText }}
				</div>
			</div>
		</div>

		<div class="prices">
			<div class="prices__title section-title">
				<h4>
					Цены на обслуживание кондиционеров
				</h4>
				<div class="title-decor"></div>
			</div>
			<div class="prices__table">
				<div class="prices__row flex-body" v-for="price in prices" :key="price.id">
					<div class="prices__name">{{ price.name }}</div>
					<div class="prices__cost">{{ price.cost != null ? price.cost : 'По согласованию' }}</div>
					<!--					<div class="proces__cost" v-else>По согласованию</div>-->
				</div>
			</div>
		</div>

		<div class="schema">
			<div class="schema__title section-title">
				<h4>Схема сотрудничества</h4>
				<div class="title-decor"></div>
			</div>
			<div class="schema__body flex-body">
				<div class="schema__item" v-for="schema in workLayout" :key="schema.id">
					<div class="schema__picture-box">
						<div class="schema__picture">
							<img :src="require('../assets/images/schema/'+schema.picture+'.png')" alt="">
						</div>
					</div>
					<div class="schema__text">{{ schema.text }}</div>
				</div>
			</div>
		</div>

		<div class="reviews">
			<div class="reviews__title section-title">
				<h4>Отзывы наших клиентов</h4>
				<div class="title-decor"></div>
			</div>
			<div class="reviews__body flex-body">
				<div class="reviews__slider">
					<reviews-slider :reviews="reviews"></reviews-slider>
				</div>
				<div class="reviews__picture">
					<img src="../assets/images/reviews-man.png" alt="work-man">
				</div>
			</div>
		</div>

		<div class="brands flex-body">
			<div class="brands__item" v-for="(brand, brandIndex ) in brands" :key="brandIndex">
				<img :src="require('../assets/images/brands/'+brand+'.png')" alt="">

			</div>
		</div>

		<div class="works">
			<div class="works__title section-title">
				<h4>Фото выполненных работ</h4>
				<div class="title-decor"></div>
			</div>
			<div class="works__items">
				<gallery-work></gallery-work>
			</div>
		</div>



	</div>


</template>

<script>
import ReviewsSlider from "@/components/ReviewsSlider";
import GalleryWork from "@/components/GalleryWork";;
export default {
	components: {
		ReviewsSlider, GalleryWork
	},
	name: "MainPage",
	data() {
		return {
			// test : require('./assets/images/schema/1.png'),
			ass: 'ass',
			modalOpen: false,
			aboutList: [

				{
					value: 'Мы работаем в этой сфере более 8 лет',
					bold: null
				},
				{
					value: 'Выезд специалиста при ремонте',
					bold: 'БЕСПЛАТНО'
				},
				{
					value: 'Работы выполняются согласно нормам, установленным производителем',
					bold: null
				},
				{
					value: 'Используем только оригинальные детали и комплектующие',
					bold: null
				},
				{
					value: 'Гарантия на все работы и запчасти от 2 лет',
					bold: null
				},
				{
					value: 'Работаем по договору ',
					bold: 'БЕЗ ПРЕДОПЛАТЫ'
				}

			],
			servicesList: [
				{
					picturePath: '',
					name: 'Чистка кондиционеров',
					minPrice: '500',
					description: 'Под сильным давлением промываются поддоны и сливные трубки, устраняется грязь, дезинфицируются внутренние детали'
				},
				{
					picturePath: '',
					name: 'Диагностика кондиционеров',
					minPrice: '1000',
					description: 'Проверка механических и электрических параметров на соответствие характеристикам, заявленным производителем'
				},
				{
					picturePath: '',
					name: 'Ремонт кондиционеров',
					minPrice: '500',
					description: 'Поломки устраняются прямо на месте, все запчасти есть в наличии по дилерским ценам'
				}
			],
			reasons: [
				{
					name: 'непрофессиональный монтаж',
					id: 1
				},
				{
					name: 'отсутствие надлежащего ухода и своевременного обслуживания',
					id: 2
				},
				{
					name: 'повышенное загрязнение воздуха',
					id: 3
				},
				{
					name: 'недостаток фреона',
					id: 4
				},
				{
					name: 'повреждения механического типа',
					id: 5
				}, {
					name: 'скачок напряжения в сети',
					id: 6
				},

			],
			reasonsTitle: 'Возможные причины неисправностей',
			reasonsPicturePath: '',
			reasonsText:
				'Если Вы заметили сбои в работе Вашей системы кондиционирования, не стоит закрывать на это глаза — своевременная диагностика поможет не доводить до последствий, когда ремонт будет уже недоступен или нецелесообразен.',
			prices: [
				{
					name: 'Профилактика/ 	диагностика сплит-системы настенного и настенно-потолочного типа',
					id: '1',
					cost: 1500
				},
				{
					name: 'Дозаправка кондиционера хладагентом (при обнаружении недостаточности)',
					id: '2',
					cost: 'от 500 руб.',
				},
				{
					name: 'Заправка кондиционера хладагентом с предварительным вакуумированием',
					id: '3',
					cost: 'от 500 руб.',
				},
				{
					name: 'Ремонт дренажной системы',
					id: '4',
					cost: null,
				},
				{
					name: 'Ремонт трассы',
					id: '5',
					cost: null,
				},
				{
					name: 'Антибактериальная обработка испарителя',
					id: '6',
					cost: null,
				},
				{
					name: 'Выезд за пределы Таганрога',
					id: '7',
					cost: null,
				},
				{
					name: 'Выезд мастера',
					id: '8',
					cost: null,
				},
			],
			workLayout: [
				{
					picture: 1,
					text: 'Вы звоните по контактным телефонам или отправляете заявку с сайта',
					id: 1,
				},
				{
					picture: 2,
					text: 'Выезд специалиста, диагностика проблемы, расчет сметы',
					id: 2,
				},
				{
					picture: 3,
					text: 'Согласование стоимости, подписание договора на месте',
					id: 3,
				},
				{
					picture: 4,
					text: 'Выполнение работ, подписание акта приема, расчёт\n',
					id: 4,
				},
			],
			reviews: [
				{
					name: 'клиент 1',
					text: 'Устранили протечку кондиционера. С собой был весь необходимый инструмент, вежливые, пунктуальные. Не были знакомы с моей моделью кондиционера. Ремонт обошелся в полторы тысячи.',
					id: 1
				},
				{
					name: 'клиент 2',
					text: 'Профессионально, быстро качественно.',
					id: 2
				},
				{
					name: 'клиент 3',
					text: 'Решили проблему с кондиционерами за 3 часа, пока другие мастера не могли решить её уже 2 недели. Стоимость адекватная (ниже прописанного мною максимума). Дали гарантию на работы. В принципе было приятно сотрудничать, мастера рекомендую.',
					id: 3
				},
				{
					name: 'клиент 4',
					text: 'Работой мастера осталась довольна! Все сделал отлично, думаю будем обращаться ещё и посоветую друзьям!',
					id: 4
				}
			],
			brands: [
				'fujutsu', 'general', 'hitachi', 'hyundai', 'lg', 'midea', 'mitsu', 'panasonic', 'samsung', 'toshiba'
			],
			works: [
				'1', '2', '3', '4', '5', '6'
			],
			currentService: null
		}
	},
	methods: {
		showModal(event){
			this.modalOpen = true;
			let serviceBox = event.target.closest('.services__info');
			this.currentService = serviceBox.querySelector('.services__name').innerText;

		},
		hideModal(){
			this.modalOpen = false;
		},
	},
}
</script>

<style scoped lang="scss">
@import "src/assets/scss/base";

.intro {
	max-width: 1920px;
	width: 100%;
	height: 650px;
	position: relative;
	overflow: hidden;

	&__picture {
		width: 100%;
		height: 100%;

		img {
			width: 100%;
			height: 100%;
			object-fit: cover;
			@media (max-width: 480px) {
				object-position: right top;
			}
		}
	}

	&__content {
		position: absolute;
		width: 100%;
		height: 100%;
		left: 0;
		top: 0;

		.container {
			height: 100%;
		}
	}

	&__content-inner {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		height: 100%;
		width: 100%;
	}

	&__text {
		font-size: 49px;
		font-weight: 900;
		line-height: 1.4;
		max-width: 50%;
		@media (max-width: 768px) {
			max-width: none;
			width: 100%;
		}
		@media (max-width: 480px) {
			font-size: 35px;
		}

		span {
			font-size: 49px;
		}

		.color-danger {
			font-size: 60px;
		}
	}

	&__today {
		margin-top: 25px;
		font-size: 19px;
		font-weight: 400;
		padding: 5px 5px 8px;
		background-color: cornflowerblue;
		color: $white;
		@media (max-width: 768px) {
			width: max-content;
		}
		@media (max-width: 600px) {
			width: 100%;
		}
	}
}

.about {
	padding: 50px 0;

	&__body {
		align-items: flex-start;
		@media (max-width: 480px) {
			flex-wrap: wrap;
		}
	}

	&__picture {
		flex: 0 0 400px;
		max-width: 400px;
		width: 100%;
		margin-right: 50px;
		position: relative;
		@media (max-width: 768px) {
			flex-basis: 250px;
		}
		@media (max-width: 480px) {
			flex-basis: calc(100% - 20px);
			//padding-right: 50px;
			margin-right: 0;
			margin-bottom: 50px;
			//width: ;
		}
	}

	&__picture-decor {
		position: absolute;
		content: '';
		width: 100%;
		height: 100%;
		border: 10px solid cornflowerblue;
		bottom: -20px;
		right: -20px;
		display: block;

	}

	&__description {
		flex: 1 1 auto;
	}

	&__text {
		line-height: 1.6;
		margin-bottom: 20px;
	}

	&__list {
		ul {
		}

		li {
			display: flex;
			align-items: center;
			justify-content: flex-start;

			.circle-check {
				margin-right: 10px;
				flex-shrink: 0;
			}

			.span {
				text-transform: uppercase;
			}
		}

		li + li {
			margin-top: 15px;
		}
	}
}

.services {
	padding: 50px 0;

	&__title {
		margin-bottom: 30px;
	}

	&__items {
		align-items: stretch;
		@media (max-width: 480px) {
			flex-wrap: wrap;
		}
	}

	&__item {

		flex: 0 1 30%;
		border: 1px solid lightblue;
		padding: 10px;
		//transform-origin: left center;
		perspective: 1500px;
		transition: transform 1s ease-in-out;
		@media (max-width: 480px) {
			flex: 0 1 100%;
			margin-bottom: 20px;
		}

		//&:hover {
		//	transform: rotate3d(0, 1, 0, 20deg);
		//}
	}

	&__picture {
		height: 225px;
		align-items: center;
		width: 100%;

		img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	}

	&__info {
		height: calc(100% - 225px);
		flex-direction: column;
		justify-content: space-between;
	}

	&__name {
		font-weight: 700;
		font-size: 18px;
		margin-bottom: 5px;
	}

	&__price {
		color: Red;
		font-size: 23px;
		font-weight: 900;
		margin-bottom: 15px;
	}

	&__description {
		font-size: 16px;
		margin-bottom: 20px;
	}

	&__button {
		text-align: center;
		border: 1px solid transparent;
		color: #fff;
		padding: 10px;
		background-color: #4a4ae9;
		transition: color .3s ease, background-color .3s ease;

		&:hover {
			cursor: pointer;
			color: #4a4ae9;
			border-color: #4a4ae9;
			background-color: #fff;
		}
	}

}

.reasons {
	padding: 50px 0;

	&__title {
		margin-bottom: 30px;
		@media (max-width: 550px) {
			width: 100%;
			text-align: center;
		}
	}

	&__content {
		//background-color: grey;
		padding: 10px 20px;
		color: $white;
		//background: linear-gradient(to left, transparent, #6868f1, transparent);
		background-image: url(../assets/images/kond-bg.png);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center center;

	}

	&__list {
		margin-bottom: 15px;

		ul {
			flex-wrap: wrap;
		}

		li {
			flex: 0 1 50%;
			padding-left: 15px;
			padding-right: 10px;
			position: relative;
			margin-bottom: 10px;
			@media (max-width: 480px) {
				flex: 0 1 100%;
			}
		}
	}

	&__description {
		display: flex;
		align-items: center;
		justify-content: flex-start;
		@media (max-width: 480px) {
			flex-direction: row-reverse;
		}
		img {
			display: block;
			margin-right: 20px;
			@media (max-width: 480px) {
				margin-right: 0;
				margin-left: 20px;
			}
		}
	}
}

.prices {
	padding: 50px 0;

	&__title {
		margin-bottom: 30px;
		@media (max-width: 580px) {
			width: 100%;
			text-align: center;
		}
	}

	&__row {
		align-items: stretch;
		padding: 10px 15px;

		@media (max-width: 480px) {
			font-size: 14px	;
		}
		&:nth-child(odd) {
			background: linear-gradient(to left, rgba(#7878f3, .15), transparent);
		}

		&:nth-child(even) {
			background: linear-gradient(to right, rgba(#4AE3AE, .15), transparent);
			//background-color: rgba(#4AE3AE, .15);
		}
	}

	&__name {
		flex-shrink: 0;
		text-align: center;
		@media (max-width: $mediaXXL) {
			flex: 0 1 auto;
			text-align: left;
			padding-right: 5px;
		}
	}

	&__cost {
		text-align: center;
		flex-basis: 200px;
		flex-shrink: 0;
		@media (max-width: 480px) {
			flex-basis: 90px;
		}
	}
}

.schema {
	padding: 50px 0;

	&__title {
		margin-bottom: 30px;
		@media (max-width: $mediaM) {
			width: 100%;
			text-align: center;
		}
	}
	&__body {
		flex-wrap: wrap;
	}
	&__item {
		flex: 0 1 calc(25% - 15px);
		@media (max-width: $mediaXL) {
			flex: 0 1 calc(50% - 20px);
			margin-bottom: 20px;
		}
		@media (max-width: 480px) {
			flex: 0 1 100%;
		}
	}

	&__picture-box {
		border: 1px solid rgba(grey, .5);
		border-radius: 50%;
		width: 200px;
		height: 200px;
		margin: 0 auto 20px;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	&__picture {
		width: 115px;
		height: 115px;

		img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	}

	&__text {
		text-align: center;
	}
}

.reviews {
	&__body {
		align-items: flex-start;
	}
	&__title {
		margin-bottom: 30px;
	}
	&__slider {
		flex: 0 1 55%;
		width: 100%;
		max-width: 55%;
		margin-right: 15px;
		@media (max-width: $mediaM) {
			flex-basis: 100%;
			max-width: none;
		}
	}
	&__picture {
		flex: 0 1 auto;
		max-width: 368px;
		@media (max-width: $mediaL) {
			max-width: 200px;
		}
		@media (max-width: $mediaM) {
			display: none;
		}
	}
}

.brands {
	padding: 30px 0;
	flex-wrap: wrap;
	@media (max-width: $mediaXXL) {
		justify-content: center;
	}
	&__item {
		//flex-basis: 20%;
		margin: 0 40px 20px;
	}
}

.works {
	&__title {
		margin-bottom: 40px;
	}
}

.modal {
	position: fixed;
	width: 100vw;
	height: 100vh;
	background-color: rgba(black, .96);
	z-index: 211;
	top: 0;
	left: 0;
	&__inner {
		align-items: center;
		justify-content: center;
		height: 100%;
		width: 100%;
	}
	&__body {
		border-radius: 3px;
		background-color: #fff;
		padding: 30px;
		max-width: 400px;
	}
	&__input {
		border: 1px solid grey;
		padding: 5px 10px;
		max-width: 250px;
		width: 100%;
		border-radius: 2px;
		margin: 0 auto 30px;
		input {
			width: 100%;
			height: 100%;
			font-size: 16px;
		}
	}

	&__title {
		text-align: center;
		margin-bottom: 40px;
		font-weight: 700;
	}
	&__police {
		text-align: center;
		font-size: 12px;
	}
	&__button {
		text-align: center;
		min-height: 42px;
		span {

			padding: 10px 20px;
			background-color: tomato;
			color: #fff;
		}
	}
}
</style>