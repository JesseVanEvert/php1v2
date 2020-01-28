<header>
  <section id="section-header-50">
    <article class="content-header-50">
      <article>
        <a href="<?php echo URLROOT; ?>">
          <img src="<?php echo URLROOT; ?>/img/logo.png"

            alt="Logo Haarlem Festival"
            title="Logo Haarlem Festival"
            class="logo-header"
          />
        </a>
      </article>

      <article>
        <ul class="header-nav">
          <li>
            <a href="<?php echo URLROOT; ?>/timetable">
              Timetable
            </a>
          </li>

          <li>
            <a href="<?php echo URLROOT; ?>/tickets">
              Tickets
            </a>
          </li>

          <li>
            <article class="dropdown">
              <li class="dropbtn">
                <a href="">
                  Events <i class="fas fa-caret-down"></i>
                </a>
              </li>

              <article class="dropdown-content">
                  <a href="<?php echo URLROOT; ?>/dance">
                    Dance
                  </a>

                  <a href="<?php echo URLROOT; ?>/jazz">
                    Jazz
                  </a>

                  <a href="<?php echo URLROOT; ?>/historic">
                    Historic
                  </a>

                  <a href="<?php echo URLROOT; ?>/food">
                    Food
                  </a>

                  <a href="<?php echo URLROOT; ?>/kids">
                    Kids
                  </a>
              </article>
            </article>
          </li>

          <li>
            <article class="dropdown">
              <li class="dropbtn">
                <a href="<?php echo URLROOT; ?>/information">
                  Information <i class="fas fa-caret-down"></i>
                </a>
              </li>

              <article class="dropdown-content">
                <a href="<?php echo URLROOT; ?>/information/travel">
                  Travel
                </a>

                <a href="<?php echo URLROOT; ?>/information/rules">
                  Rules
                </a>

                <a href="<?php echo URLROOT; ?>/information/faq">
                  FAQ
                </a>
              </article>
            </article>
          </li>

          <li>
            <a href="<?php echo URLROOT; ?>/contact">
              Contact
            </a>
          </li>

          <?php if(isset($_SESSION['userId'])) : ?>
         <article class="dropdown">
            <li>
              <a href="<?php echo URLROOT; ?>/users/logout" class="buttonStyle">
                LOGOUT
              </a>
            </li>

              <article class="dropdown-content">
                  <a href="<?php echo URLROOT; ?>/personaltimetable">
                    Personal timetable
                  </a>
              </article>
            </article>
          <?php else : ?>

            <li>
              <a href="<?php echo URLROOT; ?>/users/login" class="buttonStyle">
                LOGIN
              </a>
            </li>
          <?php endif; ?>

            <li>
              <a href="<?php echo URLROOT; ?>/shoppingcart/shopping-cart">
                  <img src="<?php ECHO URLROOT; ?>/img/shopping-cart/shopping-cart.png"
                  class="shopping-cart"
                  alt="Shopping cart"
                />
              </a>
            </li>
            <li>
              <a href="<?php echo URLROOT; ?>/search/search">
                  Search
              </a>
            </li>
          </ul>
        </article>
    </article>
  </section>
</header>
