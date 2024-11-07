var story_id ="";
var view_reply = false;
var trending = "";
var searchStory = "";

$(function(){

    LoadStory(trending, searchStory);
    setInterval(function(){ LoadStory(trending, searchStory); }, 5000);


     //live search tag destination
     $("#search_destination").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: '/tourism_information_system/live_search_destination.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#search_result_d').html(data);
                    $('#search_result_d').css('display', 'block');
                    $('#search_d').css('background-color', 'white');
                    $('#search_d').css('box-shadow', '0px 8px 16px 0px rgba(0,0,0,0.2)');
                

                   
                }
            });
        } else {
            $('#search_result_d').css('display', 'none');
            $('#search_d').css('box-shadow', 'none');
            $("#txt_destination_id").val('');
        }
    });

    $(document).on('click', '.d_result', function(){
        $("#txt_destination_id").val($(this).attr("destination_id"));
        $("#search_destination").val($(this).attr("destination_name"));
        $('#search_result_d').css('display', 'none');
        $('#search_d').css('box-shadow', 'none');
    });

    //live search tag event
    $("#search_event").keyup(function () {
        var query = $(this).val();
        if (query != "") {
            $.ajax({
                url: '/tourism_information_system/live_search_event.php',
                method: 'POST',
                data: {
                    query: query
                },
                success: function (data) {
                    $('#search_result_e').html(data);
                    $('#search_result_e').css('display', 'block');
                    $('#search_e').css('background-color', 'white');
                    $('#search_e').css('box-shadow', '0px 8px 16px 0px rgba(0,0,0,0.2)');
                

                   
                }
            });
        } else {
            $('#search_result_e').css('display', 'none');
            $('#search_e').css('box-shadow', 'none');
            $("#txt_event_id").val('');
        }
    });

    $(document).on('click', '.e_result', function(){
        $("#txt_event_id").val($(this).attr("event_id"));
        $("#search_event").val($(this).attr("event_name"));
        $('#search_result_e').css('display', 'none');
        $('#search_e').css('box-shadow', 'none');
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

    $("#btn_sort").click(function(){
        trending = true;
        $("#txt_trending").css({"color":"#2DD846"});
        LoadStory(trending, searchStory);

    });

    $("#btn_restartstory").click(function(){
        trending = "";
       
        $("#txt_trending").css({"color":"black"});
        LoadStory(trending, searchStory);

    });

    $("#txt_search_story").change(function(){
        searchStory = $("#txt_search_story").val();
        LoadStory(trending, searchStory);

    });

    $(document.body).on("click",".btn_like",function() {
		LikeStory(parseInt($(this).attr("story_id")));
	});

    $(document.body).on("click",".btn_repost",function() {
		RepostStory(parseInt($(this).attr("story_id")));
	});

    $(document.body).on("click",".storyimages",function() {
		var clickedSrc = $(this).attr('src');

        $("#viewimage_modal").css({"display":"flex"})
        $('#viewimage_container').attr('src', clickedSrc);
	});

    $("#viewimage_modal").click(function(event){
        $("#viewimage_modal").css({"display":"none"});
    });

    $("#comment_modal").click(function(event){
        if(event.target.id=="comment_modal"){
            window.location.href = 'userstories.php'
        }
    });

    
    $("#btn_back").click(function(){
        window.location.href = 'userstories.php'
        
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

        AddComment(formData, story_id);
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

    story_id = getUrlParameter('story_comment_id');

    ViewComments(story_id);


    $("#btn_addstory").click(function(){
        window.location.href = "userstories.php?poststory=true";
    });

    $("#btn_cancelstory").click(function(){
        window.location.href = "userstories.php";
    });
    
    $("#add_image_story").click(function(e) {
        $("#imagePostStory").click();
    });

    var filesPreviewStory = function(input) {

        if (input.files) {
            $('#previewFilesStory').append("<div class='preview col-sm-6'></div>");
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

    $('#imagePostStory').on('change', function() {
        filesPreviewStory(this, '#preview');
           
    });

    $("#btn_savestory").click(function(){
        
        var formData = new FormData($("#add_story_form")[0]);

        PostStory(formData);
    });

    $(document.body).on("click",".btn_delete",function() {
		if ( confirm("Are you sure you want to delete this post?") ) 
			RemoveStory(parseInt($(this).attr("delete_id")));
	});

    $(document.body).on("click",".btn_deletecomment",function() {
		if ( confirm("Are you sure you want to delete this comment?") ) 
			RemoveComment(parseInt($(this).attr("delete_id")));
	});

    $(document.body).on("click",".btn_deletereply",function() {
		if ( confirm("Are you sure you want to delete this reply?") ) 
			RemoveReply(parseInt($(this).attr("delete_id")), parseInt($(this).attr("comment_id")));
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

    $(document.body).on("click","#btn_cancelreply",function() { 
        $("#txt_reply"+parseInt($(this).attr("comment_id"))).val("");
    });

    

    $(document.body).on("click","#btn_savereply",function() {
        AddReply(parseInt($(this).attr("comment_id")), story_id);
    });

    $(".btn_share").click(function(){
        $("#share_modal").css({"display":"block"})
        
    });

    $("#btnclose_share").click(function(){
        $("#share_modal").css({"display":"none"})
        
    });

    $("#btn_fbshare").click(function(){
        var url = window.location.href;

        var fbshareurl = "https://www.facebook.com/sharer/sharer.php?u="+url;

        window.open(fbshareurl, "_blank")
        
    });

    $("#btn_twtshare").click(function(){
        var url = window.location.href;

        var twtshareurl = "https://twitter.com/intent/tweet?url="+url;

        window.open(twtshareurl, "_blank")
        
    });

    var clipboard = new ClipboardJS('#btn_copylink', {
        text: function() {
            return window.location.href;
        }
    });

    clipboard.on('success', function(e) {
        $("#share_message").text('Link copied to clipboard.', e.text).show();

        setTimeout(function() {
            $('#share_message').hide();
        }, 3000);
     
    });
 
    

  
});

function LikeStory(story_id){
    var cStory_id = "";

    cStory_id = "story_id=" + story_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/likestory.php",
        "data": cStory_id,
        "success": function(text){
            if(text == "not login"){
                window.location.href='/tourism_information_system/index.php?not_logged_in=true';
            }else{
                var likeunlike = JSON.parse(text);
           
                $("[like_id="+story_id+"]").prop("src", likeunlike.url);
                $("[numlikes_id="+story_id+"]").html(likeunlike.numlikes);
            }

            
			
        }
    });
}

function RepostStory(story_id){
    var cStory_id = "";

    cStory_id = "story_id=" + story_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/repoststory.php",
        "data": cStory_id,
        "success": function(text){
            if(text == "not login"){
                window.location.href='/tourism_information_system/index.php?not_logged_in=true';
            }else{
                var repostsnum = JSON.parse(text);
           
                $("[repost_id="+story_id+"]").prop("src", repostsnum.url);
            $("[numreposts_id="+story_id+"]").html(repostsnum.numreposts);
            }
            
			
        }
    });
}


function AddComment(formData, story_id){
    $.ajax({
        type:'POST',
        url:'../user_interactions/postcomment.php',
        data:formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response){
           
            if(response.not_login){
                window.location.href= response.url;
            }else if(response.success){
            

                $("[numcomments_id="+story_id+"]").html(response.numcomments);

                alert(response.message);
                ViewComments(story_id);
                Reset();
            }else{
                alert(response.message);
            }
            
        }
    });
}

function post_comment(id){
    window.location.href = "userstories.php?story_comment_id="+id;
  
}

function ViewComments(story_id){
    
    var cStory_id = "";

    cStory_id = "story_id=" + story_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/loadcomments.php",
        "data": cStory_id,
        "success":function(text){
            
            $("#view_comments_div").html(text);
           
        }
    });
}

