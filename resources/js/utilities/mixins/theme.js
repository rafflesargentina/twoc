
/*!
 *
 * Directory Theme 1.0.0
 * Copyright 2019 - Bootstrapious.com
 *
 */

export const theme = {
    mounted() {

        // ------------------------------------------------------- //
        //   Lightbox in galleries
        // ------------------------------------------------------ //

        window.$(".slider-gallery").each(function () { // the containers for all your galleries
            window.$(this).magnificPopup({
                delegate: "a", // the selector for gallery item
                type: "image",
                gallery: {
                    enabled: true,
                    tCounter: "" // markup of counter
                }
            })
        })

        window.$(".gallery").each(function () { // the containers for all your galleries
            window.$(this).magnificPopup({
                delegate: "a", // the selector for gallery item
                type: "image",
                gallery: {
                    enabled: true
                }
            })
        })

        // =====================================================
        //     Reset input
        // =====================================================

        window.$(".input-reset .form-control").on("focus", function () {
            window.$(this).parents(".input-reset").addClass("focus")
        })
        window.$(".input-reset .form-control").on("blur", function () {
            setTimeout(function () {
                window.$(".input-reset .form-control").parents(".input-reset").removeClass("focus")
            }, 333)

        })

        this.setSwiper()

        // ------------------------------------------------------- //
        //   Scroll to top button
        // ------------------------------------------------------ //

        window.$(window).on("scroll", function () {
            if (window.$(window).scrollTop() >= 1500) {
                window.$("#scrollTop").fadeIn()
            } else {
                window.$("#scrollTop").fadeOut()
            }
        })


        window.$("#scrollTop").on("click", function () {
            window.$("html, body").animate({
                scrollTop: 0
            }, 1000)
        })

        // ------------------------------------------------------- //
        // Adding fade effect to dropdowns
        // ------------------------------------------------------ //

        window.$.fn.slideDropdownUp = function () {
            window.$(this).fadeIn().css("transform", "translateY(0)")
            return this
        }
        window.$.fn.slideDropdownDown = function (movementAnimation) {

            if (movementAnimation) {
                window.$(this).fadeOut().css("transform", "translateY(30px)")
            } else {
                window.$(this).hide().css("transform", "translateY(30px)")
            }
            return this
        }

        window.$(".navbar .dropdown").on("show.bs.dropdown", function (e) {
            window.$(this).find(".dropdown-menu").first().slideDropdownUp()
        })
        window.$(".navbar .dropdown").on("hide.bs.dropdown", function (e) {

            var movementAnimation = true

            // if on mobile or navigation to another page
            if (window.$(window).width() < 992 || (e.clickEvent && e.clickEvent.target.tagName.toLowerCase() === "a")) {
                movementAnimation = false
            }

            window.$(this).find(".dropdown-menu").first().slideDropdownDown(movementAnimation)
        })

        // ------------------------------------------------------- //
        //    Collapse button control (used for more/less filters)
        // ------------------------------------------------------ //

        window.$(".btn-collapse").each(function () {
            var button = window.$(this),
                collapseId = button.attr("data-target")

            if (window.$(collapseId).length) {

                var collapseElement = window.$(collapseId)

                window.$(collapseElement).on("hide.bs.collapse", function () {
                    button.text(button.attr("data-collapsed-text"))
                })

                window.$(collapseElement).on("show.bs.collapse", function () {
                    button.text(button.attr("data-expanded-text"))
                })

            }
        })

        // ------------------------------------------------------- //
        //   Bootstrap tooltips
        // ------------------------------------------------------- //

        window.$("[data-toggle=\"tooltip\"]").tooltip()

        // ------------------------------------------------------- //
        //   Smooth Scroll
        // ------------------------------------------------------- //

        var smoothScroll = new SmoothScroll("a[data-smooth-scroll]", {
            offset: 80
        })
    },

    methods: {
        setSwiper() {
            // =====================================================
            //      Init swipers automatically
            // =====================================================

            window.$(".swiper-init").each(function () {

                var slider = window.$(this),
                    configuration = JSON.parse(window.$(this).attr("data-swiper"))

                new window.Swiper(slider, configuration)
            })

            var itemsSliderFull = new window.Swiper(".items-slider-full", {
                slidesPerView: 6,
                spaceBetween: 20,
                loop: true,
                roundLengths: true,
                breakpoints: {
                    1600: {
                        slidesPerView: 5
                    },
                    1400: {
                        slidesPerView: 4
                    },
                    1200: {
                        slidesPerView: 3
                    },
                    991: {
                        slidesPerView: 2
                    },
                    565: {
                        slidesPerView: 1
                    }
                },

                // If we need pagination
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true
                },
            })

            var guidesSlider = new window.Swiper(".guides-slider", {
                slidesPerView: 5,
                spaceBetween: 15,
                loop: true,
                roundLengths: true,
                breakpoints: {
                    1200: {
                        slidesPerView: 4
                    },
                    991: {
                        slidesPerView: 3
                    },
                    768: {
                        slidesPerView: 2
                    },
                    400: {
                        slidesPerView: 1
                    }
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true
                },
            })

            var brandsSlider = new window.Swiper(".brands-slider", {
                slidesPerView: 6,
                spaceBetween: 15,
                loop: true,
                roundLengths: true,
                breakpoints: {
                    1200: {
                        slidesPerView: 4
                    },
                    991: {
                        slidesPerView: 3
                    },
                    768: {
                        slidesPerView: 2
                    }
                },
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true
                },
            })

            var swiper = new window.Swiper(".hero-slider", {
                effect: "fade",
                speed: 2000,
                allowTouchMove: false,
                autoplay: {
                    delay: 10000,
                },
            })

            var instagramSlider = new window.Swiper(".instagram-slider", {
                slidesPerView: 12,
                breakpoints: {
                    1500: {
                        slidesPerView: 10
                    },
                    1200: {
                        slidesPerView: 8
                    },
                    991: {
                        slidesPerView: 6
                    },
                    768: {
                        slidesPerView: 5
                    },
                    576: {
                        slidesPerView: 4
                    }
                }
            })

            // =====================================================
            //      Items slider
            // =====================================================
    
            var testimonialsSlider = new window.Swiper(".testimonials-slider", {
                slidesPerView: 2,
                spaceBetween: 20,
                loop: true,
                roundLengths: true,
                breakpoints: {
                    1200: {
                        slidesPerView: 3,
                        spaceBetween: 0
                    },
                    991: {
                        slidesPerView: 2,
                        spaceBetween: 0
                    },
                    565: {
                        slidesPerView: 1
                    }
                },

                // If we need pagination
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                    dynamicBullets: true
                },
            })
        }
    }
}
