 var interval= "";

 var blink = document.getElementById('event');
setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 500);



function events()
{
 	var extention = "{{ Session::get('extension')}}";
 	var dial_num = $('#telNumber').val();

 	var event_called_name = $('#event_called_name').val();
 	var event_caller_name = $('#event_caller_name').val();

 	$.ajax({ 
		type: "POST",
		// headers: {'x-csrf-token': _token},
				url: "http://dbslhome.sytes.net:9987/aycent/xaycent/getEvent.php",
		dataType: "json",
		data:{"event_called_name":event_called_name,'event_caller_name' : event_caller_name  },

		success: function(data){        
			// console.log(data);
			  if (data.response == 200)
            {
            // console.log(data.event.type);
            if (data.event.channel_id !== "") 
            {
            	$('#dial_channelId').val(data.event.channel_id);
            }


                if (data.event.type == "Dial" && data.event.dialstatus == "" && data.event.state == "Down") {
                    $('#event').html("Connecting...");
                }

                if (data.event.type == "Dial" && data.event.dialstatus == "RINGING" && data.event.state == "Ringing") {
                    $('#event').html("Call is Ringing....");
                }

                if (data.event.type == "Dial" && data.event.dialstatus == "ANSWER" && data.event.state == "Up") {
                    $('#event').html("Call is Answered....");
                }


                if (data.event.type == "Dial" && data.event.dialstatus == "BUSY" && data.event.state == "Ringing") {
                    $('#event').html("Call is Busy....");
                }


                if (data.event.type == "ChannelDestroyed" && data.event.dialstatus == "" && data.event.state == "Up") {
                    $('#event').html("Call End....");
                    setTimeout(function(){ stop_interval(); }, 1000);
                }

            }



		}
	});
 
}



function stop_interval()
{
	console.log("stop_interval");
	clearInterval(interval);
	
	$('#event').html("");
	
	$('#telNumber').val("");
}

	


function ari_Channel(action)
{
	// stop_interval();

	if(action == "Mute")
	{
		$('#mute_btn').html("<i class=\"fa fa-microphone-slash\"></i>");
		$('#mute_btn').attr('title','Click to Unmute the Call');
		$('#mute_btn').attr('onclick','ari_Channel(\'Unmute\')');

		$('#event_op').html("Call on mute....");

	}else if(action == "Unmute")
	{
		$('#mute_btn').html("<i class=\"fa fa-microphone\"></i>");
		$('#mute_btn').attr('title','Click to Mute the Call');
		$('#mute_btn').attr('onclick','ari_Channel(\'Mute\')');
		$('#event_op').html("Call on unmute....");

	}


	if(action == "Hold")
	{
		$('#hold_btn').css("color","red");
		$('#hold_btn').attr('title','Click to unhold the call');
		$('#hold_btn').attr('onclick','ari_Channel(\'Unhold\')');

		$('#event_op').html("Call on hold....");


	}else if(action == "Unhold")
	{
		$('#hold_btn').css("color","green");
		$('#hold_btn').attr('title','Click to hold the call');
		$('#hold_btn').attr('onclick','ari_Channel(\'Hold\')');
		$('#event_op').html("Call on unhold....");

	}



	var main_url = "{{url('')}}";
 	main_url = main_url.replace('public','');

 	var dail_num = $('#telNumber').val();
 	var extention = "{{ Session::get('extension')}}";


var ext = extention.split(',');
console.log(ext[0]);

console.log(main_url + "xaycent/Channel"+action+".php");	

	$.ajax({ 
		type: "POST",
		// headers: {'x-csrf-token': _token},
		dataType: "json",
		data:{"dail_ext": dail_num,'extention' : ext[0] },
		url: main_url + "xaycent/Channel"+action+".php",
		success: function(data){        
			console.log(data);
		}
	});
}

function logout()
{
	window.location.href = "{{route('workspace.logout',session()->get('User_id')) }}";
}



