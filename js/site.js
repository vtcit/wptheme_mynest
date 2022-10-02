jQuery(function ($) {
    function owlGetArgs(ele) {
        var items = $(ele).data("items") || 1;
        var items_lg = $(ele).data("items-lg") || items;
        var items_md = $(ele).data("items-md") || 1;
        var items_sm = $(ele).data("items-sm") || 1;
        var items_xs = $(ele).data("items-xs") || 1;
        var margin = $(ele).data("margin") || 0;
        var stagepadding = $(ele).data("stagepadding") || 0;
        var loop = $(ele).data("loop") || true;
        var autoplay = $(ele).data("autoplay") || true;
        var autoplaytimeout = $(ele).data("autoplaytimeout") || 5000;
        var autoplayhoverpause = $(ele).data("autoplayhoverpause") || true;
        var nav = $(ele).data("nav") || true;
        var dots = $(ele).data("dots") || false;

        return {
            items: items,
            margin: margin,
            stagePadding: stagepadding,
            loop: loop,
            autoplay: autoplay,
            autoplayTimeout: autoplaytimeout,
            autoplayHoverPause: autoplayhoverpause,
            nav: nav,
            dots: dots,
            navText: [
                "<i class='fa fw fa-3x fa-angle-left'></i>",
                "<i class='fa fw fa-3x fa-angle-right'></i>",
            ],
            responsive: {
                0: {
                    items: items_xs,
                },
                768: {
                    items: items_sm,
                },
                992: {
                    items: items_md,
                },
                1200: {
                    items: items_lg,
                },
            },
        };
    }
    $(".owl-next").click(function () {
        $(this).closest(".owl-carousel").trigger("owl.next");
    });
    $(".owl-prev").click(function () {
        $(this).closest(".owl-carousel").trigger("owl.prev");
    });

    $("ul > li.menu-item-has-children").hover(
        function () {
            $(this).addClass("open");
        },
        function () {
            $(this).removeClass("open");
        }
    );
    $(".dropdown-menu, #primary-menu-list").on("shown.bs.dropdown", () =>
        $(".droplet").addClass("show")
    );
    $(".dropdown-menu, #primary-menu-list").on("hidden.bs.dropdown", () =>
        $(".droplet").removeClass("show")
    );

    if ($(".owl-carousel").length > 0) {
        $(".owl-carousel").each(function () {
            $(this).owlCarousel(owlGetArgs(this));
        });
    }
    $('a[data-toggle="tab"]').on("shown.bs.tab", function (e) {
        let parent_id = $(this).data("tab-parent") || "";
        if (parent_id !== "") {
            $(parent_id + ' a[data-toggle="tab"]').removeClass("active");
        }
        $(this).addClass("active");
    });
    $(".grid-controls-btns > a").click(function () {
        $(".grid-controls-btns > a").removeClass("active");
        $(this).addClass("active");
        $(".product-list")
            .removeClass(["list-view", "grid-view"])
            .addClass($(this).data("active"));
    });
});
