<footer id="footer">
    <div class="row">
      <div class="large-8 columns">
        <h1>You've reached the bottom <br><small>but not the end...</small></h1>
      </div>
      <div class="medium-6 large-4 columns end">
        <form action="index.php?page=search" method="get">
          <label for="search-query">Search: </label>
          <div class="row collapse">
            <div class="small-9 medium-10 columns">
              <input type="search" name="query">
            </div>
            <div class="small-3 medium-2 columns end">
              <input type="submit" name="search" value="Search" class="button postfix">
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="columns">
        <ul class="no-bullet small-block-grid-2 medium-block-grid-4">
          <li><strong>Site Navigation</strong>
            <ul>
              <li><a href="index.php?page=home">Home</a></li>
              <li><a href="index.php?page=about">About Us</a></li>
              <li><a href="index.php?page=contact">Contact Us</a></li>
            </ul>
          </li>
          <li><strong>Accounts</strong>
            <ul>
              <li><a href="index.php?page=login">Login</a></li>
              <li><a href="index.php?page=register">Register</a></li>
            </ul>
          </li>
          <li><strong>Addition links</strong>
            <ul>
              <li><a href="index.php?page=sitemap">Sitemap</a></li>
              <li><a href="index.php?page=privacy-policy">Privacy Policy</a></li>
              <li><a href="index.php?page=home">Terms &amp; Conditions</a></li>
              <li><a href="index.php?page=weekly-subscription">Weekly subscription</a></li>
            </ul>
          </li>
          <li><strong>Contact Info</strong>
            <ul class="no-bullet">
              <li><i class="fa fa-phone"></i> 04 123 4567</li>
              <li><i class="fa fa-envelope"></i> E-Mail</li>
              <li><i class="fa fa-facebook"></i> Facebook</li>
              <li><i class="fa fa-twitter"></i> Twitter</li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </footer>

<div id="before-you-leave" class="reveal-modal text-center" data-reveal>
  <h2>Don't miss out on our weekly deals!</h2>
  <p class="lead">Some other text</p>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Id, natus. Illum repellendus ea, quae asperiores quisquam molestias ullam, sed cum.</p>
  <p><a href="weekly-subscription.html" class="button success" id="accept-offer">I'd love weekly deals!</a></p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

  <!-- Mobile search field (to go into footer) -->
  <!-- <div class="row hidden-for-large-up">
    <div class="columns">
      <form action="search.html" method="get">
        <div class="row collapse">
          <div class="columns">
            <h2>Search for deals</h2>
          </div>
          <div class="small-9 medium-10 columns">
            <input type="search" name="query" id="search-field">
          </div>
          <div class="small-3 medium-2 columns">
            <button class="postfix">Search</button>
          </div>
        </div>
      </form>
    </div>
  </div> -->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/vendor/jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation.min.js"></script>
  <script>
    // Initialize foundation
    $(document).foundation();

    // When the mouse leaves the screen
    $(document).mouseleave(function(){
      // If the user hasn't already interacted with the modal
      if( localStorage.getItem('before-you-go-offer') == null ) {
        // Show the user a modal before they leave
        $('#before-you-leave').foundation('reveal', 'open');
        // If the user interacts with the modal
        $('#before-you-leave .close-reveal-modal, #accept-offer, .reveal-modal-bg').click(function(){
          // Save inside localstorage an instruction to not reveal the modal again
          localStorage.setItem('before-you-go-offer', 'hide');
        });
      }
    });

  </script>
</body>
</html>