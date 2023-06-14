<?php include('partials-front/menu-contact.php') ?>

    <!--Map Responsive-->
    <div class="map-responsive">
      <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3247.7393306568265!2d121.06958889103703!3d14.528562280993839!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x738e57f6a82c0651!2zMTTCsDMxJzQ1LjgiTiAxMjHCsDA0JzEzLjMiRQ!5e0!3m2!1sen!2sus!4v1653629034485!5m2!1sen!2sus" 
      width="2000" height="623" style="border:0;" 
      allowfullscreen="" loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>

    <!-- Form Contact Us -->
        <!-- "Write Review" -->
        <div class="writereviewctr">
          <h1>Leave us a Message!</h1>
          <form
            class="ownreview" action="#" method="POST">
            <div class="reviewinput">
              <label for="Name"> Name:</label>
              <input
                type="text"
                id="fname"
                name="Name"
                placeholder="Enter your name"
              />
              <label for="Email"> Email:</label>
              <input
                type="email"
                id="Email"
                name="Email"
                placeholder="Enter your email"
              />
              <label for="Review">Your review:</label>
              <textarea
                name="Message"
                placeholder="Write your message here"
                rows="5"
                cols="50"
                id="textarea"
              ></textarea>
              <input id="submit" type="submit" value="Submit" />
            </div>
          </form>
        </div>

    <!--Footer-->
    <?php include('partials-front/footer.php') ?>