(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})();

window.addEventListener('scroll', function () {
    document.getElementById('header-nav').classList.toggle('headernav-scroll', window.scrollY > 135);
});

// const offcanvasCartEl = document.getElementById('offcanvasCart');
// const offcanvasCart = new bootstrap.Offcanvas(offcanvasCartEl);

// document.getElementById('cart-open').addEventListener('click', (e) => {
//     e.preventDefault();
//     offcanvasCart.toggle();
// });

// document.querySelectorAll('.closecart').forEach(item => {
//     item.addEventListener('click', (e) => {
//         e.preventDefault();
//         offcanvasCart.hide();
//         let href = item.dataset.href;
//         document.getElementById(href).scrollIntoView();
//     });
// });


jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('#top').fadeIn();
        } else {
            $('#top').fadeOut();
        }
    });

    $('#top').click(function () {
        $('html, body').animate({ scrollTop: 0 }, 500);
        return false;
    });

    $(".owl-carousel-full").owlCarousel({
        margin: 20,
        responsive: {
            0: {
                items: 1
            },
            500: {
                items: 2
            },
            700: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    });
    // евент вукомерс к добавлению в корзину

    $('body').on('adding_to_cart', function (e, btn, data) {
        btn.closest('.product-card').find('.product-loader').fadeIn()
    })

    $('body').on('added_to_cart', function (e, response_fragments, response_cart_hash, btn) {
        btn.closest('.product-card').find('.product-loader').fadeOut()
    })

    $(document).on('click', '.btn-plus, .btn-minus', function(){
        let input = $(this).closest('.input-group').find('input')
        let value = input.val()
        
        if($(this).hasClass('btn-plus')) value++
        if($(this).hasClass('btn-minus') && value > 1) value--
        input.val(value)

        $('.update_cart').attr('disabled', false)
    })
});

Fancybox.bind("[data-fancybox]", {
    // Your custom options
  });

