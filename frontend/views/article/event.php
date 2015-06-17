<?php
$this->title = 'Event';
?>
<div class="container content-body">
    <div class="row">
        <div class="col-md-12">
            <h3 class="page-header">
                <?= $this->title; ?>
            </h3>
            <ol class="breadcrumb">
                <li><a href="<?= Yii::$app->homeUrl ?>">Home</a></li>
                <li class="active">Event</li>
            </ol>
        </div>
    </div>

    <div class="row">
        <script>

            $(document).ready(function() {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '<?php echo date("Y-m-d"); ?>',
                    editable: true,
                    eventLimit: true, // allow "more" link when too many events
                    events: {
                        url: '<?= Yii::$app->urlManager->createUrl('article/getevent') ?>',
                        error: function() {
                            alert("Your browser doesn't support this features");
                        }
                    },
                    eventClick: function(event) {
                        if (event.url) {
                            window.open(event.url);
                            return false;
                        }
                    }
                });
            });

        </script>
        <div class="col-md-12" >
            <?php
            ?>
            <div id="calendar"></div>
        </div>
    </div>

</div>