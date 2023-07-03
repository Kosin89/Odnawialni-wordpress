// --------------------ZMIENNE------------------

//nav
const nav = document.querySelector(".nav")
const navBtn = document.querySelector(".burger-btn")
const allNavItems = document.querySelectorAll(".nav__item")
const navBtnBars = document.querySelector(".burger-btn__bars")
const allSections = document.querySelectorAll(".section")
const footerYear = document.querySelector(".footer__year")
//galeria
const galleryPhoto = document.querySelectorAll(".gallery__photo img")
const popup = document.querySelector(".popup")
const popupClose = document.querySelector(".popup__close")
const popupImg = document.querySelector(".popup__img")
const arrowLeft = document.querySelector(".popup__arrow--left")
const arrowRight = document.querySelector(".popup__arrow--right")
let currentImgIndex
//scroll-bar
const btnTop = document.querySelector(".scroll-to-top")
let root = document.documentElement
//animacje
const boxes = document.querySelectorAll(".box")
const cards = document.querySelectorAll(".card")
const textAnimationElement = document.querySelector(".text-animation")

// ------------------FUNKCJE------------------

//nav
const handleNav = () => {
	nav.classList.toggle("nav--active")

	navBtnBars.classList.remove("black-bars-color")

	allNavItems.forEach(item => {
		item.addEventListener("click", () => {
			nav.classList.remove("nav--active")
		})
	})

	handleNavItemsAnimation()
}

const handleNavItemsAnimation = () => {
	let delayTime = 0

	allNavItems.forEach(item => {
		item.classList.toggle("nav-items-animation")
		item.style.animationDelay = "." + delayTime + "s"
		delayTime++
	})
}

const handleObserver = () => {
	const currentSection = window.scrollY

	allSections.forEach(section => {
		if (section.classList.contains("white-section") && section.offsetTop <= currentSection + 60) {
			navBtnBars.classList.add("black-bars-color")
		} else if (!section.classList.contains("white-section") && section.offsetTop <= currentSection + 60) {
			navBtnBars.classList.remove("black-bars-color")
		}
	})
}

const handleCurrentYear = () => {
	const year = new Date().getFullYear()
	footerYear.innerText = year
}

//galeria
const showNextImg = () => {
	if (currentImgIndex === galleryPhoto.length - 1) {
		currentImgIndex = 0
	} else {
		currentImgIndex++
	}
	popupImg.src = galleryPhoto[currentImgIndex].src
}

const showPreviousImg = () => {
	if (currentImgIndex === 0) {
		currentImgIndex = galleryPhoto.length - 1
	} else {
		currentImgIndex--
	}
	popupImg.src = galleryPhoto[currentImgIndex].src
}

const closePopup = () => {
	popup.classList.add("fade-out")
	setTimeout(() => {
		popup.classList.add("hidden")
		popup.classList.remove("fade-out")
		galleryPhoto.forEach(element => {
			element.setAttribute("tabindex", 1)
		})
	}, 300)
}

galleryPhoto.forEach((thumbnail, index) => {
	const showPopup = e => {
		popup.classList.remove("hidden")
		popupImg.src = e.target.src
		currentImgIndex = index
		galleryPhoto.forEach(element => {
			element.setAttribute("tabindex", -1)
		})
	}

	thumbnail.addEventListener("click", showPopup)

	thumbnail.addEventListener("keydown", e => {
		if (e.code === "Enter" || e.keyCode === 13) {
			showPopup(e)
		}
	})
})

document.addEventListener("keydown", e => {
	if (!popup.classList.contains("hidden")) {
		if (e.code === "ArrowRight" || e.keyCode === 39) {
			showNextImg()
		}

		if (e.code === "ArrowLeft" || e.keyCode === 37) {
			showPreviousImg()
		}

		if (e.code === "Escape" || e.keyCode === 27) {
			closePopup()
		}
	}
})

