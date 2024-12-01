  <!-- Page Preloder -->
  <!-- <div id="preloder">
      <div class="loader"></div>
  </div> -->

  

  <!-- Header Section Begin -->
  <header class="header">
      <div class="header__top">
          <div class="container">
              <div class="row">
                  <div class="col-lg-6 col-md-6">
                      <div class="header__top__left">
                          <ul>
                              <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
                              <li>Free Shipping for all Order of $99</li>
                          </ul>
                      </div>
                  </div>
                  <div class="col-lg-6 col-md-6">
                      <div class="header__top__right">
                          <div class="header__top__right__social">
                              <a href="#"><i class="fa fa-facebook"></i></a>
                              <a href="#"><i class="fa fa-twitter"></i></a>
                              <a href="#"><i class="fa fa-linkedin"></i></a>
                              <a href="#"><i class="fa fa-pinterest-p"></i></a>
                          </div>
                          <div class="header__top__right__language">
                              <img src="./public/img/language.png" alt="">
                              <div>English</div>
                              <span class="arrow_carrot-down"></span>
                              <ul>
                                  <li><a href="#">Spanis</a></li>
                                  <li><a href="#">English</a></li>
                              </ul>
                          </div>
                          <div class="header__top__right__auth">
                              <?php
                                if (isset($_COOKIE['LOGIN_COOKIE']) && strlen($_COOKIE['LOGIN_COOKIE']) > 0):
                                ?>
                                  <a href="/shop-php/index.php?con=HomeController&act=logout">Xin chào: <?php echo unserialize($_COOKIE['LOGIN_COOKIE'])['fullName']; ?></a>
                                  <a href="/shop-php/index.php?con=HomeController&act=login">Thoát</a>
                                  <?php else : ?>
                                  <a href="/shop-php/index.php?con=HomeController&act=login"><i class="fa fa-user"></i> Login</a>
                              <?php endif; ?>
                               
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="container">
          <div class="row">
              <div class="col-lg-3">
                  <div class="header__logo">
                      <a href="./index.html"><img src="./public/img/logo.png" alt=""></a>
                  </div>
              </div>
              <div class="col-lg-6">
                  <nav class="header__menu">
                      <ul>
                          <li class="active"><a href="/shop-php/index.php">Trang chủ</a></li>

                          <?php
                            require_once(BASE_PATH . '/app/core/Share.php');
                            echo Share::getMenu()
                            ?>
                      </ul>
                  </nav>
              </div>
              <div class="col-lg-3">
                  <div class="header__cart">
                      <ul>
                          <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li>
                          <li><a href="http://localhost/shop-php/index.php?con=CartController&act=index&cat=6#"><i class="fa fa-shopping-bag"></i> <span>3</span></a></li>
                      </ul>

                  </div>
              </div>
          </div>
          <div class="humberger__open">
              <i class="fa fa-bars"></i>
          </div>
      </div>
  </header>
  <!-- Header Section End -->