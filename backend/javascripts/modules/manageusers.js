$(document).ready(function(){

	ont = $('.article-datatable table').dataTable(
    {
        "bJQueryUI": true,
        "sPaginationType": "full_numbers",
        //"bProcessing": true,
        //"bServerSide": true,
        //"sAjaxSource": "paging_inbox.php",
        "fnDrawCallback": function ()
        {
            var i = 0;
            $('tbody').find('tr').each(function ()
            {
					
            });
        }
    });
    $.post('ajax.php',
    {
        func: 'getAllUsers'
    }, function (data)
    {
        articleObj = jQuery.parseJSON(data);
        $.each(articleObj, function (i, val)
        {
        	var Actions = '<center><img src="../images/Edit.png" class="edit-image" title="Detail" id="'+val['userid']+'" name="'+i+'"/><img src="../images/Delete.png" class="delete-image" title="Delete Article" id="'+val['userid']+'"/></center>'
            ont.fnAddData([(i + 1),val['firstname']+" "+val['lastname'],val['email'],Actions]);
            //alert((i + 1)+" "+val['firstname']+" "+val['email']+" Actions");
        });
        
    }).complete(function ()
    {
    	//stopLoader();
    	 $('table tbody tr').each(function (i)
        {
            //$(this).addClass('hover-class');
            
        });
        	
			
	});
		
	$('.delete-image').live('mouseenter', function (){
        	
    	$(this).attr('src','../images/Delete_hover.png');
    	
    });
    $('.delete-image').live('mouseleave', function (){
    	
    	$(this).attr('src','../images/Delete.png');
    	
    });
    $('.edit-image').live('mouseenter', function (){
        	
    	$(this).attr('src','../images/Edit_hover.png');
    	
    });
    $('.edit-image').live('mouseleave', function (){
    	
    	$(this).attr('src','../images/Edit.png');
    	
    });
	$('.view-image').live('mouseenter', function (){
        	
    	$(this).attr('src','../images/Detail_hover.png');
    	
    });
    $('.view-image').live('mouseleave', function (){
    	
    	$(this).attr('src','../images/Detail.png');
    	
    });
	$('.delete-image').live('click', function ()
    {
		var pos = $(this).closest('tr').prevAll().length; 
		$.post('ajax.php',
        {
            func: 'delete-user',
            id: $(this).attr('id')
        }, function (data)
        {
            ont.fnDeleteRow(pos);
            alert(data);
        });

    });
    
    $('.edit-image').live('click',function(){
   		var index = $(this).attr('name');
   		var id = $(this).attr('id');
   		$('.fancybox-form').find('#userid').val(id);
   		$('.fancybox-form').find('#firstname').val(articleObj[index]['firstname']);
   		$('.fancybox-form').find('#lastname').val(articleObj[index]['lastname']);
   		$('.fancybox-form').find('#address').html(articleObj[index]['address']);
   		$('.fancybox-form').find('#university').val(articleObj[index]['university']);
   		$('.fancybox-form').find('#branch').val(articleObj[index]['branch']);
   		$('.fancybox-form').find('#year').val(articleObj[index]['year']);
   		$('.fancybox-form').find('#mobile').val(articleObj[index]['mobile']);
   		
   		fancy = $('.fancybox-form #view-form').fancybox(function(){}).click();
   });
   
   $('#submit-form').live('click',function(){
		//alert($(this).parent().find('#atricleid').val());
		var me = $(this).parent();
		$.post('ajax.php',
        {
            func: 'edit-user',
            userid: me.find('#userid').val(),
            firstname: me.find('#firstname').val(),
            lastname: me.find('#lastname').val(),
            address: me.find('#address').html(),
            university:me.find('#university').val(),
            branch:me.find('#branch').val(),
            year:me.find('#year').val(),
            mobile:me.find('#mobile').val()
        }, function (data)
        {
            alert(data);
           
        }).complete(function(){
             $.fancybox.close();
        });
	});
});
