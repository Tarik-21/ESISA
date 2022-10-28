<section class="header">
      <div class="title">
        <h1 class="heading mb-3">Événements</h1>
      </div>
</section>

<?php $events = EventBaseDonnee::getAllEvent();?>
    <section id="calendrier" class="calendrier">
      <div class="container-fluid my-3">
        
        <div class="container">
          <div class="row">
            <?php 
            $length= sizeof($events);
            for($i=0;$i<$length;$i++):?>
              <div class="event-item">
                <div class="event-date">
                  <h4>
                    <i class="fas fa-calendar-day me-2"></i>
                    <?php echo $events[$i]['date_event']?>
                  </h4>
                </div>
                <div class="event-details">
                  <div class="event-info">
                    <h3><?php echo $events[$i]['title']?></h3>
                    <div class="event-time mb-3">
                      <div class="me-3"><i class="fal fa-clock"></i> <?php echo $events[$i]['time_event']?></div>
                      <div><i class="far fa-map-marker-alt"></i> <?php echo $events[$i]['local_event']?></div>
                    </div>
                    <p>
                      <?php echo $events[$i]['description_event']?>
                    </p>
                  </div>
                  <div class="cv-img">
                    <img src="./images/event/<?php echo $events[$i]['img']?>" alt="" class="myImg" width="100%" height="100%">
                  </div>
                </div>
              </div>
              <?php endfor;?>
          </div>
        </div>
        
      </div>

    </section>