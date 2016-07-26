
$(function(){

/*------------------------------------voting_classification.php---------------------------------*/ 
    $('#voting_classification input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("#voting_classification input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $("#voting_classification input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
/*-----------------------------------./voting_classification.php---------------------------------*/ 


/*------------------------------------voting_management_form.php---------------------------------*/
    //投票活动信息管理-vm_date_start
    $('#vm_date_start').datetimepicker({
      language:'zh-CN',
      autoclose: true,
      todayBtn: 'linked',
      todayHighlight: true,
      format: 'yyyy-mm-dd hh:ii:ss',
      startDate: new Date()
    });
    
    //投票活动信息管理-vm_date_end
    $('#vm_date_end').datetimepicker({
      language:'zh-CN',
      autoclose: true,
      todayBtn: 'linked',
      todayHighlight: true,
      format: 'yyyy-mm-dd hh:ii:ss',
      startDate: new Date()
    });
    //投票活动信息管理-结束时间必须大于开始时间
    $('#vm_date_end').datetimepicker().on('changeDate', function(ev){

    });

    //配置基础人员信息
    //vm_bp();
/*-------------------------------------voting_management_form.php-----------------------------------*/



/*--------------------------------------------menu.php----------------------------------------------*/ 
    $('#menu').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "processing": true
    });
    $('#menu input[type="checkbox"]').iCheck({
      checkboxClass: 'icheckbox_flat-blue',
      radioClass: 'iradio_flat-blue'
    });

    //Enable check and uncheck all functionality
    $(".menu-checkbox-toggle").click(function () {
      var clicks = $(this).data('clicks');
      if (clicks) {
        //Uncheck all checkboxes
        $("#menu input[type='checkbox']").iCheck("uncheck");
        $(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
      } else {
        //Check all checkboxes
        $("#menu input[type='checkbox']").iCheck("check");
        $(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
      }
      $(this).data("clicks", !clicks);
    });
/*--------------------------------------------menu.php----------------------------------------------*/


/*------------------------------------------menu_form.php-------------------------------------------*/
    
/*----------------------------------------./menu_form.php---------------------------------------------*/




































});