function LoadStory(trending, searchStory){
    var cParam = "";

    

    if(trending != "" && searchStory == ""){
        cParam = "trending=true";
    }else if(trending == "" && searchStory != ""){
        cParam = "searchStory="+searchStory;
    }else if(trending != "" && searchStory != ""){
        cParam = "trending=true";
        cParam += "&searchStory="+searchStory;
    }else{
        cParam = "";
    }

    console.log(cParam);

    $.ajax({
        "type":"POST",
        "url":"loadstories.php",
        "data": cParam,
        "success": function(text){
            $("#load_stories_div").html(text);
        }
    });
}

function Reset(){
    $("[data_type=txt]").val("");
    $("#imagePostComment").val("");
    $("#previewFilesComment").html("");
}

function PostStory(formData){
    $.ajax({
        type:'POST',
        url:'../user_interactions/poststory.php',
        data:formData,
        processData: false,
        contentType: false,
        dataType: 'json',
        success: function(response){
            if(response.success){
                window.location.href = '/tourism_information_system/userside/userstories/userstories.php';
                alert(response.message);
                
            }else{
                alert(response.message);
            }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
            console.log('XHR ERROR ' + XMLHttpRequest.status);
            return JSON.parse(XMLHttpRequest.responseText);
        }
    });
}

function RemoveStory(story_id){
    var cParam = "";
	
	cParam = "story_id="+story_id;
	
	$.ajax({
		"type":"POST",
		"url": "../user_interactions/deletestory.php",
		"data": cParam,
		"success":function(text) {
			
			if ( text !== "" ) { 
				alert(text); 
			}
			else {
                alert("Post Deleted Successfully.");
				window.location.href = '/tourism_information_system/userside/userstories/userstories.php';
			}
					
		}
	});
}

function RemoveComment(comment_id){
    var cParam = "";
	
	cParam = "comment_id="+comment_id;
	
	$.ajax({
		"type":"POST",
		"url": "../user_interactions/deletecomment.php",
		"data": cParam,
		"success":function(text) {
			
			if ( text !== "" ) { 
				alert(text); 
			}
			else {
                alert("Comment Deleted Successfully.");
				ViewComments(story_id);
			}
					
		}
	});
}

function RemoveReply(reply_id, comment_id){
    var cParam = "";
	
	cParam = "reply_id="+reply_id;
	
	$.ajax({
		"type":"POST",
		"url": "../user_interactions/deletereply.php",
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

function AddReply(comment_id, story_id){
    cReply = "";

    cReply = "txt_reply="+$("#txt_reply"+comment_id).val();
    cReply += "&comment_id="+comment_id;
    cReply += "&story_id="+story_id;

    console.log(story_id);

    $.ajax({
        "type":"POST",
        "url": "../user_interactions/savereply.php",
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

function ViewReplies(comment_id){
    
    var cComment_id = "";

    cComment_id = "comment_id=" + comment_id;
    cComment_id += "&story_id=" + story_id;

    $.ajax({
        "type": "POST",
        "url": "../user_interactions/loadreplies.php",
        "data": cComment_id,
        "success":function(text){
            
            $("#view_replies_div"+comment_id).html(text);
           
        }
    });
}



