

<a href="<?php echo WC()->cart->get_cart_url(); ?>" title="<?php _e('Giỏ hàng '); ?>">
                        <span><i class="fas fa-shopping-cart"></i></span>
                        <span>
                            <?php echo sprintf(_n('(%d) <span>Sản Phẩm</span>', '(%d) <span>Sản Phẩm</span>', WC()->cart->cart_contents_count), WC()->cart->cart_contents_count); ?>
                        </span>
                    </a>