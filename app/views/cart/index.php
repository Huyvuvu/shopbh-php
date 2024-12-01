 <!-- Hero Section Begin -->
 <section class="hero hero-normal">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="hero__categories">
                     <div class="hero__categories__all">
                         <i class="fa fa-bars"></i>
                         <span>All departments</span>
                     </div>
                     <ul>
                         <li><a href="#">Fresh Meat</a></li>
                         <li><a href="#">Vegetables</a></li>
                         <li><a href="#">Fruit & Nut Gifts</a></li>
                         <li><a href="#">Fresh Berries</a></li>
                         <li><a href="#">Ocean Foods</a></li>
                         <li><a href="#">Butter & Eggs</a></li>
                         <li><a href="#">Fastfood</a></li>
                         <li><a href="#">Fresh Onion</a></li>
                         <li><a href="#">Papayaya & Crisps</a></li>
                         <li><a href="#">Oatmeal</a></li>
                         <li><a href="#">Fresh Bananas</a></li>
                     </ul>
                 </div>
             </div>
             <div class="col-lg-9">
                 <div class="hero__search">
                     <div class="hero__search__form">
                         <form action="#">
                             <div class="hero__search__categories">
                                 All Categories
                                 <span class="arrow_carrot-down"></span>
                             </div>
                             <input type="text" placeholder="What do yo u need?">
                             <button type="submit" class="site-btn">SEARCH</button>
                         </form>
                     </div>
                     <div class="hero__search__phone">
                         <div class="hero__search__phone__icon">
                             <i class="fa fa-phone"></i>
                         </div>
                         <div class="hero__search__phone__text">
                             <h5>+65 11.188.888</h5>
                             <span>support 24/7 time</span>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Hero Section End -->

 <!-- Breadcrumb Section Begin -->
 <section class="breadcrumb-section set-bg" data-setbg="./public/img/breadcrumb.jpg">
     <div class="container">
         <div class="row">
             <div class="col-lg-12 text-center">
                 <div class="breadcrumb__text">
                     <h2>Shopping Cart</h2>
                     <div class="breadcrumb__option">
                         <a href="/shop-php/index.php">Home</a>
                         <span>Shopping Cart</span>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </section>
 <!-- Breadcrumb Section End -->


<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                    </tr>
                </thead>
                <tbody id="cartContent">

                </tbody>
            </table>
        </div>
        <div class="mt-5">
            <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
            <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
        </div>
        <div class="row g-4 justify-content-end">
            <div class="col-8"></div>
            <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                <div class="bg-light rounded">
                    <div class="p-4">
                        <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                        <div class="d-flex justify-content-between mb-4">
                            <h5 class="mb-0 me-4">Subtotal:</h5>
                            <p class="mb-0">$96.00</p>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h5 class="mb-0 me-4">Shipping</h5>
                            <div class="">
                                <p class="mb-0">Flat rate: $3.00</p>
                            </div>
                        </div>
                        <p class="mb-0 text-end">Shipping to Ukraine.</p>
                    </div>
                    <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                        <h5 class="mb-0 ps-4 me-4">Total</h5>
                        <p class="mb-0 pe-4">$99.00</p>
                    </div>
                    <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Page End -->
<script>

    let gioHang = () => {
        fetch('http://localhost/shop-php/index.php?con=CartController&act=viewCart')
        .then(kQ => kQ.text())
        .then(kQ => {
            document.querySelector('#cartContent').innerHTML = kQ;
        })
        .catch(e => console.error(e));
    }

    let capNhatSoLuong = (sl, idpv) => {
        fetch('http://localhost/shop-php/index.php?con=CartController&act=addUpdateCart',{
            method: 'POST',
            headers: {'Content-Type':'application/x-www-form-urlencoded'},
            body: `idpv=${idpv}&sl=${sl}`
        })
        .then(kQ => kQ.json())
        .then(kQ => {
            if(kQ.error){
                gioHang();
                $.notify(kQ.message, 'success');
            }
            else
                $.notify(kQ.message, 'error');

        })
        .catch(e => console.error(e));
    }

    //btnXoa
    let xoaSanPham = (idpv) => {
        fetch(`http://localhost/shop-php/index.php?con=CartController&act=deleteCart&idpv=${idpv}`)
        .then(kQ => kQ.json())
        .then(kQ => {
            if(kQ.error){
                gioHang();
                $.notify(kQ.message, 'success');
            }
            else
                $.notify(kQ.message, 'error');

        })
        .catch(e => console.error(e));
    }
    // Lắng nghe sự kiện popstate khi người dùng nhấn nút back hoặc forward
window.addEventListener("popstate", function(event) {
    // Gọi lại hàm fetchData để làm mới nội dung
    gioHang();
});

// Gọi hàm fetchData khi trang tải lần đầu
window.onload = gioHang;

 </script>