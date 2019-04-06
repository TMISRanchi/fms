<?php include_once('admin_header.php'); ?>
<style type="text/css">
.fml{
  font-size: 12px;
  color: purple;
}

.white{
  background-color: rgba(255,255,255,.8);
  border: 0px;
  color:blue;
}
.hide{
  color: gray;
  font-style: italic;
  font-size: 15px;
}
.bodycolor{
    /* The image used */
  background-image: url("https://mdbootstrap.com/img/Photos/Horizontal/Nature/full page/img(11).jpg");

  /* Full height */
  height: 100%; 

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.pp{
  font-size: 15px;
  font-weight: light;
}
.more{
  font-size: 13px;
}
</style>
</head>
<body class="bodycolor">
  <div id="load"></div>
<?php include('sidebar.php');?>
<div class="sidebar-fixed position-fixed">

            <a class="waves-effect">
                <img src="<?=base_url('assets/img/logo.png')?>" class="img-fluid" alt="">
            </a>
           <div class="list-group list-group-flush menu">
            <p><i class="fa fa-bars" aria-hidden="true"></i>  Menu</p>
                <a href="<?=base_url('dashboard/index')?>" class="list-group-item waves-effect">
                    <i class="fa fa-pie-chart mr-3"></i>Dashboard
                </a>
                <a href="<?=base_url('dashboard/fee')?>" class="list-group-item active  waves-effect">
                    <i class="fa fa-inr mr-3"></i>Fee Deposit</a>
                    <a href="<?=base_url('dashboard/students_list')?>" class="list-group-item  waves-effect">
                    <i class="fa fa-users mr-3"></i>Student List</a>
            </div>
            <div class="list-group list-group-flush menu">
              <p class="pt-3"><i class="fa fa-cog" aria-hidden="true"></i>  Settings</p>
              <a href="<?=base_url('dashboard/add_std')?>" class="list-group-item  waves-effect">
                    <i class="fa fa-plus mr-3"></i>Add Students</a>
                <a href="<?=base_url('fee_settings/load_set')?>" class="list-group-item  waves-effect">
                    <i class="fa fa-gear mr-3"></i>Fee Settings</a>
                <a href="<?=base_url('fee_settings')?>" class="list-group-item waves-effect">
                    <i class="fa fa-compass mr-3"></i>Fee Stucture</a>    
            </div>
        </div>
        <main role="main" class="pt-5 mx-lg-5">
              <?php $feedback=$this->session->flashdata('feedback');
                    $feedback_class=$this->session->flashdata('feedback_class');
              ?>
              <div class="alert <?=$feedback_class?>" role="alert"><?=$feedback;?></div>              
              <div class="row">
                  <div class="col-md-10">                   
                    <div class="card card-cascade narrower">
                       <div class="view view-cascade gradient-card-header z-depth-2 topm rounded narrower py-2 mx-4  d-flex justify-content-between align-items-center">
                          <a href="" class="white-text mx-3">Student Details</a>
                        </div>
                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-hover table-sm">
                              <thead class="thead">
                                <tr>
                                  <th>Admi. No</th>
                                  <th>Student Name</th>
                                  <th>Father's Name</th>
                                  <th>Mother's Name</th>
                                  <th>class</th>
                                  <th>Section</th>
                                  <th>Roll No</th>
                                </tr>
                              </thead>
                              <tbody class="sdetail">
                                <tr>
                                  <td><?=$sdata->s_admission?></td>
                                  <td><?=$sdata->s_name?></td>
                                  <td><?=$sdata->sf_name?></td>
                                  <td><?=$sdata->sm_name?></td>
                                  <td class="text-center"><?=$sdata->s_class?></td> 
                                  <td class="text-center"><?=$sdata->s_section?></td>
                                  <td class="text-center"><?=$sdata->s_roll?></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div>
                  </div>
                  <div class="col-md-2">
                    <div class="col-md-2">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-success">More</button>
                      <button type="button" class="btn btn-sm btn-danger dropdown-toggle px-3" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">                                        
                      </button>
                      <div class="dropdown-menu more">
                          <?=anchor("dashboard/student_details/{$sdata->s_admission}", '<i class="fa fa-exclamation-triangle" aria-hidden="true"></i>   Check Due',['class'=>'dropdown-item more']);?>
                          
                          <?=anchor("dashboard/view_history/{$sdata->s_id}", '<i class="fa fa-check" aria-hidden="true"></i>   Payment History',['class'=>'dropdown-item more']);?>
                      </div>
                    </div>
                  </div>
                  </div>
              </div>
            <br>
            <div class="row">
              <div class="col-md-6">
                <div class="card wow fadeIn">
                  <div class="card-body">
                    <?=form_open('dashboard/add_temp_fee')?>
                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      <div class="form-group">
                          <label class="fml" for="csname">Fee Amount & Fee Type</label>
                            <select id="fee_type" name="fee_amount_type" class="form-control form-control-sm">
                              <option disabled selected>select fee type and amount</option>
                              <?php if(!is_null($fees_list)):?>
                              <?php foreach ($fees_list as $type_amount):?>  
                              <option value="<?=$type_amount['fee_amount'].$type_amount['fee_type']?>"><?=$type_amount['fee_amount']."___".$type_amount['fee_type']?></option>
                              <?php endforeach; ?>
                              <?php else:?>
                              <option>No fee types and amount found</option>
                            <?php endif;?>
                            </select>           
                      </div>
                      <div class="form-group">
                          <label class="fml" for="csname">Month</label>
                            <select id="show_data" name="months" class="form-control form-control-sm">
                          <!--<option disabled selected>Select Month</option>
                              <option value="january">January</option>
                              <option value="february">February</option>
                              <option value="march">March</option>
                              <option value="april">April</option>
                              <option value="may">May</option>
                              <option value="june">June</option>
                              <option value="july">July</option>
                              <option value="august">August</option>
                              <option value="september">September</option>
                              <option value="october">October</option>
                              <option value="november">November</option>
                              <option value="december">December</option> -->
                            </select>           
                      </div>
                      
                    <br>
                    <input type="hidden" name="s_roll" value="<?=$sdata->s_roll?>">
                    <input type="hidden" name="s_name" value="<?=$sdata->s_name?>">
                    <input type="hidden" name="sf_name" value="<?=$sdata->sf_name?>">
                    <input type="hidden" name="sm_name" value="<?=$sdata->sm_name?>">
                    <input type="hidden" name="s_id" value="<?=$sdata->s_id?>">
                    <input type="hidden" name="s_class" value="<?=$sdata->s_class?>">
                    <input type="hidden" name="s_section" value="<?=$sdata->s_section?>">
                    <input type="hidden" name="fee_date" value="<?=date('d-m-Y')?>">
                    <input type="hidden" name="s_admission" value="<?=$sdata->s_admission?>">
                    <input type="hidden" name="id" value="<?=$sdata->s_id?>">
                    <input type="hidden" name="fee_recipt" value="<?=$fee_recipt->recipt_no?>">                 
                    <input type="submit" value="Add" class="btn btn-sm btn-block btn-primary">
                    <?=form_close()?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-md-6 mb-3">
            <div class="card wow fadeIn">
              <div class="card-body">
                 <div class="table-responsive">
                    <table class="table table-hover table-sm">
                      <thead class="thead">
                        <tr>
                          <th>Sr</th>
                          <th>Fee Type</th>
                          <th>Month</th>
                          <th class="text-right">Amount</th>
                          <th class="text-center">Action</th>
                        </tr>
                      </thead>
                      <tbody class="sdetail">
                        <tr id="tr">
                          <?php 
                            if (isset($temp_fee)) {
                              $c=0;
                            foreach ($temp_fee as $feedata):?>
                              <td id="serial"><?=++$c?></td>
                              <td><?=$feedata->fee_type?></td>
                              <td><?=$feedata->months;?></td>
                              <td class="text-right"><?=$feedata->fee_amount;?></td>
                              <td id="del_button" class="text-center"><button class="white" type="button" onclick="del_temp(<?=$feedata->temp_fee_id?>)"><i class="fa fa-times"></i></button></td>                            
                              </tr>
                            <?php endforeach;}
                              else{
                                echo "<td>"."No fee added"."</td>";
                              }?>
                              <td colspan="2"></td>
                              <td colspan="1" style="font-weight: bold;">Total</td>
                              <td class="text-right" style="font-weight: bold;"><?=$total_before_payment->fee_amount?></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
              <center>
                <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" id="confirm">
                      <label class="custom-control-label pp" for="confirm"><button <?=$next_link?> class="white" onclick="check()">Next   <i class="fa fa-chevron-circle-right" aria-hidden="true"></i></button></label>
                </div>
                <br>
                <?php 
                if(isset($temp_fee)){?>
                <?=anchor('dashboard/confirm_payment','<i id="cnf_link" class=""></i> Confirm',['class'=>'btn btn-sm btn-success','id'=>'cnf']);?>

               <?=anchor('dashboard/cancel_payment','Cancel',['class'=>'btn btn-sm btn-danger']);}?>
               </center>
            </div>
          </div>
        </div>             
        </main>
        <script type="text/javascript">
        $(document).ready(function(){
           var ln = document.getElementById("serial").value;
           if (ln==1) {
             $("#del_button").show();
           }else{
             $("#del_button").hide();
           }
          });
        </script>

        <script type="text/javascript">
        $(document).ready(function(){
          var x=document.getElementById("confirm").checked;
           if (x==false) {
             $("#cnf").hide();
           }
          });
        </script>

        <script type="text/javascript">           
          function check(){            
            if (document.getElementById("confirm").checked=true) {
             $("#cnf").show();
           }
         }
         </script>

        <script type="text/javascript">
          function del_temp(id){
            if(confirm("Are you sure")){
              
              $.ajax({

                url: "<?php echo base_url(); ?>/dashboard/del_temp/" +id,
                type:'post',
                data:{'id':id},

                success:function(){
                  window.location.href = "<?php echo base_url(); ?>dashboard/del_r";
                },
                error: function(){
                  alert('failed')
                }
              });
            }else{
              alert('Fee not deleted');
            }
          }
        </script>
        <script type="text/javascript">
          jQuery(document).ready(function(){
              $('#cnf').click(function() {
              $("#cnf_link").addClass('fa fa-circle-o-notch fa-spin fa-1x fa-fw');
            }); 
          });
        </script>
        <script type="text/javascript">
            $('select').on('change', function(){
              var fee_type=$('#fee_type').val();
              $.ajax({
                  type :'post',
                  url  : "<?=base_url()?>dashboard/get_due_month/"+fee_type,
                  dataType : 'json',
                  success : function(data){
                      var html = '';
                      var i;
                      for(i=0; i<data.length; i++){
                          html +="<option value='" +data[i].months+"'>"+data[i].months+"</option>";
                        }
                      $( 'select[name="months"]' ).find('option').remove().end().append(html);
                  }
              });                
            });
        </script>        
<?php include_once('admin_footer.php'); ?>