$(document).ready(function()
{
$('#telNumber').inputFilter(function(value) {
  return /^\d*$/.test(value); });
// startTimer();
});
 

 $("#dailpad_call_btn").click(function()
 {
 	var dail_num = $('#telNumber').val();
 	var extention = "{{ Session::get('extension')}}";
 	// console.log(extention);
 	var pjsip = "";

 	if (dail_num.length < 5 )
 	{
 		pjsip = "PJSIP/"+dail_num;
 	} else {
 		// SIP/Carrier1/07536418723
 		pjsip = "SIP/"+dail_num+"@Carrier1";
 		// pjsip = "SIP/Carrier1/"+dail_num;
 	}


 	$.ajax({ 
		type: "POST",
		// headers: {'x-csrf-token': _token},
		dataType: "json",
		data:{"pj": pjsip,"dail_ext": dail_num,'extention' : extention },
		url: "http://dbslhome.sytes.net:9987/aycent/xaycent/dailcall_originate.php",
		success: function(data){        
			// console.log(data);
			console.log(data.channel);

			$('#event_called_name').val(data.channel.name);
			$('#event_caller_name').val(data.channel.caller.name);
			$('#dial_channelId').val(data.channel.id);
			// events();
			if (data.channel.state == "Down") {
				$('#event').html("Connecting...");
			}
			interval =  setInterval(events, 250);
		}
	});
 	

  
});






 $("#dailpad_call_hangup").click(function()
 {
 	var dail_num = $('#telNumber').val();
 	var extention = "{{ Session::get('extension')}}";

 	var main_url = "{{url('')}}";
 	main_url = main_url.replace('public','');
			$('#event').html("Call End....");
 	$.ajax({ 
 		type: "POST",
		// headers: {'x-csrf-token': _token},
		dataType: "json",
		data:{"dail_ext": dail_num,'extention' : extention },
		url: main_url+"xaycent/Channel_Dial_Delete.php",
		success: function(data){        
			console.log(data);
			$('#telNumber').val("");
			stop_interval();
			$('#event_op').html("");
			$('#event').html("");

		}
	});
 });


 $('#dailpad_call_transfer').click(function(){
 	var dial_num = $('#trans_ext').val();
 	var extention = "{{ Session::get('extension')}}";
 	var ext = extention.split(',');

 	var dial_channelId = $('#dial_channelId').val();

 	var agent_channelId = "{{ Session::get('channelId')}}";
 	var conference_num = "{{ Session::get('conference_num')}}";
 	// console.log(ext[0]);

 	var main_url = "{{url('')}}";
 	main_url = main_url.replace('public','');

 	$('#event_op').html("");
 	$('#event').html("");


 	var pjsip = "";

 	if (dial_num.length < 5 )
 	{
 		pjsip = "PJSIP/"+dial_num;

 	} else {
 		// SIP/Carrier1/07536418723
 		pjsip = "SIP/"+dial_num+"@Carrier1";

 		// pjsip = "SIP/Carrier1/"+dail_num;

 	}

 	$.ajax({ 
 		type: "POST",
		// headers: {'x-csrf-token': _token},
		dataType: "json",
		data:{"pj": pjsip,"dial_ext": dial_num,'extention' : ext[0],'agent_channelId':agent_channelId,"dial_channelId":dial_channelId,'conference_num':conference_num},
		url: main_url+"xaycent/call_transfer_originate.php",
		success: function(data)
		{        
			console.log(data);
			// $('#event_op').html(data.reply);
		}
	});

 });


(function($) {
  $.fn.inputFilter = function(inputFilter) {
    return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
      if (inputFilter(this.value)) {
        this.oldValue = this.value;
        this.oldSelectionStart = this.selectionStart;
        this.oldSelectionEnd = this.selectionEnd;
      } else if (this.hasOwnProperty("oldValue")) {
        this.value = this.oldValue;
        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
      } else {
        this.value = "";
      }
    });
  };
}(jQuery));