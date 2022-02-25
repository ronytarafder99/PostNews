jQuery(document).ready(function () {
    // header more Btn
    jQuery('.always_show').click(function () {
        jQuery('.drop_nav_menu_container').slideToggle();
    })

    // open Search
    var searchoutput = jQuery('.search_inner');
    jQuery('.search_icon').on('click', function () {
        searchoutput.animate({
            width: "toggle"
        }, function () {
            // remove the Search overlay when clicking outside the Search
            jQuery(document).one('click', function (e) {
                if (!searchoutput.is(e.target) && searchoutput.has(e.target).length === 0) {
                    searchoutput.animate({
                        width: "toggle"
                    });
                }
            });
        });
    });

    jQuery('#search_close').click(function () {
        searchoutput.animate({
            width: "toggle"
        });
    });

    jQuery('.always_show').mouseover(function () {
        jQuery('.drop_nav_menu_container').show();
    });
    jQuery('.always_show').mouseout(function () {
        jQuery('.drop_nav_menu_container').hide();
    });
    jQuery('.drop_nav_menu_container').mouseover(function () {
        jQuery('.drop_nav_menu_container').show();
    });
    jQuery('.drop_nav_menu_container').mouseout(function () {
        jQuery('.drop_nav_menu_container').hide();
    });

    jQuery("#fontPlus").click(function () {
        var fontSize = parseInt(jQuery("p").css("font-size"));
        fontSize = fontSize + 5 + "px";
        jQuery('p').css({
            'font-size': fontSize
        });
    });

    jQuery("#fontmines").click(function () {
        var fontSize = parseInt(jQuery("p").css("font-size"));
        if (fontSize <= 16)
            return
        fontSize = fontSize - 3 + "px";
        jQuery('p').css({
            'font-size': fontSize
        });
    });
    jQuery("#fontdefult").click(function () {
        var fontSize = parseInt(jQuery("p").css("font-size"));
        jQuery('p').css({
            'font-size': 1 + "em"
        });
    });

    // mobile Drop Menu
    jQuery('#bars').click(function () {
        jQuery('.search_icon').toggle();
        jQuery('.scrollmenu').toggle();
        jQuery('.header_mobile_menu').toggle();
    });
    jQuery('.cross_icon').click(function () {
        jQuery('.search_icon').toggle();
        jQuery('.scrollmenu').toggle();
        jQuery('.header_mobile_menu').toggle();
    });

    // Tab post(Leatest-popular)
    jQuery('.leatest_btn').addClass("opened");
    jQuery('.second_item').hide();
    jQuery('.leatest_btn').click(function () {
        jQuery('.leatest_btn').addClass("opened");
        jQuery('.popular_btn').removeClass("opened");
        jQuery('.second_item').hide();
        jQuery('.first_item').show();
    });
    jQuery('.popular_btn').click(function () {
        jQuery('.popular_btn').addClass("opened");
        jQuery('.leatest_btn').removeClass("opened");
        jQuery('.first_item').hide();
        jQuery('.second_item').show();
    });

    // Sticky Nav
    var navoffset = jQuery(".bottom_parent").offset().top;

    jQuery(".bottom_parent").wrap('<div class="nav-placeholder"></div>');
    jQuery(".nav-placeholder").height(jQuery(".bottom_parent").outerHeight());

    jQuery(window).scroll(function () {
        var scrollpos = jQuery(window).scrollTop();
        if (scrollpos >= navoffset) {
            jQuery(".bottom_parent").addClass("fixed");
        } else {
            jQuery(".bottom_parent").removeClass("fixed");
        };
    });


    /* Ajax functions for cat*/
    jQuery(document).on('click', '.sunset-load-more', function () {

        var that = jQuery(this);
        var page = jQuery(this).data('page');
        var newPage = page + 1;
        var ajaxurl = that.data('url');
        var cat = that.data('category');
        jQuery('.animation_image').css("display", "block");

        jQuery.ajax({

            url: ajaxurl,
            type: 'post',
            data: {
                cat: cat,
                page: page,
                action: 'sunset_load_more'

            },
            error: function (response) {
                console.log(response);
            },
            success: function (response) {

                jQuery('.animation_image').css("display", "none");
                that.data('page', newPage);
                jQuery('.sunset-posts-container').append(response);

            }
        });
    });

    // Url Copy to clipboard (Single page)
    var jQuerytemp = jQuery("<input>");
    var jQueryurl = jQuery(location).attr('href');

    jQuery('.fa-clone').on('click', function () {
        jQuery("body").append(jQuerytemp);
        jQuerytemp.val(jQueryurl).select();
        document.execCommand("copy");
        jQuerytemp.remove();
        var x = document.getElementById("toast")
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
    })

    // print
    function printData() {
        var divToPrint = document.getElementById("printTable");
        newWin = window.open("");
        newWin.document.write(divToPrint.outerHTML);
        newWin.print();
        newWin.close();
    }

    jQuery('.fa-print').on('click', function () {
        printData();
    })
});

function myFunction(x) {
    x.classList.toggle("change");
}

//Go to top button
var mybutton = document.getElementById("myBtn");

window.onscroll = function () {
    scrollFunction()
};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        mybutton.style.display = "block";
    } else {
        mybutton.style.display = "none";
    }
}

function topFunction() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
};

// Map
jQuery('select[name="bd_division"]').on('change', function () {
    var sel_div = jQuery(this).val();
    jQuery('select[name="bd_district"] option').css('display', 'none');
    jQuery('select[name="bd_district"]').val('');
    jQuery('select[name="bd_thana"]').val('');

    jQuery('select[name="bd_district"] .dist-' + sel_div).css('display', 'block');
});

jQuery('select[name="bd_district"]').on('change', function () {
    var sel_div = jQuery(this).val();
    jQuery('select[name="bd_thana"] option').css('display', 'none');
    jQuery('select[name="bd_thana"]').val('');

    jQuery('select[name="bd_thana"] .thana-' + sel_div).css('display', 'block');
});

jQuery('.dist_news_srch').on('click', function () {
    var div_data = '',
        dist_data = '';
    if (jQuery('select[name="bd_division"] option:selected').attr('data-val'))
        div_data = jQuery('select[name="bd_division"] option:selected').attr('data-val');

    if (jQuery('select[name="bd_district"] option:selected').attr('data-val'))
        dist_data = jQuery('select[name="bd_district"] option:selected').attr('data-val');

    var thana_data = jQuery('select[name="bd_thana"]').val();

    if (div_data == '') {
        alert('please select the division first');
        jQuery('select[name="bd_division"]').focus();
        return false;
    }

    URL = div_data;
    if (dist_data != '') URL = dist_data;
    if (thana_data != '') URL = thana_data;
    window.location.href = URL;

    return false;
});