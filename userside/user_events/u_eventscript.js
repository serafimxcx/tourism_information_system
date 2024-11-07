var event_id = "";
var view_reply = false;

$(function(){

    $("#txt_search_m").keyup(function () {
        var search_municipal = $(this).val();
        if (search_municipal != "") {
            $.ajax({
                url: '/tourism_information_system/live_search_municipal.php',
                method: 'POST',
                data: {
                    search_municipal: search_municipal
                },
                success: function (data) {
                    $('#search_result_m').html(data);
                    $('#search_result_m').css('display', 'block');
                    $('#search_m').css('background-color', 'white');
                    $('#search_m').css('box-shadow', '0px 8px 16px 0px rgba(0,0,0,0.2)');
                

                   
                }
            });
        } else {
            $('#search_result_m').css('display', 'none');
            $('#search_m').css('box-shadow', 'none');
            $('#search_m').css('background-color', 'rgb(239, 239, 239)');
        }
    });

    $("#btn_menu").click(function(){
        if($("#navbar").css("display")=="none"){
            $("#navbar").css({"display":"block"});
            if (window.matchMedia('(max-width: 750px)').matches) {
                $("#btn_menu").css({"margin-left":"0"});
            } else {
                $("#btn_menu").css({"margin-left":"25%"});
            }
            
        }else if($("#navbar").css("display")=="block"){
            $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
        }
    });

    $(".container").click(function(){
        $("#navbar").css({"display":"none"});
            $("#btn_menu").css({"margin-left":"0"});
    });

    $(".btn_more").click(function(){
        window.location.href = "u_events.php?event_type="+$(this).attr("event_type")+"&event_id="+$(this).attr("event_id");
    });

    $("#btn_back").click(function(){
        window.location.href = "u_events.php?event_type="+$(this).attr("event_type");
        
    });

    $(document.body).on("click",".btn_bookmark",function() {
       
		Bookmark(parseInt($(this).attr("event_id")));

	});

    $(document).on('click', '.admin_result', function(){
        var pattern = /event_type/;
        var pattern2 = /municipality/;
        var newHref = "";
        if(pattern.test(window.location.href) == true){
            newHref = window.location.href + "&municipality="+$(this).attr("admin_id");
        }else{
            newHref = window.location.href + "?municipality="+$(this).attr("admin_id");
        }
        
        if(pattern2.test(window.location.href) == false){
            window.location.href=newHref;
        }

    
    });

    $("#add_image_comment").click(function(e) {
        $("#imagePostComment").click();
    });

    $("#btn_cancelcomment").click(function(e) {
        Reset();
    });

    var filesPreviewComment = function(input) {

        if (input.files) {
            $('#previewFilesComment').append("<div class='preview col-sm-5'></div>");
            var files = input.files;
            var filesAmount = input.files.length;

            for (i = 0; i < filesAmount; i++) {
                
                var filename = files[i].name;
                var filetype = filename.split(".");
                
                if(filetype[1].toUpperCase() == "MP4"){
                    var files = event.target.files;
                for (var i = 0; i < files.length; i++) {
                var f = files[i];
                // Only process video files.
                if (!f.type.match('video.*')) {
                    continue;
                }

                var source = document.createElement('video'); //added now

                source.width = 280;

                source.height = 240;

                source.controls = true;

                source.src = URL.createObjectURL(files[i]);

                $(".preview").append(source);
                } // append `<video>` element
                }else{
                    var reader = new FileReader();

                reader.onload = function(event) {
                    $($.parseHTML("<img class='previewFile'>")).attr('src', event.target.result).appendTo(".preview");
                }

                reader.readAsDataURL(input.files[i]);
                }
                
            }
        }

    };

    $('#imagePostComment').on('change', function() {
        filesPreviewComment(this, '#preview');
           
    });

    $("#btn_savecomment").click(function(){
        var formData = new FormData($("#add_comment_form")[0]);

        AddComment(formData, event_id);
    });

    var getUrlParameter = function getUrlParameter(sParam) {
        var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;
    
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
    
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
            }
        }
        return false;
    };

    event_id = getUrlParameter('event_id');

    ViewComments(event_id);

    $(document.body).on("click",".btn_deletecomment",function() {
		if ( confirm("Are you sure you want to delete this comment?") ) 
			RemoveComment(parseInt($(this).attr("delete_id")));
	});

    $(document.body).on("click",".btn_reply",function() {
        
        if(view_reply == false){
            view_reply = true;
            $("#reply_div"+parseInt($(this).attr("comment_id"))).css({"display":"block"});
            
            $("#txt_reply"+parseInt($(this).attr("comment_id"))).focus();
            ViewReplies(parseInt($(this).attr("comment_id")));
        }else{
            view_reply = false;
            $("#reply_div"+parseInt($(this).attr("comment_id"))).css({"display":"none"});
        }
          
    });

    $(document.body).on("click","#btn_savereply",function() {
        AddReply(parseInt($(this).attr("comment_id")), event_id);
    });

    $(document.body).on("click",".btn_deletereply",function() {
		if ( confirm("Are you sure you want to delete this reply?") ) 
			RemoveReply(parseInt($(this).attr("delete_id")), parseInt($(this).attr("comment_id")));
	});
});

