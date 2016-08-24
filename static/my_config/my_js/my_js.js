
$(function(){

/*------------------------------------------left.php-------------------------------------------*/
    //一级节点
    $('.treeview').children('a').each(function(){
        if($(this).attr('href').indexOf(window.location.href) != '-1'){
            if($(this).hasClass("active") == false){
                $(this).parent().addClass("active");
            }
        }
    });
    $('.lv2 li').children('a').each(function(){
        if($(this).attr('href').indexOf(window.location.href) != '-1'){
            if($(this).hasClass("active") == false){
                $(this).parent().addClass("active");
            }
        }
    });

    //二级节点,自动展开,定位到所点击的菜单
    var level_two = $('.lv2').children('li');
    level_two.each(function(){
        var active =  $(this).hasClass("active");
        if(active == true){
            $(this).parents("li").addClass("active");
        }
    });
    var level_two = $('.lv3').children('li');
    level_two.each(function(){
        var active =  $(this).hasClass("active");
        if(active == true){
            $(this).parents("li").addClass("active");
        }
    });
/*----------------------------------------./left.php---------------------------------------------*/

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

    $('#vml_tab_rules input[type="radio"].minimal').iCheck({
      radioClass: 'iradio_minimal-blue'
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


/*
 *  菜单-权限-用户组
 *
 *  icheck
 */
    $('#groups_menu input[type="checkbox"].minimal').iCheck({
        checkboxClass: 'icheckbox_flat-blue'
    });




































});
