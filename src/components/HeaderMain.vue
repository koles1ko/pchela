<template>
	<!--	<div class="container">-->
	<div class="modal" v-if="modalOpen" @click="hideModal">
		<div class="modal__inner flex-body">
			<div class="modal__body"
				 @click.stop=""
				 v-if="!modalSend">
				<div class="modal__title">
					Оставьте свой телефон,
					мы перезвоним Вам
					и назначим замер на удобное для Вас время
				</div>
				<div class="modal__input">
					<input type="text" name="name" v-model="formName" placeholder="Имя">
				</div>
				<div class="modal__input">
					<input type="text" name="phone" v-model="formPhone" placeholder="Телефон">
				</div>
				<div class="modal__button" @click="submit">
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
			<div class="modal__body" v-else>
				Спасибо за заявку,
				<div>Мы вам перезвоним в ближайшее время</div>
			</div>
		</div>
	</div>
	<header class="header">

		<div class="container">
			<div class="header__body">
				<div class="header__logo">
					<img src="../assets/images/logo.png" alt="logotype">
				</div>
				<div class="header__contacts">

					<div class="header__times flex-body">
						<div class="header__times-picture">
							<img src="../assets/icons/alarm.svg" alt="">
						</div>
						<div class="header__times-text">
							Работаем ежедневно
							с 8:00 до 20:002
						</div>
					</div>
					<div class="header__phone">
						<img src="../assets/icons/phone.svg" alt="">
						<a :href="'tel:' + phone" >{{ phone }}</a>
					</div>
				</div>

				<div class="header__buttons">
					<div class="header__recall" @click="showModal">
						Заказать звонок
					</div>
					<div class="header__consult" @click="showModal">
						Заказать консультацию
					</div>
					<div class="header__season" @click="changeSeason">
						{{ season }}
					</div>
				</div>
			</div>
		</div>

	</header>

	<!--	</div>-->
</template>

<script>
export default {
	name: "HeaderMain",
	props: ['phone'],
	emits: ['changeSeason', 'test', 'swapSeason'],
	data() {
		return {
			// phone: this.mainPhone
			modalOpen: false,
			svgPath: '../assets/images/icons/wrench.icons',
			formName: '',
			formPhone: '',
			modalSend: false,
			season: 'summer',
			test: false
		}
	},
	methods: {
		changeSeason() {
			this.test = !this.test
			this.test ? this.season = 'winter' : this.season = 'summer';
			this.$emit('swapSeason', this.season)
			// console.log(this.season)
		},
		showModal(){
			this.modalOpen = true;

		},
		hideModal(){
			this.modalOpen = false;
			this.modalSend = false
		},
		submit(){

			let name = this.formName;
			let phone = this.formPhone;
			let url = '../form.php';
			let data = {
				'name': name,
				'phone': phone
			}
			console.log(123123123123)
			fetch(url, {
				method: 'POST',
				headers: {
					'content-type': 'application/json'
				},
				body: JSON.stringify(data),

			}).then(response => {
				if (response.ok) this.modalSend = true

			})
		}
	},
	computed: {
		// returnSeason() {
		// 	this.test ? this.season = 'winter' : this.season = 'summer';
		// 	return this.season
		// }
	}
}

</script>

<style scoped lang="scss">

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

.container {
	max-width: 1170px;
	width: 100%;
	margin: 0 auto;
	padding: 0 15px;
}

.header {
	//background-color: rgba(#57ecda, .2);
	background: linear-gradient(to bottom, rgba(#57ecda, .2), #fff);
	&__body {
		//background-color: yellow;
		display: flex;
		align-items: center;
		justify-content: space-between;
		min-height: 100px;
		padding: 30px 0;
		@media (max-width: 768px) {
			flex-wrap: wrap;
		}
		@media (max-width: 480px) {
			align-items: flex-start;
		}
	}

	&__logo {
		width: 160px;
		@media (max-width: 480px) {
			margin-bottom: 10px;
			width: 40%;
		}
	}

	&__contacts {
		margin-right: 50px;
		margin-left: auto;
		@media (max-width: 480px) {
			width: 100%;
			margin-right: 0;
			width: 50%;
		}
	}

	&__phone {
		//mb10
		img {
			width: 25px;
			height: 25px;
			display: inline-block;
			margin-right: 5px;
		}
	}

	&__times {
		margin-bottom: 15px;
		align-items: center;
		@media (max-width: 480px) {
			justify-content: flex-start;
		}
	}

	&__times-picture {
		width: 20px;
		height: 20px;
		margin-right: 10px;

		img {
			display: block;
		}
	}

	&__times-text {
		max-width: 140px;
		font-size: 14px;
	}

	&__buttons {
		display: flex;
		align-items: center;
		justify-content: center;
		@media (max-width: 768px) {
			flex-basis: 100%;
			margin-top: 15px;
			justify-content: flex-end;
		}
		@media (max-width: 480px) {
			flex-wrap: wrap;
			justify-content: flex-start;
		}
	}


	&__recall,
	&__consult {
		border: 1px solid transparent;
		color: #fff;
		padding: 5px 10px;
		background-color: #4a4ae9;
		transition: color .3s ease, background-color .3s ease;

		&:hover {
			cursor: pointer;
			color: #4a4ae9;
			border-color: #4a4ae9;
			background-color: #fff;
		}

		//&:hover {}
	}

	&__recall {
		margin-right: 10px;
		@media (max-width: 480px) {
			margin-bottom: 15px;
		}
	}
}
</style>