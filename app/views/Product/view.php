<!--start-breadcrumbs-->
<div class="breadcrumbs">
    <div class="container">
        <div class="breadcrumbs-main">
            <ol class="breadcrumb">
                <?php echo $breadcrumbs; ?>
            </ol>
        </div>
    </div>
</div>
<!--end-breadcrumbs-->
<!--start-single-->
<div class="single contact">
    <div class="container">
        <div class="single-main">
            <div class="col-md-9 single-main-left">
                <div class="sngl-top">
                    <div class="col-md-5 single-top-left">
                        <?php if ($gallery): ?>
                            <div class="flexslider">
                                <ul class="slides">
                                    <?php foreach ($gallery as $item): ?>
                                        <li data-thumb="images/<?php echo $item->img; ?>">
                                            <div class="thumb-image"><img src="images/<?php echo $item->img; ?>"
                                                                          data-imagezoom="true"
                                                                          class="img-responsive" alt=""/></div>
                                        </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php else: ?>
                            <img src="images/<?php echo $product->img; ?>" alt="<?php echo $product->title; ?>"/>
                        <?php endif; ?>
                    </div>
                    <?php $curr = \ishop\App::$app->getProperty('currency');
                    $cats = \ishop\App::$app->getProperty('cats');
                    ?>
                    <div class="col-md-7 single-top-right">
                        <div class="single-para simpleCart_shelfItem">
                            <h2><?php echo $product->title; ?></h2>
                            <div class="star-on">
                                <ul class="star-footer">
                                    <li><a href="#"><em> </em></a></li>
                                    <li><a href="#"><em> </em></a></li>
                                    <li><a href="#"><em> </em></a></li>
                                    <li><a href="#"><em> </em></a></li>
                                    <li><a href="#"><em> </em></a></li>
                                </ul>
                                <div class="review">
                                    <a href="#"> 1 customer review </a>

                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <h5 class="item_price">
                                <div id="base-price"
                                     data-base="<?php echo $product->price * $curr['value']; ?>"
                                     style="display: inline-block;"><?php echo $curr['symbol_left'] . ' ' ?><?php echo $product->price * $curr['value']; ?><?php echo ' ' . $curr['symbol_right']; ?></div>
                                <?php if ($product->old_price): ?>
                                    <div id="old-price" data-base="<?php echo $product->old_price * $curr['value']; ?>"
                                         style="display: inline-block; font-size: smaller; text-decoration: line-through">
                                        <?php echo $curr['symbol_left'] . ' ' ?><?php echo $product->old_price * $curr['value']; ?><?php echo ' ' . $curr['symbol_right']; ?>
                                    </div>
                                <?php endif; ?>
                            </h5>

                            <p>
                                <?php echo $product->content; ?>

                            </p>
                            <?php if ($mods): ?>
                                <div class="available">
                                    <ul>
                                        <li>Color
                                            <select>
                                                <option>Выбрать цвет</option>
                                                <?php foreach ($mods as $mod): ?>
                                                    <option data-title="<?php echo $mod->title; ?>"
                                                            data-price="<?php echo $mod->price * $curr['value']; ?>"
                                                            data-old-price="<?php echo $product->old_price * $curr['value']; ?>"
                                                            value="<?php echo $mod->id; ?>"><?php echo $mod->title; ?></option>
                                                <?php endforeach; ?>
                                            </select></li>
                                        <div class="clearfix"></div>
                                    </ul>
                                </div>
                            <?php endif; ?>
                            <ul class="tag-men">
                                <li><span>Category</span>
                                    <span class="women1">: <a
                                                href="category/<?php echo $cats[$product->category_id]['alias']; ?>"><?php echo $cats[$product->category_id]['title']; ?></a></span>
                                </li>
                            </ul>
                            <div class="quantity">
                                <input type="number" size="4" value="1" name="quantity" min="1" step="1">
                            </div>
                            <a id="productAdd" data-id="<?php echo $product->id; ?>"
                               href="cart/add?id=<?php echo $product->id; ?>"
                               class="add-cart item_add add-to-cart-link">ADD TO CART</a>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="tabs">
                    <ul class="menu_drop">
                        <li class="item1"><a href="#"><img src="images/arrow.png" alt="">Description</a>
                            <ul>
                                <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                        elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                        erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                        vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                        facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                        luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                        putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                        quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                        clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item2"><a href="#"><img src="images/arrow.png" alt="">Additional information</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                        vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                        facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                        luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                        putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                        quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                        clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item3"><a href="#"><img src="images/arrow.png" alt="">Reviews (10)</a>
                            <ul>
                                <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                        elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                        erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                        vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                        facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                        luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                        putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                        quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                        clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item4"><a href="#"><img src="images/arrow.png" alt="">Helpful Links</a>
                            <ul>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                        vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                        facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                        luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                        putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                        quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                        clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                        <li class="item5"><a href="#"><img src="images/arrow.png" alt="">Make A Gift</a>
                            <ul>
                                <li class="subitem1"><a href="#">Lorem ipsum dolor sit amet, consectetuer adipiscing
                                        elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                        erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation
                                        ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</a></li>
                                <li class="subitem2"><a href="#"> Duis autem vel eum iriure dolor in hendrerit in
                                        vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla
                                        facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent
                                        luptatum zzril delenit augue duis dolore</a></li>
                                <li class="subitem3"><a href="#">Mirum est notare quam littera gothica, quam nunc
                                        putamus parum claram, anteposuerit litterarum formas humanitatis per seacula
                                        quarta decima et quinta decima. Eodem modo typi, qui nunc nobis videntur parum
                                        clari, fiant sollemnes </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <?php if ($related): ?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3>С этим товаром также покупают:</h3>
                            <?php foreach ($related as $item): ?>
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="product/<?php echo $item['alias']; ?>" class="mask"><img
                                                    class="img-responsive zoom-img"
                                                    src="images/<?php echo $item['img']; ?>" alt=""/></a>
                                        <div class="product-bottom">
                                            <h3>
                                                <a href="product/<?php echo $item['alias']; ?>"><?php echo $item['title']; ?></a>
                                            </h3>
                                            <p>Explore Now</p>
                                            <h4><a class="item_add add-to-cart-link"
                                                   href="cart/add?id=<?php echo $item['id']; ?>"
                                                   data-id="<?php echo $item['id']; ?>"><em></em></a>
                                                <span class="item_price"><?php echo $curr['symbol_left'] . ' ' ?><?php echo $item['price'] * $curr['value']; ?><?php echo ' ' . $curr['symbol_right']; ?></span>
                                                <?php if ($item['old_price']): ?>
                                                    <del><?php echo $curr['symbol_left'] . ' ' ?><?php echo $item['old_price'] * $curr['value']; ?><?php echo ' ' . $curr['symbol_right']; ?></del>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                        <?php if ($item['old_price']): ?>
                                            <div class="srch">
                                                <span>-<?php echo 100 * $item['old_price'] % $item['price'] ?>%</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($recentlyViewed): ?>
                    <div class="latestproducts">
                        <div class="product-one">
                            <h3>Недавно просмотренные:</h3>
                            <?php foreach ($recentlyViewed as $item): ?>
                                <div class="col-md-4 product-left p-left">
                                    <div class="product-main simpleCart_shelfItem">
                                        <a href="product/<?php echo $item['alias']; ?>" class="mask"><img
                                                    class="img-responsive zoom-img"
                                                    src="images/<?php echo $item['img']; ?>" alt=""/></a>
                                        <div class="product-bottom">
                                            <h3>
                                                <a href="product/<?php echo $item['alias']; ?>"><?php echo $item['title']; ?></a>
                                            </h3>
                                            <p>Explore Now</p>
                                            <h4><a class="item_add add-to-cart-link"
                                                   href="cart/add?id=<?php echo $item['id']; ?>"
                                                   data-id="<?php echo $item['id']; ?>"><em></em></a>
                                                <span class="item_price"><?php echo $curr['symbol_left'] . ' ' ?><?php echo $item['price'] * $curr['value']; ?><?php echo ' ' . $curr['symbol_right']; ?></span>
                                                <?php if ($item['old_price']): ?>
                                                    <del><?php echo $curr['symbol_left'] . ' ' ?><?php echo $item['old_price'] * $curr['value']; ?><?php echo ' ' . $curr['symbol_right']; ?></del>
                                                <?php endif; ?>
                                            </h4>
                                        </div>
                                        <?php if ($item['old_price']): ?>
                                            <div class="srch">
                                                <span>-<?php echo 100 * $item['old_price'] % $item['price'] ?>%</span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-md-3 single-right">
                <div class="w_sidebar">
                    <section class="sky-form">
                        <h4>Categories</h4>
                        <div class="row1 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><em></em>All
                                    Accessories</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Women
                                    Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Kids
                                    Watches</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Men
                                    Watches</label>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Brand</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"
                                                               checked=""><em></em>kurtas</label>
                            </div>
                            <div class="col col-4">
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Sonata</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Titan</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Casio</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Omax</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>shree</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Fastrack</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Sports</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Fossil</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Maxima</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Yepme</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Citizen</label>
                                <label class="checkbox"><input type="checkbox" name="checkbox"><em></em>Diesel</label>
                            </div>
                        </div>
                    </section>
                    <section class="sky-form">
                        <h4>Colour</h4>
                        <ul class="w_nav2">
                            <li><a class="color1" href="#"></a></li>
                            <li><a class="color2" href="#"></a></li>
                            <li><a class="color3" href="#"></a></li>
                            <li><a class="color4" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                            <li><a class="color12" href="#"></a></li>
                            <li><a class="color13" href="#"></a></li>
                            <li><a class="color14" href="#"></a></li>
                            <li><a class="color15" href="#"></a></li>
                            <li><a class="color5" href="#"></a></li>
                            <li><a class="color6" href="#"></a></li>
                            <li><a class="color7" href="#"></a></li>
                            <li><a class="color8" href="#"></a></li>
                            <li><a class="color9" href="#"></a></li>
                            <li><a class="color10" href="#"></a></li>
                        </ul>
                    </section>
                    <section class="sky-form">
                        <h4>discount</h4>
                        <div class="row1 row2 scroll-pane">
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio" checked=""><em></em>60 % and
                                    above</label>
                                <label class="radio"><input type="radio" name="radio"><em></em>50 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><em></em>40 % and above</label>
                            </div>
                            <div class="col col-4">
                                <label class="radio"><input type="radio" name="radio"><em></em>30 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><em></em>20 % and above</label>
                                <label class="radio"><input type="radio" name="radio"><em></em>10 % and above</label>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--end-single-->