popup.addEventListener("click", e => {
	if (e.target === popup) {
		closePopup()
	}
})

//accordion
const accordHeaders = document.querySelectorAll(".faq__header")
let currentItemIndex

const toggleItem = index => {
	accordHeaders.forEach((ach, idx) => {
		const contentEle = ach.nextElementSibling
		if (idx === index) {
			contentEle.classList.toggle("collapse")
		} else {
			contentEle.classList.add("collapse")
		}
	})
}

accordHeaders.forEach((header, index) => {
	header.addEventListener("click", () => toggleItem(index))
})

//scroll-bar
const handleScrollBar = () => {
	const scroll = window.scrollY

	const leftToScroll = document.body.getBoundingClientRect().height - window.innerHeight

	const scrollBarWidth = Math.floor((scroll / leftToScroll) * 100 + 0.1)
	console.log(scrollBarWidth)

	root.style.setProperty("--scroll-width", `${scrollBarWidth}%`)

	if (scrollBarWidth > 70) {
		btnTop.classList.add("scroll-to-top-active")
	} else {
		btnTop.classList.remove("scroll-to-top-active")
	}
}

const scrollToTop = () => {
	window.scroll({
		top: 0,
		behavior: "smooth",
	})
}

// animacje
function checkElements() {
	const triggerBottom = (window.innerHeight / 4) * 3
	const triggerTop = (window.innerHeight / 4) * 6
	const triggerTextAnimation = window.innerHeight - 100

	cards.forEach((card, index) => {
		const cardTop = card.getBoundingClientRect().top
		if (cardTop < triggerTop) {
			card.style.transitionDelay = `${index * 0.2}s`
			card.classList.add("show")
		} else {
			card.style.transitionDelay = "0s"
			card.classList.remove("show")
		}
	})

	boxes.forEach(box => {
		const boxTop = box.getBoundingClientRect().top
		if (boxTop < triggerBottom) {
			box.classList.add("show")
		} else {
			box.classList.remove("show")
		}
	})

	const textAnimationTop = textAnimationElement.getBoundingClientRect().top
	if (textAnimationTop < triggerTextAnimation) {
		textAnimationElement.classList.add("fade-in")
	}
}

document.addEventListener("DOMContentLoaded", function () {
	const headerAnimation = document.querySelector(".header-animation")
	headerAnimation.classList.add("fade-in")
})


//---------------POPUP OFERTA-----------------------

document.querySelectorAll('.btn-offer-popup, .nav__drop-item').forEach((element) => {
    element.addEventListener('click', function() {
        const popupNumber = element.dataset.popupNumber || (Array.from(element.parentElement.parentElement.children).indexOf(element.parentElement) + 1);
        openOfferPopup(popupNumber);
    });
});

function openOfferPopup(number) {
    const popup = document.getElementById(`offerPopup${number}`);
    if (!popup) return; 
    popup.style.display = 'block';

    window.addEventListener('click', function(event) {
        if (event.target === popup) {
            closeOfferPopup(number);
        }
    });
}

function closeOfferPopup(number) {
    const popup = document.getElementById(`offerPopup${number}`);
    if (!popup) return; 
    popup.style.display = 'none';
}


document.querySelectorAll('.close-offer').forEach((closeBtn) => {
    closeBtn.addEventListener('click', function() {
        const popup = closeBtn.closest('.offer-popup');
        popup.style.display = 'none';
    });
});



// ---------------------WYWOŁANIA---------------------

//nav
handleCurrentYear()
navBtn.addEventListener("click", handleNav)
window.addEventListener("scroll", handleObserver)
//galeria
popupClose.addEventListener("click", closePopup)
arrowRight.addEventListener("click", showNextImg)
arrowLeft.addEventListener("click", showPreviousImg)
//scroll-bar
window.addEventListener("scroll", handleScrollBar)
btnTop.addEventListener("click", scrollToTop)
//animacje
window.addEventListener("scroll", checkElements)
checkElements()











