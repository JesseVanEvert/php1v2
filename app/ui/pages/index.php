<?php
    require APPROOT . '/ui/inc/header.php';
?>
<?php
    require APPROOT . '/ui/inc/navigation.php';
?>

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); ?>

<section id="section-hero">
    <article class="content-hero">
      <h1>
        Haarlem Festival
      </h1>

      <ul>
        <?php foreach($data['dates'] as $date) : ?>
          <li>
            Haarlem
          </li>

          <li>
              <?php
                $startDate = $date->getEventStartDate();
                $endDate = $date->getEventEndDate();
                echo date("jS", strtotime($startDate)) . " - " . date("jS F", strtotime($endDate));
              ?>
          </li>

          <li>
            <?php
                $endDate = $date->getEventEndDate();
                echo date("Y", strtotime($endDate));
            ?>
          </li>
        <?php endforeach; ?>
      </ul>

      <a href="<?php echo URLROOT; ?>/tickets"
         class="buttonStyle">
         Tickets
      </a>

       <a href="<?php echo URLROOT; ?>/timetable"
          class="buttonStyle">
          Timetable
      </a>
    </article>
  </section>

<section id="festival-info">
    <h2>
      Experience a different kind of festival
    </h2>

    <hr>

  <article class="content-festival-info">
    <?php foreach($data['eventInfo'] as $information) : ?>
      <article>
          <?php
            echo $information->getTotalArtists();
          ?>
      </article>

      <article>
          <?php
            echo $information->getTotalLocations();
          ?>
      </article>

      <article>
          <?php
            echo $information->getTotalTickets();
          ?>
      </article>

      <article>
          <?php
            echo $information->getTotalEvents();
          ?>
      </article>
    <?php endforeach; ?>

    <article>
      Artists
    </article>

    <article>
      Locations
    </article>

    <article>
      Tickets
    </article>

    <article>
      Events
    </article>
  </article>
</section>

<section id="section-events">
  <h2>
    Events
  </h2>

  <hr>

  <article class="content-events">
    <?php foreach($data['events'] as $event) : ?>
    <article class="eventContainer">
        <a href="<?php echo URLROOT; ?>/ <?php echo $event->getName(); ?>">
          <img
              src="<?php echo $event->getContent(); ?>"
              alt="Image event"
          />

          <article class="centered">
            <h4>
                <?php
                  echo $event->getName();
                ?>
            </h4>

            <p>
                <?php
                echo $event->getDescription();
                ?>
            </p>
          </article>
        </a>
      </article>
    <?php endforeach; ?>
  </article>
</section>

<section id="layout-artists-33">
  <h2>
    Artists
  </h2>

  <hr>

  <article class="content-artists-33">
    <article>
        <img id="image" src="./img/dance/tiesto.jpeg">
    </article>

    <article>
        <img id="image2" src="./img/dance/armin.png">
    </article>

    <article>
        <img id="image3" src="./img/dance/afrojack.jpg">
    </article>
  </article>
</section>

<?php
    require APPROOT . '/ui/inc/footer.php';
?>
