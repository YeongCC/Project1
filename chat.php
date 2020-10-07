<link rel="stylesheet" href="css/chat.css">

<input type="image" src="image/tigerChat.png" onclick="openForm()" id="mybut" class="chat"
  style="height: 150px; width:150px;"></input>
<!-- /////////////////////////////////////////////////////////////////////////////////////// -->
<div class="chat-popup" id="myForm" style="width: 300px;">
  <div style="  background-color: #fee106;  border-radius: 13px 13px 0px 0px;height:40px">
    <div style="text-align: center;">Welcome to Live Chat </div>
    <div><button type="button" class="close" onclick="closeForm()" data-dismiss="modal">&times;</button></div>
  </div>
  <div style="height:350px; overflow-y: scroll;padding:16px;background-color: #FFFFF0;">
  <div id="chat_history_"></div>
  </div>
<div style="background-color: white;">
    <input type="text" class="form-control" name="to_user" id="to_user" value="admin" style="display: none;" />
    <input type="text" class="form-control" name="from_user" id="from_user"
      value="<?php echo $_SESSION['userEmail']; ?>" style="display: none;" />
      <div>
    <textarea placeholder="Type message.." name="message" id="message" class="message" style="width:100%;" required></textarea>
</div>
<div>
  <button type="submit" class="btn chat_but btn-warning" id="chat_but" name="chat_but" style="width:100%;">Send</button>
</div>
    
</div>
</div>





<script>
  function openForm() {
    document.getElementById("myForm").style.display = "block";
    document.getElementById("mybut").style.display = "none";
  }

  function closeForm() {
    document.getElementById("myForm").style.display = "none";
    document.getElementById("mybut").style.display = "block";
  }
  $(document).on('click', '.chat_but', function () {
    var from_user = $('#from_user').val();
    var to_user = $('#to_user').val();
    var message = $.trim($('#message').val());
    if (message != "") {
      $.ajax({
        url: "database/insertChat.php",
        type: "POST",
        data: {
          from_user: from_user,
          to_user: to_user,
          message: message
        },
        cache: false,
        success: function (dataResult) {
          var dataResult = JSON.parse(dataResult);
          if (dataResult.statusCode == 200) {
            var message = $.trim($('#message').val(" "));
          } else if (dataResult.statusCode == 201) {
            alert("fail");
            event.preventDefault();
          }
        }
      });
    } else {
      alert('Please fill all the field !');
    };
  });
  setInterval(function () {
        $('#chat_history_').load("database/ChatShow.php").fadeIn("slow");
    }, 1000);
    $(document).on('click', '.remove_chat', function(){
		var chat_id = $(this).attr('id');
		if(confirm("Are you sure you want to remove thisv chat?"))
		{
			$.ajax({
				url:"database/removechat.php",
				method:"POST",
				data:{chat_id:chat_id},
				success:function(data)
				{
					update_chat_history_data();
				}
			})
		}
	});
</script>