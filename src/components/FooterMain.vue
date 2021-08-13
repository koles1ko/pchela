
<template>
	<footer class="footer">
		<div class="container">
			<div class="footer__contacts flex-body">
				<div class="footer__address">
					<div class="footer__address-picture">
					<img src="../assets/icons/location.svg" alt="location">
					</div>
					{{ address }}
				</div>
				<div class="footer__phone">
					<div class="footer__phone-picture">
					<img src="../assets/icons/phone.svg" alt="">
					</div>
					{{ phone }}
				</div>
				<div class="footer__times flex-body">
					<div class="footer__times-picture">
						<img src="../assets/icons/alarm.svg" alt="">
					</div>
					<div class="header__times-text">{{ workTime }}</div>
				</div>
			</div>
			<div class="footer__form">
				<div class="footer__title">
					Оставьте заявку прямо сейчас, чтобы получить бесплатную консультацию
					специалиста уже через 5 минут
				</div>
				<div class="footer__form-body flex-body">
					<div class="footer__input">
						<input type="text" placeholder="Ваше имя" name="name" v-model="formName"></div>
					<div class="footer__input">
						<input type="text" placeholder="Ваш телефон" name="phone" v-model="formPhone"></div>
					<div class="footer__button" @click="submit">Отправить</div>
				</div>
				<div class="footer__personal">
					Нажимая на кнопку «Отправить», Вы соглашаетесь на обработку персональных данных
				</div>
			</div>
		</div>
	</footer>

</template>

<script>
export default {
	props: [
		'phone', 'address', 'work-time'
	],
	name: "FooterMain",
	data() {
		return {
			formName: '',
			formPhone: '',
		}
	},

	methods: {
		submit(){

			let name = this.formName;
			let phone = this.formPhone;
			let url = '../form.php';
			let data = {
				'name': name,
				'phone': phone
			}
			fetch(url, {
				method: 'POST',
				headers: {
					'Content-Type': 'application/json;charset=utf-8'
				},
				body: JSON.stringify(data)
			}).then(response => {
				if (response.ok) console.log('otpravleno')

			})
		}
	}
}
</script>

<style scoped lang="scss">
.footer {
	background: linear-gradient(to top, rgba(#57ecda, .2), #fff);
	padding: 40px 0;
	&__contacts {
		padding: 30px 0;
		@media (max-width: 768px) {
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		@media (max-width: 480px) {
			text-align: center;
			font-size: 14px;
		}
	}

	&__address-picture,
	&__phone-picture,
	&__times-picture {
		width: 20px;
		height: 20px;
		display: inline-block;
		margin-right: 10px;
		@media (max-width: 768px) {
			margin-bottom: 20px;
		}
		img	{
			width: 100%;
			height: 100%;
			object-fit: cover
		}
	}

	&__form {
		text-align: center;
	}
	&__title {
		font-size: 22px;
		font-weight: 500;
		margin-bottom: 30px;
	}
	&__form-body{
		justify-content: center;
		margin-bottom: 30px;
		@media (max-width: 768px) {
			//flex-wrap: wrap;
			flex-direction: column;
			align-items: center;
			justify-content: center;
		}
	}
	&__input {
		border: 1px solid blue;
		padding: 10px 5px;
		flex-basis: 240px;
		margin-right: 20px;
		@media (max-width: 768px) {
			flex-basis: 30px;
			margin-right: 0;
			max-width: 300px;
			width: 100%;
			margin-bottom: 30px;
		}
		input {
			width: 100%;
			height: 100%;
			background: transparent;
		}
	}
	&__button {
		padding: 10px 15px;
		background-color: #4a4ae9;
		color: #fff;
	}
	&__personal {
		font-size: 13px;
	}
}
</style>