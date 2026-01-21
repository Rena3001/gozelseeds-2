 @extends('client.layout.master')
 @section('page_title', 'Products')

 @section('content')
 @php
 use Illuminate\Support\Str;

 use App\Models\Translation;
 $locale = app()->getLocale();
 @endphp




 <!--Page Header Start-->
 <section class="page-header clearfix" style="background-image: url(assets/images/backgrounds/page-header-bg.jpg);">
     <div class="container">
         <div class="page-header__inner text-center clearfix">
             <ul class="thm-breadcrumb">
                 <li><a href="index-main.html">Home</a></li>
                 <li>Shop</li>
             </ul>
             <h2>Shop</h2>
         </div>
     </div>
 </section>
 <!--Page Header End-->

 <section class="shop-one">
     <div class="container">
         <div class="row">
             <div class="col-lg-3">
                 <div class="shop-one__sidebar">
                     <div class="shop-one__sidebar__item shop-one__sidebar__search">
                         <form action="#">
                             <input type="text" placeholder="Search here">
                             <button type="submit"><i class=" icon-search "></i></button>
                         </form>

                     </div><!-- /.shop-one__sidebar__item -->
                     <div class="shop-one__sidebar__item shop-one__sidebar__price">
                         <h3 class="shop-one__sidebar__item__title">Price</h3>
                         <!-- /.shop-one__sidebar__item__title -->
                         <div class="shop-one__sidebar__price-range">
                             <div class="range-slider-price" data-range-min="10" data-range-max="200" data-limit="200" data-start-min="30" data-start-max="150" id="range-slider-price"></div>
                             <div class="form-group">
                                 <div class="left">
                                     <p>$<span id="min-value-rangeslider"></span></p>
                                     <span>-</span>
                                     <p>$<span id="max-value-rangeslider"></span></p>
                                 </div><!-- /.left -->
                                 <div class="right">
                                     <button class="thm-btn">
                                         Filter
                                     </button>
                                 </div><!-- /.right -->
                             </div>
                         </div>
                     </div><!-- /.shop-one__sidebar__item -->
                     <div class="shop-one__sidebar__item shop-one__sidebar__category">
                         <h3 class="shop-one__sidebar__item__title">Categories</h3>
                         <!-- /.shop-one__sidebar__item__title -->
                         <ul class="list-unstyled shop-one__sidebar__category__list">
                             <li><a href="#">Agriculture</a></li>
                    
                         </ul>
                     </div><!-- /.shop-one__sidebar__item -->
                 </div><!-- /.shop-one__sidebar -->
             </div><!-- /.col-lg-3 -->
             <div class="col-lg-9">
                 <div class="row">
                     <div class="col-lg-12 shop-one__sorter">
                         <p class="shop-one__product-count">Showing 1–9 of 12 results</p>
                         <select class="shop-one__product-sorter" name="" id="">
                             <option value="">Sort by Popular</option>
                             <option value="">Sort by Popular</option>
                             <option value="">Sort by Popular</option>
                         </select>
                     </div><!-- /.col-lg-12 -->
                 </div><!-- /.row -->
                 <div class="row">
                     <div class="col-md-6 col-lg-4">
                         <div class="shop-one__item">
                             <div class="shop-one__image">
                                 <span class="shop-one__sale">sale</span><!-- /.shop-one__sale -->
                                 <img src="assets/images/update-14-09-2021/shop/shop-1-1.png" alt="">
                                 <a class="shop-one__cart" href="cart.html"><i class=" icon-shopping-cart"></i></a>
                             </div><!-- /.shop-one__image -->
                             <div class="shop-one__content text-center">
                                 <h3 class="shop-one__title"><a href="product-details.html">Brown
                                         Bread</a>
                                 </h3>
                                 <p class="shop-one__price">$23.00</p><!-- /.shop-one__price -->
                                 <div class="shop-one__rating">
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                     <i class="fa fa-star"></i>
                                 </div><!-- /.shop-one__rating -->
                             </div><!-- /.shop-one__content -->
                         </div><!-- /.shop-one__item -->
                     </div><!-- /.col-md-6 col-lg-3 -->
                 </div><!-- /.row -->
             </div><!-- /.col-lg-3 -->
         </div><!-- /.row -->
     </div><!-- /.container -->
 </section><!-- /.shop-one -->

 @endsection