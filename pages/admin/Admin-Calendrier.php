<?php
    if(isset($_POST['supprimer'])){
        EventBaseDonnee::deleteEvent($_POST['supprimer']);
        Redirect::toAdmin_Calendrier();
    }
?>

<section class="pages">
      <div class="page">
        <div class="table mt-4">
        <form action="Ajouter-evenement" method="POST">
          <button class="btn btn-primary btn-sm mb-1 button-decor" name="ajouter-event">
          <i class="far fa-plus"></i> Ajouter une événement
          </button>
        </form>
        <table class="ccna">
                    <tr class="text-center">
                        <th>Title</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                        <th>description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    <?php
                        $events = EventBaseDonnee::getAllEvent();
                        foreach($events as $event):

                    ?>
                    <tr>
                        <td>
                            <?php echo $event['title']?>
                        </td>
                        <td>
                            <?php echo $event['date_event']?>
                        </td>
                        <td>
                            <?php echo $event['time_event']?>
                        </td>
                        <td>
                            <?php echo $event['local_event']?>
                        </td>
                        <td>
                            <?php echo $event['description_event']?>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <img src="./images/event/<?php echo $event['img']?>" alt="img" width="60%" height="200">
                            </div>
                        </td>
                        <td>
                            <div class="d-flex flex-row justify-content-center">
                                <form action="" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor-red" name="supprimer" value="<?php echo $event['id']?>">
                                    Supprimer  
                                </button>
                                </form>
                                <form action="Modifier-Event" method="POST">
                                <button class="btn btn-primary btn-sm mb-1 button-decor" name="modifier" value="<?php echo $event['id']?>">
                                    Modifier  
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach;?>

                </table>
                
        </div>
      </div>
</section>