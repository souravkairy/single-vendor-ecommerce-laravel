
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    @yield('header')
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
    @yield('cat_slider')
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            @yield('slider_two')
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->

       @yield('f_products')
   
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
   @yield('banner_one')
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
           @yield('another_products')
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
       @yield('blog')
    </section>
    <!-- Blog Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer spad">
      @yield('footer')
    </footer>
    <!-- Footer Section End -->

    <!-- Js Plugins -->




</body>

</html>