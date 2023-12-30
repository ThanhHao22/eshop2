window.addEventListener('load', function () {
    let cart_list = document.querySelectorAll('.cart_list')
    const CartContents = document.querySelectorAll('.cart_list');
    let cart_total_price = document.querySelectorAll('.cart_total_price')
    let product_list = document.querySelectorAll('.product-area')
    const checkout = document.querySelectorAll('.checkout_abc');
    const emptyCart = document.querySelectorAll('.mini_cart_empty');
    const btn_add_cart = document.querySelector('.btn-add-cart');
    const btn_remove = document.querySelectorAll('.btn_remove');

    product_list.forEach((item) => {
        item.addEventListener('click', function (e) {
            if (e.target.matches('.add-link i')) {
                let user = e.target.parentElement.dataset.user;
                console.log(user)
                if (+user <= 0) {
                    alert('Please login to continue!')
                } else {

                    console.log(e.target)
                    let id = e.target.parentElement.dataset.id
                    console.log(id);
                    let number = 1
                    let url = e.target.parentElement.dataset.url
                    console.log(url)
                    let path_img = e.target.parentElement.dataset.path
                    addToCart(id, number, url, path_img, true)
                }
            }
        })
    })

    cart_list.forEach((item) => {
        item.addEventListener('click', function (e) {
            if (e.target.matches('.cart_remove i')) {
                console.log(e.target);
                let id = e.target.parentElement.dataset.id
                console.log(id);
                let url = e.target.parentElement.dataset.url
                console.log(url);
                console.log(e);
                removeCart(e, id, url);
            }
        })
    })
    let quantity = document.getElementById('quantity');
    btn_add_cart?.addEventListener('click', function (e) {
        e.preventDefault()
        // console.log(e.target);
        if (e.target.matches('.btn-add-cart')) {
            let user = e.target.dataset.user;
            console.log(user)
            if (+user <= 0) {
                alert('Please login to continue!')
            } else {
                let id = e.target.dataset.id
                console.log(id);
                let number = +quantity.value
                let url = e.target.dataset.url
                console.log(url);
                let path_img = e.target.dataset.path
                console.log(path_img);
                addToCart(id, number, url, path_img, true)
            }
        }

    })

    btn_remove?.forEach((item) => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            console.log(e.target);
            let id = e.target.dataset.id
            console.log(id);
            let url = e.target.dataset.url
            console.log(url);
            console.log(e);
            removeCart(e, id, url);
        })
    })


    function removeCart(e, id, url) {
        $.ajax({
            type: "POST",
            url: url + "/removeCart",
            data: { id },
            dataType: "text",
            success: function (data) {
                // console.log(data)
                let response = JSON.parse(data);
                if (response.length <= 0) {
                    checkout.forEach((item, key) => {
                        item.classList.add('d-none');
                        emptyCart[key].classList.remove('d-none');
                    })
                } else {
                    checkout.forEach((item, key) => {

                        item.classList.remove('d-none');
                        emptyCart[key].classList.add('d-none');
                    })
                }
                // if (page == 'cart') {
                cart_list.forEach(item => {
                    let removes = item.querySelectorAll('li');
                    removes.forEach(item2 => {
                        if (item2.dataset.id === id) {
                            item2.remove();
                        }
                    })
                })
                e.target.parentElement.parentElement.parentElement.remove();
     
                let cart_notice = document.querySelectorAll('.cart-notice')
                let sum = 0;
                let totalLength = 0;
                response.forEach((item) => {
                    sum += +item.total;
                    totalLength += +item.number;
                });

                cart_total_price.forEach((item) => {
                    item.textContent = formatter.format(sum);
                })

                cart_notice.forEach((item) => {
                    item.textContent = totalLength;
                })
            },
            error: function (e) {
                console.log(e);
            },
        });
    }

    var formatter = new Intl.NumberFormat("vi-VN", {
        style: "currency",
        currency: "VND",
    });
    const cartItemRow = document.querySelectorAll('.item_cart');
    function addToCart(id, number, url, path_img, msg = false) {

        $.ajax({
            type: "POST",
            url: url + "/addCart",
            data: { id, number },
            dataType: "text",
            success: function (data) {
                let response = JSON.parse(data);

                let sum = 0;
                let totalLength = 0;
                let cart_notice = document.querySelectorAll('.cart-notice')
                console.log(cart_notice);
                CartContents.forEach(item => {
                    item.innerHTML = ''
                })

                response.forEach((item) => {
                    sum += +item.total;
                    totalLength += +item.number;
                    renderItemCart(item, path_img, url);
                    cartItemRow.forEach((item2, key) => {
                        if (+item2.dataset.id == +item.id) {
                            console.log(item2.dataset.id)
                            console.log(id)
                            console.log(item2)

                            item2.querySelector('.sum').textContent = formatter.format(+item.total);

                        }
                    })
                });
                cart_notice.forEach(item => {
                    item.textContent = totalLength;
                })
                checkout.forEach((item, key) => {

                    item.classList.remove('d-none');
                    emptyCart[key]?.classList.add('d-none');
                })
                cart_total_price.forEach(item => {
                    item.textContent = formatter.format(sum);

                })

                if (msg) {
                    Swal.fire({
                        position: "center-center",
                        icon: "success",
                        title: "Product added to cart successfully",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            },
            error: function (e) {
                console.log(e);
            },
        });
    }

    increase = document.querySelectorAll('.increase')
    number = document.querySelectorAll('.number')
    const list_Cart = document.querySelector('.list_cart');
    list_Cart?.addEventListener('click', function (e) {
        if (e.target.matches('.increase')) {
            let number = e.target.parentElement.previousElementSibling;
            let numberCurrent = +number.textContent + 1
            number.textContent = numberCurrent;
            let id = e.target.parentElement.dataset.id
            console.log(id);
            let url = e.target.parentElement.dataset.url
            console.log(url);
            let path_img = e.target.parentElement.dataset.path
            console.log(path_img);
            addToCart(id, 1, url, path_img)

        }
        if (e.target.matches('.decrease')) {
            let number = e.target.parentElement.nextElementSibling;
            if (+number.textContent > 1) {
                let numberCurrent = +number.textContent - 1
                number.textContent = numberCurrent;
            } else {
                alert('Quantity must be than 0')
                return
            }
            let id = e.target.parentElement.dataset.id
            console.log(id);
            let url = e.target.parentElement.dataset.url
            console.log(url);
            let path_img = e.target.parentElement.dataset.path
            console.log(path_img);
            addToCart(id, -1, url, path_img)

        }
    })



    function renderItemCart(item, path_img, url) {
        let template = `<li class="cart_item" data-id="${item.id}">
        <div class="cart_img_section">
            <a href="#" class="cart_img_link">
                <img src="${path_img}${item.image}" alt="cart_img_1" class="cart_img">
            </a>
        </div>
        <div class="cart_info">
            <a href="#" class="cart_title">${item.name}</a>
            <span class="mini_cart_qty">${item.number} X <span class="mini_cart_price">${item.price}</span></span>
        </div>

        <div class="cart_remove">
            <span data-id="${item.id}" data-url="${url}" href="#" class="cart_remove_link">
                <i class="fa-solid fa-xmark"></i>
            </span>
        </div>
    </li>`;
        CartContents.forEach(item => {
            item.insertAdjacentHTML('beforeend', template);
        })
    }

});