function Bookmark(event_id){
    var c_id = "";

    c_id = "event_id=" + event_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/bookmark.php",
        "data": c_id,
        "success": function(text){
            if(text == "not login"){
                window.location.href='/tourism_information_system/index.php?not_logged_in=true';
            }else{
                var bookmark = JSON.parse(text);
           
                $("[event_id="+event_id+"]").prop("src", bookmark.url);
            }
            
			
        }
    });
}

function Reset(){
    $("[data_type=txt]").val("");
    $("#imagePostComment").val("");
    $("#previewFilesComment").html("");
}

function AddComment(formData, event_id){
    console.log("ok");
    $.ajax({
        type:'POST',
        url:'../user_interactions/event_postcomment.php',
        data:formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response){
            if(response.not_login){
                window.location.href= response.url;
            }else if(response.success){
            

                alert(response.message);
                ViewComments(event_id);
                Reset();
            }else{
                alert(response.message);
            }
            
        },error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log('XHR ERROR ' + XMLHttpRequest.status);
            return JSON.parse(XMLHttpRequest.responseText);
        }
    });
}

function ViewComments(event_id){
    
    var cEvent_id = "";

    cEvent_id = "event_id=" + event_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/loadeventcomments.php",
        "data": cEvent_id,
        "success":function(text){
            
            $("#view_comments_div").html(text);
           
        }
    });
}

function RemoveComment(comment_id){
    var cParam = "";
	
	cParam = "comment_id="+comment_id;
	
	$.ajax({
		"type":"POST",
		"url": "../user_interactions/deleteeventcomment.php",
		"data": cParam,
		"success":function(text) {
			
			if ( text !== "" ) { 
				alert(text); 
			}
			else {
                alert("Comment Deleted Successfully.");
				ViewComments(event_id);
			}
					
		}
	});
}

function ViewReplies(comment_id){
    
    var cComment_id = "";

    cComment_id = "comment_id=" + comment_id;
    cComment_id += "&event_id=" + event_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/loadeventreplies.php",
        "data": cComment_id,
        "success":function(text){
            
            $("#view_replies_div"+comment_id).html(text);
           
        }
    });
}

function AddReply(comment_id, event_id){
    cReply = "";

    cReply = "txt_reply="+$("#txt_reply"+comment_id).val();
    cReply += "&comment_id="+comment_id;
    cReply += "&event_id="+event_id;

    console.log(event_id);

    $.ajax({
        "type":"POST",
        "url": "../user_interactions/saveeventreply.php",
        "data": cReply,
        "success": function(text){
            if(text !== ""){
                if(text == "not login"){
                    window.location.href='/tourism_information_system/index.php?not_logged_in=true';
                }else{
                    alert(text);
                }
                
            }else{
                alert("Reply Posted.");
                $("#txt_reply"+comment_id).val("");
                ViewReplies(comment_id);
            }
        }
    });
}

function RemoveReply(reply_id, comment_id){
    var cParam = "";
	
	cParam = "reply_id="+reply_id;
	
	$.ajax({
		"type":"POST",
		"url": "../user_interactions/deleteeventreply.php",
		"data": cParam,
		"success":function(text) {
			
			if ( text !== "" ) { 
				alert(text); 
			}
			else {
                alert("Reply Deleted Successfully.");
                ViewReplies(comment_id);
			}
					
		}
	});
}
