!(function (e) {
    "use strict";
    e(document).ready(function () {
        e(".preloader").fadeOut("slow");
    }),
        e("[data-background]").each(function () {
            e(this).css("background-image", "url(" + e(this).attr("data-background") + ")");
        });
    var t = !1;
    const a = () => {
        "true" == localStorage.getItem("isDarkMode")
            ? (e("body").addClass("dark-mode"), e(".change-mode i").attr("class", "ri-sun-fill", "ri-sun-line"), (t = !0), e(".change-mode").addClass("dark-mode"))
            : (e(".change-mode i").attr("class", "ri-sun-line", "ri-sun-fill"), e("body").removeClass("dark-mode"), e("body").addClass("light-mode"), (t = !1), e(".change-mode").removeClass("dark-mode"));
    };
    e(".change-mode").on("click", function () {
        (t = !t), localStorage.setItem("isDarkMode", t), e(".change-mode").toggleClass("dark-mode"), a();
    }),
        e(document).ready(() => {
            a();
        }),
        e(function () {
            e(".dropdown-toggle").click(function () {
                e(this).next(".dropdown").slideToggle();
            }),
                e(document).click(function (t) {
                    var a = t.target;
                    e(a).is(".dropdown-toggle") || e(a).parents().is(".dropdown-toggle") || e(".dropdown").slideUp();
                });
        }),
        e(document).ready(function () {
            e(".custom-accordion > .single-accordion > .accordion-body").hide(),
                e(document).on("click", ".course-section-title", (t) => {
                    e(".course-section-title").toggleClass("active"), e(".custom-accordion > .single-accordion > .accordion-body").slideUp(), e(t.target).next().show();
                });
        }),
        e(document).on("click", ".close-icon, .custom-modal-overlay", function () {
            e(".modal-wrapper, .custom-modal-overlay").removeClass("active");
        }),
        e(document).on("click", ".popup-modal", function () {
            e(".modal-wrapper, .custom-modal-overlay").addClass("active");
        }),
        (function () {
            var t = document.getElementById("ot-sidebar");
            if (e("#ot-sidebar").length > 0) {
                var a = document.getElementsByClassName("ot-sidebar-overlay")[0],
                    n = document.getElementById("otSidebarBtnClose"),
                    o = document.getElementById("otSidebarBtnOpen"),
                    i = function (e) {
                        (e.cancelBubble = !0), (a.style.width = "0"), (t.style.left = "-80%");
                    };
                a.addEventListener("click", i),
                    n.addEventListener("click", i),
                    o.addEventListener("click", function () {
                        (a.style.width = "100%"), (t.style.left = "0");
                    });
            }
        })(),
        e(window).on("scroll", function () {
            e(window).scrollTop() < 50 ? (e(".header-sticky").removeClass("sticky-bar"), e("#back-top").fadeOut(500)) : (e(".header-sticky").addClass("sticky-bar"), e("#back-top").fadeIn(500));
        });
    var n = document.getElementById("fileBrouse"),
        o = document.getElementById("fileBrouse2"),
        i = document.getElementById("fileBrouse3");
    document.getElementById("fileBrouse4");
    if (n) {
        function r(e) {
            var t = e.srcElement.files[0].name;
            document.getElementById("placeholder").placeholder = t;
        }
        n.addEventListener("change", r);
    }
    if (o) {
        function l(e) {
            var t = e.srcElement.files[0].name;
            document.getElementById("placeholder2").placeholder = t;
        }
        o.addEventListener("change", l);
    }
    if (i) {
        function c(e) {
            var t = e.srcElement.files[0].name;
            document.getElementById("placeholder3").placeholder = t;
        }
        i.addEventListener("change", c);
    }
    e(".tab-grid button").click(function () {
        e(this).addClass("active").siblings().removeClass("active");
    }),
        e(document).on("click", ".grid-view", function () {
            e(this).parent().parent().parent().parent().parent().parent().parent().find(".view-wrapper").addClass("col-xl-6").removeClass("col-xl-4 col-lg-6 col-md-6 col-sm-6"),
            e(this).parent().parent().parent().parent().parent().parent().parent().parent().find(".course-widget").addClass("grid-views");
        }),
        e(document).on("click", ".tab-view", function () {
            e(this).parent().parent().parent().parent().parent().parent().parent().find(".view-wrapper").removeClass("col-xl-6").addClass("col-xl-3 col-lg-6 col-md-6 col-sm-6"),
            e(this).parent().parent().parent().parent().parent().parent().parent().parent().find(".course-widget").removeClass("grid-views");
        }),
        (window.callBannerCarousel = () => {
            new Swiper(".banner-active", {
                pagination: { el: ".swiper-pagination", clickable: !0 },
                loop: !0,
                slidesPerView: 1,
                spaceBetween: 24,
                autoplay: !1,
                autoplay: { delay: 3500, disableOnInteraction: !1 },
                navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
            });
        }),
        (window.callBrandCarousel = () => {
            new Swiper(".brand-active", {
                pagination: { el: ".swiper-pagination", clickable: !0 },
                loop: !0,
                spaceBetween: 24,
                autoplay: { delay: 3500, disableOnInteraction: !1 },
                navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
                breakpoints: {
                    320: { slidesPerView: 1, spaceBetween: 10 },
                    768: { slidesPerView: 2, spaceBetween: 20 },
                    992: { slidesPerView: 3, spaceBetween: 20 },
                    1200: { slidesPerView: 4, spaceBetween: 40 },
                    1400: { slidesPerView: 5 },
                },
            });
        }),
        (window.callCategoriesCarousel = () => {
            new Swiper(".categories-active", {
                pagination: { el: ".swiper-pagination", clickable: !0 },
                loop: !0,
                slidesPerView: 6,
                spaceBetween: 24,
                autoplay: !1,
                autoplay: { delay: 3500, disableOnInteraction: !1 },
                navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
                breakpoints: {
                    320: { slidesPerView: 1, spaceBetween: 10 },
                    576: { slidesPerView: 2, spaceBetween: 10 },
                    768: { slidesPerView: 2, spaceBetween: 20 },
                    992: { slidesPerView: 4, spaceBetween: 20 },
                    1200: { slidesPerView: 6, spaceBetween: 20 },
                },
            });
        }),
        (window.callTestimonialCarousel = () => {
            new Swiper(".testimonial-active", {
                pagination: { el: ".swiper-pagination", clickable: !0 },
                loop: !0,
                slidesPerView: 3,
                autoplay: !1,
                autoplay: { delay: 3500, disableOnInteraction: !1 },
                navigation: { nextEl: ".swiper-button-next", prevEl: ".swiper-button-prev" },
                breakpoints: { 320: { slidesPerView: 1, spaceBetween: 10 }, 768: { slidesPerView: 2, spaceBetween: 20 }, 992: { slidesPerView: 3, spaceBetween: 20 } },
            });
        });
    var s = e("ul#navigation");
    if (
        (s.length && s.slicknav({ prependTo: ".mobile_menu", closedSymbol: "+", openedSymbol: "-" }),
        new WOW().init(),
        e(".nice-scroll").niceScroll({}),
        e(".tilt-effect").tilt({ maxTilt: 6, easing: "cubic-bezier(.03,.98,.52,.99)", speed: 500, transition: !0 }),
        e(".js-example-basic-single").select2({}),
        e(".js-example-disabled-results").select2(),
        e(".js-example-basic-multiple").select2(),
        e(".clear").on("click", function () {
            e(".single-search-tag").remove();
        }),
        e(".search-tags i").on("click", function () {
            e(this).parent().fadeOut();
        }),
        e(document).on("click", ".panel-sidebar-list .has-children a", function (t) {
            var a = e(this).parent(".has-children");
            a.hasClass("open")
                ? (a.removeClass("open"), a.find(".submenu").children(".has-children").removeClass("open"), a.find(".submenu").removeClass("open"), a.find(".submenu").slideUp(300, "swing"))
                : (a.addClass("open"), a.children(".submenu").slideDown(300, "swing"), a.siblings(".has-children").children(".submenu").slideUp(300, "swing"), a.siblings(".has-children").removeClass("open"));
        }),
        e(document).on("click", ".close-sidebar, .sidebar-body-overlay", function () {
            e(".panel-sidebar-close, .panel-sidebar, .sidebar-body-overlay").removeClass("active");
        }),
        e(document).on("click", ".sidebar-icon", function () {
            e(".panel-sidebar-close, .panel-sidebar, .sidebar-body-overlay").addClass("active");
        }),
        (function () {
            var t = document.querySelector(".progressParent path"),
                a = t?.getTotalLength();
            if (a) {
                (t.style.transition = t.style.WebkitTransition = "none"),
                    (t.style.strokeDasharray = a + " " + a),
                    (t.style.strokeDashoffset = a),
                    t.getBoundingClientRect(),
                    (t.style.transition = t.style.WebkitTransition = "stroke-dashoffset 10ms linear");
                var n = function () {
                    var n = e(window).scrollTop(),
                        o = e(document).height() - e(window).height(),
                        i = a - (n * a) / o;
                    t.style.strokeDashoffset = i;
                };
                n(), e(window).scroll(n);
                jQuery(window).on("scroll", function () {
                    jQuery(this).scrollTop() > 50 ? jQuery(".progressParent").addClass("rn-backto-top-active") : jQuery(".progressParent").removeClass("rn-backto-top-active");
                }),
                    jQuery(".progressParent").on("click", function (e) {
                        return e.preventDefault(), jQuery("html, body").animate({ scrollTop: 0 }, 550), !1;
                    });
            }
        })(),
        e(".daterange").length > 0 &&
            e(function () {
                var t = moment().subtract(29, "days"),
                    a = moment();
                function n(t, a) {
                    e(".daterange span, .daterange2 span").html(t.format("MMMM D, YYYY") + " - " + a.format("MMMM D, YYYY"));
                }
                e(".daterange, .daterange2").daterangepicker(
                    {
                        startDate: t,
                        endDate: a,
                        ranges: {
                            singleDatePicker: !0,
                            Today: [moment(), moment()],
                            Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                            "Last 7 Days": [moment().subtract(6, "days"), moment()],
                            "Last 30 Days": [moment().subtract(29, "days"), moment()],
                            "This Month": [moment().startOf("month"), moment().endOf("month")],
                            "Last Month": [moment().subtract(1, "month").startOf("month"), moment().subtract(1, "month").endOf("month")],
                        },
                    },
                    n
                ),
                    n(t, a);
            }),
        e("#apexChart-two").length > 0)
    ) {
        let d = {
            series: [83],
            chart: { type: "radialBar" },
            plotOptions: { radialBar: { dataLabels: { name: { fontSize: "15px" }, value: { fontSize: "18px" } } } },
            labels: ["Completed"],
            legend: { position: "bottom", show: !1, itemMargin: { horizontal: 12, vertical: 12 } },
            colors: ["#696cff"],
            fill: { colors: ["#696cff"] },
            responsive: [
                {
                    breakpoint: 575,
                    options: { chart: {}, legend: { position: "bottom", itemMargin: { horizontal: 2, vertical: 2 } }, plotOptions: { radialBar: { dataLabels: { name: { fontSize: "13px", margin: "0" }, value: { fontSize: "10px" } } } } },
                },
            ],
        };
        new ApexCharts(document.querySelector("#apexChart-two"), d).render();
    }
    if (e("#apexChart-one").length > 0) {
        let p = {
            series: [65, 60, 55, 45],
            chart: { type: "radialBar", height: 450, width: "100%" },
            stroke: { lineCap: "round" },
            plotOptions: {
                radialBar: {
                    hollow: { margin: 5, size: "45%", background: "transparent", image: void 0 },
                    dataLabels: {
                        name: { fontSize: "32px" },
                        value: { fontSize: "20px" },
                        total: {
                            show: !0,
                            label: "Total",
                            formatter: function (e) {
                                return 300;
                            },
                        },
                    },
                },
            },
            labels: ["Today", "weekly", "monthly", "yearly"],
            legend: { position: "bottom", show: !0, itemMargin: { horizontal: 12, vertical: 12 } },
            colors: ["#5A57FF", "#ED763A", "#5A57FF", "#ED763A"],
            fill: { colors: ["#5A57FF", "#ED763A", "#5A57FF", "#ED763A"] },
            responsive: [{ breakpoint: 575, options: { chart: {}, legend: { position: "bottom", itemMargin: { horizontal: 4, vertical: 4 }, markers: {} } } }],
        };
        new ApexCharts(document.querySelector("#apexChart-one"), p).render();
    }
    (window.PostRequest = (t, a) => (
        e.ajaxSetup({ headers: { "X-CSRF-TOKEN": e('meta[name="csrf_token"]').attr("content") } }),
        e
            .post(t, a)
            .then((e) => e)
            .catch((e) => {
                throw e;
            })
    )),
        e(".date-picker").each(function () {
            e(this).daterangepicker({ singleDatePicker: !0, showDropdowns: !0 });
        });
    e("input[name=tag]").tagify({ whitelist: [{ id: 1, value: "some string" }] });
    e(".payment-gateway-list .single-gateway-item").on("click", function () {
        e(".payment-gateway-list .single-gateway-item").removeClass("selected"), e(this).addClass("selected");
    });

    /*-----------------------------------
        Nab Pricing Nav
    -----------------------------------*/
    // $('.tab-menu li a').on('click', function(){
    //     var target = $(this).attr('data-rel');
    //     $('.tab-menu li a').removeClass('active');
    //     $(this).addClass('active');
    //     $("#"+target).fadeIn('slow').siblings(".singleTab-items").hide();
    //     return false;
    // });

    /*-----------------------------------
        chat-box message active single
    -----------------------------------*/
    $('.single-chat').click(function(){
        $(this).addClass('active');
        $(this).siblings().removeClass('active');
    })


})(jQuery);
