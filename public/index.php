<?php

    use \controller\HomeController;

    include ('../controller/HomeController.php');

    $HomeController = new HomeController();
    $events = $HomeController->events();
    $participators = $HomeController->participators();
    $employees = $HomeController->employees();

?>

<html>
    <title>Shafqat Ali - Coding Challange</title>
    <script src="../assets/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.min.js"></script>
    <body>
    <div class="container">
        <div class="row" style="margin-top:50px">
            <div class="col-md-4">
                <form action="index.php" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="hidden" name="filter[column]" value="event_id">
                            <select class="state js-states form-control" name="filter[event_id]">
                                <?php foreach($events as $event): ?>
                                    <option value="<?php echo $event['id']; ?>"><?php echo $event['name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit"  class="btn btn-success form-control" > Filtern </button>
                        </div>
                    </div>
                </form>     
            </div>
            <div class="col-md-4">
                <form action="index.php" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="hidden" name="filter[column]" value="event_id">
                            <select name="filter[event_id]" class="state js-states form-control">
                                <?php foreach($events as $event): ?>
                                    <option value="<?php echo $event['id']; ?>"><?php echo $event['date']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <button type="submit"  class="btn btn-success form-control"> Filtern </button>
                        </div>
                    </div>
                </form>    
            </div>
            <div class="col-md-4">
                <form action="index.php" class="form-horizontal" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <input type="hidden" name="filter[column]" value="employee_id">
                            <select name="filter[employee_id]" class="state js-states form-control">
                                <?php foreach($employees as $employee): ?>
                                    <option value="<?php echo $employee['id']; ?>"><?php echo $employee['employee_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </div>
                        <div class="col-md-4">
                            <button type="submit"  class="btn btn-success form-control"> Filtern </button>
                        </div>
                    </div>
                </form> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-info">
                    <div class="panel-heading">Details of Employee </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-striped table-responsive">
                                <tr>
                                    <th>Event</th>
                                    <th>Employee Name</th>
                                    <th>Employee Email</th>
                                    <th>Participation Feee</th>
                                    <th>Date</th>
                                </tr>
                                <?php foreach($participators as $participator): ?>

                                <tr>
                                    <td><?php echo $participator['name']; ?></td>
                                    <td><?php echo $participator['employee_name']; ?></td>
                                    <td><?php echo $participator['employee_mail']; ?></td>
                                    <td><?php echo $participator['participation_fee']; ?></td>
                                    <td><?php echo $participator['date']; ?></td>
                                </tr>


                                <?php endforeach; ?>
                                <tr>
                                    <td>Total price:</td>
                                    <td></td>
                                    <td></td>
                                    <td> <?php echo array_sum(array_column($participators, 'participation_fee')); ?></td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div> 
</body>
</html>
