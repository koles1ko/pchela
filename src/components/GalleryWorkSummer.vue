<template>
	<!--	<h4>{{ test1 }}</h4>-->
	<!--	{{ ass }}-->
	<div class="gallery-list flex-body">
		<div class="gallery-list__item" v-for="(image, index) in images " :key="image">
			<img :src="require('../assets/images/works/foto-kond-'+image+'.jpg')"
				 alt=""
				 :idx="index"
				 @click="show(index)">
		</div>
	</div>
	<div class="gallery-screen" v-if="visible" @click="hide">
		<div class="gallery-screen__body" @click.stop="">
			<div class="gallery-screen__prev" v-if="boolPrev" @click.stop="prev">
				<span></span>
			</div>
			<div class="gallery-screen__picture">
				<img :src="require('../assets/images/works/foto-kond-' + images[index] + '.jpg')" alt="">
			</div>
			<div class="gallery-screen__next" v-if="boolNext" @click.stop="next">
				<span></span>
			</div>
			<div class="gallery-screen__close" @click="hide">
				<span></span><span></span>
			</div>
		</div>
	</div>
</template>

<script>
export default {
	name: "GalleryWork",
	components: [],
	props: {},
	data() {
		return {
			visible: false,
			index: 0,
			boolPrev: false,
			boolNext: false,
			images: ['1', '2', '3', '4', '5', '6', '7', '8', '9'],
			body: document.querySelector('body'),
			// test: this.images.length
			// test: this.images,
			// a: this.test1
		}
	},
	methods: {

		hasPrev() {
			this.boolPrev = this.index - 1 >= 0
		},
		hasNext() {
			let tempImages = JSON.parse(JSON.stringify(this.images))
			// console.log(this.test)
			// console.log(this.index)
			// console.log(typeof tempImages.length)
			this.boolNext = this.index < tempImages.length - 1
			// console.log('boolNext: ', this.boolNext)
			// return this.images[this.index + 1] < this.images.length
		},
		next() {
			if (this.boolNext) {
				this.index += 1;
				this.hasNext();
				this.hasPrev();
			}
		},
		prev() {
			if (this.boolPrev) {
				this.index -= 1;
				this.hasNext();
				this.hasPrev();
			}
		},
		show(idx) {
			this.index = idx;
			this.visible = true;
			// console.log(this.hasPrev())
			this.hasPrev();
			this.hasNext();
			// if (this.visible) {
				// let
				this.body.classList.add('opened-gallery')
				// console.log(test)
			// }
			// console.log(this.hasNext())
			// console.log(this.index)
		},
		hide() {
			this.index = 0;
			this.visible = false;
			this.body.classList.remove('opened-gallery')
		},

	},
	mounted() {
		// let ttt = ;
		// console.log(ttt);
		// console.log(this.images)
		// console.log(...this.images)
		// console.log(this.images)
		// console.log(this.hasPrev())
		// console.dir(this.ass)
		// console.log(this.works)
	}

}
</script>

<style scoped lang="scss">
.gallery-list {
	flex-wrap: wrap;
	&__item {
		flex: 0 1 calc(33.333% - 15px);
		margin-bottom: 20px;
		max-height: 250px;
		@media (max-width: 480px) {
			flex: 0 1 100%;
		}
		&:hover {
			cursor: zoom-in;
		}
		img {
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	}
}
.gallery-screen {
	position: fixed;
	background-color: rgba(black, .96);
	width: 100vw;
	height: 100vh;
	display: flex;
	justify-content: center;
	align-items: center;
	left: 0;
	top: 0;
	z-index: 100;

	&__body {
		//background-color: white;
		//width: 500px;
		max-width: calc(100vw - 200px);
		//height: auto;
		height: calc(100% - 150px);
		position: relative;

		//img {
		//	width: 100%;
		//	height: 100%;
		//	display: block;
		//}
	}

	&__picture {
		width: 100%;
		height: 100%;
		display: flex;
		align-items: center;
		justify-content: center;
		img	{
			width: 100%;
			height: 100%;
			object-fit: contain;
			display: block;
		}
	}

	&__prev,
	&__next {
		position: absolute;
		top: 50%;
		transform: translateY(-50%);
		padding: 10px;
		&:hover {
			cursor: pointer;
		}
		span {
			width: 20px;
			height: 20px;
			display: block;
			border: 3px solid white;
			border-left: none;
			border-bottom: none;
		}
	}
	&__prev {
		left: -60px;
		span {
			transform: rotate(-135deg);
		}
	}
	&__next {
		right: -60px;
		span {
			transform: rotate(45deg);
		}
	}

	&__close {
		position: absolute;
		top: -50px;
		right: 20px;
		width: 30px;
		height: 30px;
		display: block;
		&:hover {
			cursor: pointer;
		}
		span {
			position: absolute;
			left: 0;
			right: 0;
			top: 50%;
			display: block;
			height: 3px;
			width: 100%;
			transform-origin: center center;
			background-color: #fff;
			&:first-child {
				transform: rotate(45deg);
			}
			&:last-child {
				transform: rotate(-45deg);
			}
		}
	}

}
</style>