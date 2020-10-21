    <!-- Page Content -->
    <div ng-controller="add_new">
        <?php foreach ($arr_detail as $detail) {?>
        <?php echo form_open_multipart()?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <center><h1>Project Monitoring Report Page</h1></center>


                    <h3 class="page-header">Project : <?php echo $detail->proj_num;?></h3>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Project Detail</a></li>
                        <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Vendor Detail</a></li>
                        <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Schedule Detail</a></li>
                        <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Meeting Detail</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="home">
                            <br>
                            <div class="panel panel-default">
                              <div class="panel-heading">Project Detail</div>
                              <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                      <div class="form-group">
                                        <label>Project Number</label>
                                        <input type="text" class="form-control" name='proj_num' placeholder="Project Number" value='<?php echo $detail->proj_num;?>' required disabled>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Project Name</label>
                                    <input type="text" class="form-control" name='proj_name' placeholder="Project Name" value='<?php echo $detail->proj_name;?>' required disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label>Discription</label>
                                <textarea type="text" class="form-control" name='proj_descr' placeholder="Discription" required disabled><?php echo $detail->proj_descr;?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                            <label>PIC S2P</label>
                            <input type="text" class="form-control" name='pic_s2p' placeholder="PIC S2P" value='<?php echo $detail->pic_s2p;?>' required disabled>
                        </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label>Area</label>
                        <input type="text" class="form-control" name='proj_area' placeholder="Area" value='<?php echo $detail->proj_area;?>' required disabled>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>PO / SPK</label>
                    <input type="text" class="form-control" name='proj_po_spk' placeholder="PO / SPK" value='<?php echo $detail->proj_po_spk;?>' required disabled>
                </div>
            </div>
        </div>
    </div>
</div>

            <!-- MONITORING SCHEDULE -->
<div class="panel panel-default">
  <div class="panel-heading">Schedule Calender Detail</div>
  <div class="panel-body">
    <div class="row">
        <div class="col-lg-12">
            <?php
            function check_in_range($start_date, $end_date, $date_from_user)
            {
                      // Convert to timestamp
              $start_ts = strtotime($start_date);
              $end_ts = strtotime($end_date);
              $user_ts = strtotime($date_from_user);

                      // Check that user date is between start & end
              return (($user_ts >= $start_ts) && ($user_ts <= $end_ts));
            }


            function check_is_yesterday($date_from_user)
            {
              $now=date('Y-m-d');
              $now = strtotime($now);
              $user_ts = strtotime($date_from_user);

              return (($user_ts >= $now));
            }

          $start_date = '2016-05-01';
          $end_date = '2016-05-15';

          $start_date2 = '2016-06-14';
          $end_date2 = '2016-06-25';
          ?>
          <?php
          $begin = new DateTime($detail->proj_date_start);
          $end = new DateTime($detail->proj_date_end);

          $interval = DateInterval::createFromDateString('1 day');
          $period = new DatePeriod($begin, $interval, $end);
          ?>

          <div class="sched_td sched">
            <table class="table table-bordered">
                <tr>
                    <td class="sched_td headcol">Schedules</td>
                    <?php foreach ( $period as $dt ){?>
                    <td class="long" ><?php echo $dt->format( "d-m" ).'<br>';?></td>
                    <?php } ?>
                </tr>
                <!-- LOOP SCHEDULE -->
                <?php foreach ($arr_schedule as $schedule) {?>
                <tr title="<?php echo $schedule->sched_descr;?>&#013;Vendor report: <?php echo $schedule->vendor_report_descr;?>&#013;Progress : <?php echo $schedule->vendor_report_percent;?>%">
                    <td class="sched_td headcol"><?php echo $schedule->sched_descr;?></td>
                    <?php foreach ( $period as $dt ){?>
                    <td class="sched_td long" <?php if(check_in_range($schedule->sched_date_start, $schedule->sched_date_end, $dt->format( "Y-m-d" ))){if(check_is_yesterday($dt->format( "Y-m-d" ))){echo 'bgcolor="#F00"';}else{echo 'bgcolor="#00FF00"';}}?>><a <?php if(check_in_range($schedule->sched_date_start, $schedule->sched_date_end, $dt->format( "Y-m-d" ))){if(check_is_yesterday($dt->format( "Y-m-d" ))){echo 'style="color:#F00"';}else{echo 'style="color:#00FF00"';}}else{ echo 'style="color:#2E3338"';}?>>Y</a></td>
                    <?php } ?>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<!-- END SHCEDULE -->
</div>
<div role="tabpanel" class="tab-pane" id="profile">
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">Vendor Detail</div>
        <div class="panel-body">
            <?php foreach ($arr_vendor as $vendor) {?>
            <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label>Vendor Name</label>
                    <input type="text" class="form-control" name='vendor_name'value="<?php echo $vendor->nama_perusahaan;?>" disabled>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label>Vendor Detail</label>
                <textarea type="text" class="form-control" disabled>
                    <?php echo $vendor->alamat1;?>
                    <?php echo $vendor->alamat2;?>
                    <?php echo $vendor->alamat3;?>
                </textarea>
            </div>
        </div>
    </div>                                
    <div class="row">
        <div class="col-lg-12">
          <div class="form-group">
            <label>PIC Vendor</label>
            <input type="text" class="form-control" value="<?php echo $vendor->cp_perusahaan;?> (<?php echo $vendor->telp;?>)" disabled>
        </div>
    </div>
</div>
<?php } ?>
</div>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="messages">
    <br>
    <div class="panel panel-default">
        <div class="panel-heading">Schedule Detail</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <label>Date Start Project</label>
                                    <input type="text" class="form-control" name='proj_date_start' value='<?php echo $detail->proj_date_start;?>' placeholder="Date Start" required disabled>
                                </div>
                                <div class="form-group">
                                    <label>Date End Project</label>
                                    <input type="text" class="form-control" name='proj_date_end' value='<?php echo $detail->proj_date_end;?>' placeholder="Date End" disabled>
                                </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label>Total Days</label>
                                <input type="number" class="form-control" name='proj_day_total' value='<?php echo $detail->proj_day_total;?>' placeholder="Total Days" required disabled>
                            </div>
                            <div class="form-group">
                                <label>Priority</label>
                                <select name="proj_priority" class="form-control" value='<?php echo $detail->proj_priority;?>' required disabled>
                                  <option value="">---Please select---</option> <!-- not selected / blank option -->
                                  <option value="1" <?php if($detail->proj_priority==1){echo 'selected';}?>>Normal</option> <!-- interpolation -->
                                  <option value="2" <?php if($detail->proj_priority==2){echo 'selected';}?>>Urgent</option>
                                  <option value="3" <?php if($detail->proj_priority==3){echo 'selected';}?>>Emergency</option>
                              </select>    
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Description</th>
                            <th>Day</th>
                            <th>Date Start</th>
                            <th>Date End</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;foreach ($arr_schedule as $schedule) {?>
                        <tr>
                            <td><?php echo $i++;?>
                            </td>
                            <td><input class='form-control' value="<?php echo $schedule->sched_descr;?>" disabled>
                            </td>
                            <td><input class='form-control' value="<?php echo $schedule->sched_target_day;?>" disabled>
                            </td>
                            <td>
                                <input class='form-control' value="<?php echo $schedule->sched_date_start;?>" disabled/>
                            </td>
                            <td>
                                <input class='form-control' value="<?php echo $schedule->sched_date_end;?>" disabled/>
                            </td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</div>
</div>
</div>
<div role="tabpanel" class="tab-pane" id="settings">
    <br>
    <div class="panel panel-default">
      <div class="panel-heading">Kick Of Meeting</div>
      <div class="panel-body">
        <div>
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <?php $i=0;foreach ($arr_meeting as $meeting) { $count=$i++;?>
            <li role="presentation" <?php if($count==0){echo 'class="active"';}?>><a href="#<?php echo $meeting->meet_id;?>" aria-controls="<?php echo $meeting->meet_id;?>" role="tab" data-toggle="tab"><?php echo $meeting->meet_date;?></a></li>
            <?php } ?>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <br>
            <?php $i=0;foreach ($arr_meeting as $meeting) { $count=$i++;?>
            <div role="tabpanel" class="tab-pane <?php if($count==0){echo "active";}?>" id="<?php echo $meeting->meet_id;?>">
                <div class="panel panel-default" >
                    <div class="panel-heading">Meeting <?php echo $meeting->meet_date;?></div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <div class="col-lg-12">                                
                                        <div class="row">
                                            <div class="col-lg-12">
                                              <div class="form-group">
                                                <label>Meeting Date</label>
                                                <input type="date" class="form-control" name='meet_date' placeholder='Meeting Date' value="<?php echo $meeting->meet_date;?>" disabled>
                                            </div>

                                            <label>Person Meeting</label>
                                            <table class='table table-bordered'>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                </tr>
                                                <tr ng-show='person==""'>
                                                    <td colspan="5">Tidak ada data</td>
                                                </tr>
                                                <?php 
                                                $query=$this->db->query("select * from eproj_meeting_person where meet_id=".$meeting->meet_id);
                                                foreach ($query->result() as $person) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $person->person_name;?></td>
                                                        <td><?php echo $person->person_email;?></td>
                                                    </tr>
                                                    <?php } ?>
                                                </table>
                                                <br>

                                                <div class="form-group">
                                                    <label>Description Meeting</label>
                                                    <textarea type="text" class="form-control" rows='5' name='meet_descr' placeholder='Description Meeting' disabled><?php echo $meeting->meet_descr;?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Scope Of Work</label>
                                                    <textarea type="text" class="form-control" rows='5' name='meet_scope' placeholder='Scope Of Work' disabled><?php echo $meeting->meet_scope;?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Material</label>
                                                    <textarea type="text" class="form-control" rows='5' name='meet_material' placeholder='Material' disabled><?php echo $meeting->meet_material;?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>Umum</label>
                                                    <textarea type="text" class="form-control" rows='5' name='meet_umum' placeholder='Umum' disabled><?php echo $meeting->meet_umum;?></textarea>
                                                </div>

                                                <?php 
                                                $berkas_meeting=$this->db->query('select * from eproj_meeting_file where meet_id='.$meeting->meet_id);
                                                ?>
                                                <table class="table">
                                                  <tr>
                                                    <th>Attachment</th>      
                                                </tr>
                                                <?php foreach ($berkas_meeting->result() as $berkas_meeting) {?>
                                                <tr>
                                                    <td><a href="<?php echo base_url();?>uploads/eproj/meeting/<?php echo $berkas_meeting->file_name;?>" target="_blank"><?php echo $berkas_meeting->file_name;?></td>      
                                                </tr>
                                                <?php } ?>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>


    </div>

</div>

</div>
</div>
</div>
</div>





<?php } ?></div>          


<center><a class="btn btn-primary" href="http://192.168.114.10/monitoring">Back Realtime Monitoring</a></center><br><br><br>
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->
